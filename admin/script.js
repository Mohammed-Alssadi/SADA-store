// Consolidated translations and page-specific translation sets
const translations = {
    ar: {
        dashboard: 'لوحة التحكم',
        products: 'إدارة السلع',
        categories: 'الفئات',
        orders: 'الطلبات',
        Reviws: 'التقييمات',
        reports: 'التقارير',
        offers: 'العروض',
        reviews: 'التقييمات',
        inventory: 'المخزون',
        customers: 'العملاء',
        settings: 'الإعدادات',
        payments: 'المدفوعات',
        cms: 'إدارة المحتوى',
        search: 'البحث...',
        language: 'تبديل اللغة',
        theme: 'تبديل الوضع',
        logout: 'تسجيل الخروج',
        light: 'فاتح',
        dark: 'داكن',
        viewAll: 'عرض جميع التنبيهات'
    },
    en: {
        dashboard: 'Dashboard',
        products: 'Products',
        categories: 'Categories',
        orders: 'Orders',
        messages: '',
        reports: 'Reports',
        offers: 'Offers',
        reviews: 'reviews',
        inventory: 'Inventory',
        customers: 'Customers',
        settings: 'Settings',
        payments: 'Payments',
        cms: 'CMS',
        search: 'Search...',
        language: 'Switch Language',
        theme: 'Switch Theme',
        logout: 'Logout',
        light: 'Light',
        dark: 'Dark',
        viewAll: 'View All Notifications'
    }
};

// Additional dashboard-specific keys
translations.ar.systemOverview = 'نظرة عامة على النظام';
translations.en.systemOverview = 'System Overview';
translations.ar.liveData = 'بيانات مباشرة من قاعدة البيانات';
translations.en.liveData = 'Live data from database';
translations.ar.productStatus = 'حالة المنتج';
translations.en.productStatus = 'Product Status';
translations.ar.usersVsComments = 'المستخدمون مقابل التعليقات';
translations.en.usersVsComments = 'Users vs Comments';
translations.ar.available = 'متاح';
translations.en.available = 'Available';
translations.ar.unavailable = 'غير متاح';
translations.en.unavailable = 'Unavailable';
translations.ar.comments = 'التعليقات';
translations.en.comments = 'Comments';

const addProductTranslations = {
    ar: {
        addProduct: 'إضافة سلعة',
        pageTitle: 'إضافة سلعة جديدة',
        pageSubtitle: 'قم بتعبئة البيانات أدناه لإضافة منتج جديد إلى المتجر',
        labelName: 'اسم السلعة',
        labelCategory: 'الفئة',
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
        searchPlaceholder: 'البحث...',
        systemOverview: 'نظرة عامة على النظام',
        productStatus: 'حالة المنتج'
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
        searchPlaceholder: 'Search...',
        systemOverview : 'System Overview',
        productStatus : 'Product Status'

    }
};

const addCatTranslations = {
    ar: { addNewCat: 'إضافة فئة جديدة', cancel: 'إلغاء', labelName: 'اسم الفئة', labelStatus: 'الحالة', labelDesc: 'الوصف', labelImg: 'صورة الفئة', uploadImg: 'اختر صورة', save: 'حفظ الفئة', statusActive: 'نشط', statusInactive: 'غير نشط' },
    en: { addNewCat: 'Add New Category', cancel: 'Cancel', labelName: 'Category Name', labelStatus: 'Status', labelDesc: 'Description', labelImg: 'Category Image', uploadImg: 'Choose Image', save: 'Save Category', statusActive: 'Active', statusInactive: 'Inactive' }
};

