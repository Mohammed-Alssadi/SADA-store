<?php
session_start();
require 'vendor/autoload.php';
require 'include/functions.php';

require 'auth/auth.php';
guestOnly();
/*
|--------------------------------------------------------------------------
| Page State
|--------------------------------------------------------------------------
*/
$state   = 'enter_otp'; // enter_otp | expired | verified | resent | error
$message = '';
$type    = 'info';

/*
|--------------------------------------------------------------------------
| OTP Settings
|--------------------------------------------------------------------------
*/
$otpExpires = 300; // 5 minutes
$timeLeft = max(0, $otpExpires - (time() - $_SESSION['register']['time']));

/*
|--------------------------------------------------------------------------
| Handle POST
|--------------------------------------------------------------------------
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Resend OTP
    if (isset($_POST['resend'])) {
        $otp = rand(100000, 999999);
        $_SESSION['register']['otp']  = $otp;
        $_SESSION['register']['time'] = time();

        sendOTP($_SESSION['register']['email'], $otp);

        $state    = 'resent';
        $message  = 'A new verification code has been sent to your email.';
        $type     = 'info';
        $timeLeft = $otpExpires;
    }

    // Verify OTP
if (isset($_POST['verify'])) {

    // انتهت صلاحية الكود
    if ($timeLeft <= 0) {
        $state   = 'expired';
        $message = 'Verification code expired.';
        $type    = 'danger';

    // الكود صحيح
    } elseif ($_POST['otp'] == $_SESSION['register']['otp']) {

        require 'include/db_connect.php';
        $data = $_SESSION['register'];

        // إدخال المستخدم
        $stmt = $conn->prepare(
            "INSERT INTO users (username, fullname, email, password, country, profile_image)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([
            $data['username'],
            $data['fullname'],
            $data['email'],
            $data['password'],
            $data['country'],
            $data['profile_image'],
           
        ]);

        // جلب ID المستخدم الجديد
        $userId = $conn->lastInsertId();

        // تسجيل دخول تلقائي
        session_regenerate_id(true);
        $_SESSION['user_id']        = $userId;
        $_SESSION['profile_image'] = $data['profile_image'];


        // حذف بيانات التسجيل المؤقتة
        unset($_SESSION['register']);

        $state   = 'verified';
        $message = 'Email verified successfully!';
        $type    = 'success';

    // الكود خطأ
    } else {
        $state   = 'error';
        $message = 'Invalid verification code.';
        $type    = 'danger';
    }
}

}
?>

<?php include 'include/template/Header.php'; ?>

<!-- SweetAlert (إذا موجود بالهيدر احذف هذا) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container my-5 flex-fill ">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Verify Your Email</h4>
                </div>

                <div class="card-body text-center">

                    <!-- Normal Alerts -->
                    <?php if ($message && $state !== 'verified'): ?>
                        <div class="alert alert-<?= $type ?>">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <!-- OTP Form -->
                    <?php if (in_array($state, ['enter_otp', 'error', 'resent'])): ?>
                        <form method="post">
                            <label class="mb-2">
                                Enter the 6-digit code sent to your email
                            </label>

                            <input type="text"
                                   name="otp"
                                   maxlength="6"
                                   pattern="[0-9]{6}"
                                   class="form-control text-center fs-4 mt-2"
                                   placeholder="- - - - - - -"
                                   required>

                            <p class="text-muted mt-2">
                                Time remaining: <span id="timer"></span>
                            </p>

                            <button name="verify" class="btn btn-primary w-100 mt-3">
                                Verify
                            </button>
                        </form>
                    <?php endif; ?>

                    <!-- Expired -->
                    <?php if ($state === 'expired'): ?>
                        <form method="post">
                            <button name="resend" class="btn btn-warning w-100">
                                Resend Verification Code
                            </button>
                        </form>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Countdown Timer -->
<script>
let seconds = <?= $timeLeft ?>;
const timer = document.getElementById('timer');

function tick() {
    if (!timer) return;

    if (seconds <= 0) {
        timer.textContent = "00:00";
        return;
    }
    const m = String(Math.floor(seconds / 60)).padStart(2, '0');
    const s = String(seconds % 60).padStart(2, '0');
    timer.textContent = `${m}:${s}`;
    seconds--;
}

tick();
setInterval(tick, 1000);
</script>

<!-- SweetAlert Success -->
<?php if ($state === 'verified'): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Email Verified 🎉',
    text: 'Your account has been activated successfully.',
    showConfirmButton: false,
    timer: 2500,
    timerProgressBar: true,
    allowOutsideClick: false,
    allowEscapeKey: false,
    didOpen: () => {
        Swal.showLoading();
    }
}).then(() => {
    window.location.href = "index.php";
});
</script>
<?php endif; ?>

<?php include 'include/template/Footer.php'; ?>
