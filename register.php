<?php
    session_start();
    require 'vendor/autoload.php';
    require 'include/functions.php';
    $errors         = [];
    $profile_image  = 'user.png';
    $success        = false;
    $showLoginModal = false;

    function clean($v)
    {
        return htmlspecialchars(trim($v));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = clean($_POST['username'] ?? '');
        $fullname = clean($_POST['fullname'] ?? '');
        $email    = clean($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $country  = clean($_POST['country'] ?? '');

        if ($username === '') {
            $errors['username'] = 'Username is required';
        } elseif (! preg_match('/^[a-zA-Z0-9_]{4,20}$/', $username)) {
            $errors['username'] = '4–20 characters (letters & numbers only)';
        }

        if ($fullname === '') {
            $errors['fullname'] = 'Full name is required';
        } elseif (strlen($fullname) < 5) {
            $errors['fullname'] = 'Minimum 5 characters';
        }

        if ($email === '') {
            $errors['email'] = 'Email is required';
        } elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }

        if ($password === '') {
            $errors['password'] = 'Password is required';
        } elseif (strlen($password) < 8) {
            $errors['password'] = 'At least 8 characters';
        } elseif (
            ! preg_match('/[A-Z]/', $password) ||
            ! preg_match('/[a-z]/', $password) ||
            ! preg_match('/[0-9]/', $password)
        ) {
            $errors['password'] = 'Must contain upper, lower & number';
        }

        if ($country === '') {
            $errors['country'] = 'Please select a country';
        }

        if (! empty($_FILES['profile_image']['name'])) {
            $allowed = ['image/jpeg', 'image/png', 'image/gif'];
            $type    = $_FILES['profile_image']['type'];
            $size    = $_FILES['profile_image']['size'];

            if (! in_array($type, $allowed)) {
                $errors['profile_image'] = 'Only JPG, PNG, GIF allowed';
            } elseif ($size > 2_000_000) { // 2MB
                $errors['profile_image'] = 'Image must be less than 2MB';
            }
        }

        if (empty($errors)) {
            $success = true;
            if (! empty($_FILES['profile_image']['name'])) {
                // التأكد من وجود المجلد
                if (! is_dir('uploads/users')) {
                    mkdir('uploads/users', 0777, true);
                }

                $profile_image = time() . '_' . basename($_FILES['profile_image']['name']);
                if (! move_uploaded_file($_FILES['profile_image']['tmp_name'], 'uploads/users/' . $profile_image)) {
                    $errors['profile_image'] = 'Failed to upload image';
                    $success                 = false;
                }
            }

            if ($success) {
                $otp                  = rand(100000, 999999);
                $_SESSION['register'] = [
                    'username'      => $username,
                    'fullname'      => $fullname,
                    'email'         => $email,
                    'password'      => password_hash($password, PASSWORD_DEFAULT),
                    'country'       => $country,
                    'profile_image' => $profile_image,
                    'otp'           => $otp,
                    'time'          => time(),
                ];
                if (sendOTP($email, $otp)) {
                    header('Location: verify.php');
                    exit;
                } else {
                    $errors['email'] = 'Failed to send verification email';
                    $success         = false;
                }

            }

        }
    }
    include 'include/template/Header.php';
    // إخفاء مودال تسجيل الدخول في صفحة التسجيل
    $showLoginModal = false;
?>

<div class="container d-flex justify-content-center align-items-center  my-3">
    <div class="card  p-4" style="max-width:720px;width:100%;border-radius:18px;">
        <h3 class="text-center fw-bold mb-3">Create Account</h3>
        <p class="text-center text-muted mb-4">Join us and start your journey!</p>

        <!-- رسالة النجاح -->
        <?php if ($success): ?>
            <div class="alert alert-success text-center fw-bold">
                Account created successfully ✔
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="row g-3">


            <div class="text-center">
                <img src="uploads/users/<?php echo htmlspecialchars($profile_image) ?>" id="profilePreview"
                    class="rounded-circle border shadow-sm"
                    style="width:100px;height:100px;object-fit:cover;">
                <label class="btn btn-outline-secondary  d-block w-50 mx-auto mt-2 rounded-pill">
                    <i class="bi bi-upload"></i> Upload Photo
                    <input type="file" name="profile_image" id="imageInput" hidden>
                </label>
                <?php if (isset($errors['profile_image'])): ?>
                    <div class="alert alert-danger mt-2 p-2 small">
                        <?php echo $errors['profile_image'] ?>
                    </div>
                <?php endif; ?>
            </div>


            <div class="col-12">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary text-light">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="username" class="form-control"
                        value="<?php echo htmlspecialchars($_POST['username'] ?? '') ?>">
                </div>
                <?php if (isset($errors['username'])): ?>
                    <div class="alert alert-danger p-1 mt-1 small">
                        <?php echo $errors['username'] ?>
                    </div>
                <?php endif; ?>
            </div>


            <div class="col-12">
                <label class="form-label">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary text-light">
                        <i class="bi bi-person-badge"></i>
                    </span>
                    <input type="text" name="fullname" class="form-control"
                        value="<?php echo htmlspecialchars($_POST['fullname'] ?? '') ?>">
                </div>
                <?php if (isset($errors['fullname'])): ?>
                    <div class="alert alert-danger p-2 mt-1 small">
                        <?php echo $errors['fullname'] ?>
                    </div>
                <?php endif; ?>
            </div>


            <div class="col-12">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary text-light">
                        <i class="bi bi-envelope-at"></i>
                    </span>
                    <input type="email" name="email" class="form-control"
                        value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
                </div>
                <?php if (isset($errors['email'])): ?>
                    <div class="alert alert-danger p-2 mt-1 small">
                        <?php echo $errors['email'] ?>
                    </div>
                <?php endif; ?>
            </div>


            <div class="col-12">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary text-light">
                        <i class="bi bi-shield-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control">
                </div>
                <?php if (isset($errors['password'])): ?>
                    <div class="alert alert-danger p-2 mt-1 small">
                        <?php echo $errors['password'] ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- الدولة -->
            <div class="col-12">
                <label class="form-label">Country</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary text-light">
                        <i class="bi bi-geo-alt"></i>
                    </span>
                    <select name="country" class="form-select">
                        <option value="">Select Country</option>
                        <?php
                            $countries = ['Yemen', 'Saudi Arabia', 'Egypt', 'UAE', 'Jordan'];
                        foreach ($countries as $c): ?>
                            <option value="<?php echo $c ?>"<?php echo(($_POST['country'] ?? '') === $c) ? 'selected' : '' ?>>
                                <?php echo $c ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if (isset($errors['country'])): ?>
                    <div class="alert alert-danger p-2 mt-1 small">
                        <?php echo $errors['country'] ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-12">
                <button class="btn btn-success w-100 rounded-pill fw-bold" style="height:45px;">
                    <i class="bi bi-check-circle"></i> Create Account
                </button>
            </div>

        </form>
    </div>
</div>

<!-- معاينة الصورة قبل الرفع -->
<script>
    document.getElementById('imageInput').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            document.getElementById('profilePreview').src = URL.createObjectURL(file);
        }
    });
</script>

<!-- <?php include 'include/template/Footer.php'; ?> -->