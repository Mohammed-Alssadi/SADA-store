<?php
require_once("db.php");

/* التحقق من وجود ID */
if (!isset($_GET['id'])) {
    header("Location: ProductManagement.php");
    exit;
}

$id = intval($_GET['id']);

/* جلب بيانات المنتج */
$result = $conn->prepare("SELECT * FROM products WHERE id = $id");
$product = $result->execute();

if (!$product) {
    die("Product not found");
}

/* تحديث المنتج */
if (isset($_POST['update_product'])) {

    $name   = $_POST['product_name'];
    $desc   = $_POST['description'];
    $price  = $_POST['price'];
    $qty    = $_POST['quantity'];
    $status = $_POST['product_status'];
    $cat_id = $_POST['category_id'];

    /* دالة تحديث الصور */
    function updateImage($inputName, $oldImage) {
        if (!empty($_FILES[$inputName]['name'])) {
            $newName = time() . "_" . $_FILES[$inputName]['name'];
            move_uploaded_file(
                $_FILES[$inputName]['tmp_name'],
                "img/" . $newName
            );

            if ($oldImage && file_exists("img/" . $oldImage)) {
                unlink("img/" . $oldImage);
            }
            return $newName;
        }
        return $oldImage;
    }

    $img1 = updateImage('image1', $product['image1']);
    $img2 = updateImage('image2', $product['image2']);
    $img3 = updateImage('image3', $product['image3']);

    $conn->prepare("
        UPDATE products SET
        product_name='$name',
        description='$desc',
        price='$price',
        quantity='$qty',
        product_status='$status',
        category_id='$cat_id',
        image1='$img1',
        image2='$img2',
        image3='$img3'
        WHERE id=$id
    ");

    header("Location: view_product.php?id=$id");
    exit;
}
?>

    <?php include ("../include/template/headerAdmin.php") ?>
    <!-- <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo-container"><i class="fas fa-cube"></i><span class="logo-text">MATERIO</span></div>
                <button class="btn-close-sidebar" id="closeSidebarBtn"><i class="fas fa-times"></i></button>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <a href="index.php" class="nav-item"><i class="fas fa-home"></i><span class="nav-text" data-key="dashboard">لوحة التحكم</span></a>
                    <a href="management_products.php" class="nav-item active"><i class="fas fa-box"></i><span class="nav-text" data-key="manageProducts">إدارة المنتجات</span></a>
                </div>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="header-left"><button class="btn-toggle-sidebar" id="toggleSidebarBtn"><i class="fas fa-bars"></i></button></div>
                <div class="header-right">
                    <div class="header-icon-group">
                        <button class="header-icon" id="languageBtn"><i class="fas fa-language"></i></button>
                        <div class="dropdown-menu language-menu" id="languageMenu">
                            <div class="dropdown-item" data-lang="ar"><span>العربية</span></div>
                            <div class="dropdown-item" data-lang="en"><span>English</span></div>
                        </div>
                    </div>
                </div>
            </header> -->

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="editProduct">تعديل المنتج</h4>
                        <a href="management_products.php" class="btn btn-outline-secondary"><span data-key="cancel">إلغاء</span></a>
                    </div>

                    <div class="form-card">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" data-key="labelName">اسم السلعة</label>
                                    <input type="text" name="product_name" class="form-control" value="<?php echo htmlspecialchars($product['product_name']); ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" data-key="labelCategory">الفئة</label>
                                    <select name="category_id" class="form-select">
                                        <?php
                                        $cats = $conn->prepare("SELECT id, category_name FROM categories");
                                        while ($c = $cats->fetch()): ?>
                                            <option value="<?= $c['id'] ?>" <?= ($c['id'] == $product['category_id']) ? 'selected' : '' ?>><?= htmlspecialchars($c['category_name']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" data-key="labelQuantity">الكمية</label>
                                    <input type="number" name="quantity" class="form-control" value="<?= htmlspecialchars($product['quantity']) ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" data-key="labelPrice">السعر</label>
                                    <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" data-key="labelStatus">الحالة</label>
                                    <select name="product_status" class="form-select">
                                        <option value="active" <?= ($product['product_status'] == 'active') ? 'selected' : '' ?>>نشط</option>
                                        <option value="inactive" <?= ($product['product_status'] == 'inactive') ? 'selected' : '' ?>>غير نشط</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label" data-key="labelImages">تحديث الصور</label>
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <label class="form-label">صورة 1</label>
                                            <input type="file" name="image1" class="form-control mb-2">
                                            <?php if (!empty($product['image1'])): ?>
                                                <div class="preview-box"><img src="img/<?= htmlspecialchars($product['image1']) ?>" alt="" width="100"></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">صورة 2</label>
                                            <input type="file" name="image2" class="form-control mb-2">
                                            <?php if (!empty($product['image2'])): ?>
                                                <div class="preview-box"><img src="img/<?= htmlspecialchars($product['image2']) ?>" alt="" width="100"></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">صورة 3</label>
                                            <input type="file" name="image3" class="form-control mb-2">
                                            <?php if (!empty($product['image3'])): ?>
                                                <div class="preview-box"><img src="img/<?= htmlspecialchars($product['image3']) ?>" alt="" width="100"></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label" data-key="labelDescription">الوصف</label>
                                    <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($product['description']) ?></textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" name="update_product" class="btn btn-primary px-5" data-key="saveChanges">حفظ التغييرات</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
 <?php include_once("../include/template/footerAdmin.php"); 
