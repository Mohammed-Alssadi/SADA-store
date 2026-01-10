
    <!-- <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo-container"><i class="fas fa-cube"></i><span class="logo-text">MATERIO</span></div>
                <button class="btn-close-sidebar" id="closeSidebarBtn"><i class="fas fa-times"></i></button>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <a href="orders.php" class="nav-item active"><i class="fas fa-shopping-cart"></i><span class="nav-text" data-key="manageOrders">إدارة الطلبات</span></a>
                </div>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header"> -->
                <?php include ("../include/template/headerAdmin.php") ?>
                <!-- <div class="header-left"><button class="btn-toggle-sidebar" id="toggleSidebarBtn"><i class="fas fa-bars"></i></button></div>
            </header> -->

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="viewOrder">تفاصيل الطلب #ORD-7742</h4>
                        <a href="orders.php" class="btn btn-outline-secondary"><span data-key="back">العودة</span></a>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="order-card">
                                <h6 class="mb-4" data-key="orderItems">المنتجات المطلوبة</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th data-key="colProduct">المنتج</th>
                                                <th data-key="colPrice">السعر</th>
                                                <th data-key="colQty">الكمية</th>
                                                <th data-key="colTotal">الإجمالي</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>آيفون 15 برو</td>
                                                <td>$999.00</td>
                                                <td>1</td>
                                                <td>$999.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="order-card">
                                <h6 class="mb-4" data-key="customerInfo">معلومات العميل</h6>
                                <div class="info-label" data-key="labelCustomer">العميل</div>
                                <div class="info-value">أحمد محمد</div>
                                <div class="info-label" data-key="labelEmail">البريد الإلكتروني</div>
                                <div class="info-value">ahmed@example.com</div>
                                <div class="info-label" data-key="labelPhone">الهاتف</div>
                                <div class="info-value">+966 50 000 0000</div>
                                <hr>
                                <div class="info-label" data-key="labelStatus">حالة الطلب</div>
                                <div class="info-value"><span class="badge bg-primary" data-key="statusPending">قيد الانتظار</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
 <?php include_once("../include/template/footerAdmin.php"); 
