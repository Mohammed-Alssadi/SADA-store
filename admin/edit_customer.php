<?php
include("header.php");
?>

    

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="editCustomer">تعديل بيانات العميل</h4>
                        <a href="customers.php" class="btn btn-outline-secondary"><span data-key="cancel">إلغاء</span></a>
                    </div>

                    <div class="edit-card">
                        <form>
                            <div class="section-header" data-key="personalInfo">المعلومات الشخصية</div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" data-key="fullName">الاسم الكامل</label>
                                    <input type="text" class="form-control" value="أحمد محمد">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" data-key="colEmail">البريد الإلكتروني</label>
                                    <input type="email" class="form-control" value="ahmed@example.com">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" data-key="phone">الهاتف</label>
                                    <input type="text" class="form-control" value="+966 50 123 4567">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" data-key="status">الحالة</label>
                                    <select class="form-select">
                                        <option value="active" selected data-key="statusActive">نشط</option>
                                        <option value="blocked" data-key="statusBlocked">محظور</option>
                                    </select>
                                </div>
                            </div>

                            <div class="section-header mt-3" data-key="addressInfo">معلومات العنوان</div>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label class="form-label" data-key="address">العنوان الكامل</label>
                                    <textarea class="form-control" rows="3">الرياض، حي الملقا، شارع الملك فهد</textarea>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary px-5" data-key="save">حفظ التغييرات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
    <script>
        const editCustomerTranslations = {
            ar: { editCustomer: 'تعديل بيانات العميل', cancel: 'إلغاء', personalInfo: 'المعلومات الشخصية', fullName: 'الاسم الكامل', colEmail: 'البريد الإلكتروني', phone: 'الهاتف', status: 'الحالة', statusActive: 'نشط', statusBlocked: 'محظور', addressInfo: 'معلومات العنوان', address: 'العنوان الكامل', save: 'حفظ التغييرات' },
            en: { editCustomer: 'Edit Customer Data', cancel: 'Cancel', personalInfo: 'Personal Information', fullName: 'Full Name', colEmail: 'Email', phone: 'Phone', status: 'Status', statusActive: 'Active', statusBlocked: 'Blocked', addressInfo: 'Address Information', address: 'Full Address', save: 'Save Changes' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = editCustomerTranslations[lang];
            if (t) {
                document.querySelectorAll('[data-key]').forEach(el => {
                    const key = el.getAttribute('data-key');
                    if (t[key]) el.textContent = t[key];
                });
            }
        };
        document.addEventListener('DOMContentLoaded', () => window.updatePageContent());
    </script>
</body>
</html>
