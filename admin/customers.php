<?php
include("header.php");
?>

    <div class="wrapper">
       

        

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="customers">إدارة العملاء</h4>
                        <!-- <div class="search-box m-0" style="min-width: 300px;">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="البحث عن عميل..." data-key="searchCustomer">
                        </div> -->
                    </div>

                    <div class="customer-card">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th data-key="colCustomer">العميل</th>
                                        <th data-key="colEmail">البريد الإلكتروني</th>
                                        <th data-key="colOrders">الطلبات</th>
                                        <th data-key="colStatus">الحالة</th>
                                        <th data-key="colActions">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="https://via.placeholder.com/40" class="customer-avatar" alt="User">
                                                <span class="fw-bold">أحمد محمد</span>
                                            </div>
                                        </td>
                                        <td>ahmed@example.com</td>
                                        <td>12 طلب</td>
                                        <td><span class="status-badge status-active" data-key="statusActive">نشط</span></td>
                                        <td>
                                            <a href="view_customer.php?id=1" class="action-btn btn-view" title="عرض"><i class="fas fa-eye"></i></a>
                                            <a href="edit_customer.php?id=1" class="action-btn btn-edit" title="تعديل"><i class="fas fa-edit"></i></a>
                                            <button class="action-btn btn-block" title="حظر"><i class="fas fa-ban"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="https://via.placeholder.com/40" class="customer-avatar" alt="User">
                                                <span class="fw-bold">سارة علي</span>
                                            </div>
                                        </td>
                                        <td>sara@example.com</td>
                                        <td>5 طلبات</td>
                                        <td><span class="status-badge status-blocked" data-key="statusBlocked">محظور</span></td>
                                        <td>
                                            <a href="view_customer.php?id=2" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                                            <a href="edit_customer.php?id=2" class="action-btn btn-edit"><i class="fas fa-edit"></i></a>
                                            <button class="action-btn btn-unblock" title="إلغاء الحظر"><i class="fas fa-check-circle"></i></button>
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
    <script src="script.js"></script>
    <script>
        const customerTranslations = {
            ar: { customers: 'إدارة العملاء', searchCustomer: 'البحث عن عميل...', colCustomer: 'العميل', colEmail: 'البريد الإلكتروني', colOrders: 'الطلبات', colStatus: 'الحالة', colActions: 'الإجراءات', statusActive: 'نشط', statusBlocked: 'محظور' },
            en: { customers: 'Customer Management', searchCustomer: 'Search customer...', colCustomer: 'Customer', colEmail: 'Email', colOrders: 'Orders', colStatus: 'Status', colActions: 'Actions', statusActive: 'Active', statusBlocked: 'Blocked' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = customerTranslations[lang];
            if (t) {
                document.querySelectorAll('[data-key]').forEach(el => {
                    const key = el.getAttribute('data-key');
                    if (t[key]) {
                        if (el.tagName === 'INPUT') el.placeholder = t[key];
                        else el.textContent = t[key];
                    }
                });
            }
        };
        document.addEventListener('DOMContentLoaded', () => window.updatePageContent());
    </script>
</body>
</html>
