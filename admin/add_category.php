
 <?php 
 session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}
require "../include/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_category'])) {

    $name   = trim($_POST['name']);
    $status = (int) $_POST['status'];

    $uploadDir = "../uploads/categories/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    function uploadImage(array $file, string $path): ?string {
        if (empty($file['name'])) {
            return null;
        }

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            return null;
        }

        $fileName = uniqid('cat_', true) . '.' . $ext;
        $fullPath = $path . $fileName;

        return move_uploaded_file($file['tmp_name'], $fullPath)
            ? $fileName
            : null;
    }

    $img = uploadImage($_FILES['image'], $uploadDir);

    $sql = "INSERT INTO categories (category_name, category_status, category_img)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $success = $stmt->execute([$name, $status, $img]);

    if ($success) {
        header("Location: categories.php?success=1");
        exit;
    } else {
        $error = "فشل إضافة الفئة";
    }
}
include ("header.php"); 

?>
 
 

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="addNewCat">إضافة فئة جديدة</h4>
                        <a href="categories.php" class="btn btn-outline-secondary"><span data-key="cancel">إلغاء</span></a>
                    </div>

                    <div class="form-card">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-4">
                                        <label class="form-label" data-key="labelName">اسم الفئة</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" data-key="labelStatus">الحالة</label>
                                        <select name="status" class="form-select">
                                            <option value="1" data-key="statusActive">نشط</option>
                                            <option value="0" data-key="statusInactive">غير نشط</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" data-key="labelImg">صورة الفئة</label>
                                    <div class="image-upload-box" onclick="document.getElementById('catImg').click()">
                                        <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                                        <span data-key="uploadImg">اختر صورة</span>
                                        <input type="file" id="catImg" name="image" style="display: none;" onchange="previewImage(this)">
                                        <img id="preview" class="image-preview" style="display:none;">
                                    </div>
                                </div>
                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-primary px-5" data-key="save" name="add_category">حفظ الفئة</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
    function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.getElementById('preview');
            img.src = e.target.result;
            img.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
 <?php include ("footer.php"); ?>
