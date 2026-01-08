<?php include ("../include/template/headerAdmin.php") ?>


            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="viewCat">تفاصيل الفئة</h4>
                        <a href="categories.php" class="btn btn-outline-secondary"><span data-key="back">العودة</span></a>
                    </div>

                    <div class="detail-card">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://via.placeholder.com/300" class="cat-detail-img" alt="Category">
                            </div>
                            <div class="col-md-8">
                                <div class="info-label" data-key="labelName">اسم الفئة</div>
                                <div class="info-value">إلكترونيات</div>
                                <div class="info-label" data-key="labelStatus">الحالة</div>
                                <div class="info-value"><span class="badge bg-success" data-key="statusActive">نشط</span></div>
                                <div class="info-label" data-key="labelDesc">الوصف</div>
                                <div class="info-value">جميع الأجهزة الإلكترونية والتقنية، تشمل الهواتف الذكية، الحواسيب، والإكسسوارات.</div>
                                <hr>
                                <div class="mt-4">
                                    <a href="edit_category.php?id=1" class="btn btn-primary px-4 me-2"><i class="fas fa-edit me-2"></i><span data-key="edit">تعديل</span></a>
                                    <button class="btn btn-outline-danger px-4"><i class="fas fa-trash me-2"></i><span data-key="delete">حذف</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
 <?php include_once("../include/template/footerAdmin.php"); 
