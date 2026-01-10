<?php
    session_start();
    include 'include/db_connect.php';

    // فحص تسجيل الدخول: إذا لم يكن المستخدم مسجلاً، توجيه إلى الصفحة الرئيسية لمنع الوصول غير المصرح
    if (! isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit;
    }

    // الحصول على user_id من الجلسة
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if (! $user) {
        die("User not found");
    }

    include 'include/template/Header.php';
?>

<div class="container py-5 my-5">

    <div class="bg-white p-4 rounded shadow-sm mb-3 d-flex align-items-center justify-content-between flex-wrap">
        <h3 class="mb-0">Account Settings</h3>
        <button class="btn btn-outline-primary mt-2 mt-sm-0 px-4">Save</button>
    </div>

    <div class="row g-4">

        <!-- Sidebar Navigation -->
        <div class="col-lg-3">
            <div class="list-group">
                <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#general">General</a>
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password">Change Password</a>
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#info">Info</a>
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#social">Social Links</a>
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#notifications">Notifications</a>
            </div>
        </div>

        <!-- Content -->
        <div class="col-lg-9">
            <div class="tab-content bg-white p-4 rounded shadow-sm">

                <!-- General -->
                <div class="tab-pane fade show active" id="general">
                    <div class="text-center mb-3">
                        <div class="position-relative profile-img d-inline-block">
                            <img src="uploads/users/<?php echo htmlspecialchars($user['profile_image'] ?? 'default.png'); ?>" class="rounded-circle mb-2" alt="Avatar" style="width: 150px; height: 150px; object-fit: cover;">

                            <!-- زر الرفع تحت الصورة -->
                            <label class="btn btn-outline-primary rounded-pill text-dark btn-sm w-50 mt-1">
                                Upload photo
                                <input type="file" class="d-none" accept="image/*">
                            </label>
                        </div>
                    </div>

                    <form class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control text-secondary fs-5 " value="<?php echo htmlspecialchars($user['username'] ?? ''); ?>" placeholder="User123">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control text-secondary fs-5" value="<?php echo htmlspecialchars($user['fullname'] ?? ''); ?>" placeholder="Full Name">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control text-secondary fs-5" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" placeholder="your@email.com">
                        </div>
                    </form>
                </div>

            <!-- Password -->
            <div class="tab-pane fade" id="password">
                <form class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control">
                    </div>
                </form>
            </div>

            <!-- Info -->
            <div class="tab-pane fade" id="info">
                <p class="text-muted">Additional info fields are not implemented in the database yet.</p>
                <form class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Bio</label>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Birthday</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Country</label>
                        <select class="form-select">
                            <option selected disabled>Select...</option>
                            <option>USA</option>
                            <option>Canada</option>
                            <option>UK</option>
                        </select>
                    </div>
                </form>
            </div>

            <!-- Social Links -->
            <div class="tab-pane fade" id="social">
                <p class="text-muted">Social links are not stored in the database yet.</p>
                <form class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Twitter</label>
                        <input type="text" class="form-control" placeholder="https://twitter.com/...">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Instagram</label>
                        <input type="text" class="form-control" placeholder="https://instagram.com/...">
                    </div>
                </form>
            </div>

            <!-- Notifications -->
            <div class="tab-pane fade" id="notifications">
                <p class="text-muted">Notification settings are not implemented yet.</p>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" checked>
                    <label class="form-check-label">Email me updates</label>
                </div>
            </div>

        </div>
    </div>
</div>
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
<?php include 'include/template/Footer.php'?>