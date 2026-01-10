


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SADA store</title>
    <style>
    .nav-item a {
    text-decoration: none; /* إزالة الخط */
    color: inherit;        /* يخلي اللون مثل النص */
}
.nav-item a:hover {
    text-decoration: none; /* إزالة الخط */
    color: inherit;        /* يخلي اللون مثل النص */
}


    </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Cairo:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/admin_styles.css">
 
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <i class="fas fa-bolt text-warning fs-2"></i>
                    <a href="../index.php" class="text-primary fs-3 ">SADA </a>
                </div>
                <button class="btn-close-sidebar" id="closeSidebarBtn">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <a href="index.php">
                    <div class="nav-item "> 
                        <i class="fas fa-home"></i>
                        <span class="nav-text">لوحة التحكم</span>
                    </div>
                </a>
                </div>

                <div class="nav-section">
                    <div class="section-title">التطبيقات والصفحات</div>
                    
                    <a href="ProductManagement.php">
                    <div class="nav-item ">
                        <i class="fas fa-tasks"></i>
                         
                        <span class="nav-text">أدارة السلع</span>
                    </div>
                </a>
                <a href="categories.php">
                    <div class="nav-item">
                        <i class="fas fa-envelope"></i>
                      
                        <span class="nav-text">الفئات</span>
                    </div>
                </a>
                <a href="orders.php">
                    <div class="nav-item">
                        <i class="fas fa-calendar"></i>
                       
                        <span class="nav-text"> الطلبات</span>
                    </div>
                </a>
                <a href="messages.php">
                    <div class="nav-item">
                        <i class="fas fa-comments"></i>
                         
                        <span class="nav-text">الرسائل</span>
                    </div>
                </a>
                    <!-- <div class="nav-item">
                        <i class="fas fa-envelope"></i>
                        <span class="nav-text">البريد الإلكتروني</span>
                    </div>
                    <div class="nav-item">
                        <i class="fas fa-comments"></i>
                        <span class="nav-text">الدردشة</span>
                    </div>
                    <div class="nav-item">
                        <i class="fas fa-calendar"></i>
                        <span class="nav-text">التقويم</span>
                    </div>
                    <div class="nav-item">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-text">المهام</span>
                    </div> -->
                </div>
                

                <div class="nav-section">
                    <div class="section-title">المكونات</div>
                    <div class="nav-item">
                        <i class="fas fa-credit-card"></i>
                        <span class="nav-text">البطاقات</span>
                    </div>
                    <div class="nav-item">
                        <i class="fas fa-cube"></i>
                        <span class="nav-text">واجهة المستخدم</span>
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
                        <input type="text" placeholder="البحث...">
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
                            <div class="dropdown-item" data-lang="fr">
                                <span>Français</span>
                            </div>
                            <div class="dropdown-item" data-lang="de">
                                <span>Deutsch</span>
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
                                <span>فاتح</span>
                            </div>
                            <div class="dropdown-item" data-theme="dark">
                                <i class="fas fa-moon"></i>
                                <span>داكن</span>
                            </div>
                            <div class="dropdown-item" data-theme="system">
                                <i class="fas fa-desktop"></i>
                                <span>النظام</span>
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
                                <h6>التنبيهات</h6>
                                <span class="badge bg-primary">8 جديد</span>
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
                                <div class="notification-item">
                                    <div class="notification-avatar">
                                        <div class="avatar-initials">CF</div>
                                    </div>
                                    <div class="notification-content">
                                        <h6>تشارلز فرانكلين</h6>
                                        <p>قبل طلب الاتصال الخاص بك</p>
                                        <small>منذ 12 ساعة</small>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <div class="notification-avatar">
                                        <img src="https://via.placeholder.com/40" alt="User">
                                    </div>
                                    <div class="notification-content">
                                        <h6>رسالة جديدة 📧</h6>
                                        <p>لديك رسالة جديدة من ناتالي</p>
                                        <small>منذ ساعة</small>
                                    </div>
                                </div>
                            </div>
                            <div class="notifications-footer">
                                <button class="btn btn-sm btn-primary w-100">عرض جميع التنبيهات</button>
                            </div>
                        </div>
                    </div>

                    <!-- User Profile -->
                    <div class="header-icon-group">
                        <button class="header-icon user-profile-btn" id="userProfileBtn">
                            <img src="../uploads/users/user.png" alt="User" class="user-avatar">
                        </button>
                        <div class="dropdown-menu user-menu" id="userMenu">
                            <div class="user-info">
                                <img src="../uploads/users/user.png" alt="User" class="user-avatar-large">
                                <div class="user-details">
                                    <h6>جون دو</h6>
                                    <p>مسؤول</p>
                                </div>
                            </div>
                            <hr>
                            <div class="dropdown-item">
                                <i class="fas fa-user"></i>
                                <span>ملفي الشخصي</span>
                            </div>
                            <div class="dropdown-item">
                                <i class="fas fa-cog"></i>
                                <span>الإعدادات</span>
                            </div>
                            <div class="dropdown-item">
                                <i class="fas fa-file-invoice"></i>
                                <span>الفواتير</span>
                                <span class="badge bg-danger">4</span>
                            </div>
                            <div class="dropdown-item">
                                <i class="fas fa-tag"></i>
                                <span>التسعير</span>
                            </div>
                            <div class="dropdown-item">
                                <i class="fas fa-question-circle"></i>
                                <span>الأسئلة الشائعة</span>
                            </div>
                            <hr>
                            <div class="dropdown-item logout-btn">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>تسجيل الخروج</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
