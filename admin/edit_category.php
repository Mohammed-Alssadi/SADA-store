
   <?php include ("../include/template/headerAdmin.php") ?>

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="editCat">تعديل الفئة</h4>
                        <a href="categories.php" class="btn btn-outline-secondary"><span data-key="cancel">إلغاء</span></a>
                    </div>

                    <div class="form-card">
                        <form action="update_category.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-4">
                                        <label class="form-label" data-key="labelName">اسم الفئة</label>
                                        <input type="text" name="name" class="form-control" value="إلكترونيات">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" data-key="labelStatus">الحالة</label>
                                        <select name="status" class="form-select">
                                            <option value="active" selected data-key="statusActive">نشط</option>
                                            <option value="inactive" data-key="statusInactive">غير نشط</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" data-key="labelDesc">الوصف</label>
                                        <textarea name="description" class="form-control" rows="4">جميع الأجهزة الإلكترونية والتقنية</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" data-key="labelImg">تحديث الصورة</label>
                                    <input type="file" class="form-control mb-2">
                                    <div class="image-preview-box">
                                        <img src="https://via.placeholder.com/200" alt="Category">
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
        </main>
    </div>
   <?php include_once("../include/template/footerAdmin.php"); 
