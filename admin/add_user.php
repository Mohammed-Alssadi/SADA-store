<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}
include("../include/db_connect.php");
include("header.php");

$message = '';
$messageType = '';
$errors = [];

$editing = false;
$user = [
    'id' => '',
    'fullname' => '',
    'username' => '',
    'email' => '',
    'country' => '',
    'status' => 1,
    'profile_image' => '',
    'roll_id' => 2
];


if (isset($_GET['id']) ) {
    $editing = true;
    

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? ");
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch();

    if ($row) {
        $user = $row;
    } else {
        header("Location: customers.php");
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $uid      = isset($_POST['id']) ? $_POST['id'] : null;
    $fullname = trim($_POST['fullname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $country  = trim($_POST['country'] ?? '');
    $status   = isset($_POST['status']) ? (int)$_POST['status'] : 1;
    $roll_id  = isset($_POST['roll_id']) ? (int)$_POST['roll_id'] : 2;

    
    if ($fullname === '') $errors[] = 'الاسم الكامل مطلوب';
    if ($username === '') $errors[] = 'اسم المستخدم مطلوب';

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'بريد إلكتروني صالح مطلوب';
    }

    if (!$uid && strlen($password) < 6) {
        $errors[] = 'كلمة المرور يجب أن تكون 6 أحرف على الأقل';
    }

   
    $profile_image = $user['profile_image'] ?? '';

    if (!empty($_FILES['profile_image']['name'])) {
        if ($_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {

            $uploadDir = __DIR__ . '/../uploads/users/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $ext = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($ext, $allowed)) {
                $errors[] = 'صيغة الصورة غير مدعومة';
            } else {
                $newName = uniqid('user_') . '.' . $ext;
                $targetAbs = $uploadDir . $newName;
                $targetRel = '../uploads/users/' . $newName;

                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetAbs)) {
                    $profile_image = '../' . $targetRel;
                }
            }
        }
    }


    if (empty($errors)) {
        try {

            if ($uid) {
                
                if ($password !== '') {
                    $hashed = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET 
                            fullname=?, username=?, email=?, password=?, country=?, profile_image=?, status=?, roll_id=?
                            WHERE id=?";
                    $conn->prepare($sql)->execute([
                        $fullname, $username, $email, $hashed,
                        $country, $profile_image, $status, $roll_id, $uid
                    ]);
                } else {
                    $sql = "UPDATE users SET 
                            fullname=?, username=?, email=?, country=?, profile_image=?, status=?, roll_id=?
                            WHERE id=?";
                    $conn->prepare($sql)->execute([
                        $fullname, $username, $email,
                        $country, $profile_image, $status, $roll_id, $uid
                    ]);
                }

                $message = 'تم تحديث بيانات العميل بنجاح';
                $messageType = 'success';
                $editing = true;

                $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
                $stmt->execute([$uid]);
                $user = $stmt->fetch();

            } else {
              
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users 
                        (fullname, username, email, password, country, profile_image, status, roll_id)
                        VALUES (?,?,?,?,?,?,?,?)";
                $conn->prepare($sql)->execute([
                    $fullname, $username, $email, $hashed,
                    $country, $profile_image, $status, $roll_id
                ]);

                $message = 'تمت إضافة العميل بنجاح';
                $messageType = 'success';
            }

        } catch (PDOException $e) {
            $message = 'خطأ في قاعدة البيانات';
            $messageType = 'danger';
        }
    } else {
        $message = implode(' - ', $errors);
        $messageType = 'danger';
    }
}
?>


<div class="dashboard-container p-4">
<div class="container-fluid">

<h4 data-key="addNewCustomer" class="mb-4"><?= $editing ? 'تعديل عميل' : 'إضافة عميل جديد'; ?></h4>

<?php if ($message): ?>
<div class="alert alert-<?= $messageType ?>"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

<?php if ($editing): ?>
<input type="hidden" name="id" value="<?= (int)$user['id'] ?>">
<?php endif; ?>

<div class="row">
<div class="col-md-6 mb-3">
<label data-key="fullName">الاسم الكامل</label>
<input type="text" name="fullname" class="form-control" required value="<?= htmlspecialchars($user['fullname']) ?>">
</div>

<div class="col-md-6 mb-3">
<label data-key="userName">اسم المستخدم</label>
<input type="text" name="username" class="form-control" required value="<?= htmlspecialchars($user['username']) ?>">
</div>

<div class="col-md-6 mb-3">
<label data-key="email">البريد الإلكتروني</label>
<input type="email" name="email" class="form-control" required value="<?= htmlspecialchars($user['email']) ?>">
</div>

<div class="col-md-6 mb-3">
<label data-key="password">كلمة المرور</label>
<input type="password" name="password" class="form-control" placeholder="<?= $editing ? 'اتركها فارغة إن لم ترغب بالتغيير' : '' ?>">
</div>

<div class="col-md-6 mb-3">
<label data-key="country">الدولة</label>
<input type="text" name="country" class="form-control" value="<?= htmlspecialchars($user['country']) ?>">
</div>

<div class="col-md-6 mb-3">
<label data-key="status">الحالة</label>
<select name="status" class="form-select">
<option data-key="statusActive" value="1" <?= $user['status']==1?'selected':'' ?>>نشط</option>
<option data-key="statusBlocked" value="0" <?= $user['status']==0?'selected':'' ?>>محظور</option>
</select>
</div>

<div class="col-md-6 mb-3">
<label data-key="role">role</label>
<select name="roll_id" class="form-select">
<option value="1" <?= $user['roll_id']==1?'selected':'' ?>>Admin</option>
<option value="2" <?= $user['roll_id']==2?'selected':'' ?>>Customer</option>
<option value="3" <?= $user['roll_id']==3?'selected':'' ?>>Vendor</option>
</select>
</div>

<div class="col-md-6 mb-3">
<label data-key="profileImage">الصورة الشخصية</label>
<input type="file" name="profile_image" class="form-control">
<?php if ($user['profile_image']): ?>
<img src="<?= htmlspecialchars($user['profile_image']) ?>" style="width:80px;margin-top:10px;">
<?php endif; ?>
</div>
</div>

<button data-key="save" class="btn btn-primary px-5"><?= $editing ? 'تحديث' : 'حفظ' ?></button>

</form>
</div>
</div>

<?php include "footer.php"; ?>
