<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materio Dashboard</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Cairo:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <i class="fas fa-cube"></i>
                    <span class="logo-text">MATERIO</span>
                </div>
                <button class="btn-close-sidebar" id="closeSidebarBtn">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                        <a href="index.php">
                            <i class="fas fa-home"></i>
                            <span class="nav-text" data-i18n="dashboard">لوحة التحكم</span>
                        </a>
                    </div>
                </div>

                <div class="nav-section">
                    <div class="section-title" data-i18n="appsPages">التطبيقات والصفحات</div>
                    
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'ProductManagement.php') ? 'active' : ''; ?>">
                        <a href="ProductManagement.php">
                            <i class="fas fa-box"></i>
                            <span class="nav-text" data-i18n="products">إدارة السلع</span>
                        </a>
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'categories.php') ? 'active' : ''; ?>">
                        <a href="categories.php">
                            <i class="fas fa-tags"></i>
                            <span class="nav-text" data-i18n="categories">الفئات</span>
                        </a>
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'shipping_companies.php') ? 'active' : ''; ?>">
                        <a href="shipping_companies.php">
                            <i class="fas fa-truck-moving"></i>
                            <span class="nav-text" data-i18n="shippingCompanies">شركات الشحن</span>
                        </a>
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'orders.php') ? 'active' : ''; ?>">
                        <a href="orders.php">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="nav-text" data-i18n="orders">الطلبات</span>
                        </a>
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'messages.php') ? 'active' : ''; ?>">
                        <a href="messages.php">
                            <i class="fas fa-envelope"></i>
                            <span class="nav-text" data-i18n="messages">الرسائل</span>
                        </a>
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'reports.php') ? 'active' : ''; ?>">
                        <a href="reports.php">
                            <i class="fas fa-chart-bar"></i>
                            <span class="nav-text" data-i18n="reports">التقارير</span>
                        </a>
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'offers.php') ? 'active' : ''; ?>">
                        <a href="offers.php">
                            <i class="fas fa-percentage"></i>
                            <span class="nav-text" data-i18n="offers">العروض</span>
                        </a>
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'reviews.php') ? 'active' : ''; ?>">
                        <a href="reviews.php">
                            <i class="fas fa-star"></i>
                            <span class="nav-text" data-i18n="reviews">التقييمات</span>
                        </a>
                    </div>
                </div>
                
                <div class="nav-section">
                    <div class="section-title" data-i18n="components">المكونات</div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'inventory.php') ? 'active' : ''; ?>">
                        <a href="inventory.php">
                            <i class="fas fa-warehouse"></i>
                            <span class="nav-text" data-i18n="inventory">المخزون</span>
                        </a>
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'customers.php') ? 'active' : ''; ?>">
                        <a href="customers.php">
                            <i class="fas fa-users"></i>
                            <span class="nav-text" data-i18n="customers">العملاء</span>
                        </a>
                    </div>
                    <div class="nav-item nav-with-children <?php echo (in_array(basename($_SERVER['PHP_SELF']), ['payments.php','payment_gateways.php','payment_methods.php'])) ? 'active' : ''; ?>">
                        <a href="payments.php">
                            <i class="fas fa-credit-card"></i>
                            <span class="nav-text" data-i18n="payments">المدفوعات</span>
                        </a>
                        
                    </div>
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'settings.php') ? 'active' : ''; ?>">
                        <a href="settings.php">
                            <i class="fas fa-cog"></i>
                            <span class="nav-text" data-i18n="settings">الإعدادات</span>
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="btn-toggle-sidebar" id="toggleSidebarBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="البحث..." data-i18n="search">
                    </div>
                </div>

                <div class="header-right">
                    <!-- Language Switcher -->
                    <div class="header-icon-group">
                        <button class="header-icon" id="languageBtn" title="تبديل اللغة">
                            <i class="fas fa-language"></i>
                        </button>
                        <div class="dropdown-menu language-menu" id="languageMenu">
                            <div class="dropdown-item" data-lang="ar">
                                <span>العربية</span>
                            </div>
                            <div class="dropdown-item" data-lang="en">
                                <span>English</span>
                            </div>
                        </div>
                    </div>

                    <!-- Theme Switcher -->
                    <div class="header-icon-group">
                        <button class="header-icon" id="themeBtn" title="تبديل الوضع">
                            <i class="fas fa-sun"></i>
                        </button>
                        <div class="dropdown-menu theme-menu" id="themeMenu">
                            <div class="dropdown-item" data-theme="light">
                                <i class="fas fa-sun"></i>
                                <span data-i18n="light">فاتح</span>
                            </div>
                            <div class="dropdown-item" data-theme="dark">
                                <i class="fas fa-moon"></i>
                                <span data-i18n="dark">داكن</span>
                            </div>
                            <div class="dropdown-item" data-theme="system">
                                <i class="fas fa-desktop"></i>
                                <span data-i18n="system">النظام</span>
                            </div>
                        </div>
                    </div>

                    <!-- Favorites -->
                    <button class="header-icon" id="favoritesBtn" title="المفضلة">
                        <i class="far fa-star"></i>
                    </button>

                    <!-- Notifications -->
                    <div class="header-icon-group">
                        <button class="header-icon notification-btn" id="notificationsBtn" title="التنبيهات">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">8</span>
                        </button>
                        <div class="dropdown-menu notifications-menu" id="notificationsMenu">
                            <div class="notifications-header">
                                <h6 data-i18n="notifications">التنبيهات</h6>
                                <span class="badge bg-primary">8 <span data-i18n="new">جديد</span></span>
                            </div>
                            <div class="notifications-list">
                                <div class="notification-item">
                                    <div class="notification-avatar">
                                        <img src="https://via.placeholder.com/40" alt="User">
                                    </div>
                                    <div class="notification-content">
                                        <h6>تهانينا ليتي 🎉</h6>
                                        <p>فزت بشارة الأفضل شهرياً</p>
                                        <small>منذ ساعة</small>
                                    </div>
                                </div>
                            </div>
                            <div class="notifications-footer">
                                <button class="btn btn-sm btn-primary w-100" data-i18n="viewAll">عرض جميع التنبيهات</button>
                            </div>
                        </div>
                    </div>

                    <!-- User Profile -->
                    <div class="header-icon-group">
                        <button class="header-icon user-profile-btn" id="userProfileBtn">
                            <img src="https://via.placeholder.com/40" alt="User" class="user-avatar">
                        </button>
                        <div class="dropdown-menu user-menu" id="userMenu">
                            <div class="user-info">
                                <img src="https://via.placeholder.com/50" alt="User" class="user-avatar-large">
                                <div class="user-details">
                                    <h6>جون دو</h6>
                                    <p>مسؤول</p>
                                </div>
                            </div>
                            <hr>
                            <div class="dropdown-item">
                                <i class="fas fa-user"></i>
                                <span data-i18n="profile">ملفي الشخصي</span>
                            </div>
                            <a href="settings.php">
                                <div class="dropdown-item">
                                    <i class="fas fa-cog"></i>
                                    <span data-i18n="settings">الإعدادات</span>
                                </div>
                            </a>
                            <a href="payments.php">
                                <div class="dropdown-item">
                                    <i class="fas fa-file-invoice"></i>
                                    <span data-i18n="billing">الفواتير</span>
                                    <span class="badge bg-danger">4</span>
                                </div>
                            </a>
                            <a href="cms.php">
                                <div class="dropdown-item">
                                    <i class="fas fa-tag"></i>
                                    <span data-i18n="pricing">التسعير</span>
                                </div>
                            </a>
                            <div class="dropdown-item">
                                <i class="fas fa-question-circle"></i>
                                <span data-i18n="faq">الأسئلة الشائعة</span>
                            </div>
                            <hr>
                            <div class="dropdown-item logout-btn">
                                <i class="fas fa-sign-out-alt"></i>
                                <span data-i18n="logout">تسجيل الخروج</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
