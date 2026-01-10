 <?php
    include 'include/db_connect.php';
    if (! isset($_GET['id']) || ! is_numeric($_GET['id'])) {
        die("Invalid product ID");
    }

    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id = ? AND p.product_status = 'available'");
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    if (! $product) {
        die("Product not found");
    }

    // جمع الصور المتاحة
    $images = array_filter([$product['image1'], $product['image2'], $product['image3']], function ($img) {
        return ! empty($img);
    });

    include 'include/template/Header.php';
    ?>

 <!-- Single Products Start -->
 <div class="container-fluid shop py-5">
     <div class="container py-5">

         <div class="row g-4 single-product">
             <div class="col-xl-6 wow fadeInLeft " data-wow-delay="0.1s">
                 <div class="single-carousel owl-carousel position-relative rounded-4 px-4">
                     <?php foreach ($images as $index => $image): ?>
                         <div class="single-item"
                             data-dot="<img class='img-fluid' src='uploads/products/<?php echo htmlspecialchars($image); ?>' alt=''>">
                             <div class="single-inner rounded">
                                 <img src="uploads/products/<?php echo htmlspecialchars($image); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                             </div>
                         </div>
                     <?php endforeach; ?>
                 </div>
             </div>
             <!-- Product Info -->
             <div class="col-xl-6 wow fadeInRight " data-wow-delay="0.1s">
                 <h4 class="fw-bold mb-3 mt-lg-5 pt-lg-5"><?php echo htmlspecialchars($product['product_name']); ?></h4>
                 <p class="mb-3  text-secondary"><?php echo htmlspecialchars($product['category_name']); ?></p>
                 <h5 class="fw-bold mb-3">
                     $<?php echo number_format($product['price'], 2); ?>
                     <?php if ($product['discount'] > 0): ?>
                         <small class="text-muted ms-2"><del>$<?php echo number_format($product['price'] + $product['discount'], 2); ?></del></small>
                     <?php endif; ?>
                 </h5>
             
                 <div class="d-flex flex-column mb-3">
                     <small>Product SKU: <?php echo htmlspecialchars($product['id']); ?></small>
                     <small>Available: <strong class="text-primary"><?php echo htmlspecialchars($product['quantity']); ?> items in stock</strong></small>
                 </div>
                 <p class="mb-4"><?php echo htmlspecialchars($product['description'] ?? 'No description available.'); ?></p>
                 <div class="input-group quantity mb-5" style="width: 100px;">
                     <div class="input-group-btn">
                         <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                             <i class="fa fa-minus"></i>
                         </button>
                     </div>
                     <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                     <div class="input-group-btn">
                         <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                             <i class="fa fa-plus"></i>
                         </button>
                     </div>
                 </div>
                 <a href="#"
                     class="btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                         class="fa fa-shopping-bag me-2 text-white"></i> Add to cart</a>
             </div>
         </div>
         <div class="col-lg-12">
             <nav>
                 <div class="nav nav-tabs mb-3">
                     <button class="nav-link active border-white border-bottom-0" type="button"
                         role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                         aria-controls="nav-about" aria-selected="true">Description</button>
                     <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                         id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                         aria-controls="nav-mission" aria-selected="false">Reviews</button>
                 </div>
             </nav>
             <div class="tab-content mb-5">
                 <div class="tab-pane active" id="nav-about" role="tabpanel"
                     aria-labelledby="nav-about-tab">
                     <p><?php echo htmlspecialchars($product['description'] ?? 'No description available for this product.'); ?></p>

                 </div>
                 <div class="tab-pane" id="nav-mission" role="tabpanel"
                     aria-labelledby="nav-mission-tab">
                     <div class="d-flex">
                         <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                             style="width: 100px; height: 100px;" alt="">
                         <div class="">
                             <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                             <div class="d-flex justify-content-between">
                                 <h5>Jason Smith</h5>
                                 <div class="d-flex mb-3">
                                     <i class="fa fa-star text-secondary"></i>
                                     <i class="fa fa-star text-secondary"></i>
                                     <i class="fa fa-star text-secondary"></i>
                                     <i class="fa fa-star text-secondary"></i>
                                     <i class="fa fa-star"></i>
                                 </div>
                             </div>
                             <p>The generated Lorem Ipsum is therefore always free from repetition
                                 injected humour, or non-characteristic
                                 words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                         </div>
                     </div>
                     <div class="d-flex">
                         <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                             style="width: 100px; height: 100px;" alt="">
                         <div class="">
                             <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                             <div class="d-flex justify-content-between">
                                 <h5>Sam Peters</h5>
                                 <div class="d-flex mb-3">
                                     <i class="fa fa-star text-secondary"></i>
                                     <i class="fa fa-star text-secondary"></i>
                                     <i class="fa fa-star text-secondary"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                 </div>
                             </div>
                             <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                 repetition injected humour, or non-characteristic
                                 words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                         </div>
                     </div>
                 </div>
                 <div class="tab-pane" id="nav-vision" role="tabpanel">
                     <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et
                         tempor sit. Aliqu diam
                         amet diam et eos labore. 3</p>
                     <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                         labore.
                         Clita erat ipsum et lorem et sit</p>
                 </div>
             </div>
         </div>
         <div class="mt-5">
             <h5 class="fw-bold mb-3">Add Your Review</h5>

             <form>
                 <div class="mb-3">
                     <label class="form-label">Your Rating</label>
                     <div>
                         <i class="fa fa-star text-warning fs-5"></i>
                         <i class="fa fa-star text-warning fs-5"></i>
                         <i class="fa fa-star text-warning fs-5"></i>
                         <i class="fa fa-star text-muted fs-5"></i>
                         <i class="fa fa-star text-muted fs-5"></i>
                     </div>
                 </div>

                 <div class="mb-3">
                     <textarea class="form-control" rows="4" placeholder="Write your comment..."></textarea>
                 </div>

                 <button class="btn btn-primary px-4">
                     Submit Review
                 </button>
             </form>
         </div>
     </div>
 </div>


 </div>
 <!-- Single Products End -->

 <!-- Related Product Start -->
 <!-- <div class="container-fluid related-product">
        <div class="container">
            <div class="mx-auto text-center pb-5" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                    data-wow-delay="0.1s">Related Products</h4>
                <p class="wow fadeInUp" data-wow-delay="0.2s">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Modi, asperiores ducimus sint quos tempore officia similique quia? Libero, pariatur consectetur?</p>
            </div>
            <div class="related-carousel owl-carousel pt-4">
                <div class="related-item rounded">
                    <div class="related-item-inner border rounded">
                        <div class="related-item-inner-item">
                            <img src="img/product-3.png" class="img-fluid w-100 rounded-top" alt="">
                            <div class="related-new">New</div>
                            <div class="related-details">
                                <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <a href="#" class="d-block mb-2">SmartPhone</a>
                            <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                            <del class="me-2 fs-5">$1,250.00</del>
                            <span class="text-primary fs-5">$1,050.00</span>
                        </div>
                    </div>
                    <div class="related-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                        <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="related-item rounded">
                    <div class="related-item-inner border rounded">
                        <div class="related-item-inner-item">
                            <img src="img/product-3.png" class="img-fluid w-100 rounded-top" alt="">
                            <div class="related-new">New</div>
                            <div class="related-details">
                                <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <a href="#" class="d-block mb-2">SmartPhone</a>
                            <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                            <del class="me-2 fs-5">$1,250.00</del>
                            <span class="text-primary fs-5">$1,050.00</span>
                        </div>
                    </div>
                    <div class="related-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                        <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="related-item rounded">
                    <div class="related-item-inner border rounded">
                        <div class="related-item-inner-item">
                            <img src="img/product-3.png" class="img-fluid w-100 rounded-top" alt="">
                            <div class="related-new">New</div>
                            <div class="related-details">
                                <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <a href="#" class="d-block mb-2">SmartPhone</a>
                            <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                            <del class="me-2 fs-5">$1,250.00</del>
                            <span class="text-primary fs-5">$1,050.00</span>
                        </div>
                    </div>
                    <div class="related-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                        <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="related-item rounded">
                    <div class="related-item-inner border rounded">
                        <div class="related-item-inner-item">
                            <img src="img/product-3.png" class="img-fluid w-100 rounded-top" alt="">
                            <div class="related-new">New</div>
                            <div class="related-details">
                                <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <a href="#" class="d-block mb-2">SmartPhone</a>
                            <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                            <del class="me-2 fs-5">$1,250.00</del>
                            <span class="text-primary fs-5">$1,050.00</span>
                        </div>
                    </div>
                    <div class="related-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                        <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="related-item rounded">
                    <div class="related-item-inner border rounded">
                        <div class="related-item-inner-item">
                            <img src="img/product-3.png" class="img-fluid w-100 rounded-top" alt="">
                            <div class="related-new">New</div>
                            <div class="related-details">
                                <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <a href="#" class="d-block mb-2">SmartPhone</a>
                            <a href="#" class="d-block h4">Apple iPad Mini <br> G2356</a>
                            <del class="me-2 fs-5">$1,250.00</del>
                            <span class="text-primary fs-5">$1,050.00</span>
                        </div>
                    </div>
                    <div class="related-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                        <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex">
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                        class="rounded-circle btn-sm-square border"><i
                                            class="fas fa-random"></i></i></a>
                                <a href="#"
                                    class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
 <!-- Related Product End -->

 <!-- Footer Start -->
 <?php include 'include/template/Footer.php' ?>