const addUserTranslations = {
    ar: {
        addNewCustomer: 'إضافة عميل جديد',
        cancel: 'إلغاء',
        personalInfo: 'المعلومات الشخصية',
        fullName: 'الاسم الكامل',
        userName: 'اسم المستخدم',
        colEmail: 'البريد الإلكتروني',
        password: 'كلمة المرور',
        country: 'الدولة',
        profileImage: 'الصورة الشخصية',
        status: 'الحالة',
        statusActive: 'نشط',
        statusBlocked: 'محظور',
        save: 'حفظ البيانات',
        success_msg: 'تمت العملية بنجاح!',
        error_msg: 'حدث خطأ، يرجى المحاولة مرة أخرى.'
    },
    en: {
        addNewCustomer: 'Add New Customer',
        cancel: 'Cancel',
        personalInfo: 'Personal Information',
        fullName: 'Full Name',
        userName: 'Username',
        colEmail: 'Email',
        password: 'Password',
        country: 'Country',
        profileImage: 'Profile Image',
        status: 'Status',
        statusActive: 'Active',
        statusBlocked: 'Blocked',
        save: 'Save Data',
        success_msg: 'Operation successful!',
        error_msg: 'An error occurred, please try again.'
    }
};

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

const offersTranslations = {
    ar: {
        offersTitle: 'العروض والخصومات',
        addOffer: 'إضافة عرض جديد',
        totalOffers: 'إجمالي العروض',
        activeOffers: 'عروض نشطة',
        disabledOffers: 'عروض معطلة',
        expiredOffers: 'عروض منتهية',
        couponsTab: 'كوبونات الخصم',
        productTab: 'خصومات على منتج',
        timeTab: 'خصومات زمنية',
        searchCoupon: 'البحث عن كوبون...',
        searchProduct: 'البحث عن منتج...',
        searchTime: 'البحث عن عرض زمني...',
        discountPercent: 'نسبة الخصم',
        discountValue: 'قيمة الخصم',
        minPurchase: 'الحد الأدنى',
        usageCount: 'عدد الاستخدامات',
        status: 'الحالة',
        actions: 'الإجراءات',
        product: 'المنتج',
        originalPrice: 'السعر الأصلي',
        afterDiscount: 'السعر بعد الخصم',
        addOfferModalTitle: 'إضافة عرض جديد',
        offerType: 'نوع العرض',
        offerName: 'اسم العرض',
        couponCode: 'كود الكوبون (اختياري)',
        discountPercentLabel: 'نسبة الخصم (%)',
        minPurchaseLabel: 'الحد الأدنى للشراء',
        allowedUses: 'عدد الاستخدامات المسموحة',
        cancel: 'إلغاء',
        saveOffer: 'حفظ العرض',
        enable: 'تفعيل',
        disable: 'تعطيل',
        delete: 'حذف',
        edit: 'تعديل'
    },
    en: {
        offersTitle: 'Offers & Discounts',
        addOffer: 'Add New Offer',
        totalOffers: 'Total Offers',
        activeOffers: 'Active Offers',
        disabledOffers: 'Disabled Offers',
        expiredOffers: 'Expired Offers',
        couponsTab: 'Discount Coupons',
        productTab: 'Product Discounts',
        timeTab: 'Time-based Discounts',
        searchCoupon: 'Search coupon...',
        searchProduct: 'Search product...',
        searchTime: 'Search time-based offer...',
        discountPercent: 'Discount %',
        discountValue: 'Discount Value',
        minPurchase: 'Min Purchase',
        usageCount: 'Usage Count',
        status: 'Status',
        actions: 'Actions',
        product: 'Product',
        originalPrice: 'Original Price',
        afterDiscount: 'Price After Discount',
        addOfferModalTitle: 'Add New Offer',
        offerType: 'Offer Type',
        offerName: 'Offer Name',
        couponCode: 'Coupon Code (optional)',
        discountPercentLabel: 'Discount (%)',
        minPurchaseLabel: 'Min Purchase',
        allowedUses: 'Allowed Uses',
        cancel: 'Cancel',
        saveOffer: 'Save Offer',
        enable: 'Enable',
        disable: 'Disable',
        delete: 'Delete',
        edit: 'Edit'
    }
};

