<?php
// stock_history.php
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سجل حركة المخزون - MATERIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Cairo:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .history-card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); }
        body.dark-mode .history-card { background: #2a2a2a; }
        .type-in { color: #28a745; font-weight: 600; }
        .type-out { color: #dc3545; font-weight: 600; }
    </style>
</head>
<body>
    <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo-container"><i class="fas fa-cube"></i><span class="logo-text">MATERIO</span></div>
                <button class="btn-close-sidebar" id="closeSidebarBtn"><i class="fas fa-times"></i></button>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <a href="inventory.php" class="nav-item"><i class="fas fa-boxes"></i><span class="nav-text" data-key="inventory">إدارة المخزون</span></a>
                    <a href="stock_history.php" class="nav-item active"><i class="fas fa-history"></i><span class="nav-text" data-key="stockHistory">سجل الحركة</span></a>
                </div>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="header-left"><button class="btn-toggle-sidebar" id="toggleSidebarBtn"><i class="fas fa-bars"></i></button></div>
            </header>

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="stockHistory">سجل حركة المخزون</h4>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary btn-sm"><i class="fas fa-file-export me-1"></i><span data-key="export">تصدير</span></button>
                        </div>
                    </div>

                    <div class="history-card">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th data-key="colDate">التاريخ</th>
                                        <th data-key="colProduct">المنتج</th>
                                        <th data-key="colType">النوع</th>
                                        <th data-key="colQty">الكمية</th>
                                        <th data-key="colReason">السبب</th>
                                        <th data-key="colUser">بواسطة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2026-01-03 11:20 ص</td>
                                        <td>آيفون 15 برو</td>
                                        <td><span class="type-in" data-key="in">دخول (+)</span></td>
                                        <td>+50</td>
                                        <td>توريد جديد</td>
                                        <td>أدمن</td>
                                    </tr>
                                    <tr>
                                        <td>2026-01-02 09:45 ص</td>
                                        <td>سماعات سوني</td>
                                        <td><span class="type-out" data-key="out">خروج (-)</span></td>
                                        <td>-2</td>
                                        <td>طلب عميل #ORD-5521</td>
                                        <td>النظام</td>
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
        const historyTranslations = {
            ar: { stockHistory: 'سجل حركة المخزون', export: 'تصدير', colDate: 'التاريخ', colProduct: 'المنتج', colType: 'النوع', colQty: 'الكمية', colReason: 'السبب', colUser: 'بواسطة', in: 'دخول (+)', out: 'خروج (-)', inventory: 'إدارة المخزون' },
            en: { stockHistory: 'Stock History', export: 'Export', colDate: 'Date', colProduct: 'Product', colType: 'Type', colQty: 'Qty', colReason: 'Reason', colUser: 'By', in: 'In (+)', out: 'Out (-)', inventory: 'Inventory Management' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = historyTranslations[lang];
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
