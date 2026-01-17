<?php
session_start();
include 'include/db_connect.php';
require 'auth/auth.php';
authOnly();

$user_id = $_SESSION['user_id'];
$errors = [];
$success = "";

// --- 1. Fetch current user data ---
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    die("User not found");
}

// --- 2. Handle Profile Update ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $username = trim($_POST['username']);
    $fullname = trim($_POST['fullname']);
    $email    = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $country  = $_POST['country'];
    
    $current_pass = $_POST['current_password'];
    $new_pass     = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    // Basic Validation
    if (empty($username) || empty($fullname) || empty($email)) {
        $errors[] = "All basic fields are required.";
    }

    // Check if Username or Email is already taken by another user
    $check = $conn->prepare("SELECT id FROM users WHERE (email = ? OR username = ?) AND id != ?");
    $check->execute([$email, $username, $user_id]);
    if ($check->rowCount() > 0) {
        $errors[] = "Username or Email is already taken.";
    }

    $update_fields = "username = ?, fullname = ?, email = ?, country = ?";
    $params = [$username, $fullname, $email, $country];

    // Password Update Logic
    if (!empty($new_pass)) {
        if (empty($current_pass)) {
            $errors[] = "Current password is required to set a new one.";
        } elseif (!password_verify($current_pass, $user['password'])) {
            $errors[] = "The current password you entered is incorrect.";
        } elseif ($new_pass !== $confirm_pass) {
            $errors[] = "New passwords do not match.";
        } elseif (strlen($new_pass) < 6) {
            $errors[] = "New password must be at least 6 characters long.";
        } else {
            $update_fields .= ", password = ?";
            $params[] = password_hash($new_pass, PASSWORD_DEFAULT);
        }
    }

    // Profile Image Upload Logic
    $new_img_name = null; // Variable to hold new image name if uploaded
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $new_img_name = "user_" . time() . "." . $ext;
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], "uploads/users/" . $new_img_name)) {
                $update_fields .= ", profile_image = ?";
                $params[] = $new_img_name;
            }
        } else {
            $errors[] = "Only JPG, PNG, and WebP files are allowed.";
        }
    }

    // Execute Update if no errors
    if (empty($errors)) {
        $params[] = $user_id;
        $sql = "UPDATE users SET $update_fields WHERE id = ?";
        $update_stmt = $conn->prepare($sql);
        
        if ($update_stmt->execute($params)) {
            
            // --- UPDATING SESSION DATA ---
            // This ensures changes appear immediately in the Header/Site
            if ($new_img_name) {
                $_SESSION['profile_image'] = $new_img_name;
            }
            
            // If you display username or fullname in header, update them too:
            // $_SESSION['username'] = $username; 
            
            $_SESSION['success_msg'] = "Profile updated successfully.";
            header("Location: settings.php"); 
            exit();
        } else {
            $errors[] = "An error occurred while updating the database.";
        }
    }
}

// Success message from session
if(isset($_SESSION['success_msg'])) {
    $success = $_SESSION['success_msg'];
    unset($_SESSION['success_msg']);
}

include 'include/template/Header.php';
?>

<div class="container py-5 my-5">
    <form action="" method="POST" enctype="multipart/form-data">
        
        <div class="bg-white p-4 rounded shadow-sm mb-3 d-flex align-items-center justify-content-between flex-wrap">
            <h3 class="mb-0">Account Settings</h3>
            <button type="submit" name="update_profile" class="btn btn-primary mt-2 mt-sm-0 px-4">Save Changes</button>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error) echo "<li>$error</li>"; ?>
            </div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <div class="row g-4">
            <div class="col-lg-3">
                <div class="list-group shadow-sm">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#general">General</a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password">Change Password</a>
                    <!-- <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#info">Info</a> -->
                </div>
            </div>

            <div class="col-lg-9">
                <div class="tab-content bg-white p-4 rounded shadow-sm border">
                    
                    <div class="tab-pane fade show active" id="general">
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <img id="preview" src="uploads/users/<?php echo htmlspecialchars($user['profile_image'] ?: 'default.png'); ?>" 
                                     class="rounded-circle border" alt="Avatar" 
                                     style="width: 140px; height: 140px; object-fit: cover;">
                                
                                <label class="btn btn-sm btn-light border rounded-circle position-absolute bottom-0 end-0 shadow-sm" style="cursor: pointer;">
                                    <i class="fas fa-camera"></i>
                                    <input type="file" name="profile_image" class="d-none" accept="image/*" onchange="previewImage(this)">
                                </label>
                            </div>
                            <p class="text-muted small mt-2">Allowed JPG, PNG or WebP.</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="fullname" class="form-control" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Country</label>
                                <select name="country" class="form-select">
                                    <option value="Yemen" <?php echo ($user['country'] == 'Yemen') ? 'selected' : ''; ?>>Yemen</option>
                                    <option value="Saudi Arabia" <?php echo ($user['country'] == 'Saudi Arabia') ? 'selected' : ''; ?>>Saudi Arabia</option>
                                    <option value="Egypt" <?php echo ($user['country'] == 'Egypt') ? 'selected' : ''; ?>>Egypt</option>
                                    <option value="USA" <?php echo ($user['country'] == 'USA') ? 'selected' : ''; ?>>USA</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="password">
                        <h5 class="mb-4">Security Settings</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Required to change password">
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" minlength="6">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                        </div>
                    </div>

                 

                </div>
            </div>
        </div>
    </form>
</div>


<style>
    body {
        background: #f7f9fb;
    }

    .profile-img img {
        width: 100px;
        height: 100px;
        border: 4px solid #fff;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }

    .profile-img .upload-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        font-size: 0.8rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s;
        cursor: pointer;
    }

    .profile-img:hover .upload-overlay {
        opacity: 1;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
    }

    .list-group-item.active {
        background: #007bff;
        border-color: #007bff;
    }
</style>
<script>
   
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php include 'include/template/Footer.php'?>