const reviewsTranslations = {
    ar: {
        reviewsTitle: 'التقييمات والتعليقات',
        totalReviews: 'إجمالي التقييمات',
        pendingReviews: 'قيد المراجعة',
        approvedReviews: 'موافق عليها',
        rejectedReviews: 'مرفوضة',
        pendingTab: 'قيد المراجعة',
        approvedTab: 'الموافق عليها',
        rejectedTab: 'المرفوضة',
        reviewer: 'المقيّم',
        rating: 'التقييم',
        product: 'المنتج',
        reviewText: 'نص التقييم',
        approve: 'قبول',
        reject: 'رفض',
        delete: 'حذف'
    },
    en: {
        reviewsTitle: 'Reviews & Comments',
        totalReviews: 'Total Reviews',
        pendingReviews: 'Pending',
        approvedReviews: 'Approved',
        rejectedReviews: 'Rejected',
        pendingTab: 'Pending',
        approvedTab: 'Approved',
        rejectedTab: 'Rejected',
        reviewer: 'Reviewer',
        rating: 'Rating',
        product: 'Product',
        reviewText: 'Review Text',
        approve: 'Approve',
        reject: 'Reject',
        delete: 'Delete'
    }
};

const paymentsTranslations = {
    ar: {
        payments: 'المدفوعات',
        paymentsList: 'المدفوعات',
        paymentGateways: 'بوابات الدفع',
        paymentMethods: 'وسائل الدفع',
        paymentSettings: 'إعدادات الدفع'
    },
    en: {
        payments: 'Payments',
        paymentsList: 'Payments',
        paymentGateways: 'Payment Gateways',
        paymentMethods: 'Payment Methods',
        paymentSettings: 'Payment Settings'
    }
};

const shippingTranslations = {
    ar: {
        shippingTitle: 'إدارة محتوى الشحن',
        tabCompanies: 'شركات الشحن',
        tabRates: 'تكاليف الشحن',
        tabTrack: 'تتبع الشحنات',
        companiesList: 'قائمة الشركات',
        addButton: 'إضافة',
        company: 'الشركة',
        contact: 'الاتصال',
        status: 'الحالة',
        actions: 'الإجراءات',
        view: 'عرض',
        edit: 'تعديل',
        delete: 'حذف',
        addCompanyModalTitle: 'إضافة شركة شحن جديدة',
        companyName: 'اسم الشركة',
        contactNumber: 'رقم التواصل',
        companyEmail: 'البريد الإلكتروني',
        companyDesc: 'نبذة عن الشركة',
        headquarters: 'المقر الرئيسي',
        route: 'المسار',
        weight: 'الوزن',
        price: 'السعر',
        trackingNumber: 'رقم التتبع',
        customer: 'العميل',
        activityStatus: 'حالة النشاط',
        activeOption: 'نشط',
        inactiveOption: 'غير نشط',
        cancel: 'إلغاء',
        saveData: 'حفظ البيانات',
        editCompanyTitle: 'تعديل بيانات الشركة',
        editRateTitle: 'تعديل السعر',
        enterRate: 'أدخل تكلفة الشحن للمسار المختار',
        trackTitle: 'تتبع مسار الشحنة',
        updateStatusTitle: 'تحديث الحالة',
        updateStatusBtn: 'تحديث الحالة الآن',
        statusWaiting: 'قيد الانتظار',
        statusInTransit: 'في الطريق',
        statusDelivered: 'تم التسليم',
        statusFailed: 'فشل التسليم / مرتجع'
    },
    en: {
        shippingTitle: 'Shipping Management',
        tabCompanies: 'Shipping Companies',
        tabRates: 'Shipping Rates',
        tabTrack: 'Shipment Tracking',
        companiesList: 'Companies List',
        addButton: 'Add',
        company: 'Company',
        contact: 'Contact',
        status: 'Status',
        actions: 'Actions',
        view: 'View',
        edit: 'Edit',
        delete: 'Delete',
        addCompanyModalTitle: 'Add New Shipping Company',
        companyName: 'Company Name',
        contactNumber: 'Contact Number',
        companyDesc: 'Company Description',
        headquarters: 'Headquarters',
        route: 'Route',
        weight: 'Weight',
        price: 'Price',
        trackingNumber: 'Tracking Number',
        customer: 'Customer',
        companyEmail: 'Email',
        activityStatus: 'Activity Status',
        activeOption: 'Active',
        inactiveOption: 'Inactive',
        cancel: 'Cancel',
        saveData: 'Save Data',
        editCompanyTitle: 'Edit Company Details',
        editRateTitle: 'Edit Rate',
        enterRate: 'Enter shipping cost for the selected route',
        trackTitle: 'Track Shipment',
        updateStatusTitle: 'Update Status',
        updateStatusBtn: 'Update Status Now',
        statusWaiting: 'Pending',
        statusInTransit: 'In Transit',
        statusDelivered: 'Delivered',
        statusFailed: 'Delivery Failed / Returned'
    }
};


