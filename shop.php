 <?php include('include/template/Header.php')?>

<div class="container py-5">
    <div class="row g-4">

        <!-- Sidebar -->
        <div class="col-lg-3">

            <!-- Categories -->
            <div class="bg-white border rounded p-3 mb-4">
                <h6 class="mb-3">Categories</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="#" class="d-block py-1 text-dark">Accessories</a></li>
                    <li><a href="#" class="d-block py-1 text-dark">Electronics</a></li>
                    <li><a href="#" class="d-block py-1 text-dark">Laptops</a></li>
                    <li><a href="#" class="d-block py-1 text-dark">Mobiles</a></li>
                </ul>
            </div>

            <!-- Price -->
            <div class="bg-white border rounded p-3">
                <h6 class="mb-3">Price Range</h6>
                <input type="range" class="form-range">
                <div class="d-flex justify-content-between small text-muted">
                    <span>$0</span>
                    <span>$500</span>
                </div>
            </div>

        </div>

        <!-- Products -->
        <div class="col-lg-9">

            <!-- Top Bar -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <span class="text-muted">Showing 1–9 of 24 products</span>
                <select class="form-select w-auto">
                    <option>Sort by latest</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                </select>
            </div>

            <!-- Products Grid -->
            <div class="row g-4">

                <div class="col-md-4 wow fadeInRight " data-wow-delay=0.1s>
                    <div class="product-card h-100 shadow-sm">
                        <div class="product-image-wrapper">
                            <img src="img/product-3.png" class="product-image">
                        </div>

                        <div class="p-3 text-center">
                            <small class="text-muted">Smart Phone</small>
                            <h6 class="mt-2">Apple iPad Mini</h6>
                            <div class="mt-2">
                                <del class="text-muted">$1250</del>
                                <span class="fw-bold text-primary ms-2">$1050</span>
                            </div>
                        </div>

                        <div class="product-actions mb-3">
                            <a href="#" class="btn btn-sm cart-btn"><i class="fas fa-cart-plus"></i></a>
                            <a href="single.php" class="btn btn-sm view-btn"><i class="fas fa-eye"></i></a>
                        </div>
                    </div>
                </div>

                <!-- كرر الكارد -->

            </div>

            <!-- Pagination -->
             <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div>

        </div>
    </div>
</div>



>

      <!-- Footer Start -->
    <?php include('include/template/Footer.php')?>