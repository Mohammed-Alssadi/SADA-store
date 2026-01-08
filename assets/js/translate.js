// ==================== TRANSLATIONS ====================
const translations = {
    ar: {
        dashboard: 'لوحة التحكم',
        
        email: ' أدارة السلع',
        chat: 'الفئات',
        calendar: 'الطلبات',
        tasks: 'الرسائل',
        cards: 'البطاقات',
        ui: 'واجهة المستخدم',
        appsPages: 'التطبيقات والصفحات',
        components: 'المكونات',
        search: 'البحث...',
        language: 'تبديل اللغة',
        theme: 'تبديل الوضع',
        favorites: 'المفضلة',
        notifications: 'التنبيهات',
        profile: 'ملفي الشخصي',
        settings: 'الإعدادات',
        billing: 'الفواتير',
        pricing: 'التسعير',
        faq: 'الأسئلة الشائعة',
        logout: 'تسجيل الخروج',
        light: 'فاتح',
        dark: 'داكن',
        system: 'النظام',
        new: 'جديد',
        viewAll: 'عرض جميع التنبيهات',
        sales: 'المبيعات',
        customers: 'العملاء',
        products: 'المنتجات',
        revenue: 'الإيرادات',
        revenueReport: 'تقرير الإيرادات',
        distribution: 'التوزيع',
        earning: 'الإيرادات',
        expense: 'المصاريف'
    },
    en: {
        dashboard: 'Dashboard',
        email: ' Products',
        chat: 'categories',
        calendar: 'orders',
        tasks: 'Messages',
        cards: 'Cards',
        ui: 'User Interface',
        appsPages: 'Apps & Pages',
        components: 'Components',
        search: 'Search...',
        language: 'Switch Language',
        theme: 'Switch Theme',
        favorites: 'Favorites',
        notifications: 'Notifications',
        profile: 'My Profile',
        settings: 'Settings',
        billing: 'Billing',
        pricing: 'Pricing',
        faq: 'FAQ',
        logout: 'Logout',
        light: 'Light',
        dark: 'Dark',
        system: 'System',
        new: 'New',
        viewAll: 'View All Notifications',
        sales: 'Sales',
        customers: 'Customers',
        products: 'Products',
        revenue: 'Revenue',
        revenueReport: 'Revenue Report',
        distribution: 'Distribution',
        earning: 'Earning',
        expense: 'Expense'
    },
    fr: {
        dashboard: 'Tableau de bord',
        email: 'E-mail',
        chat: 'Chat',
        calendar: 'Calendrier',
        tasks: 'Tâches',
        cards: 'Cartes',
        ui: 'Interface utilisateur',
        appsPages: 'Applications et pages',
        components: 'Composants',
        search: 'Rechercher...',
        language: 'Changer de langue',
        theme: 'Changer de thème',
        favorites: 'Favoris',
        notifications: 'Notifications',
        profile: 'Mon profil',
        settings: 'Paramètres',
        billing: 'Facturation',
        pricing: 'Tarification',
        faq: 'FAQ',
        logout: 'Déconnexion',
        light: 'Clair',
        dark: 'Sombre',
        system: 'Système',
        new: 'Nouveau',
        viewAll: 'Voir toutes les notifications',
        sales: 'Ventes',
        customers: 'Clients',
        products: 'Produits',
        revenue: 'Revenu',
        revenueReport: 'Rapport de revenu',
        distribution: 'Distribution',
        earning: 'Revenus',
        expense: 'Dépenses'
    },
    de: {
        dashboard: 'Instrumententafel',
        email: 'E-Mail',
        chat: 'Chat',
        calendar: 'Kalender',
        tasks: 'Aufgaben',
        cards: 'Karten',
        ui: 'Benutzeroberfläche',
        appsPages: 'Apps & Seiten',
        components: 'Komponenten',
        search: 'Suchen...',
        language: 'Sprache wechseln',
        theme: 'Design wechseln',
        favorites: 'Favoriten',
        notifications: 'Benachrichtigungen',
        profile: 'Mein Profil',
        settings: 'Einstellungen',
        billing: 'Abrechnung',
        pricing: 'Preisgestaltung',
        faq: 'Häufig gestellte Fragen',
        logout: 'Abmelden',
        light: 'Hell',
        dark: 'Dunkel',
        system: 'System',
        new: 'Neu',
        viewAll: 'Alle Benachrichtigungen anzeigen',
        sales: 'Verkäufe',
        customers: 'Kunden',
        products: 'Produkte',
        revenue: 'Umsatz',
        revenueReport: 'Umsatzbericht',
        distribution: 'Verteilung',
        earning: 'Verdienst',
        expense: 'Ausgabe'
    }
};