const settingsTranslations = {
    ar: {
        settingsTitle: 'الإعدادات',
        tabStore: 'معلومات المتجر',
        tabCurrency: 'العملة',
        tabTax: 'الضرائب',
        tabLanguage: 'اللغة',
        tabEmail: 'البريد الإلكتروني',
        tabPolicies: 'السياسات',
        storeInfo: 'معلومات المتجر',
        storeName: 'اسم المتجر',
        description: 'الوصف',
        phone: 'رقم الهاتف',
        email: 'البريد الإلكتروني',
        address: 'العنوان',
        city: 'المدينة',
        country: 'الدولة',
        saveChanges: 'حفظ التغييرات',
        defaultCurrency: 'العملة الافتراضية',
        currencySymbol: 'رمز العملة',
        decimals: 'عدد الكسور العشرية',
        showExchangeRates: 'عرض سعر الصرف',
        taxSettings: 'إعدادات الضرائب',
        taxRate: 'معدل الضريبة الافتراضي (%)',
        applyTaxOnShipping: 'تطبيق الضريبة على الشحن',
        applyTaxOnDiscounts: 'تطبيق الضريبة على الخصومات',
        languageSettings: 'إعدادات اللغة',
        defaultLanguage: 'اللغة الافتراضية',
        allowMultiLang: 'السماح بتعدد اللغات',
        rtlSupport: 'اتجاه النص من اليمين إلى اليسار',
        smtpServer: 'خادم SMTP',
        smtpPort: 'منفذ SMTP',
        smtpUser: 'اسم المستخدم',
        smtpPassword: 'كلمة المرور',
        useTLS: 'استخدام TLS',
        privacyPolicy: 'سياسة الخصوصية',
        termsOfService: 'شروط الخدمة',
        returnPolicy: 'سياسة الاسترجاع'
    },
    en: {
        settingsTitle: 'Settings',
        tabStore: 'Store Information',
        tabCurrency: 'Currency',
        tabTax: 'Tax',
        tabLanguage: 'Language',
        tabEmail: 'Email',
        tabPolicies: 'Policies',
        storeInfo: 'Store Information',
        storeName: 'Store Name',
        description: 'Description',
        phone: 'Phone Number',
        email: 'Email',
        address: 'Address',
        city: 'City',
        country: 'Country',
        saveChanges: 'Save Changes',
        defaultCurrency: 'Default Currency',
        currencySymbol: 'Currency Symbol',
        decimals: 'Decimal Places',
        showExchangeRates: 'Show Exchange Rates',
        taxSettings: 'Tax Settings',
        taxRate: 'Default Tax Rate (%)',
        applyTaxOnShipping: 'Apply Tax On Shipping',
        applyTaxOnDiscounts: 'Apply Tax On Discounts',
        languageSettings: 'Language Settings',
        defaultLanguage: 'Default Language',
        allowMultiLang: 'Allow Multiple Languages',
        rtlSupport: 'Right-to-left Text Direction',
        smtpServer: 'SMTP Server',
        smtpPort: 'SMTP Port',
        smtpUser: 'Username',
        smtpPassword: 'Password',
        useTLS: 'Use TLS',
        privacyPolicy: 'Privacy Policy',
        termsOfService: 'Terms of Service',
        returnPolicy: 'Return Policy'
    }
};

