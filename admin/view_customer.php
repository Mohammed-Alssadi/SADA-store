<?php
include("header.php");
?>


    

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="customerDetails">تفاصيل العميل</h4>
                        <a href="customers.php" class="btn btn-outline-secondary"><span data-key="back">العودة</span></a>
                    </div>

                    <div class="row">
                        <!-- Customer Profile Info -->
                        <div class="col-md-4 mb-4">
                            <div class="profile-card">
                                <div class="profile-header">
                                    <img src="https://via.placeholder.com/120" class="profile-avatar" alt="User">
                                    <h5 class="mb-1">أحمد محمد</h5>
                                    <span class="badge bg-light-success text-success px-3" data-key="statusActive">نشط</span>
                                </div>
                                <div class="info-group">
                                    <div class="info-label" data-key="colEmail">البريد الإلكتروني</div>
                                    <div class="info-value">ahmed@example.com</div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label" data-key="phone">الهاتف</div>
                                    <div class="info-value">+966 50 123 4567</div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label" data-key="address">العنوان</div>
                                    <div class="info-value">الرياض، المملكة العربية السعودية</div>
                                </div>
                                <div class="mt-4">
                                    <a href="edit_customer.php?id=1" class="btn btn-primary w-100 mb-2" data-key="edit">تعديل البيانات</a>
                                    <button class="btn btn-outline-danger w-100" data-key="block">حظر العميل</button>
                                </div>
                            </div>
                        </div>

                        <!-- Order History -->
                        <div class="col-md-8">
                            <div class="order-history-card">
                                <h5 class="mb-4" data-key="orderHistory">سجل الطلبات</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th data-key="orderId">رقم الطلب</th>
                                                <th data-key="date">التاريخ</th>
                                                <th data-key="amount">المبلغ</th>
                                                <th data-key="status">الحالة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#ORD-5521</td>
                                                <td>2026-01-02</td>
                                                <td>$250.00</td>
                                                <td><span class="badge bg-success">مكتمل</span></td>
                                            </tr>
                                            <tr>
                                                <td>#ORD-4410</td>
                                                <td>2025-12-20</td>
                                                <td>$120.00</td>
                                                <td><span class="badge bg-success">مكتمل</span></td>
                                            </tr>
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
    <script src="script.js"></script>
    <script>
        const viewCustomerTranslations = {
            ar: { customerDetails: 'تفاصيل العميل', back: 'العودة', colEmail: 'البريد الإلكتروني', phone: 'الهاتف', address: 'العنوان', edit: 'تعديل البيانات', block: 'حظر العميل', orderHistory: 'سجل الطلبات', orderId: 'رقم الطلب', date: 'التاريخ', amount: 'المبلغ', status: 'الحالة', statusActive: 'نشط' },
            en: { customerDetails: 'Customer Details', back: 'Back', colEmail: 'Email', phone: 'Phone', address: 'Address', edit: 'Edit Profile', block: 'Block Customer', orderHistory: 'Order History', orderId: 'Order ID', date: 'Date', amount: 'Amount', status: 'Status', statusActive: 'Active' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = viewCustomerTranslations[lang];
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
