<?php
include "../include/db_connect.php";

if (!isset($_GET['id'])) {
    header("Location: ProductManagement.php");
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT p.*, c.category_name 
        FROM products p
        INNER JOIN categories c ON p.category_id = c.id
        WHERE p.id = $id";

$result = $conn->prepare($sql);
$result->execute();
$product = $result->fetch();

if (!$product) {
    echo "Product not found";
    exit;
}
?>


  
<?php include ("../include/template/headerAdmin.php") ?>
            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="viewProduct"> products details</h4>
                        <!-- <a href="management_products.php" class="btn btn-outline-secondary"><i class="fas fa-arrow-right me-2"></i><span data-key="back">العودة</span></a> -->
                    </div>

                    <div class="detail-card">
                        <div class="row">
                            <div class="col-md-5">
                                 <img src="../uploads/products/<?= $product['image1']; ?>" class="main-product-img" alt="Product">
                                <div class="product-gallery">
                                    <img src="../uploads/products/<?= $product['image2']; ?>" class="gallery-img">
                                    <img src="../uploads/products/<?= $product['image3']; ?>" class="gallery-img">
                                    <img src="../uploads/products/<?= $product['image1']; ?>" class="gallery-img">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="info-label" data-key="labelName">اسم السلعة</div>
                                        <div class="info-value"><?= $product['product_name']; ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="info-label" data-key="labelCategory">الفئة</div>
                                        <div class="info-value"><?= $product['category_name']; ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="info-label" data-key="labelQuantity">الكمية</div>
                                        <div class="info-value"><?= $product['quantity']; ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="info-label" data-key="labelPrice">السعر</div>
                                        <div class="info-value"><?= $product['price']; ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="info-label" data-key="labelStatus">الحالة</div>
                                        <div class="info-value"><span class="badge bg-success"><?= $product['product_status'] == 1 ? 'active' : ' inactive'; ?></span></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="info-label" data-key="labelDesc">الوصف</div>
                                        <div class="info-value"><?= $product['description']; ?></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="mt-4">
                                    <a href="edit_product.php?id=<?= $product['id']; ?>" class="btn btn-primary px-4 me-2"><i class="fas fa-edit me-2"></i><span data-key="edit">Edit</span></a>
                                    <button class="btn btn-outline-danger px-4"><i class="fas fa-trash me-2"></i><span data-key="delete">Delete</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
  <?php include_once("../include/template/footerAdmin.php"); 