const ordersTranslations = {
    ar: {
        manageOrders: 'إدارة الطلبات',
        searchOrder: 'البحث برقم الطلب أو العميل...',
        allStatus: 'كل الحالات',
        statusPending: 'قيد الانتظار',
        statusShipped: 'تم الشحن',
        statusDelivered: 'تم التوصيل',
        colOrderId: 'رقم الطلب',
        colCustomer: 'العميل',
        colDate: 'التاريخ',
        colTotal: 'الإجمالي',
        colStatus: 'الحالة',
        colActions: 'الإجراءات',
        view: 'عرض'
    },
    en: {
        manageOrders: 'Manage Orders',
        searchOrder: 'Search by order ID or customer...',
        allStatus: 'All Statuses',
        statusPending: 'Pending',
        statusShipped: 'Shipped',
        statusDelivered: 'Delivered',
        colOrderId: 'Order ID',
        colCustomer: 'Customer',
        colDate: 'Date',
        colTotal: 'Total',
        colStatus: 'Status',
        colActions: 'Actions',
        view: 'View'
    }
};

const reportsTranslations = {
    ar: {
        reportsTitle: 'التقارير والإحصائيات',
        exportPDF: 'تصدير PDF',
        exportExcel: 'تصدير Excel',
        filterFrom: 'من التاريخ',
        filterTo: 'إلى التاريخ',
        filterType: 'نوع التقرير',
        reportTypeAll: 'الكل',
        reportTypeSales: 'المبيعات',
        reportTypeProfit: 'الأرباح',
        reportTypeOrders: 'الطلبات',
        reportTypeCustomers: 'العملاء',
        filterSearch: 'بحث',
        totalSales: 'إجمالي المبيعات',
        netProfit: 'صافي الأرباح',
        ordersCount: 'عدد الطلبات',
        newCustomers: 'عدد العملاء الجدد',
        tabSales: 'تقرير المبيعات',
        tabProfit: 'تقرير الأرباح',
        tabOrders: 'تقرير الطلبات',
        tabCustomers: 'تقرير العملاء',
        salesChartTitle: 'رسم بياني المبيعات الشهرية',
        salesDetailsTitle: 'تفاصيل المبيعات',
        profitChartTitle: 'رسم بياني الأرباح',
        profitDetailsTitle: 'تفاصيل الأرباح',
        ordersDistributionTitle: 'توزيع الطلبات حسب الحالة',
        ordersStatsTitle: 'إحصائيات الطلبات',
        customersGrowthTitle: 'نمو العملاء',
        customersStatsTitle: 'إحصائيات العملاء',
        thDate: 'التاريخ',
        thOrders: 'عدد الطلبات',
        thSalesTotal: 'إجمالي المبيعات',
        thAvgOrder: 'متوسط الطلب',
        thStatus: 'الحالة',
        thCategory: 'الفئة',
        thRevenue: 'الإيرادات',
        thCosts: 'التكاليف',
        thProfit: 'الأرباح',
        thMargin: 'الهامش',
        thPeriod: 'الفترة',
        thNewCustomers: 'عملاء جدد',
        thActiveCustomers: 'عملاء نشطين',
        thTotalCustomers: 'إجمالي العملاء',
        thRetention: 'معدل الاحتفاظ',
        statusCompleted: 'مكتملة',
        statusProcessing: 'قيد المعالجة',
        statusCancelled: 'ملغاة',
        payCreditCard: 'بطاقة ائتمان',
        payBankTransfer: 'تحويل بنكي',
        payCOD: 'الدفع عند الاستلام'
    },
    en: {
        reportsTitle: 'Reports & Statistics',
        exportPDF: 'Export PDF',
        exportExcel: 'Export Excel',
        filterFrom: 'From Date',
        filterTo: 'To Date',
        filterType: 'Report Type',
        reportTypeAll: 'All',
        reportTypeSales: 'Sales',
        reportTypeProfit: 'Profit',
        reportTypeOrders: 'Orders',
        reportTypeCustomers: 'Customers',
        filterSearch: 'Search',
        totalSales: 'Total Sales',
        netProfit: 'Net Profit',
        ordersCount: 'Orders Count',
        newCustomers: 'New Customers',
        tabSales: 'Sales Report',
        tabProfit: 'Profit Report',
        tabOrders: 'Orders Report',
        tabCustomers: 'Customers Report',
        salesChartTitle: 'Monthly Sales Chart',
        salesDetailsTitle: 'Sales Details',
        profitChartTitle: 'Profit Chart',
        profitDetailsTitle: 'Profit Details',
        ordersDistributionTitle: 'Orders Distribution by Status',
        ordersStatsTitle: 'Orders Statistics',
        customersGrowthTitle: 'Customers Growth',
        customersStatsTitle: 'Customers Statistics',
        thDate: 'Date',
        thOrders: 'Orders',
        thSalesTotal: 'Sales Total',
        thAvgOrder: 'Average Order',
        thStatus: 'Status',
        thCategory: 'Category',
        thRevenue: 'Revenue',
        thCosts: 'Costs',
        thProfit: 'Profit',
        thMargin: 'Margin',
        thPeriod: 'Period',
        thNewCustomers: 'New Customers',
        thActiveCustomers: 'Active Customers',
        thTotalCustomers: 'Total Customers',
        thRetention: 'Retention Rate',
        statusCompleted: 'Completed',
        statusProcessing: 'Processing',
        statusCancelled: 'Cancelled',
        payCreditCard: 'Credit Card',
        payBankTransfer: 'Bank Transfer',
        payCOD: 'Cash on Delivery'
    }
};



