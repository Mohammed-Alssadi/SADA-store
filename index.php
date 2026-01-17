 <?php

    require_once "include/db_connect.php";
    $sql_get      = "SELECT id, category_name, category_img FROM categories where category_status = 1";
    $get_category = $conn->prepare($sql_get);
    $get_category->execute();
    $categories   = $get_category->fetchAll();
    $sql = "SELECT p.product_name, p.price, p.discount, p.image1, p.id, p.created_at, c.category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.product_status = 'available' AND c.category_status = 1 LIMIT 8";
    $get_products = $conn->prepare($sql);
    $get_products->execute();
    $all_products = $get_products->fetchAll();

    // فلترة المنتجات
    $new_products = array_filter($all_products, function ($product) {
        $created_date = new DateTime($product['created_at']);
        $now          = new DateTime();
        $interval = $now->diff($created_date);
        return $interval->days <= 2;
    });

    $featured_products = array_filter($all_products, function ($product) {
        return $product['discount'] > 20;
    });

    include 'include/template/Header.php';
    ?>
 <!-- Carousel Start -->
 <div class="container-fluid  p-2">
     <div class="row g-0 justify-content-center ">
         <div class="col-lg-9 col-12">
             <div class="header-carousel owl-carousel bg-light rounded p-4">
                 <div class="row g-4 header-carousel-item align-items-center ">
                     <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                         <img src="img/image1.png" class="img-fluid w-75" alt="Image">
                     </div>
                     <div class="col-xl-6 carousel-content p-4 wow fadeInRight" data-wow-delay="0.1s">
                         <h4 class="text-uppercase fw-bold mb-4"
                             style="letter-spacing: 3px;">Limited Time Offer</h4>

                         <h1 class="display-3 text-capitalize mb-4" data-wow-delay="0.1s">
                             Discover Amazing Deals On Top Products
                         </h1>

                         <p class="text-dark wow fadeInRight" data-wow-delay="0.1s">
                             Hurry Up Before The Offer Ends
                         </p>

                         <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.1s"
                             href="#">
                             Shop Now
                         </a>
                     </div>
                 </div>
                 <div class="row g-4 header-carousel-item align-items-center">
                     <div class="col-xl-6 carousel-img wow fadeInRight" data-wow-delay="0.1s">
                         <img src="img/carousel-1.png" class="img-fluid w-100" alt="Image">
                     </div>
                     <div class="col-xl-6 carousel-content p-4">
                         <h4 class="text-uppercase fw-bold mb-4 wow fadeInLeft" data-wow-delay="0.1s"
                             style="letter-spacing: 3px;">Special Weekend Sale</h4>

                         <h1 class="display-3 text-capitalize mb-4 wow fadeInLeft" data-wow-delay="0.3s">
                             Upgrade Your Style With Our Best Collections
                         </h1>

                         <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">
                             Exclusive Deals Available Today Only
                         </p>

                         <a class="btn btn-primary rounded-pill py-3 px-5" data-wow-delay="0.s"
                             href="#">
                             Explore Now
                         </a>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- Carousel End -->




 <!-- Services Start -->
 <div class="container my-1 py-4">
     <div class="row justify-content-center g-3">

         <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
             <div class="border border-primary rounded shadow-lg h-100" style="border-style: dashed;">
                 <div class="p-4">
                     <div class="d-flex align-items-center">
                         <i class="fa fa-sync-alt fa-2x text-primary"></i>
                         <div class="ms-4">
                             <h6 class="text-uppercase mb-2">Free Return</h6>
                             <p class="mb-0">30 days money back guarantee!</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
             <div class="border border-primary rounded shadow-lg h-100" style="border-style: dashed;">
                 <div class="p-4">
                     <div class="d-flex align-items-center">
                         <i class="fas fa-life-ring fa-2x text-primary"></i>
                         <div class="ms-4">
                             <h6 class="text-uppercase mb-2">Support 24/7</h6>
                             <p class="mb-0">We support online 24 hrs a day</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
             <div class="border border-primary rounded shadow-lg h-100" style="border-style: dashed;">
                 <div class="p-4">
                     <div class="d-flex align-items-center">
                         <i class="fas fa-lock fa-2x text-primary"></i>
                         <div class="ms-4">
                             <h6 class="text-uppercase mb-2">Secure Payment</h6>
                             <p class="mb-0">We Value Your Security</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
             <div class="border border-primary rounded shadow-lg h-100" style="border-style: dashed;">
                 <div class="p-4">
                     <div class="d-flex align-items-center">
                         <i class="fas fa-blog fa-2x text-primary"></i>
                         <div class="ms-4">
                             <h6 class="text-uppercase mb-2">Online Service</h6>
                             <p class="mb-0">Free return products in 30 days</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- Services End -->

 <!-- Searvices End -->


 <!-- category start -->
 <section class="ezy__epcategory9 light">
     <div class=" container-fluid px-5">
         <div class=" ezy__epcategory9-wrapper">
             <div class=" text-center mb-5">
                 <h2 class="ezy__epcategory9-heading text-start mb-5 ">Top Category</h2>
             </div>
             <div class="owl-carousel owl-theme category-carousel mt-5 ">
                 <?php foreach ($categories as $category): ?>
                     <div class="item my-5 px-2">
                         <div class=" pt-5 wow fadeInDown" data-wow-delay="0.1s">
                             <a href="shop.php?category=<?php echo $category['id']; ?>" class="ezy__epcategory9-item  shadow">
                                 <div class="ezy__epcategory9-img shadow-sm overflow-hidden">
                                     <img src="uploads/categories/<?php echo $category['category_img']; ?>" alt="" />
                                 </div>
                                 <div class="mt-4 pt-3 text-center text">
                                     <h5 class="mt-5 fs-4 "><?php echo $category['category_name']; ?></h5>
                                     <p class="pb-1   text-secondary text-muted">10 Products</p>
                                 </div>
                             </a>
                         </div>
                     </div>
                 <?php endforeach; ?>
             </div>

         </div>
     </div>
 </section>
 <!-- category end -->

 <!-- Products Offer Start -->
 <div class="container-fluid py-5">
     <div class="container">
         <div class="row g-4">
             <div class="col-lg-6 wow fadeInLeft " data-wow-delay="0.2s">
                 <a href="#" class="d-flex align-items-center justify-content-between border border-1 border-secondary shadow bg-white rounded p-4" style="border-style: dashed;">
                     <div>
                         <p class="text-muted mb-3">Find The Best Camera for You!</p>
                         <h3 class="text-primary">Smart Camera</h3>
                         <h1 class="display-3 text-secondary mb-0">40% <span
                                 class="text-primary fw-normal">Off</span></h1>
                     </div>
                     <img src="img/product-1.png" class="img-fluid" alt="">
                 </a>
             </div>
             <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                 <a href="#" class="d-flex align-items-center justify-content-between   border-1 border-secondary shadow bg-white rounded p-4" style="border-style: dashed;">
                     <div>
                         <p class="text-muted mb-3">Find The Best Whatches for You!</p>
                         <h3 class="text-primary">Smart Whatch</h3>
                         <h1 class="display-3 text-secondary mb-0">20% <span
                                 class="text-primary fw-normal">Off</span></h1>
                     </div>
                     <img src="img/product-2.png" class="img-fluid" alt="">
                 </a>
             </div>
         </div>
     </div>
 </div>
 <!-- Products Offer End -->





 <!-- Our Products Start -->
 <div class="container-fluid product py-5">
     <div class="container py-5">
         <!-- Title + Tabs -->
         <div class="row g-4 align-items-center mb-4">
             <div class="col-lg-4">
                 <h1 class="mb-0">Our Products</h1>
             </div>
             <div class="col-lg-8 text-lg-end">
                 <ul class="nav nav-pills d-inline-flex">
                     <li class="nav-item">
                         <a class="nav-link active text-black" data-bs-toggle="pill" href="#tab-all">All</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-bs-toggle="pill" href="#tab-new">New</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-bs-toggle="pill" href="#tab-featured">Featured</a>
                     </li>
                 </ul>
             </div>
         </div>

         <!-- Tabs Content -->
         <div class="tab-content">

             <!-- TAB ALL -->
             <div id="tab-all" class="tab-pane fade show active">
                 <div class="row g-4">
                     <?php foreach ($all_products as $product): ?>
                         <!-- PRODUCT CARD -->
                         <div class="col-12 col-md-6 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay="0.2s">
                             <div class="product-card shadow">

                                 <!-- Image -->
                                 <div class="product-image-wrapper">
                                     <img src="uploads/products/<?php echo htmlspecialchars($product['image1']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" class="product-image">
                                 </div>

                                 <!-- Content -->
                                 <div class="product-content text-center">
                                     <small class="product-category"><?php echo htmlspecialchars($product['category_name']); ?></small>
                                     <h6 class="product-title mt-2"><?php echo htmlspecialchars($product['product_name']); ?></h6>

                                     <div class="product-price">
                                         <span>$<?php echo number_format($product['price'], 2); ?></span>
                                         <?php if ($product['discount'] > 0): ?>
                                             <small class="text-muted ms-2"><del>$<?php echo number_format($product['price'] + $product['discount'], 2); ?></del></small>
                                         <?php endif; ?>
                                     </div>
                                 </div>

                                 <!-- Actions -->
                                 <div class="product-actions mb-">
                                     <button class="btn cart-btn btn-sm" onclick="addToCart(<?= $product['id'] ?>)">
                                         <span class="me-1"> Add to Cart </span>
                                         <i class="fas fa-cart-plus"></i>
                                     </button>

                                     <a href="single.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary btn-sm">
                                         <span class="me-1"> preview</span>
                                         <i class="fas fa-eye"></i>
                                     </a>
                                 </div>

                             </div>
                         </div>
                         <!-- END PRODUCT CARD -->
                     <?php endforeach; ?>
                 </div>
             </div>

             <!-- TAB NEW -->
             <div id="tab-new" class="tab-pane fade">
                 <div class="row g-4">
                     <?php foreach ($new_products as $product): ?>
                         <!-- PRODUCT CARD -->
                         <div class="col-12 col-md-6 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay="0.2s">
                             <div class="product-card shadow">

                                 <!-- Image -->
                                 <div class="product-image-wrapper">
                                     <img src="uploads/products/<?php echo htmlspecialchars($product['image1']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" class="product-image">
                                 </div>

                                 <!-- Content -->
                                 <div class="product-content text-center">
                                     <small class="product-category"><?php echo htmlspecialchars($product['category_name']); ?></small>
                                     <h6 class="product-title mt-2"><?php echo htmlspecialchars($product['product_name']); ?></h6>

                                     <div class="product-price">
                                         <span>$<?php echo number_format($product['price'], 2); ?></span>
                                         <?php if ($product['discount'] > 0): ?>
                                             <small class="text-muted ms-2"><del>$<?php echo number_format($product['price'] + $product['discount'], 2); ?></del></small>
                                         <?php endif; ?>
                                     </div>
                                 </div>

                                 <!-- Actions -->
                                 <div class="product-actions mb-">
                                     <button class="btn cart-btn btn-sm" onclick="addToCart(<?= $product['id'] ?>)">
                                         <span class="me-1"> Add to Cart </span>
                                         <i class="fas fa-cart-plus"></i>
                                     </button>

                                     <a href="single.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary btn-sm">
                                         <span class="me-1"> preview</span>
                                         <i class="fas fa-eye"></i>
                                     </a>
                                 </div>

                             </div>
                         </div>
                         <!-- END PRODUCT CARD -->
                     <?php endforeach; ?>
                 </div>
             </div>

             <!-- TAB FEATURED -->
             <div id="tab-featured" class="tab-pane fade">
                 <div class="row g-4">
                     <?php foreach ($featured_products as $product): ?>
                         <!-- PRODUCT CARD -->
                         <div class="col-12 col-md-6 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay="0.2s">
                             <div class="product-card shadow">

                                 <!-- Image -->
                                 <div class="product-image-wrapper">
                                     <img src="uploads/products/<?php echo htmlspecialchars($product['image1']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" class="product-image">
                                 </div>

                                 <!-- Content -->
                                 <div class="product-content text-center">
                                     <small class="product-category"><?php echo htmlspecialchars($product['category_name']); ?></small>
                                     <h6 class="product-title mt-2"><?php echo htmlspecialchars($product['product_name']); ?></h6>

                                     <div class="product-price">
                                         <span>$<?php echo number_format($product['price'], 2); ?></span>
                                         <?php if ($product['discount'] > 0): ?>
                                             <small class="text-muted ms-2"><del>$<?php echo number_format($product['price'] + $product['discount'], 2); ?></del></small>
                                         <?php endif; ?>
                                     </div>
                                 </div>

                                 <!-- Actions -->
                                 <div class="product-actions mb-">
                                     <button class="btn cart-btn btn-sm" onclick="addToCart(<?= $product['id'] ?>)">
                                         <span class="me-1"> Add to Cart </span>
                                         <i class="fas fa-cart-plus"></i>
                                     </button>

                                     <a href="single.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary btn-sm">
                                         <span class="me-1"> preview</span>
                                         <i class="fas fa-eye"></i>
                                     </a>
                                 </div>

                             </div>
                         </div>
                         <!-- END PRODUCT CARD -->
                     <?php endforeach; ?>
                 </div>
             </div>

         </div>

     </div>
 </div>
 <!-- Our Products End -->



 <!-- Product Banner Start -->
 <div class="container-fluid py-5">
     <div class="container">
         <div class="row g-4 ">
             <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                 <a href="#">
                     <div class="bg-primary rounded position-relative">
                         <img src="img/Smart Watch FitBand 2.webp" class="img-fluid w-100 rounded" alt="">
                         <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                             style="background: rgba(0, 0, 0, 0.110);">
                             <h3 class="display-5 text-dark">SMART <br> <span class="text-light">watch</span></h3>
                             <p class="fs-4 text-primary">$899.99</p>
                             <a href="#" class="btn btn-dark rounded-pill align-self-start py-2 px-4">Shop Now</a>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                 <a href="#">
                     <div class="text-center  rounded position-relative">
                         <img src="img/image.png" class="img-fluid w-100" alt="">
                         <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                             style="background: rgba(0, 0, 0, 0.100);">
                             <h2 class="display-2 text-secondary">SALE</h2>
                             <h4 class="display-5 text-white mb-4">Get UP To 50% Off</h4>
                             <a href="#" class="btn btn-primary rounded-pill align-self-center py-2 px-4">Shop
                                 Now</a>
                         </div>
                     </div>
                 </a>
             </div>
         </div>
     </div>
 </div>
 <!-- Product Banner End -->











 <?php include 'include/template/Footer.php' ?>