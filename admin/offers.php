<?php
include("header.php");
// offers.php
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>العروض والخصومات - MATERIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        * { font-family: 'Cairo', sans-serif; font-weight: 500; }
        h1, h2, h3, h4, h5, h6 { font-weight: 700; }
        .card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); border: none; }
        body.dark-mode .card { background: #2a2a2a; }
        .btn-primary { background: linear-gradient(135deg, #7367f0 0%, #5a5ac9 100%); border: none; border-radius: 8px; font-weight: 600; }
        .btn-primary:hover { background: linear-gradient(135deg, #5a5ac9 0%, #4a4ab0 100%); }
        .btn-success { background: #34d399; border: none; border-radius: 8px; font-weight: 600; }
        .btn-success:hover { background: #2bc88f; }
        .btn-danger { background: #ea5455; border: none; border-radius: 8px; font-weight: 600; }
        .btn-danger:hover { background: #d63d3e; }
        .btn-warning { background: #fbbf24; border: none; border-radius: 8px; font-weight: 600; color: #333; }
        .btn-warning:hover { background: #f59e0b; }
        .tab-nav { border-bottom: 2px solid #e0e0e0; margin-bottom: 20px; }
        body.dark-mode .tab-nav { border-bottom-color: #444; }
        .tab-link { color: #666; border: none; background: none; padding: 12px 20px; font-weight: 600; cursor: pointer; border-bottom: 3px solid transparent; margin-bottom: -2px; transition: all 0.3s; }
        body.dark-mode .tab-link { color: #999; }
        .tab-link:hover { color: #7367f0; }
        .tab-link.active { color: #7367f0; border-bottom-color: #7367f0; }
        .badge-status { padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 12px; }
        .badge-active { background: rgba(52, 211, 153, 0.1); color: #34d399; }
        .badge-inactive { background: rgba(234, 84, 85, 0.1); color: #ea5455; }
        .badge-pending { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
        .offer-card { border: 2px solid #e0e0e0; border-radius: 12px; padding: 20px; margin-bottom: 15px; transition: all 0.3s; }
        body.dark-mode .offer-card { border-color: #444; }
        .offer-card:hover { box-shadow: 0 8px 24px rgba(115, 103, 240, 0.15); border-color: #7367f0; }
        .offer-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .offer-title { font-size: 18px; font-weight: 700; color: #333; }
        body.dark-mode .offer-title { color: #fff; }
        .offer-code { background: linear-gradient(135deg, #7367f0 0%, #5a5ac9 100%); color: white; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 14px; }
        .offer-discount { font-size: 24px; font-weight: 700; color: #ea5455; }
        .form-label { font-weight: 600; color: #333; margin-bottom: 8px; }
        body.dark-mode .form-label { color: #fff; }
        .form-control, .form-select { border-radius: 8px; border: 1px solid #e0e0e0; font-weight: 500; }
        body.dark-mode .form-control, body.dark-mode .form-select { background: #1a1a1a; border-color: #444; color: #fff; }
        .action-btn { width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px; margin: 0 4px; transition: all 0.3s; border: none; cursor: pointer; font-weight: 600; }
        .btn-edit { background: rgba(255, 159, 67, 0.1); color: #ff9f43; }
        .btn-delete { background: rgba(234, 84, 85, 0.1); color: #ea5455; }
        .btn-toggle { background: rgba(52, 211, 153, 0.1); color: #34d399; }
        .action-btn:hover { transform: translateY(-2px); filter: brightness(0.9); }
        .modal-content { border: none; border-radius: 12px; }
        body.dark-mode .modal-content { background: #2a2a2a; color: #fff; }
        .stats-card { background: linear-gradient(135deg, #7367f0 0%, #5a5ac9 100%); color: white; border-radius: 12px; padding: 20px; text-align: center; }
        .stats-card h3 { font-size: 28px; font-weight: 700; margin-bottom: 5px; }
        .stats-card p { font-size: 14px; opacity: 0.9; }
        .table { font-weight: 500; }
        .table thead { background: #f5f5f5; }
        body.dark-mode .table thead { background: #1a1a1a; }
    </style>
</head>
<body>
    

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2><i class="fas fa-tag"></i> <span data-key="offersTitle">العروض والخصومات</span></h2>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOfferModal">
                            <i class="fas fa-plus"></i> <span data-key="addOffer">إضافة عرض جديد</span>
                        </button>
                    </div>

                    <!-- إحصائيات سريعة -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h3>24</h3>
                                <p data-key="totalOffers">إجمالي العروض</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background: linear-gradient(135deg, #34d399 0%, #2bc88f 100%);">
                                <h3>18</h3>
                                <p data-key="activeOffers">عروض نشطة</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);">
                                <h3>4</h3>
                                <p data-key="disabledOffers">عروض معطلة</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);">
                                <h3>2</h3>
                                <p data-key="expiredOffers">عروض منتهية</p>
                            </div>
                        </div>
                    </div>

                    <!-- التبويبات -->
                    <div class="card">
                            <div class="tab-nav d-flex">
                            <button class="tab-link active" onclick="switchTab('coupons')"><i class="fas fa-ticket-alt"></i> <span data-key="couponsTab">كوبونات الخصم</span></button>
                            <button class="tab-link" onclick="switchTab('product')"><i class="fas fa-box"></i> <span data-key="productTab">خصومات على منتج</span></button>
                            <button class="tab-link" onclick="switchTab('time')"><i class="fas fa-clock"></i> <span data-key="timeTab">خصومات زمنية</span></button>
                        </div>

                        <!-- كوبونات الخصم -->
                        <div id="coupons-tab" class="tab-content">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="البحث عن كوبون..." data-key="searchCoupon">
                            </div>
                            <div class="offer-card">
                                <div class="offer-header">
                                    <div>
                                        <div class="offer-title">خصم 20% على المشتريات</div>
                                        <small style="color: #999;">تاريخ الإنشاء: 2024-01-10</small>
                                    </div>
                                    <div class="offer-code">SAVE20</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <strong>نسبة الخصم:</strong> 20%
                                    </div>
                                    <div class="col-md-3">
                                        <strong>الحد الأدنى:</strong> 100 ر.س
                                    </div>
                                    <div class="col-md-3">
                                        <strong>عدد الاستخدامات:</strong> 45 / 100
                                    </div>
                                    <div class="col-md-3">
                                        <strong>الحالة:</strong> <span class="badge-status badge-active">نشط</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="action-btn btn-edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-toggle" title="تعطيل"><i class="fas fa-toggle-on"></i></button>
                                    <button class="action-btn btn-delete" title="حذف"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>

                            <div class="offer-card">
                                <div class="offer-header">
                                    <div>
                                        <div class="offer-title">خصم 50 ر.س على الطلبات</div>
                                        <small style="color: #999;">تاريخ الإنشاء: 2024-01-08</small>
                                    </div>
                                    <div class="offer-code">SPECIAL50</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <strong>قيمة الخصم:</strong> 50 ر.س
                                    </div>
                                    <div class="col-md-3">
                                        <strong>الحد الأدنى:</strong> 200 ر.س
                                    </div>
                                    <div class="col-md-3">
                                        <strong>عدد الاستخدامات:</strong> 23 / 50
                                    </div>
                                    <div class="col-md-3">
                                        <strong>الحالة:</strong> <span class="badge-status badge-inactive">معطل</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="action-btn btn-edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-toggle" title="تفعيل"><i class="fas fa-toggle-off"></i></button>
                                    <button class="action-btn btn-delete" title="حذف"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- خصومات على منتج -->
                        <div id="product-tab" class="tab-content" style="display:none;">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="البحث عن منتج..." data-key="searchProduct">
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th data-key="product">المنتج</th>
                                            <th data-key="originalPrice">السعر الأصلي</th>
                                            <th data-key="discountPercent">نسبة الخصم</th>
                                            <th data-key="afterDiscount">السعر بعد الخصم</th>
                                            <th data-key="status">الحالة</th>
                                            <th data-key="actions">الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>حقيبة جلدية</strong></td>
                                            <td>500 ر.س</td>
                                            <td>15%</td>
                                            <td><strong style="color: #34d399;">425 ر.س</strong></td>
                                            <td><span class="badge-status badge-active">نشط</span></td>
                                            <td>
                                                <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>حذاء رياضي</strong></td>
                                            <td>300 ر.س</td>
                                            <td>25%</td>
                                            <td><strong style="color: #34d399;">225 ر.س</strong></td>
                                            <td><span class="badge-status badge-active">نشط</span></td>
                                            <td>
                                                <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                                <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- خصومات زمنية -->
                        <div id="time-tab" class="tab-content" style="display:none;">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="البحث عن عرض زمني..." data-key="searchTime">
                            </div>
                            <div class="offer-card">
                                <div class="offer-header">
                                    <div>
                                        <div class="offer-title">عرض نهاية الأسبوع - خصم 30%</div>
                                        <small style="color: #999;">من 2024-01-12 إلى 2024-01-14</small>
                                    </div>
                                    <div class="offer-discount">-30%</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>تاريخ البداية:</strong> 2024-01-12 00:00
                                    </div>
                                    <div class="col-md-4">
                                        <strong>تاريخ النهاية:</strong> 2024-01-14 23:59
                                    </div>
                                    <div class="col-md-4">
                                        <strong>الحالة:</strong> <span class="badge-status badge-active">نشط</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-toggle"><i class="fas fa-toggle-on"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>

                            <div class="offer-card">
                                <div class="offer-header">
                                    <div>
                                        <div class="offer-title">عرض الموسم - خصم 50%</div>
                                        <small style="color: #999;">من 2024-01-20 إلى 2024-02-20</small>
                                    </div>
                                    <div class="offer-discount">-50%</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>تاريخ البداية:</strong> 2024-01-20 00:00
                                    </div>
                                    <div class="col-md-4">
                                        <strong>تاريخ النهاية:</strong> 2024-02-20 23:59
                                    </div>
                                    <div class="col-md-4">
                                        <strong>الحالة:</strong> <span class="badge-status badge-pending">قريب</span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="action-btn btn-edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-toggle"><i class="fas fa-toggle-off"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: إضافة عرض جديد -->
    <div class="modal fade" id="addOfferModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> <span data-key="addOfferModalTitle">إضافة عرض جديد</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" data-key="offerType">نوع العرض</label>
                            <select class="form-select">
                                <option data-key="couponsTab">كوبون خصم</option>
                                <option data-key="productTab">خصم على منتج</option>
                                <option data-key="timeTab">خصم زمني</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-key="offerName">اسم العرض</label>
                            <input type="text" class="form-control" placeholder="أدخل اسم العرض">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-key="couponCode">كود الكوبون (اختياري)</label>
                            <input type="text" class="form-control" placeholder="مثال: SAVE20">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-key="discountPercentLabel">نسبة الخصم (%)</label>
                                    <input type="number" class="form-control" placeholder="20" min="0" max="100">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-key="minPurchaseLabel">الحد الأدنى للشراء</label>
                                    <input type="number" class="form-control" placeholder="100">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-key="allowedUses">عدد الاستخدامات المسموحة</label>
                            <input type="number" class="form-control" placeholder="100">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-key="cancel">إلغاء</button>
                    <button type="button" class="btn btn-primary" data-key="saveOffer">حفظ العرض</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        function switchTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');
            document.getElementById(tabName + '-tab').style.display = 'block';
            document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
