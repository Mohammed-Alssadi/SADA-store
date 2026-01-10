<?php
// cms.php
include("header.php");
?>


            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2><i class="fas fa-file-alt"></i> إدارة المحتوى</h2>
                    </div>

                    <!-- التبويبات -->
                    <div class="card">
                        <div class="tab-nav d-flex">
                            <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> صفحات الموقع</button>
                            <button class="tab-link" onclick="switchTab('banners')"><i class="fas fa-image"></i> البانرات</button>
                            <button class="tab-link" onclick="switchTab('slider')"><i class="fas fa-images"></i> السلايدر</button>
                            <button class="tab-link" onclick="switchTab('news')"><i class="fas fa-newspaper"></i> الأخبار والعروض</button>
                        </div>

                        <!-- صفحات الموقع -->
                        <div id="pages-tab" class="tab-content">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPageModal">
                                <i class="fas fa-plus"></i> إضافة صفحة
                            </button>
                            <div class="page-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="page-title">من نحن</div>
                                        <p style="color: #999; margin-bottom: 10px;">معلومات عن الشركة والفريق</p>
                                        <small><strong>آخر تحديث:</strong> 2024-01-15</small>
                                    </div>
                                    <span class="badge-status badge-active">منشورة</span>
                                </div>
                                <div class="text-end mt-3">
                                    <button class="action-btn btn-view" title="معاينة"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-delete" title="حذف"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>

                            <div class="page-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="page-title">اتصل بنا</div>
                                        <p style="color: #999; margin-bottom: 10px;">نموذج التواصل والمعلومات</p>
                                        <small><strong>آخر تحديث:</strong> 2024-01-12</small>
                                    </div>
                                    <span class="badge-status badge-active">منشورة</span>
                                </div>
                                <div class="text-end mt-3">
                                    <button class="action-btn btn-view" title="معاينة"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-delete" title="حذف"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- البانرات -->
                        <div id="banners-tab" class="tab-content" style="display:none;">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBannerModal">
                                <i class="fas fa-plus"></i> إضافة بانر
                            </button>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card" style="border: 2px solid #e0e0e0;">
                                        <img src="https://via.placeholder.com/500x300" class="img-fluid rounded mb-3" alt="Banner">
                                        <h5>بانر الصيف</h5>
                                        <p style="color: #999; font-size: 14px;">عرض صيفي خاص</p>
                                        <div class="text-end">
                                            <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card" style="border: 2px solid #e0e0e0;">
                                        <img src="https://via.placeholder.com/500x300" class="img-fluid rounded mb-3" alt="Banner">
                                        <h5>بانر الخصم</h5>
                                        <p style="color: #999; font-size: 14px;">خصومات حصرية</p>
                                        <div class="text-end">
                                            <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- السلايدر -->
                        <div id="slider-tab" class="tab-content" style="display:none;">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSlideModal">
                                <i class="fas fa-plus"></i> إضافة شريحة
                            </button>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>الشريحة</th>
                                            <th>العنوان</th>
                                            <th>الوصف</th>
                                            <th>الترتيب</th>
                                            <th>الحالة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="https://via.placeholder.com/80x60" class="rounded" alt="Slide"></td>
                                            <td><strong>عرض جديد</strong></td>
                                            <td>اكتشف أحدث المنتجات</td>
                                            <td>1</td>
                                            <td><span class="badge-status badge-active">نشط</span></td>
                                            <td>
                                                <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="https://via.placeholder.com/80x60" class="rounded" alt="Slide"></td>
                                            <td><strong>خصم 50%</strong></td>
                                            <td>على المنتجات المختارة</td>
                                            <td>2</td>
                                            <td><span class="badge-status badge-active">نشط</span></td>
                                            <td>
                                                <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- الأخبار والعروض -->
                        <div id="news-tab" class="tab-content" style="display:none;">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                                <i class="fas fa-plus"></i> إضافة خبر
                            </button>
                            <div class="page-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="page-title">عرض جديد على الملابس</div>
                                        <p style="color: #999; margin-bottom: 10px;">احصل على خصم 40% على جميع الملابس</p>
                                        <small><strong>تاريخ النشر:</strong> 2024-01-15 | <strong>الكاتب:</strong> أحمد محمد</small>
                                    </div>
                                    <span class="badge-status badge-active">منشور</span>
                                </div>
                                <div class="text-end mt-3">
                                    <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>

                            <div class="page-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="page-title">منتجات جديدة وصلت</div>
                                        <p style="color: #999; margin-bottom: 10px;">اكتشف مجموعتنا الجديدة من الأحذية الرياضية</p>
                                        <small><strong>تاريخ النشر:</strong> 2024-01-14 | <strong>الكاتب:</strong> سارة علي</small>
                                    </div>
                                    <span class="badge-status badge-active">منشور</span>
                                </div>
                                <div class="text-end mt-3">
                                    <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: إضافة صفحة -->
    <div class="modal fade" id="addPageModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> إضافة صفحة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">عنوان الصفحة</label>
                            <input type="text" class="form-control" placeholder="أدخل عنوان الصفحة">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">المحتوى</label>
                            <textarea class="form-control" rows="6" placeholder="أدخل محتوى الصفحة"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الحالة</label>
                            <select class="form-select">
                                <option>منشورة</option>
                                <option>مسودة</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: إضافة بانر -->
    <div class="modal fade" id="addBannerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> إضافة بانر</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">الصورة</label>
                            <div class="image-preview"><i class="fas fa-cloud-upload-alt" style="font-size: 32px; color: #7367f0;"></i></div>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">عنوان البانر</label>
                            <input type="text" class="form-control" placeholder="أدخل عنوان البانر">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الرابط (اختياري)</label>
                            <input type="url" class="form-control" placeholder="https://example.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: إضافة شريحة -->
    <div class="modal fade" id="addSlideModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> إضافة شريحة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">الصورة</label>
                            <div class="image-preview"><i class="fas fa-cloud-upload-alt" style="font-size: 32px; color: #7367f0;"></i></div>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">العنوان</label>
                            <input type="text" class="form-control" placeholder="أدخل عنوان الشريحة">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الوصف</label>
                            <textarea class="form-control" rows="3" placeholder="أدخل وصف الشريحة"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: إضافة خبر -->
    <div class="modal fade" id="addNewsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> إضافة خبر</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">العنوان</label>
                            <input type="text" class="form-control" placeholder="أدخل عنوان الخبر">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">المحتوى</label>
                            <textarea class="form-control" rows="6" placeholder="أدخل محتوى الخبر"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الصورة</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        function switchTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');
            document.getElementById(tabName + '-tab').style.display = 'block';
            document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
