<?php
    include 'include/db_connect.php';
    include 'include/template/Header.php';

    /* ======================
   جلب الفئات المفعلة
====================== */
    $categories = $conn
        ->query("SELECT id, category_name FROM categories WHERE category_status = 1")
        ->fetchAll();

    /* ======================
   تحديد الفئة المختارة
====================== */
    $selectedCategory = null;
    if (isset($_GET['category']) && is_numeric($_GET['category'])) {
        $selectedCategory = $_GET['category'];
    }

    /* ======================
   جلب المنتجات
====================== */
    $sql = "
    SELECT p.*, c.category_name
    FROM products p
    JOIN categories c ON p.category_id = c.id
    WHERE p.product_status = 'available'
      AND c.category_status = 1
";

    $params = [];

    if (!is_null($selectedCategory)) {
        $sql .= " AND p.category_id = ?";
        $params[] = $selectedCategory;
    }

    $sql .= " ORDER BY p.created_at DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $products = $stmt->fetchAll();
?>

<div class="container py-5">
    <div class="row g-4">

        <!-- Sidebar -->
        <div class="col-lg-3">

            <!-- Categories -->
            <div class="bg-white border rounded p-3 mb-4">
                <h6 class="mb-3">Categories</h6>

                <ul class="list-unstyled mb-0">

                    <!-- All Categories -->
                    <li>
                        <a href="shop.php"
                           class="d-block py-1 <?php echo ! $selectedCategory ? 'text-primary fw-bold' : 'text-dark';?>">
                            All Categories
                        </a>
                    </li>

                    <!-- Categories List -->
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <a href="?category=<?php echo $category['id'];?>"
                               class="d-block py-1 <?php echo ($selectedCategory == $category['id']) ? 'text-primary fw-bold' : 'text-dark';?>">
                                <?php echo htmlspecialchars($category['category_name']);?>
                            </a>
                        </li>
                    <?php endforeach; ?>

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
                 <span class="text-muted">
                     <?php if (count($products) > 0): ?>
                     Showing 1–<?php echo count($products); ?> of<?php echo count($products); ?> products
                  
                     <?php endif; ?>
                 </span>
                 <!-- <select class="form-select w-auto">
                     <option>Sort by latest</option>
                     <option>Price: Low to High</option>
                     <option>Price: High to Low</option>
                 </select> -->
             </div>

             <!-- Products Grid -->
             <div class="row g-4">
                 <?php if (count($products) > 0): ?>
                     <?php foreach ($products as $product): ?>
                         <!-- PRODUCT CARD -->
                         <div class="col-12 col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay="0.2s">
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
                                     <a href="#" class="btn cart-btn btn-sm">
                                         <span class="me-1"> Add to Cart </span>
                                         <i class="fas fa-cart-plus"></i>
                                     </a>

                                     <a href="single.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary btn-sm">
                                         <span class="me-1"> preview</span>
                                         <i class="fas fa-eye"></i>
                                     </a>
                                 </div>

                             </div>
                         </div>
                         <!-- END PRODUCT CARD -->
                     <?php endforeach; ?>
                 <?php else: ?>
                     <div class="col-12 text-center">
                         <p class="text-muted mt-5 display-5 py-5">No products found</p>
                     </div>
                 <?php endif; ?>
             </div>

             <!-- Pagination -->
             <!-- <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
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
             </div> -->

         </div>
     </div>
 </div>

 <!-- Footer Start -->
 <?php include 'include/template/Footer.php';
 
 ?>
 