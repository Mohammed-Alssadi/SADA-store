<?php
    session_start();
    require 'vendor/autoload.php';
    require 'include/functions.php';

    if (! isset($_SESSION['register'])) {
        header("Location: register.php");
        exit;
    }

    $error      = '';
    $info       = '';
    $verified   = false;
    $showForm   = true;
    $showResend = false;
    $redirect   = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //    زر إعادة إرسال الكود
        if (isset($_POST['resend'])) {
            $newOtp                       = rand(100000, 999999);
            $_SESSION['register']['otp']  = $newOtp;
            $_SESSION['register']['time'] = time();

            sendOTP($_SESSION['register']['email'], $newOtp);

            $info = "A new verification code has been sent to your email.";

            $showForm   = true;
            $showResend = false;
        }

        //    زر التحقق من الكود

        elseif (isset($_POST['verify'])) {
            $user_otp = trim($_POST['otp']);
            $real_otp = $_SESSION['register']['otp'];

            // انتهاء الصلاحية (5 دقائق)
            if (time() - $_SESSION['register']['time'] > 30) {

                $error      = "Verification code expired.";
                $showForm   = false;
                $showResend = true;
            } elseif ($user_otp == $real_otp) {

                // حفظ البيانات في DB
                include 'include/db_connect.php';
                $data  = $_SESSION['register'];
                $sql   = "INSERT INTO `users`(`username`, `fullname`, `email`, `password`, `country`, `profile_image`) VALUES (?, ?, ?, ?, ?, ?)";
                $query = $conn->prepare($sql);
                $query->execute([
                    $data['username'],
                    $data['fullname'],
                    $data['email'],
                    password_hash($data['password'], PASSWORD_DEFAULT),
                    $data['country'],
                    $data['profile_image'],
                ]);
              

                unset($_SESSION['register']);
                $verified = true;
                $redirect = true;
            } else {
                $error = "Invalid verification code. Please try again.";
            }
        }
    }
?>

<?php include 'include/template/Header.php'; ?>

<?php if ($redirect): ?>
    <script>
        setTimeout(() => {
            window.location.href = "index.php";
        }, 3000);
    </script>
<?php endif; ?>

<div class="container my-5 py-5">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card shadow-lg">

                <div class="card-header text-center bg-primary text-white">
                    <h4 class="mb-0">Verify Your Email</h4>
                </div>

                <div class="card-body text-center">

                    <!-- رسالة خطأ (انتهاء / رمز خاطئ) -->
                    <?php if (! empty($error)): ?>
                        <div class="alert alert-danger">
                            <?php echo $error ?>
                        </div>
                    <?php endif; ?>

                    <!-- رسالة معلومات (إعادة الإرسال) -->
                    <?php if (! empty($info)): ?>
                        <div class="alert alert-info">
                            <?php echo $info ?>
                        </div>
                    <?php endif; ?>

                    <!-- نجاح التحقق -->
                    <?php if ($verified): ?>
                        <div class="alert alert-success">
                            Email verified successfully! Redirecting to payment...
                        </div>
                    <?php endif; ?>

                    <!-- فورم إدخال الكود -->
                    <?php if ($showForm && ! $verified): ?>
                        <form method="post">
                            <div class="form-group">
                                <label class="mb-3">
                                    Enter the code sent to your email
                                </label>

                                <input type="text"
                                       name="otp"
                                       class="form-control text-center"
                                       placeholder="6-digit code"
                                       required>

                                <button type="submit"
                                        name="verify"
                                        class="btn btn-primary mt-3 w-50">
                                    Verify
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>

                    <!-- زر إعادة الإرسال -->
                    <?php if ($showResend && ! $verified): ?>
                        <form method="post">
                            <button type="submit"
                                    name="resend"
                                    class="btn btn-warning mt-3">
                                Resend Verification Code
                            </button>
                        </form>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'include/template/Footer.php'; ?>