let currentLanguage = 'ar';
let currentTheme = 'light';

// ==================== SIDEBAR TOGGLE ====================
const sidebar = document.getElementById('sidebar');
const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
const closeSidebarBtn = document.getElementById('closeSidebarBtn');

toggleSidebarBtn.addEventListener('click', () => {
    sidebar.classList.toggle('mini');
    localStorage.setItem('sidebarMini', sidebar.classList.contains('mini'));
});

closeSidebarBtn.addEventListener('click', () => {
    sidebar.classList.remove('active');
});

// Load sidebar state
if (localStorage.getItem('sidebarMini') === 'true') {
    sidebar.classList.add('mini');
}

// ==================== DROPDOWN MENUS ====================
function setupDropdown(btnId, menuId) {
    const btn = document.getElementById(btnId);
    const menu = document.getElementById(menuId);

    if (!btn || !menu) return;

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        // Close other menus
        document.querySelectorAll('.dropdown-menu.active').forEach(m => {
            if (m !== menu) m.classList.remove('active');
        });
        menu.classList.toggle('active');
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.remove('active');
        }
    });
}

setupDropdown('languageBtn', 'languageMenu');
setupDropdown('themeBtn', 'themeMenu');
setupDropdown('notificationsBtn', 'notificationsMenu');
setupDropdown('userProfileBtn', 'userMenu');

// ==================== LANGUAGE SWITCHER ====================
document.querySelectorAll('#languageMenu .dropdown-item').forEach(item => {
    item.addEventListener('click', () => {
        const lang = item.getAttribute('data-lang');
        changeLanguage(lang);
        document.getElementById('languageMenu').classList.remove('active');
    });
});

function changeLanguage(lang) {
    currentLanguage = lang;
    localStorage.setItem('language', lang);

    // Change HTML direction
    const html = document.documentElement;
    if (lang === 'ar') {
        html.setAttribute('lang', 'ar');
        html.setAttribute('dir', 'rtl');
    } else {
        html.setAttribute('lang', lang);
        html.setAttribute('dir', 'ltr');
    }

    // Update all text elements
    updatePageContent();
}

function updatePageContent() {
    const t = translations[currentLanguage];

    // Update placeholders and titles
    document.querySelector('.search-box input').placeholder = t.search;
    document.getElementById('languageBtn').title = t.language;
    document.getElementById('themeBtn').title = t.theme;
    document.getElementById('favoritesBtn').title = t.favorites;
    document.getElementById('notificationsBtn').title = t.notifications;

    // Update sidebar
    const navItems = document.querySelectorAll('.nav-item');
    const sidebarTexts = [
        t.dashboard,
        t.email,
        t.chat,
        t.calendar,
        t.tasks,
        t.cards,
        t.ui
    ];

    navItems.forEach((item, index) => {
        const textSpan = item.querySelector('.nav-text');
        if (textSpan && sidebarTexts[index]) {
            textSpan.textContent = sidebarTexts[index];
        }
    });

    // Update section titles
    const sectionTitles = document.querySelectorAll('.section-title');
    if (sectionTitles[0]) sectionTitles[0].textContent = t.appsPages;
    if (sectionTitles[1]) sectionTitles[1].textContent = t.components;

    // Update stat cards
    const statCards = document.querySelectorAll('.stat-card');
    const statTexts = [
        { title: t.sales, value: '245k' },
        { title: t.customers, value: '12.5k' },
        { title: t.products, value: '1.54k' },
        { title: t.revenue, value: '$88k' }
    ];

    statCards.forEach((card, index) => {
        if (statTexts[index]) {
            const h6 = card.querySelector('h6');
            if (h6) h6.textContent = statTexts[index].title;
        }
    });

    // Update chart titles
    const chartTitles = document.querySelectorAll('.card-header h5');
    if (chartTitles[0]) chartTitles[0].textContent = t.revenueReport;
    if (chartTitles[1]) chartTitles[1].textContent = t.distribution;

    // Update user menu
    const userMenuItems = document.querySelectorAll('.user-menu .dropdown-item');
    if (userMenuItems[0]) userMenuItems[0].innerHTML = `<i class="fas fa-user"></i><span>${t.profile}</span>`;
    if (userMenuItems[1]) userMenuItems[1].innerHTML = `<i class="fas fa-cog"></i><span>${t.settings}</span>`;
    if (userMenuItems[2]) userMenuItems[2].innerHTML = `<i class="fas fa-file-invoice"></i><span>${t.billing}</span><span class="badge bg-danger">4</span>`;
    if (userMenuItems[3]) userMenuItems[3].innerHTML = `<i class="fas fa-tag"></i><span>${t.pricing}</span>`;
    if (userMenuItems[4]) userMenuItems[4].innerHTML = `<i class="fas fa-question-circle"></i><span>${t.faq}</span>`;
    if (userMenuItems[5]) userMenuItems[5].innerHTML = `<i class="fas fa-sign-out-alt"></i><span>${t.logout}</span>`;

    // Update notifications menu
    const notificationsHeader = document.querySelector('.notifications-header');
    if (notificationsHeader) {
        notificationsHeader.innerHTML = `
            <h6>${t.notifications}</h6>
            <span class="badge bg-primary">8 ${t.new}</span>
        `;
    }

    const viewAllBtn = document.querySelector('.notifications-footer button');
    if (viewAllBtn) {
        viewAllBtn.textContent = t.viewAll;
    }
}

