<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SADA Dashboard</title>
    
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
                  
                     <a href="../index.php" class="text-decoration-none">
                        <h2 class="fw-bold text-dark m-0">
                            <i class="fas fa-bolt text-warning me-1"></i>SADA
                        </h2>
                    </a>
                </div>
                <button class="btn-close-sidebar" id="closeSidebarBtn">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <a href="index.php">
                <div class="nav-section">
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                            <i class="fas fa-home"></i>
                            <span class="nav-text" data-i18n="dashboard">لوحة التحكم</span>
                        </div>
                    </a>
                </div>

                <div class="nav-section">
                
                    
                    <a href="ProductManagement.php">
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'ProductManagement.php') ? 'active' : ''; ?>">
                            <i class="fas fa-box"></i>
                            <span class="nav-text" data-i18n="products">إدارة السلع</span>
                        </div>
                    </a>
                    <a href="categories.php">
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'categories.php') ? 'active' : ''; ?>">
                            <i class="fas fa-tags"></i>
                            <span class="nav-text" data-i18n="categories">الفئات</span>
                        </div>
                    </a>
           
            
            
             
                    <a href="customers.php">
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'customers.php') ? 'active' : ''; ?>">
                            <i class="fas fa-users"></i>
                            <span class="nav-text" data-i18n="customers">العملاء</span>
                        </div>
                    </a>
                      <a href="comments.php">
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'messages.php') ? 'active' : ''; ?>">
                      
                            <i class="fas fa-envelope"></i>
                            <span class="nav-text" data-i18n="reviews">التعليقات</span>
                       
                    </div>
                     </a>
             
                    <a href="../settings.php">
                    <div class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'settings.php') ? 'active' : ''; ?>">
                            <i class="fas fa-cog"></i>
                            <span class="nav-text" data-i18n="settings">الإعدادات</span>
                        </a>
                
            
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
                                        <img src="user.png" alt="User">
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
                                <img src="../uploads/users/<?php echo $_SESSION['profile_image']; ?>" alt="User" class="user-avatar-large">
                        </button>
                        <div class="dropdown-menu user-menu" id="userMenu">
                            <div class="user-info">
                                <img src="../uploads/users/<?php echo $_SESSION['profile_image']; ?>" alt="User" class="user-avatar-large">
                                <div class="user-details">
                                    <h6><?php echo $_SESSION['usename']; ?></h6>
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
                            <a href="../logout.php">
                            <div class="dropdown-item logout-btn">
                                <i class="fas fa-sign-out-alt"></i>
                                <span data-i18n="logout">تسجيل الخروج</span>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
