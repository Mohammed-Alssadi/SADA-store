
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../index.php");
    exit;
}
    include "../include/db_connect.php";

    $sql = "SELECT
    p.id,
    p.product_name,
    p.price,
    p.quantity,
    p.image1,
    c.category_name
FROM products p
INNER JOIN categories c ON p.category_id = c.id
";

    $result = $conn->query($sql);
?>


 <?php include ("header.php"); ?>

    <div class="dashboard-container p-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center  top-controls shadow p-2  bg-white rounded">
                <div class="search-box m-0 min-w-300">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="البحث عن منتج..." data-key="searchProduct">
                </div>
                <a href="add_product.php" class="btn btn-primary text-light "><i class="fas fa-plus me-2"></i><span
                        data-key="addNew">إضافة منتج جديد</span></a>
            </div>

            <div class="table-card">
                <!-- search moved to top-controls -->

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th data-key="colImg">الصورة</th>
                                <th data-key="colName">الاسم</th>
                                <th data-key="colCategory">الفئة</th>
                                <th data-key="colQty">الكمية</th>
                                <th data-key="colPrice">السعر</th>
                                <!-- <th data-key="colStatus">الحالة</th> -->
                                <th data-key="colActions">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data -->
                            <?php if ($result->rowCount() > 0): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($result->fetchAll() as $row): ?>
                            <tr>


                                <td>
                                    <img src="../uploads/products/<?php echo $row['image1'];?>" class="rounded" width="60" height="60">
                                </td>

                                <td><?php echo $row['product_name']; ?></td>

                                <td><?php echo $row['category_name']; ?></td>
                                <td>
                                    <span class="badge bg-warning text-dark">
                                        <?php echo $row['quantity']; ?>
                                    </span>
                                </td>

                                <td><?php echo $row['price']; ?></td>


                                <td>
                                <a href="view_product.php ?id=<?php echo $row['id']; ?>" class="action-btn btn-view"
                                    title="عرض"><i class="fas fa-eye"></i></a>
                                <a href="edit_product.php  ?id=<?php echo $row['id']; ?>" class="action-btn btn-edit"
                                    title="تعديل"><i class="fas fa-edit"></i></a>
                                <a href="delete_product.php ?id=<?php echo $row['id']; ?>" class="action-btn btn-edit" title="حذف"
                                    onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="7">No Products Found</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>

 <?php include_once("footer.php"); ?>