// ==================== THEME SWITCHER ====================
document.querySelectorAll('#themeMenu .dropdown-item').forEach(item => {
    item.addEventListener('click', () => {
        const theme = item.getAttribute('data-theme');
        changeTheme(theme);
        document.getElementById('themeMenu').classList.remove('active');
    });
});

function changeTheme(theme) {
    currentTheme = theme;
    localStorage.setItem('theme', theme);

    const body = document.body;
    const html = document.documentElement;

    if (theme === 'dark') {
        body.classList.add('dark-mode');
        document.getElementById('themeBtn').innerHTML = '<i class="fas fa-moon"></i>';
    } else if (theme === 'light') {
        body.classList.remove('dark-mode');
        document.getElementById('themeBtn').innerHTML = '<i class="fas fa-sun"></i>';
    } else if (theme === 'system') {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (prefersDark) {
            body.classList.add('dark-mode');
            document.getElementById('themeBtn').innerHTML = '<i class="fas fa-moon"></i>';
        } else {
            body.classList.remove('dark-mode');
            document.getElementById('themeBtn').innerHTML = '<i class="fas fa-sun"></i>';
        }
    }
}

// Load saved theme
const savedTheme = localStorage.getItem('theme') || 'light';
changeTheme(savedTheme);

// Load saved language
const savedLanguage = localStorage.getItem('language') || 'ar';
changeLanguage(savedLanguage);

// ==================== CHARTS ====================
function initCharts() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx) {
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [
                    {
                        label: 'Earning',
                        data: [150, 180, 250, 200, 160, 140, 180, 220, 200, 160],
                        backgroundColor: '#28a745',
                        borderRadius: 8,
                        borderSkipped: false
                    },
                    {
                        label: 'Expense',
                        data: [100, 120, 140, 130, 110, 100, 120, 140, 130, 120],
                        backgroundColor: '#999',
                        borderRadius: 8,
                        borderSkipped: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: 14,
                                family: "'Cairo', 'Roboto', sans-serif"
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 300,
                        ticks: {
                            font: {
                                family: "'Cairo', 'Roboto', sans-serif"
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                family: "'Cairo', 'Roboto', sans-serif"
                            }
                        }
                    }
                }
            }
        });
    }

    // Distribution Chart
    const distributionCtx = document.getElementById('distributionChart');
    if (distributionCtx) {
        new Chart(distributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Apparel', 'Electronic', 'FMCG', 'Other Sales'],
                datasets: [
                    {
                        data: [12150, 24900, 12750, 50200],
                        backgroundColor: [
                            '#667eea',
                            '#764ba2',
                            '#f093fb',
                            '#4facfe'
                        ],
                        borderColor: '#fff',
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: 14,
                                family: "'Cairo', 'Roboto', sans-serif"
                            }
                        }
                    }
                }
            }
        });
    }
}

// Initialize charts when DOM is ready
document.addEventListener('DOMContentLoaded', initCharts);

// ==================== RESPONSIVE SIDEBAR ====================
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        sidebar.classList.remove('active');
    }
});

// ==================== FAVORITES ====================
document.getElementById('favoritesBtn').addEventListener('click', () => {
    const btn = document.getElementById('favoritesBtn');
    btn.querySelector('i').classList.toggle('fas');
    btn.querySelector('i').classList.toggle('far');
});

