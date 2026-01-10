<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التقارير والإحصائيات - MATERIO</title>
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
        .btn-info { background: #17a2b8; border: none; border-radius: 8px; font-weight: 600; }
        .tab-nav { border-bottom: 2px solid #e0e0e0; margin-bottom: 20px; }
        body.dark-mode .tab-nav { border-bottom-color: #444; }
        .tab-link { color: #666; border: none; background: none; padding: 12px 20px; font-weight: 600; cursor: pointer; border-bottom: 3px solid transparent; margin-bottom: -2px; transition: all 0.3s; }
        body.dark-mode .tab-link { color: #999; }
        .tab-link:hover { color: #7367f0; }
        .tab-link.active { color: #7367f0; border-bottom-color: #7367f0; }
        .stats-card { background: linear-gradient(135deg, #7367f0 0%, #5a5ac9 100%); color: white; border-radius: 12px; padding: 20px; text-align: center; }
        .stats-card h3 { font-size: 28px; font-weight: 700; margin-bottom: 5px; }
        .stats-card p { font-size: 14px; opacity: 0.9; }
        .stats-card.green { background: linear-gradient(135deg, #34d399 0%, #2bc88f 100%); }
        .stats-card.yellow { background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); }
        .stats-card.red { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); }
        .form-label { font-weight: 600; color: #333; margin-bottom: 8px; }
        body.dark-mode .form-label { color: #fff; }
        .form-control, .form-select { border-radius: 8px; border: 1px solid #e0e0e0; font-weight: 500; }
        body.dark-mode .form-control, body.dark-mode .form-select { background: #1a1a1a; border-color: #444; color: #fff; }
        .table { font-weight: 500; }
        .table thead { background: #f5f5f5; }
        body.dark-mode .table thead { background: #1a1a1a; }
        .report-section { margin-bottom: 30px; }
        .report-title { font-size: 18px; font-weight: 700; margin-bottom: 15px; color: #333; }
        body.dark-mode .report-title { color: #fff; }
        .chart-placeholder { background: #f5f5f5; border-radius: 8px; padding: 40px; text-align: center; color: #999; }
        body.dark-mode .chart-placeholder { background: #1a1a1a; }
    </style>
</head>
            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2><i class="fas fa-chart-bar"></i> <span data-key="reportsTitle">التقارير والإحصائيات</span></h2>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary"><i class="fas fa-file-pdf"></i> <span data-key="exportPDF">تصدير PDF</span></button>
                            <button class="btn btn-success"><i class="fas fa-file-excel"></i> <span data-key="exportExcel">تصدير Excel</span></button>
                        </div>
                    </div>

                    <!-- فلاتر التقارير -->
                    <div class="card mb-4">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label" data-key="filterFrom">من التاريخ</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" data-key="filterTo">إلى التاريخ</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" data-key="filterType">نوع التقرير</label>
                                <select class="form-select">
                                    <option data-key="reportTypeAll">الكل</option>
                                    <option data-key="reportTypeSales">المبيعات</option>
                                    <option data-key="reportTypeProfit">الأرباح</option>
                                    <option data-key="reportTypeOrders">الطلبات</option>
                                    <option data-key="reportTypeCustomers">العملاء</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button class="btn btn-primary w-100"><i class="fas fa-search"></i> <span data-key="filterSearch">بحث</span></button>
                            </div>
                        </div>
                    </div>

                    <!-- إحصائيات سريعة -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                                <div class="stats-card">
                                <h3>45,230 ر.س</h3>
                                <p data-key="totalSales">إجمالي المبيعات</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="stats-card green">
                                <h3>12,450 ر.س</h3>
                                <p data-key="netProfit">صافي الأرباح</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="stats-card yellow">
                                <h3>234</h3>
                                <p data-key="ordersCount">عدد الطلبات</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="stats-card red">
                                <h3>156</h3>
                                <p data-key="newCustomers">عدد العملاء الجدد</p>
                            </div>
                        </div>
                    </div>

                    <!-- التبويبات -->
                    <div class="card">
                            <div class="tab-nav d-flex">
                            <button class="tab-link active" onclick="switchTab('sales')"><i class="fas fa-shopping-cart"></i> <span data-key="tabSales">تقرير المبيعات</span></button>
                            <button class="tab-link" onclick="switchTab('profit')"><i class="fas fa-money-bill"></i> <span data-key="tabProfit">تقرير الأرباح</span></button>
                            <button class="tab-link" onclick="switchTab('orders')"><i class="fas fa-boxes"></i> <span data-key="tabOrders">تقرير الطلبات</span></button>
                            <button class="tab-link" onclick="switchTab('customers')"><i class="fas fa-users"></i> <span data-key="tabCustomers">تقرير العملاء</span></button>
                        </div>

                        <!-- تقرير المبيعات -->
                        <div id="sales-tab" class="tab-content">
                            <div class="report-section">
                                <div class="report-title" data-key="salesChartTitle">رسم بياني المبيعات الشهرية</div>
                                <div class="chart-placeholder">
                                    <i class="fas fa-chart-line" style="font-size: 48px; color: #7367f0;"></i>
                                    <p style="margin-top: 10px;">سيتم عرض الرسم البياني هنا</p>
                                </div>
                            </div>

                            <div class="report-section">
                                <div class="report-title" data-key="salesDetailsTitle">تفاصيل المبيعات</div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>عدد الطلبات</th>
                                                <th>إجمالي المبيعات</th>
                                                <th>متوسط الطلب</th>
                                                <th>الحالة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2024-01-15</td>
                                                <td>12</td>
                                                <td>3,450 ر.س</td>
                                                <td>287.5 ر.س</td>
                                                <td><span style="color: #34d399; font-weight: 600;">↑ 15%</span></td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-14</td>
                                                <td>10</td>
                                                <td>3,000 ر.س</td>
                                                <td>300 ر.س</td>
                                                <td><span style="color: #34d399; font-weight: 600;">↑ 8%</span></td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-13</td>
                                                <td>15</td>
                                                <td>4,200 ر.س</td>
                                                <td>280 ر.س</td>
                                                <td><span style="color: #34d399; font-weight: 600;">↑ 22%</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- تقرير الأرباح -->
                        <div id="profit-tab" class="tab-content" style="display:none;">
                            <div class="report-section">
                                <div class="report-title" data-key="profitChartTitle">رسم بياني الأرباح</div>
                                <div class="chart-placeholder">
                                    <i class="fas fa-chart-pie" style="font-size: 48px; color: #34d399;"></i>
                                    <p style="margin-top: 10px;">سيتم عرض الرسم البياني هنا</p>
                                </div>
                            </div>

                            <div class="report-section">
                                <div class="report-title" data-key="profitDetailsTitle">تفاصيل الأرباح</div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>الفئة</th>
                                                <th>الإيرادات</th>
                                                <th>التكاليف</th>
                                                <th>الأرباح</th>
                                                <th>الهامش</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>الملابس</strong></td>
                                                <td>15,000 ر.س</td>
                                                <td>8,000 ر.س</td>
                                                <td><strong style="color: #34d399;">7,000 ر.س</strong></td>
                                                <td>46.7%</td>
                                            </tr>
                                            <tr>
                                                <td><strong>الأحذية</strong></td>
                                                <td>12,500 ر.س</td>
                                                <td>6,250 ر.س</td>
                                                <td><strong style="color: #34d399;">6,250 ر.س</strong></td>
                                                <td>50%</td>
                                            </tr>
                                            <tr>
                                                <td><strong>الإكسسوارات</strong></td>
                                                <td>8,000 ر.س</td>
                                                <td>3,500 ر.س</td>
                                                <td><strong style="color: #34d399;">4,500 ر.س</strong></td>
                                                <td>56.3%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- تقرير الطلبات -->
                        <div id="orders-tab" class="tab-content" style="display:none;">
                            <div class="report-section">
                                <div class="report-title" data-key="ordersDistributionTitle">توزيع الطلبات حسب الحالة</div>
                                <div class="chart-placeholder">
                                    <i class="fas fa-chart-bar" style="font-size: 48px; color: #fbbf24;"></i>
                                    <p style="margin-top: 10px;">سيتم عرض الرسم البياني هنا</p>
                                </div>
                            </div>

                            <div class="report-section">
                                <div class="report-title" data-key="ordersStatsTitle">إحصائيات الطلبات</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card" style="border: 2px solid #e0e0e0;">
                                            <h5 class="mb-3" data-key="ordersStatsTitle">حسب الحالة</h5>
                                            <p><strong data-key="statusCompleted">مكتملة:</strong> <span style="color: #34d399;">180</span></p>
                                            <p><strong data-key="statusProcessing">قيد المعالجة:</strong> <span style="color: #fbbf24;">35</span></p>
                                            <p><strong data-key="statusCancelled">ملغاة:</strong> <span style="color: #ea5455;">19</span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card" style="border: 2px solid #e0e0e0;">
                                            <h5 class="mb-3" data-key="ordersStatsTitle">حسب طريقة الدفع</h5>
                                            <p><strong data-key="payCreditCard">بطاقة ائتمان:</strong> <span style="color: #7367f0;">120</span></p>
                                            <p><strong data-key="payBankTransfer">تحويل بنكي:</strong> <span style="color: #34d399;">85</span></p>
                                            <p><strong data-key="payCOD">الدفع عند الاستلام:</strong> <span style="color: #ff9f43;">29</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تقرير العملاء -->
                        <div id="customers-tab" class="tab-content" style="display:none;">
                            <div class="report-section">
                                <div class="report-title" data-key="customersGrowthTitle">نمو العملاء</div>
                                <div class="chart-placeholder">
                                    <i class="fas fa-users" style="font-size: 48px; color: #ea5455;"></i>
                                    <p style="margin-top: 10px;">سيتم عرض الرسم البياني هنا</p>
                                </div>
                            </div>

                            <div class="report-section">
                                <div class="report-title" data-key="customersStatsTitle">إحصائيات العملاء</div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th data-key="thPeriod">الفترة</th>
                                                <th data-key="thNewCustomers">عملاء جدد</th>
                                                <th data-key="thActiveCustomers">عملاء نشطين</th>
                                                <th data-key="thTotalCustomers">إجمالي العملاء</th>
                                                <th data-key="thRetention">معدل الاحتفاظ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>يناير 2024</strong></td>
                                                <td>156</td>
                                                <td>234</td>
                                                <td>890</td>
                                                <td>85.2%</td>
                                            </tr>
                                            <tr>
                                                <td><strong>ديسمبر 2023</strong></td>
                                                <td>142</td>
                                                <td>210</td>
                                                <td>734</td>
                                                <td>82.1%</td>
                                            </tr>
                                            <tr>
                                                <td><strong>نوفمبر 2023</strong></td>
                                                <td>128</td>
                                                <td>195</td>
                                                <td>592</td>
                                                <td>79.5%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php include("footer.php"); ?>
