 <?php 
 require '../include/db_connect.php';

if (!isset($_GET['id'])) {
    header('Location: categories.php');
    exit;
}
$id = (int) $_GET['id'];

try {
    $stmt = $conn->prepare(
        'SELECT  *
         FROM categories 
         WHERE id = :id'
    );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo 'Database error: ' . htmlspecialchars($e->getMessage());
    exit;
}

if (!$categorie) {
    echo 'Category not found';
    exit;
}

 include ("header.php"); ?>
 

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="viewCat">تفاصيل الفئة</h4>
                        <a href="categories.php" class="btn btn-outline-secondary"><span data-key="cancel">العودة</span></a>
                    </div>

                    <div class="detail-card">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../uploads/categories/<?= htmlspecialchars(basename($categorie['category_img'])); ?>" class="cat-detail-img" alt="Category">
                            </div>
                            <div class="col-md-8">
                                <div class="info-label" data-key="labelName">اسم الفئة</div>
                                <div class="info-value"><?= htmlspecialchars($categorie['category_name']); ?></div>
                                <div class="info-label" data-key="labelStatus">الحالة</div>
                                <div class="info-value"><span class="badge bg-success" data-key="statusActive"><?= ((int)$categorie['category_status'] === 1) ? 'active' : 'inactive'; ?></span></div>
                                
                                <hr>
                                <div class="mt-4">
                                    <a href="edit_category.php?id=<?= $categorie['id']; ?>" class="btn btn-primary px-4 me-2"><i class="fas fa-edit me-2"></i><span data-key="edit">تعديل</span></a>
                                   <a href="delete_category.php?id=<?= $categorie['id']; ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-outline-danger px-4" ><i class="fas fa-trash me-2"></i><span data-key="delete">Delete</span></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
 <?php include_once("footer.php"); ?>