// ==================== INIT ====================
document.addEventListener('DOMContentLoaded', () => {
    // Set initial language
    updatePageContent();

    // Add click handlers to nav items
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', () => {
            document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });

    // Close sidebar on mobile when clicking nav item
    if (window.innerWidth <= 768) {
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', () => {
                sidebar.classList.remove('active');
            });
        });
    }
});

/* --- Page-specific translations: ProductManagement --- */
const manageTranslations = {
    ar: {
        manageProducts: 'إدارة المنتجات',
        addNew: 'إضافة منتج جديد',
        searchProduct: 'البحث عن منتج...',
        colImg: 'الصورة',
        colName: 'الاسم',
        colCategory: 'الفئة',
        colQty: 'الكمية',
        colPrice: 'السعر',
        colStatus: 'الحالة',
        colActions: 'الإجراءات',
        statusActive: 'نشط',
        statusInactive: 'غير نشط'
    },
    en: {
        manageProducts: 'Manage Products',
        addNew: 'Add New Product',
        searchProduct: 'Search product...',
        colImg: 'Image',
        colName: 'Name',
        colCategory: 'Category',
        colQty: 'Qty',
        colPrice: 'Price',
        colStatus: 'Status',
        colActions: 'Actions',
        statusActive: 'Active',
        statusInactive: 'Inactive'
    }
};
const _originalUpdate = window.updatePageContent;
window.updatePageContent = function() {
    if (typeof _originalUpdate === 'function') _originalUpdate();
    const lang = localStorage.getItem('language') || 'ar';
    const t = manageTranslations[lang];
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

/* end manage translations */

/* --- Page-specific translations: orders --- */
const orderTranslations = {
    ar: { manageOrders: 'إدارة الطلبات', searchOrder: 'البحث برقم الطلب أو العميل...', allStatus: 'كل الحالات', colOrderId: 'رقم الطلب', colCustomer: 'العميل', colDate: 'التاريخ', colTotal: 'الإجمالي', colStatus: 'الحالة', colActions: 'الإجراءات', statusPending: 'قيد الانتظار', statusShipped: 'تم الشحن', statusDelivered: 'تم التوصيل', view: 'عرض' },
    en: { manageOrders: 'Manage Orders', searchOrder: 'Search by order ID or customer...', allStatus: 'All Status', colOrderId: 'Order ID', colCustomer: 'Customer', colDate: 'Date', colTotal: 'Total', colStatus: 'Status', colActions: 'Actions', statusPending: 'Pending', statusShipped: 'Shipped', statusDelivered: 'Delivered', view: 'View' }
};
const __originalUpdate = window.updatePageContent;
window.updatePageContent = function() {
    if (typeof __originalUpdate === 'function') __originalUpdate();
    const lang = localStorage.getItem('language') || 'ar';
    const t = orderTranslations[lang];
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

/* end orders translations */

/* --- Page-specific translations: edit_category --- */
const editCatTranslations = {
    ar: { editCat: 'تعديل الفئة', cancel: 'إلغاء', labelName: 'اسم الفئة', labelStatus: 'الحالة', labelDesc: 'الوصف', labelImg: 'تحديث الصورة', save: 'حفظ التغييرات', statusActive: 'نشط', statusInactive: 'غير نشط' },
    en: { editCat: 'Edit Category', cancel: 'Cancel', labelName: 'Category Name', labelStatus: 'Status', labelDesc: 'Description', labelImg: 'Update Image', save: 'Save Changes', statusActive: 'Active', statusInactive: 'Inactive' }
};
const ___originalUpdate = window.updatePageContent;
window.updatePageContent = function() {
    if (typeof ___originalUpdate === 'function') ___originalUpdate();
    const lang = localStorage.getItem('language') || 'ar';
    const t = editCatTranslations[lang];
    if (t) {
        document.querySelectorAll('[data-key]').forEach(el => {
            const key = el.getAttribute('data-key');
            if (t[key]) el.textContent = t[key];
        });
    }
};
document.addEventListener('DOMContentLoaded', () => window.updatePageContent());

/* end edit_category translations */

/* --- Page-specific translations: categories --- */
const catTranslations = {
    ar: { manageCategories: 'إدارة الفئات', addNewCat: 'إضافة فئة جديدة', searchCat: 'البحث عن فئة...', allStatus: 'كل الحالات', colImg: 'الصورة', colName: 'الاسم', colDesc: 'الوصف', colStatus: 'الحالة', colActions: 'الإجراءات', statusActive: 'نشط', statusInactive: 'غير نشط' },
    en: { manageCategories: 'Manage Categories', addNewCat: 'Add New Category', searchCat: 'Search category...', allStatus: 'All Status', colImg: 'Image', colName: 'Name', colDesc: 'Description', colStatus: 'Status', colActions: 'Actions', statusActive: 'Active', statusInactive: 'Inactive' }
};
const ____originalUpdate = window.updatePageContent;
window.updatePageContent = function() {
    if (typeof ____originalUpdate === 'function') ____originalUpdate();
    const lang = localStorage.getItem('language') || 'ar';
    const t = catTranslations[lang];
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

/* end categories translations */

/* --- Utilities and page helpers moved from individual pages --- */
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId) || document.getElementById('preview');
    if (!preview) return;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

/* add_product translations */
const addProductTranslations = {
    ar: {
        addProduct: 'إضافة سلعة',
        pageTitle: 'إضافة سلعة جديدة',
        pageSubtitle: 'قم بتعبئة البيانات أدناه لإضافة منتج جديد إلى المتجر',
        labelName: 'اسم السلعة',
        labelCategory: 'الفئة (Category)',
        selectCategory: 'اختر الفئة',
        labelQuantity: 'الكمية',
        labelPrice: 'السعر',
        labelDiscount: 'الخصم',
        labelStatus: 'الحالة',
        statusActive: 'نشط',
        statusInactive: 'غير نشط',
        statusOutOfStock: 'نفذت الكمية',
        labelDesc: 'الوصف',
        labelImages: 'صور المنتج (3 صور)',
        uploadImg1: 'الصورة 1',
        uploadImg2: 'الصورة 2',
        uploadImg3: 'الصورة 3',
        btnReset: 'إعادة تعيين',
        btnSubmit: 'إضافة المنتج',
        searchPlaceholder: 'البحث...'
    },
    en: {
        addProduct: 'Add Product',
        pageTitle: 'Add New Product',
        pageSubtitle: 'Fill in the details below to add a new product to the store',
        labelName: 'Product Name',
        labelCategory: 'Category',
        selectCategory: 'Select Category',
        labelQuantity: 'Quantity',
        labelPrice: 'Price',
        labelDiscount: 'Discount',
        labelStatus: 'Status',
        statusActive: 'Active',
        statusInactive: 'Inactive',
        statusOutOfStock: 'Out of Stock',
        labelDesc: 'Description',
        labelImages: 'Product Images (3 images)',
        uploadImg1: 'Image 1',
        uploadImg2: 'Image 2',
        uploadImg3: 'Image 3',
        btnReset: 'Reset',
        btnSubmit: 'Add Product',
        searchPlaceholder: 'Search...'
    }
};

/* add_category translations */
const addCatTranslations = {
    ar: { addNewCat: 'إضافة فئة جديدة', cancel: 'إلغاء', labelName: 'اسم الفئة', labelStatus: 'الحالة', labelDesc: 'الوصف', labelImg: 'صورة الفئة', uploadImg: 'اختر صورة', save: 'حفظ الفئة', statusActive: 'نشط', statusInactive: 'غير نشط' },
    en: { addNewCat: 'Add New Category', cancel: 'Cancel', labelName: 'Category Name', labelStatus: 'Status', labelDesc: 'Description', labelImg: 'Category Image', uploadImg: 'Choose Image', save: 'Save Category', statusActive: 'Active', statusInactive: 'Inactive' }
};

/* integrate page translations into updatePageContent by enhancing existing function */
const _prevUpdate = window.updatePageContent;
window.updatePageContent = function() {
    if (typeof _prevUpdate === 'function') _prevUpdate();
    const lang = localStorage.getItem('language') || 'ar';

    // add_product
    const ap = addProductTranslations[lang];
    if (ap) {
        document.querySelectorAll('[data-key]').forEach(el => {
            const key = el.getAttribute('data-key');
            if (ap[key]) {
                if (el.tagName === 'INPUT' && el.getAttribute('placeholder')) el.placeholder = ap[key];
                else el.textContent = ap[key];
            }
        });
    }

    // add_category
    const ac = addCatTranslations[lang];
    if (ac) {
        document.querySelectorAll('[data-key]').forEach(el => {
            const key = el.getAttribute('data-key');
            if (ac[key]) el.textContent = ac[key];
        });
    }
};
document.addEventListener('DOMContentLoaded', () => window.updatePageContent());

/* end moved utilities */
