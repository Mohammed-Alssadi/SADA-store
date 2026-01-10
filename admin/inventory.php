<?php
include("header.php");
// invento
?>


            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="inventory">إدارة المخزون</h4>
                        <div class="search-box m-0"><i class="fas fa-search"></i><input type="text" placeholder="البحث عن سلعة..." data-key="searchItem"></div>
                    </div>

                    <!-- Stock Alerts -->
                    <div class="stock-alert">
                        <i class="fas fa-exclamation-triangle fa-lg"></i>
                        <div>
                            <strong data-key="alertTitle">تنبيه: سلع أوشكت على النفاد!</strong>
                            <p class="mb-0 small" data-key="alertDesc">هناك 3 سلع كميتها أقل من الحد الأدنى المسموح به.</p>
                        </div>
                    </div>

                    <div class="inventory-card">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th data-key="colProduct">المنتج</th>
                                        <th data-key="colCategory">الفئة</th>
                                        <th data-key="colCurrentStock">المخزون الحالي</th>
                                        <th data-key="colStatus">الحالة</th>
                                        <th data-key="colActions">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="https://via.placeholder.com/40" class="rounded" alt="Product">
                                                <span class="fw-bold">آيفون 15 برو</span>
                                            </div>
                                        </td>
                                        <td>إلكترونيات</td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <div class="d-flex justify-content-between small"><span>5 / 100</span><span class="stock-low">5%</span></div>
                                                <div class="progress"><div class="progress-bar bg-danger" style="width: 5%"></div></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-light-danger text-danger" data-key="lowStock">مخزون منخفض</span></td>
                                        <td>
                                            <a href="update_stock.php?id=1" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle me-1"></i><span data-key="update">تحديث</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="https://via.placeholder.com/40" class="rounded" alt="Product">
                                                <span class="fw-bold">سماعات سوني</span>
                                            </div>
                                        </td>
                                        <td>إلكترونيات</td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <div class="d-flex justify-content-between small"><span>85 / 100</span><span class="stock-good">85%</span></div>
                                                <div class="progress"><div class="progress-bar bg-success" style="width: 85%"></div></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-light-success text-success" data-key="inStock">متوفر</span></td>
                                        <td>
                                            <a href="update_stock.php?id=2" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle me-1"></i><span data-key="update">تحديث</span></a>
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
        const inventoryTranslations = {
            ar: { inventory: 'إدارة المخزون', searchItem: 'البحث عن سلعة...', alertTitle: 'تنبيه: سلع أوشكت على النفاد!', alertDesc: 'هناك 3 سلع كميتها أقل من الحد الأدنى المسموح به.', colProduct: 'المنتج', colCategory: 'الفئة', colCurrentStock: 'المخزون الحالي', colStatus: 'الحالة', colActions: 'الإجراءات', lowStock: 'مخزون منخفض', inStock: 'متوفر', update: 'تحديث', stockHistory: 'سجل الحركة' },
            en: { inventory: 'Inventory Management', searchItem: 'Search item...', alertTitle: 'Alert: Items running out!', alertDesc: 'There are 3 items below the minimum stock level.', colProduct: 'Product', colCategory: 'Category', colCurrentStock: 'Current Stock', colStatus: 'Status', colActions: 'Actions', lowStock: 'Low Stock', inStock: 'In Stock', update: 'Update', stockHistory: 'Stock History' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = inventoryTranslations[lang];
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
