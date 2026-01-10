<?php
// reviews.php
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التقييمات والتعليقات - MATERIO</title>
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
        .btn-success { background: #34d399; border: none; border-radius: 8px; font-weight: 600; }
        .btn-danger { background: #ea5455; border: none; border-radius: 8px; font-weight: 600; }
        .btn-warning { background: #fbbf24; border: none; border-radius: 8px; font-weight: 600; color: #333; }
        .tab-nav { border-bottom: 2px solid #e0e0e0; margin-bottom: 20px; }
        body.dark-mode .tab-nav { border-bottom-color: #444; }
        .tab-link { color: #666; border: none; background: none; padding: 12px 20px; font-weight: 600; cursor: pointer; border-bottom: 3px solid transparent; margin-bottom: -2px; transition: all 0.3s; }
        body.dark-mode .tab-link { color: #999; }
        .tab-link:hover { color: #7367f0; }
        .tab-link.active { color: #7367f0; border-bottom-color: #7367f0; }
        .review-item { border: 2px solid #e0e0e0; border-radius: 12px; padding: 20px; margin-bottom: 15px; transition: all 0.3s; }
        body.dark-mode .review-item { border-color: #444; }
        .review-item:hover { box-shadow: 0 8px 24px rgba(115, 103, 240, 0.15); border-color: #7367f0; }
        .review-header { display: flex; justify-content: space-between; align-items: start; margin-bottom: 15px; }
        .reviewer-info { display: flex; gap: 10px; }
        .reviewer-avatar { width: 40px; height: 40px; border-radius: 50%; background: #7367f0; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .reviewer-name { font-weight: 700; color: #333; }
        body.dark-mode .reviewer-name { color: #fff; }
        .review-rating { color: #fbbf24; font-size: 14px; }
        .review-text { color: #666; line-height: 1.6; margin-bottom: 10px; }
        body.dark-mode .review-text { color: #999; }
        .review-product { background: #f5f5f5; padding: 10px; border-radius: 8px; margin-bottom: 10px; font-size: 14px; }
        body.dark-mode .review-product { background: #1a1a1a; }
        .badge-status { padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 12px; }
        .badge-pending { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
        .badge-approved { background: rgba(52, 211, 153, 0.1); color: #34d399; }
        .badge-rejected { background: rgba(234, 84, 85, 0.1); color: #ea5455; }
        .action-btn { width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px; margin: 0 4px; transition: all 0.3s; border: none; cursor: pointer; font-weight: 600; }
        .btn-approve { background: rgba(52, 211, 153, 0.1); color: #34d399; }
        .btn-reject { background: rgba(234, 84, 85, 0.1); color: #ea5455; }
        .btn-delete { background: rgba(234, 84, 85, 0.1); color: #ea5455; }
        .action-btn:hover { transform: translateY(-2px); filter: brightness(0.9); }
        .modal-content { border: none; border-radius: 12px; }
        body.dark-mode .modal-content { background: #2a2a2a; color: #fff; }
        .stats-card { background: linear-gradient(135deg, #7367f0 0%, #5a5ac9 100%); color: white; border-radius: 12px; padding: 20px; text-align: center; }
        .stats-card h3 { font-size: 28px; font-weight: 700; margin-bottom: 5px; }
        .stats-card p { font-size: 14px; opacity: 0.9; }
        .form-label { font-weight: 600; color: #333; margin-bottom: 8px; }
        body.dark-mode .form-label { color: #fff; }
        .form-control, .form-select { border-radius: 8px; border: 1px solid #e0e0e0; font-weight: 500; }
        body.dark-mode .form-control, body.dark-mode .form-select { background: #1a1a1a; border-color: #444; color: #fff; }
    </style>
</head>
<body>
   <?php include ("header.php"); ?>

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <h2 class="mb-4"><i class="fas fa-star"></i> <span data-key="reviewsTitle">التقييمات والتعليقات</span></h2>

                    <!-- إحصائيات سريعة -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h3>156</h3>
                                <p data-key="totalReviews">إجمالي التقييمات</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);">
                                <h3>23</h3>
                                <p data-key="pendingReviews">قيد المراجعة</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background: linear-gradient(135deg, #34d399 0%, #2bc88f 100%);">
                                <h3>128</h3>
                                <p data-key="approvedReviews">موافق عليها</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);">
                                <h3>5</h3>
                                <p data-key="rejectedReviews">مرفوضة</p>
                            </div>
                        </div>
                    </div>

                    <!-- التبويبات -->
                    <div class="card">
                            <div class="tab-nav d-flex">
                            <button class="tab-link active" onclick="switchTab('pending')"><i class="fas fa-hourglass'></i> <span data-key="pendingTab">قيد المراجعة</span></button>
                            <button class="tab-link" onclick="switchTab('approved')"><i class="fas fa-check"></i> <span data-key="approvedTab">الموافق عليها</span></button>
                            <button class="tab-link" onclick="switchTab('rejected')"><i class="fas fa-times"></i> <span data-key="rejectedTab">المرفوضة</span></button>
                        </div>

                        <!-- قيد المراجعة -->
                        <div id="pending-tab" class="tab-content">
                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-info">
                                        <div class="reviewer-avatar">أ</div>
                                        <div>
                                            <div class="reviewer-name">أحمد محمد</div>
                                            <div class="review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span style="color: #666; margin-right: 5px;">4.5 / 5</span>
                                            </div>
                                            <small style="color: #999;">2024-01-15 10:30</small>
                                        </div>
                                    </div>
                                    <span class="badge-status badge-pending" data-key="pendingReviews">قيد المراجعة</span>
                                </div>
                                    <div class="review-product">
                                    <strong data-key="product">المنتج:</strong> حقيبة جلدية سوداء
                                </div>
                                <div class="review-text">
                                    "منتج رائع جداً، الجودة عالية والتوصيل سريع. أنا راضي جداً عن الشراء وأنصح الجميع بشراء هذا المنتج."
                                </div>
                                <div class="text-end">
                                    <button class="action-btn btn-approve" title="قبول" data-key="approve"><i class="fas fa-check"></i></button>
                                    <button class="action-btn btn-reject" title="رفض" data-key="reject"><i class="fas fa-times"></i></button>
                                </div>
                            </div>

                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-info">
                                        <div class="reviewer-avatar" style="background: #34d399;">س</div>
                                        <div>
                                            <div class="reviewer-name">سارة علي</div>
                                            <div class="review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span style="color: #666; margin-right: 5px;">4 / 5</span>
                                            </div>
                                            <small style="color: #999;">2024-01-14 15:20</small>
                                        </div>
                                    </div>
                                    <span class="badge-status badge-pending" data-key="pendingReviews">قيد المراجعة</span>
                                </div>
                                    <div class="review-product">
                                    <strong data-key="product">المنتج:</strong> حذاء رياضي أبيض
                                </div>
                                <div class="review-text">
                                    "جودة ممتازة وسعر مناسب جداً. التوصيل كان سريع والتغليف احترافي."
                                </div>
                                <div class="text-end">
                                    <button class="action-btn btn-approve" title="قبول" data-key="approve"><i class="fas fa-check"></i></button>
                                    <button class="action-btn btn-reject" title="رفض" data-key="reject"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- الموافق عليها -->
                        <div id="approved-tab" class="tab-content" style="display:none;">
                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-info">
                                        <div class="reviewer-avatar" style="background: #ff9f43;">م</div>
                                        <div>
                                            <div class="reviewer-name">محمد خالد</div>
                                            <div class="review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span style="color: #666; margin-right: 5px;">5 / 5</span>
                                            </div>
                                            <small style="color: #999;">2024-01-13 09:15</small>
                                        </div>
                                    </div>
                                    <span class="badge-status badge-approved" data-key="approvedReviews">موافق عليه</span>
                                </div>
                                    <div class="review-product">
                                    <strong data-key="product">المنتج:</strong> ساعة ذكية
                                </div>
                                <div class="review-text">
                                    "منتج رائع جداً، يستحق السعر. الخصائص رائعة والبطارية تدوم طويلاً."
                                </div>
                                <div class="text-end">
                                    <button class="action-btn btn-delete" title="حذف" data-key="delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- المرفوضة -->
                        <div id="rejected-tab" class="tab-content" style="display:none;">
                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-info">
                                        <div class="reviewer-avatar" style="background: #ea5455;">ف</div>
                                        <div>
                                            <div class="reviewer-name">فاطمة أحمد</div>
                                            <div class="review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span style="color: #666; margin-right: 5px;">1 / 5</span>
                                            </div>
                                            <small style="color: #999;">2024-01-12 14:45</small>
                                        </div>
                                    </div>
                                    <span class="badge-status badge-rejected" data-key="rejectedReviews">مرفوضة</span>
                                </div>
                                <div class="review-product">
                                    <strong data-key="product">المنتج:</strong> حقيبة يد
                                </div>
                                <div class="review-text">
                                    "تعليق غير مناسب يحتوي على كلمات بذيئة وغير لائقة."
                                </div>
                                <div class="text-end">
                                    <button class="action-btn btn-delete" title="حذف" data-key="delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
