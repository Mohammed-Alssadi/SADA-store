

    <?php include ("../include/template/headerAdmin.php") ?>

    <div class="container py-5">
        <h3 class="fw-semibold mb-4">Settings</h3>

        <div class="row g-4">
            <!-- LEFT NAV -->
            <div class="col-lg-3">
                <div class="settings-card p-3 settings-nav" role="tablist">
                    <a class="active" data-bs-toggle="tab" href="#profile" role="tab">Profile</a>
                    <a data-bs-toggle="tab" href="#account" role="tab">Account</a>
                    <a data-bs-toggle="tab" href="#security" role="tab">Security</a>
                    <a data-bs-toggle="tab" href="#notifications" role="tab">Notifications</a>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="col-lg-9">
                <div class="settings-card p-4">
                    <div class="tab-content">

                        <!-- PROFILE -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <h5>Profile Information</h5>
                            <div class="d-flex align-items-center mb-4">
                                <img src="assets/imgs/customer01.jpg" class="avatar me-4" alt="Avatar">
                                <button class="btn btn-outline-primary">Change Photo</button>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" value="Admin User">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="admin@example.com">
                                </div>
                            </div>
                            <button class="btn btn-primary">Save Changes</button>
                        </div>

                        <!-- ACCOUNT -->
                        <div class="tab-pane fade" id="account" role="tabpanel">
                            <h5>Account Preferences</h5>
                            <div class="mb-3">
                                <label class="form-label">Language</label>
                                <select class="form-select">
                                    <option>English</option>
                                    <option>Arabic</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Timezone</label>
                                <select class="form-select">
                                    <option>UTC</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Update Preferences</button>
                        </div>

                        <!-- SECURITY -->
                        <div class="tab-pane fade" id="security" role="tabpanel">
                            <h5>Security</h5>
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <button class="btn btn-danger">Change Password</button>
                        </div>

                        <!-- NOTIFICATIONS -->
                        <div class="tab-pane fade" id="notifications" role="tabpanel">
                            <h5>Notifications</h5>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">Email Notifications</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">SMS Notifications</label>
                            </div>
                            <button class="btn btn-primary">Save Settings</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
 <?php include_once("../include/template/footerAdmin.php"); 
