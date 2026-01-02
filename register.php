  <?php include 'include/template/Header.php'?>


<div class="container d-flex justify-content-center align-items-center py-5">
    <div class="card shadow-lg p-4" style="max-width: 520px; width:100%; border-radius: 18px;">

        <h3 class="text-center mb-3 fw-bold">Create Account</h3>
        <p class="text-center text-muted mb-4" style="font-size: 14px;">
            Join us and start your journey!
        </p>

        <!-- صورة المستخدم -->
<div class="text-center mb-3">
    <div class="position-relative profile-img d-inline-block">
        <img src="img/user.png" id="profileImage"
            class="rounded-circle border shadow-sm"
            style="width: 100px; height: 100px; object-fit: cover;">

        <!-- Label instead of button -->
        <label for="uploadInput" class="btn btn-primary btn-sm w-100 mt-2 rounded-pill">
            <i class="bi bi-upload"></i> Upload Photo
        </label>

        <!-- File input hidden -->
        <input type="file" id="uploadInput" class="d-none" accept="image/*">
    </div>
</div>


        <!-- النموذج -->
        <form class="row g-3">

            <div class="col-12">
                <label class="form-label fw-semibold">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary"><i class="bi bi-person text-light"></i></span>
                    <input type="text" class="form-control" placeholder="User123">
                </div>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary"><i class="bi bi-person-badge text-light"></i></span>
                    <input type="text" class="form-control" placeholder="Your full name">
                </div>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary"><i class="bi bi-envelope-at text-light"></i></span>
                    <input type="email" class="form-control" placeholder="example@email.com">
                </div>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary"><i class="bi bi-shield-lock text-light"></i></span>
                    <input type="password" class="form-control" placeholder="********">
                </div>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Country</label>
                <div class="input-group">
                    <span class="input-group-text bg-secondary"><i class="bi bi-geo-alt text-light"></i></span>
                    <select class="form-select">
                        <option selected disabled>Select Country</option>
                        <option>Yemen</option>
                        <option>Saudi Arabia</option>
                        <option>Egypt</option>
                        <option>UAE</option>
                        <option>Jordan</option>
                    </select>
                </div>
            </div>

            <div class="col-12 text-center mt-3">
                <button class="btn btn-success px-4 w-100 rounded-pill fw-bold" style="height: 45px;">
                    <i class="bi bi-check-circle"></i> Create Account
                </button>
            </div>

            <p class="text-center mt-3 small">
                Already have an account? <a href="#" class="text-primary text-decoration-none fw-semibold">Login</a>
            </p>

        </form>
    </div>
</div>

<style>
    body { background: #eef3f7; }
    .card { animation: fadeIn .5s ease-in-out; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
<script>
document.getElementById("uploadInput").addEventListener("change", function() {
    const file = this.files[0];
    if(file){
        document.getElementById("profileImage").src = URL.createObjectURL(file);
    }
});

</script>
<?php include 'include/template/Footer.php'?>