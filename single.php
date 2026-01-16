 <?php
     session_start();
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

     // جلب التعليقات
     $stmt_comments = $conn->prepare("SELECT c.comment, c.rating, c.created_at, u.username, u.profile_image FROM comments c JOIN users u ON c.user_id = u.id WHERE c.product_id = ? ORDER BY c.created_at DESC");
     $stmt_comments->execute([$id]);
     $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);

     // معالجة إرسال التعليق
     $comment_errors  = [];
     $comment_success = false;

     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
         $showLoginModal = false;
         $rating         = intval($_POST['rating'] ?? 0);
         $comment_text   = trim($_POST['comment'] ?? '');

         if ($rating < 1 || $rating > 5) {
        $comment_errors[] = 'Rating must be between 1 and 5.';
         }
         if (empty($comment_text)) {
        $comment_errors[] = 'Comment cannot be empty.';
         }

         if (empty($comment_errors)) {
        $stmt_insert = $conn->prepare("INSERT INTO comments (product_id, user_id, comment, rating) VALUES (?, ?, ?, ?)");
        $stmt_insert->execute([$id, $_SESSION['user_id'], $comment_text, $rating]);
        $comment_success = true;
        // إعادة تحميل الصفحة لعرض التعليق الجديد
        header("Location: single.php?id=$id");
        exit;
         }
     }

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
                     <?php if (empty($comments)): ?>
                         <p>No reviews yet. Be the first to review this product!</p>
                     <?php else: ?>
                         <?php foreach ($comments as $comment): ?>
                             <div class="d-flex mb-4">
                                 <img src="uploads/users/<?php echo htmlspecialchars($comment['profile_image'] ?: 'user.png'); ?>" class="img-fluid rounded-circle p-3"
                                     style="width: 80px; height: 80px;" alt="">
                                 <div class="">
                                     <p class="mb-2" style="font-size: 14px;"><?php echo htmlspecialchars(date('F j, Y', strtotime($comment['created_at']))); ?></p>
                                     <div class=" d-flex justify-content-between  align-items-center">
                                         <h5><?php echo htmlspecialchars($comment['username']); ?></h5>
                                         <div class="d-flex mb-2 ms-5 ">
                                             <?php for ($i = 1; $i <= 5; $i++): ?>
                                                 <i class="fa fa-star <?php echo $i <= $comment['rating'] ? 'text-warning' : 'text-muted'; ?>"></i>
                                             <?php endfor; ?>
                                         </div>
                                     </div>
                                     <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                                 </div>
                             </div>
                         <?php endforeach; ?>
                     <?php endif; ?>
                 </div>

             </div>
         </div>
         <div class="mt-5">
             <h5 class="fw-bold mb-3">Add Your Review</h5>

             <?php if (isset($_SESSION['user_id'])): ?>
                 <?php if ($comment_success): ?>
                     <div class="alert alert-success">Your review has been submitted successfully!</div>
                 <?php endif; ?>
                 <?php if (! empty($comment_errors)): ?>
                     <div class="alert alert-danger">
                         <ul>
                             <?php foreach ($comment_errors as $error): ?>
                                 <li><?php echo htmlspecialchars($error); ?></li>
                             <?php endforeach; ?>
                         </ul>
                     </div>
                 <?php endif; ?>
                 <form method="post">
                     <div class="mb-3">
                         <label class="form-label">Your Rating</label>
                         <div id="rating-stars">
                             <?php for ($i = 1; $i <= 5; $i++): ?>
                                 <i class="fa fa-star text-muted fs-5 star" data-rating="<?php echo $i; ?>"></i>
                             <?php endfor; ?>
                         </div>
                         <input type="hidden" name="rating" id="rating-input" value="0">
                     </div>

                     <div class="mb-3">
                         <textarea class="form-control" name="comment" rows="4" placeholder="Write your comment..." required></textarea>
                     </div>

                     <button type="submit" name="submit_comment" class="btn btn-primary px-4">
                         Submit Review
                     </button>
                 </form>
             <?php endif; ?>
             <?php if (! isset($_SESSION['user_id'])): ?>
                 <p>You must be logged in to submit a review.</p>
                 <a href="login.php" class="btn btn-primary">Login to Review</a>
             <?php endif; ?>
         </div>
     </div>
 </div>


 </div>
 <!-- Single Products End -->
0

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const stars = document.querySelectorAll('#rating-stars .star');
         const ratingInput = document.getElementById('rating-input');

         stars.forEach(star => {
             star.addEventListener('click', function() {
                 const rating = this.getAttribute('data-rating');
                 ratingInput.value = rating;

                 stars.forEach(s => {
                     if (s.getAttribute('data-rating') <= rating) {
                         s.classList.remove('text-muted');
                         s.classList.add('text-warning');
                     } else {
                         s.classList.remove('text-warning');
                         s.classList.add('text-muted');
                     }
                 });
             });
         });
     });
 </script>

 <!-- Footer Start -->
 <?php include 'include/template/Footer.php'?>