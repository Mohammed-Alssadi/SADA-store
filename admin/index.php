
<?php
    session_start();
    if (! isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../index.php");
    exit;
    }
include "header.php"?>

<div class="dashboard-container py-5">
    <div class="container-fluid">
        <div class="mb-5">
            <h2 class="fw-bold text-dark">System Overview</h2>
            <p class="text-muted">General statistics of your platform</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="rounded-3  shadow-sm bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-chart-line fa-2x text-primary"></i>
                        </div>
                        <div>
                            <p class="text-uppercase small fw-bold text-muted mb-1">Products</p>
                            <h3 class="fw-bold mb-0">1,540</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="rounded-3 shadow-sm  bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-user fa-2x text-success"></i>
                        </div>
                        <div>
                            <p class="text-uppercase small fw-bold text-muted mb-1">Customers</p>
                            <h3 class="fw-bold mb-0">12.5k</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="rounded-3  shadow-sm bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-laptop fa-2x text-warning"></i>
                        </div>
                        <div>
                            <p class="text-uppercase small fw-bold text-muted mb-1">Categories</p>
                            <h3 class="fw-bold mb-0">24</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="rounded-3 shadow-sm bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-user-shield fa-2x text-info"></i>
                        </div>
                        <div>
                            <p class="text-uppercase small fw-bold text-muted mb-1">Admins</p>
                            <h3 class="fw-bold mb-0">5</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  

<?php include_once "footer.php"; ?>
