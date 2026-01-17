<?php
require '../include/db_connect.php';

/* التحقق من وجود ID */
if (!isset($_GET['id'])) {
    header("Location: ProductManagement.php");
    exit;
}

$id = intval($_GET['id']);

/* جلب بيانات المنتج */
try {
    $stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        die('Product not found');
    }
} catch (Exception $e) {
    die('Database error: ' . htmlspecialchars($e->getMessage()));
}

/* تحديث المنتج */
if (isset($_POST['update_product'])) {

    $name   = trim($_POST['product_name']);
    $desc   = trim($_POST['description']);
    $price  = (float) $_POST['price'];
    $qty    = (int) $_POST['quantity'];
    $status = $_POST['product_status'];
    $cat_id = (int) $_POST['category_id'];

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

    $img1 = updateImage('img1', $product['image1']);
    $img2 = updateImage('img2', $product['image2']);
    $img3 = updateImage('img3', $product['image3']);

    try {
        $upd = $conn->prepare('UPDATE products SET
            product_name = :name,
            description = :desc,
            price = :price,
            quantity = :qty,
            product_status = :status,
            category_id = :cat_id,
            image1 = :img1,
            image2 = :img2,
            image3 = :img3
            WHERE id = :id');

        $upd->execute([
            ':name' => $name,
            ':desc' => $desc,
            ':price' => $price,
            ':qty' => $qty,
            ':status' => $status,
            ':cat_id' => $cat_id,
            ':img1' => $img1,
            ':img2' => $img2,
            ':img3' => $img3,
            ':id' => $id,
        ]);

        header('Location: view_product.php?id=' . $id);
        exit;
    } catch (Exception $e) {
        die('Update failed: ' . htmlspecialchars($e->getMessage()));
    }
}
?>

 <?php include ("header.php"); ?>
    

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="editProduct">تعديل المنتج</h4>
                        <a href="ProductManagement.php" class="btn btn-outline-secondary"><span data-key="cancel">إلغاء</span></a>
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
                                        $catsStmt = $conn->prepare('SELECT id, category_name FROM categories');
                                        $catsStmt->execute();
                                        $cats = $catsStmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($cats as $c): ?>
                                            <option value="<?= (int)$c['id'] ?>" <?= ($c['id'] == $product['category_id']) ? 'selected' : '' ?>><?= htmlspecialchars($c['category_name']) ?></option>
                                        <?php endforeach; ?>
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
                                        <option value="1" <?= ($product['product_status'] == 1) ? 'selected' : '' ?>>نشط</option>
                                        <option value="0" <?= ($product['product_status'] == 0) ? 'selected' : '' ?>>غير نشط</option>
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
 <?php include_once("footer.php"); ?>