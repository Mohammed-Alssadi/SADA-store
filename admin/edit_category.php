<?php
require '../include/db_connect.php';

if (!isset($_GET['id'])) {
    header("Location: categories.php");
    exit;
}

$id = (int) $_GET['id'];

// جلب بيانات الفئة
try {
    $stmt = $conn->prepare('SELECT * FROM categories WHERE id = :id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$categorie) {
        echo 'Category not found';
        exit;
    }
} catch (Exception $e) {
    echo 'Database error: ' . htmlspecialchars($e->getMessage());
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['status'])) {
    $imgName = $categorie['category_img']; // الاسم الافتراضي للصورة الحالية

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/categories/';
        $tmpName = $_FILES['image']['tmp_name'];
        $newName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $newName;

        if (move_uploaded_file($tmpName, $targetFile)) {
            if ($imgName !== 'default.jpg' && file_exists($uploadDir . $imgName)) {
                unlink($uploadDir . $imgName);
            }
            $imgName = $newName;
        }
    }

    try {
        $stmt = $conn->prepare(
            'UPDATE categories SET
             category_name = :name,
             category_status = :status,
             category_img = :img
             WHERE id = :id'
        );
        $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':status', $_POST['status'], PDO::PARAM_STR);
        $stmt->bindValue(':img', $imgName, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: categories.php");
        exit;
    } catch (Exception $e) {
        echo 'Database error: ' . htmlspecialchars($e->getMessage());
        exit;
    }
}
?>

<?php include("header.php"); ?>

<div class="dashboard-container p-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 data-key="editCat">تعديل الفئة</h4>
            <a href="categories.php" class="btn btn-outline-secondary"><span data-key="cancel">إلغاء</span></a>
        </div>

        <div class="form-card">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label class="form-label" data-key="labelName">اسم الفئة</label>
                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($categorie['category_name']); ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" data-key="labelStatus">الحالة</label>
                            <select name="status" class="form-select" required>
                                <option value="1" <?php echo $categorie['category_status'] === 1 ? 'selected' : ''; ?>>نشط</option>
                                <option value="0" <?php echo $categorie['category_status'] === 0 ? 'selected' : ''; ?>>غير نشط</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" data-key="labelImg">تحديث الصورة</label>
                        <input type="file" name="image" class="form-control mb-2" accept="image/*">
                        <div class="image-preview-box">
                            <img src="../uploads/categories/<?php echo htmlspecialchars($categorie['category_img']); ?>" alt="Category" style="width:100%; max-height:200px; object-fit:cover;">
                        </div>
                    </div>

                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-primary px-5" data-key="save">حفظ التغييرات</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>
