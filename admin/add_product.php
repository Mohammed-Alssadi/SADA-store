<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}
    require "../include/db_connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {

        $name        = trim($_POST['name']);
        $desc        = trim($_POST['description']);
        $price       = (float) $_POST['price'];
        $discount    = (float) $_POST['discount'];
        $qty         = (int) $_POST['quantity'];
        $status      = (int) $_POST['status'];
        $category_id = (int) $_POST['category'];

        /* ===============================
       2️⃣ إعداد مجلد الرفع
    =============================== */
        $uploadDir = "../uploads/products/";
        if (! is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        /* ===============================
       3️⃣ دالة رفع الصور
    =============================== */
        function uploadImage(array $file, string $path): ?string
        {
            if (empty($file['name'])) {
                return null;
            }

            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
            $extension    = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (! in_array($extension, $allowedTypes)) {
                return null;
            }

            $fileName = uniqid('product_', true) . '.' . $extension;
            $fullPath = $path . $fileName;

            if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                return $fileName;
            }

            return null;
        }

        $img1 = uploadImage($_FILES['img1'], $uploadDir);
        $img2 = uploadImage($_FILES['img2'], $uploadDir);
        $img3 = uploadImage($_FILES['img3'], $uploadDir);


        $sql = "INSERT INTO products
            (product_name, description, price, discount, quantity, product_status,
             image1, image2, image3, category_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $query = $conn->prepare($sql);
        $success = $query->execute([$name, $desc, $price, $discount, $qty, $status,
            $img1, $img2, $img3, $category_id]);

if ($success) {
    echo "<script>alert('Product added successfully');</script>";
     header("Location: productManagement.php?success=1");
        exit;
} else {
    echo "<script>alert('Failed to add product');</script>";
}

    }

?>

 <?php include ("header.php"); ?>
    <!-- Page Content -->
    <div class="dashboard-container p-4">
        <div class="container-fluid">
            <div class="page-header">
                <h4 data-key="pageTitle">إضافة سلعة جديدة</h4>
                <!-- <p data-key="pageSubtitle">قم بتعبئة البيانات أدناه لإضافة منتج جديد إلى المتجر</p> -->
            </div>

            <div class="form-card">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                       
                        <div class="col-md-4 mb-4">
                            <label class="form-label" data-key="labelName">اسم السلعة</label>
                            <input type="text" name="name" class="form-control" placeholder="product name" required>
                        </div>

                     
                        <div class="col-md-4 mb-4">
                            <label class="form-label" data-key="labelCategory">الفئة (Category)</label>
                            <select name="category" class="form-select" required>
                                <option value="" disabled selected data-key="selectCategory">اختر الفئة</option>
                                <?php
                                    $cats = $conn->query("SELECT id, category_name FROM categories WHERE category_status=1");
                                foreach ($cats as $cat):
                                ?> <option value="<?php echo $cat['id']; ?>">
                                    <?php echo $cat['category_name']; ?>
                                    </option>
                                    <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-4 mb-4">
                            <label class="form-label" data-key="labelQuantity">الكمية</label>
                            <input type="number" name="quantity" class="form-control" placeholder="0" min="0" required>
                        </div>

                        <!-- Price -->
                        <div class="col-md-4 mb-4">
                            <label class="form-label" data-key="labelPrice">السعر</label>
                            <div class="input-group">
                                <input type="number" name="price" class="form-control" placeholder="0.00" step="0.01"
                                    required>
                                <span class="input-group-text">$</span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label" data-key="labelDiscount">الخصم</label>
                            <div class="input-group">
                                <input type="number" name="discount" class="form-control" placeholder="0.00" step="0.01"
                                    required>
                                <span class="input-group-text">$</span>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4 mb-4">
                            <label class="form-label" data-key="labelStatus">الحالة</label>
                            <select name="status" class="form-select" required>
                                <option value="1" data-key="statusActive">نشط</option>
                                <option value="0" data-key="statusInactive">غير نشط</option>
                                <option value="2" data-key="statusOutOfStock">نفذت الكمية</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-12 mb-4">
                            <label class="form-label" data-key="labelDesc">الوصف</label>
                            <textarea name="description" class="form-control" rows="3"
                                placeholder=" product description "></textarea>
                        </div>

                        <!-- Images -->
                        <div class="col-12 mb-4">
                            <label class="form-label" data-key="labelImages">صور المنتج (3 صور)</label>
                            <div class="image-upload-container">
                                <!-- Image 1 -->
                                <div class="image-upload-box" onclick="document.getElementById('img1').click()">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span data-key="uploadImg1">الصورة 1</span>
                                    <input type="file" id="img1" name="img1" accept="image/*" style="display: none;" hidden
               onchange="previewImage(this, 'preview1')">
                                    <img id="preview1" class="image-preview">
                                </div>
                                <!-- Image 2 -->
                                <div class="image-upload-box" onclick="document.getElementById('img2').click()">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span data-key="uploadImg2">الصورة 2</span>
                                    <input type="file" id="img2" name="img2" accept="image/*" style="display: none;" hidden
               onchange="previewImage(this, 'preview2')">
                                    <img id="preview2" class="image-preview">
                                </div>
                                <!-- Image 3 -->
                                <div class="image-upload-box" onclick="document.getElementById('img3').click()">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span data-key="uploadImg3">الصورة 3</span>
                                    <input type="file" id="img3" name="img3" accept="image/*" style="display: none;" hidden
               onchange="previewImage(this, 'preview3')">
                                    <img id="preview3" class="image-preview">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-end mt-3">
                            <button type="reset" class="btn btn-outline-secondary me-2" data-key="btnReset">إعادة
                                تعيين</button>
                            <button type="submit" class="btn-submit" data-key="btnSubmit" name="add_product">إضافة المنتج</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
    </div>
    <script>
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.getElementById(previewId);
            img.src = e.target.result;
            img.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>


 <?php include_once("footer.php");
  ?>