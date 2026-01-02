<?php
    require_once "include/db_connect.php";
    // echo "Connected successfully";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> SADA-electro </title>
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
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


<!-- ======= HEADER START ======= -->



<!-- Top Bar -->
<div class="container-fluid bg-secondary text-light py-2 d-none  d-lg-block px-0">
    <div class="container">
        <div class="d-flex justify-content-between small">
            <span><i class="fa fa-truck me-2"></i>Free Shipping Over $100</span>
            <span>Support | Track Order</span>
        </div>
    </div>
</div>

<!-- Main Header -->
<div class="container-fluid bg-white border-bottom sticky-top shadow-sm">
    <div class="container-fluid py-3 px-lg-5">
        <div class="row align-items-center  g-3">

            <!-- Logo -->
            <div class="col-lg-3 col-md-3 col-6">
                <a href="index.php" class="text-decoration-none">
                    <h2 class="fw-bold text-dark m-0">
                        <i class="fas fa-bolt text-warning me-1"></i>SADA
                    </h2>
                </a>
            </div>

            <!-- Search -->
            <div class="col-lg-3 col-md-5  d-md-block d-none col-12 order-3 order-md-2">
                <div class="input-group">
                    <input type="text" class="form-control py-2" placeholder="Search products...">
                    <button class="btn btn-primary px-4">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- Navigation -->
            <div class="col-lg-3 d-none d-lg-block">
                <ul class="nav justify-content-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-secondary" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-secondary" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-secondary" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>


         <!-- Icons -->
<div class="col-lg-3 col-md-4 col-6 order-2 order-md-3 text-end">
    <div class="d-inline-flex align-items-center gap-2">

        <!-- Account Dropdown -->
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle"
                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                    <a class="dropdown-item" href="profile.php">
                        <i class="fa fa-user-circle me-2"></i>Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="settings.php">
                        <i class="fa fa-cog me-2"></i>Settings
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="logout.php">
                        <i class="fa fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Cart -->
        <a href="cart.php" class="btn btn-outline-secondary position-relative">
            <i class="fa fa-shopping-cart"></i>
            <span
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info text-dark">
                3
            </span>
        </a>

        <!-- Login Button -->
        <button  class="btn btn-primary fw-semibold d-none d-md-inline-block" data-bs-toggle="modal" data-bs-target="#loginModal">
            Login
        </button>

        <!-- Mobile Menu -->
        <button class="btn btn-outline-secondary d-lg-none"
            data-bs-toggle="collapse" data-bs-target="#mobileMenu">
            <i class="fa fa-bars"></i>
        </button>

    </div>
</div>


        </div>

        <!-- Mobile Menu -->
        <div class="collapse d-lg-none mt-3" id="mobileMenu">
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#loginModal">
                       Login
        </a>
                </li>

            </ul>
        </div>

    </div>
</div>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 shadow-lg ">





            <div class="modal-body p-4 p-md-5">

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
                <form>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Enter your username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mt-3">
                        Login
                    </button>

                </form>

                <!-- Footer -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        Don't have an account?
                        <a href="register.php" class="text-decoration-none fw-semibold">Create one</a>
                    </small>
                </div>

            </div>
                   <!-- Close Button -->
              <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- ======= HEADER END ======= -->