let currentLanguage = localStorage.getItem('language') || 'ar';
let currentTheme = localStorage.getItem('theme') || 'light';

// UI helpers
const sidebar = document.getElementById('sidebar');
const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
const closeSidebarBtn = document.getElementById('closeSidebarBtn');

if (toggleSidebarBtn) {
    toggleSidebarBtn.addEventListener('click', () => {
        if (!sidebar) return;
        sidebar.classList.toggle('mini');
        localStorage.setItem('sidebarMini', sidebar.classList.contains('mini'));
    });
}

if (closeSidebarBtn) {
    closeSidebarBtn.addEventListener('click', () => {
        if (!sidebar) return;
        sidebar.classList.remove('active');
    });
}

if (localStorage.getItem('sidebarMini') === 'true' && sidebar) {
    sidebar.classList.add('mini');
}

function setupDropdown(btnId, menuId) {
    const btn = document.getElementById(btnId);
    const menu = document.getElementById(menuId);
    if (!btn || !menu) return;
    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        document.querySelectorAll('.dropdown-menu.active').forEach(m => {
            if (m !== menu) m.classList.remove('active');
        });
        menu.classList.toggle('active');
    });
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

// Language menu items
document.querySelectorAll('#languageMenu .dropdown-item').forEach(item => {
    item.addEventListener('click', () => {
        const lang = item.getAttribute('data-lang');
        if (translations[lang]) changeLanguage(lang);
        const menu = document.getElementById('languageMenu');
        if (menu) menu.classList.remove('active');
    });
});

function changeLanguage(lang) {
    currentLanguage = lang;
    localStorage.setItem('language', lang);
    const html = document.documentElement;
    if (lang === 'ar') {
        html.setAttribute('lang', 'ar');
        html.setAttribute('dir', 'rtl');
        document.body.classList.remove('ltr-mode');
        document.body.classList.add('rtl-mode');
    } else {
        html.setAttribute('lang', lang);
        html.setAttribute('dir', 'ltr');
        document.body.classList.remove('rtl-mode');
        document.body.classList.add('ltr-mode');
    }
    updatePageContent();
}

function updatePageContent() {
    const lang = currentLanguage || localStorage.getItem('language') || 'ar';
    const base = translations[lang] || {};
    const merged = Object.assign({}, base,
        addProductTranslations[lang] || {},
        addCatTranslations[lang] || {},
        addUserTranslations[lang] || {},
        manageTranslations[lang] || {},
        ordersTranslations[lang] || {},
        reportsTranslations[lang] || {},
        offersTranslations[lang] || {},
        reviewsTranslations[lang] || {},
        paymentsTranslations[lang] || {},
        shippingTranslations[lang] || {},
        settingsTranslations[lang] || {}
    );

    // update elements using data-i18n or data-key
    document.querySelectorAll('[data-i18n], [data-key]').forEach(el => {
        const key = el.getAttribute('data-i18n') || el.getAttribute('data-key');
        if (!key) return;
        const value = merged[key];
        if (typeof value === 'undefined') return;

        if (el.tagName === 'INPUT') {
            if (el.type === 'button' || el.type === 'submit') el.value = value;
            else el.placeholder = value;
        } else if (el.tagName === 'TEXTAREA') {
            el.placeholder = value;
        } else if (el.hasAttribute('data-html')) {
            el.innerHTML = value;
        } else {
            el.textContent = value;
        }
    });

    const searchInput = document.querySelector('.search-box input');
    if (searchInput && merged.search) searchInput.placeholder = merged.search;
}

