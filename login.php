<?php
require_once "include/db_connect.php";
require 'auth/auth.php';
guestOnly();
$emailError = $passwordError = $loginError = '';
$email = '';
$loginSuccess = false;
$redirectUrl = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validation
    if (!$email) {
        $emailError = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid email';
    }

    if (!$password) {
        $passwordError = 'Password is required';
    }

    if (!$emailError && !$passwordError) {

        $stmt = $conn->prepare(
            "SELECT id, password, profile_image, roll_id
             FROM users
             WHERE email = :email
             LIMIT 1"
        );
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);

            $_SESSION['user_id']= $user['id'];
            $_SESSION['profile_image']= $user['profile_image'];
            $_SESSION['roll_id']       = $user['roll_id'];

            $loginSuccess = true;
            $redirectUrl  = ($user['roll_id'] == 1)
                ? 'admin/index.php'
                : 'index.php';

        } else {
            $loginError = 'Invalid email or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - SADA-electro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/product-card.css" rel="stylesheet">
    <link href="assets/css/category-section.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light">

    <!-- Include Header -->
    <?php include 'include/template/Header.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-4 p-md-5">

                        <!-- Avatar -->
                        <div class="text-center mb-4">
                            <img src="img/user.png"
                                class="rounded-circle"
                                width="90"
                                height="90"
                                alt="User">
                        </div>

                        <!-- Title -->
                        <h4 class="text-center mb-4 fw-bold">Sign In</h4>

                        <!-- Form -->
                        <form method="post">

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control <?php echo $emailError ? 'is-invalid' : '' ?>"
                                    value="<?php echo htmlspecialchars($email) ?>">
                                <?php if ($emailError): ?>
                                    <div class="invalid-feedback"><?php echo $emailError ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control <?php echo $passwordError ? 'is-invalid' : '' ?>">
                                <?php if ($passwordError): ?>
                                    <div class="invalid-feedback"><?php echo $passwordError ?></div>
                                <?php endif; ?>
                            </div>

                            <?php if ($loginError): ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $loginError ?>
                                </div>
                            <?php endif; ?>

                            <button class="btn btn-primary w-100">Login</button>

                        </form>

                        <!-- Footer -->
                        <div class="text-center mt-4">
                            <small class="text-muted">
                                Don't have an account?
                                <a href="register.php" class="text-decoration-none fw-semibold">Create one</a>
                            </small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include 'include/template/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php if ($loginSuccess): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Login Successful!',
            text: 'Welcome back!',
            timer: 2000,
            showConfirmButton: false
        }).then(() => {
            window.location.href = '<?php echo $redirectUrl; ?>';
        });
    </script>
    <?php endif; ?>
</body>
</html>