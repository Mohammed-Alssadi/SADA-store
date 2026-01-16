
            <?php 
include "header.php";
include "../include/db_connect.php";

$stmt = $conn->query("SELECT * FROM categories ORDER BY id DESC");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

         

            <div class="dashboard-container p-4">
                <div class="container-fluid">
             

                    <div class="table-card">
                        <div class="filter-bar">
                            <div class="search-box m-0" style="min-width: 300px;">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="البحث عن فئة..." data-key="searchCat">
                            </div>
                            <div class="d-flex gap-2">
                                  <a href="add_category.php" class="btn btn-primary text-light"><i class="fas fa-plus me-2"></i><span data-key="addNewCat">إضافة فئة جديدة</span></a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th data-key="colImg">الصورة</th>
                                        <th data-key="colName">الاسم</th>
                                        <th data-key="colStatus">الحالة</th>
                                        <th data-key="colActions">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $row): ?>
                        <tr>
                            <td>
                                <img src="../uploads/categories/<?php echo $row['category_img'];?>" class="rounded" width="60" height="60">
                            </td>

                            <td><?php echo htmlspecialchars($row['category_name']); ?></td>

                          
                            <td>
                                <span class="badge-status <?php echo $row['category_status'] == 1 ? 'bg-light-success' : 'bg-light-danger'; ?>">
                                    <?php echo $row['category_status'] == 1 ? 'active' : 'inactive'; ?>
                                </span>
                            </td>

                            <td>
                                <a href="view_category.php?id=<?php echo $row['id']; ?>" class="action-btn btn-view">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="edit_category.php?id=<?php echo $row['id']; ?>" class="action-btn btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="delete_category.php?id=<?php echo $row['id']; ?>"
                                   class="action-btn btn-delete"
                                   onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">لا توجد فئات</td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 </div>
            </div>
        </main>
    </div>
 <?php include_once("footer.php"); ?>
