
            <?php include ("../include/template/headerAdmin.php") ?>

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="manageCategories">إدارة الفئات</h4>
                        <a href="add_category.php" class="btn btn-primary"><i class="fas fa-plus me-2"></i><span data-key="addNewCat">إضافة فئة جديدة</span></a>
                    </div>

                    <div class="table-card">
                        <div class="filter-bar">
                            <div class="search-box m-0" style="min-width: 300px;">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="البحث عن فئة..." data-key="searchCat">
                            </div>
                            <div class="d-flex gap-2">
                                <select class="form-select" style="width: 150px;">
                                    <option value="" data-key="allStatus">كل الحالات</option>
                                    <option value="active" data-key="statusActive">نشط</option>
                                    <option value="inactive" data-key="statusInactive">غير نشط</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th data-key="colImg">الصورة</th>
                                        <th data-key="colName">الاسم</th>
                                        <th data-key="colDesc">الوصف</th>
                                        <th data-key="colStatus">الحالة</th>
                                        <th data-key="colActions">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="https://via.placeholder.com/50" class="cat-img"></td>
                                        <td>إلكترونيات</td>
                                        <td>جميع الأجهزة الإلكترونية والتقنية</td>
                                        <td><span class="badge-status bg-light-success" data-key="statusActive">نشط</span></td>
                                        <td>
                                            <a href="view_category.php?id=1" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                            <a href="edit_category.php?id=1" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                            <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
   <?php include_once("../include/template/footerAdmin.php"); 