// Theme switcher
document.querySelectorAll('#themeMenu .dropdown-item').forEach(item => {
    item.addEventListener('click', () => {
        const theme = item.getAttribute('data-theme');
        changeTheme(theme);
        const menu = document.getElementById('themeMenu');
        if (menu) menu.classList.remove('active');
    });
});

function changeTheme(theme) {
    currentTheme = theme;
    localStorage.setItem('theme', theme);
    if (theme === 'system') {
        const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        document.body.classList.toggle('dark-mode', isDark);
    } else {
        document.body.classList.toggle('dark-mode', theme === 'dark');
    }
    const themeBtnIcon = document.querySelector('#themeBtn i');
    if (themeBtnIcon) {
        if (theme === 'light') themeBtnIcon.className = 'fas fa-sun';
        else if (theme === 'dark') themeBtnIcon.className = 'fas fa-moon';
        else themeBtnIcon.className = 'fas fa-desktop';
    }
}

function switchTab(tabName, evt) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');
    const targetTab = document.getElementById(tabName + '-tab');
    if (targetTab) targetTab.style.display = 'block';
    document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('active'));
    if (evt && evt.currentTarget) evt.currentTarget.classList.add('active');
}

// Initialize after DOM ready
document.addEventListener('DOMContentLoaded', () => {
    changeLanguage(currentLanguage);
    changeTheme(currentTheme);

    // Page-specific: add_user form validation
    const userForm = document.getElementById('userForm');
    if (userForm) {
        userForm.addEventListener('submit', function (e) {
            const fullname = this.fullname.value.trim();
            const username = this.username.value.trim();
            const email = this.email.value.trim();
            if (!fullname || !username || !email) {
                e.preventDefault();
                alert('الرجاء تعبئة الحقول المطلوبة بشكل صحيح.');
                return false;
            }
            const re = /^(([^<>()[\\]\\.,;:\s@\"]+(\\.[^<>()[\\]\\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\\]\\.,;:\s@\"]+\.)+[^<>()[\\]\\.,;:\s@\"]{2,})$/i;
            if (!re.test(email)) {
                e.preventDefault();
                alert('أدخل بريدًا إلكترونيًا صالحًا.');
                return false;
            }
        });
    }

    // Dashboard charts rendering (if dashboardData provided by page)
    if (window.dashboardData) {
        try {
            const lang = currentLanguage || localStorage.getItem('language') || 'ar';
            const t = translations[lang] || {};

            const prodEl = document.getElementById('productChart');
            if (prodEl && window.Chart) {
                new Chart(prodEl, {
                    type: 'doughnut',
                    data: {
                        labels: [t.available || 'Available', t.unavailable || 'Unavailable'],
                        datasets: [{
                            data: [window.dashboardData.available, window.dashboardData.unavailable],
                            backgroundColor: ['#0d6efd', '#dc3545']
                        }]
                    }
                });
            }

            const ucEl = document.getElementById('userCommentChart');
            if (ucEl && window.Chart) {
                new Chart(ucEl, {
                    type: 'bar',
                    data: {
                        labels: [t.users || 'Users', t.comments || 'Comments'],
                        datasets: [{
                            data: [window.dashboardData.users, window.dashboardData.comments],
                            backgroundColor: ['#198754', '#ffc107']
                        }]
                    }
                });
            }
        } catch (e) {
            console.error('Dashboard charts error:', e);
        }
    }
});







