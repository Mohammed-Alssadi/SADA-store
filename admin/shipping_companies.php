<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  
    
    <style>
        :root { 
            --primary: #7367f0; --secondary: #808390; --success: #28c76f;
            --warning: #ff9f43; --danger: #ea5455; --info: #00cfe8;
            --bg-body: #f8f7fa; --card-bg: #ffffff;
        }
        
        body { font-family: 'Cairo', sans-serif; background-color: var(--bg-body); color: #5d596c; }
        
        /* تصميم التبويبات (Tabs) */
        .shipping-card { background: var(--card-bg); border-radius: 12px; box-shadow: 0 4px 18px rgba(75, 70, 92, 0.1); }
        .custom-tabs-wrapper { border-bottom: 1px solid #dbdade; padding: 0 20px; }
        .nav-tabs.custom-tabs { border: none; gap: 30px; }
        .nav-tabs.custom-tabs .nav-link {
            border: none; color: var(--secondary); font-weight: 500; padding: 18px 0;
            position: relative; background: transparent; transition: 0.3s;
        }
        .nav-tabs.custom-tabs .nav-link.active { color: var(--primary) !important; }
        .nav-tabs.custom-tabs .nav-link.active::after {
            content: ""; position: absolute; bottom: 0; left: 0; width: 100%; height: 3px;
            background: var(--primary); border-radius: 3px 3px 0 0;
        }

        /* الجداول والأزرار */
        .tab-content { padding: 25px; }
        .action-btn { 
            width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center; 
            border-radius: 8px; border: none; transition: 0.2s; margin: 0 2px;
        }
        .btn-view { background: rgba(115, 103, 240, 0.1); color: var(--primary); }
        .btn-edit { background: rgba(255, 159, 67, 0.1); color: var(--warning); }
        .btn-status { background: rgba(0, 207, 232, 0.1); color: var(--info); }
        .btn-delete { background: rgba(234, 84, 85, 0.1); color: var(--danger); }

        /* تصميم المودلز (Modals) */
        .modal-content { border-radius: 16px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .modal-header { background: #f8f7fa; border-bottom: 1px solid #dbdade; padding: 1.2rem 1.5rem; border-radius: 16px 16px 0 0; }
        .modal-title { font-weight: 700; display: flex; align-items: center; gap: 10px; }
        .form-label { font-weight: 600; font-size: 0.85rem; margin-bottom: 6px; display: flex; align-items: center; gap: 6px; }
        .form-label i { color: var(--primary); width: 16px; }
        .form-control, .form-select { border-radius: 8px; padding: 10px 14px; border: 1px solid #dbdade; }
        
        /* مخطط زمني للتتبع (Timeline) */
        .timeline { border-right: 2px solid #dbdade; position: relative; padding-right: 20px; list-style: none; }
        .timeline-item { position: relative; padding-bottom: 20px; }
        .timeline-item::after {
            content: ""; position: absolute; right: -27px; top: 0; width: 12px; height: 12px;
            background: var(--primary); border-radius: 50%; border: 2px solid #fff;
        }
        .timeline-item.active::after { background: var(--success); box-shadow: 0 0 0 4px rgba(40, 199, 111, 0.2); }

    </style>
</head>
<body>
    <?php include ("header.php");
    ?>

    <div class="container-fluid">
        <br>
        <h4 class="fw-bold mb-4"><i class="fas fa-truck-moving text-primary me-2"></i> <span data-key="shippingTitle">إدارة محتوى الشحن</span></h4>

        <div class="shipping-card">
            <div class="custom-tabs-wrapper">
                <ul class="nav nav-tabs custom-tabs" id="shipTabs">
                    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-cos"><i class="fas fa-building me-1"></i> <span data-key="tabCompanies">شركات الشحن</span></button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-rates"><i class="fas fa-dollar-sign me-1"></i> <span data-key="tabRates">تكاليف الشحن</span></button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-track"><i class="fas fa-map-marker-alt me-1"></i> <span data-key="tabTrack">تتبع الشحنات</span></button></li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-cos">
                        <div class="d-flex justify-content-between mb-4">
                        <h6 class="fw-bold m-0"><span data-key="companiesList">قائمة الشركات</span></h6>
                        <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addCompanyModal"><i class="fas fa-plus me-1"></i> <span data-key="addButton">إضافة</span></button>
                    </div>
                    <table class="table align-middle">
                        <thead class="table-light"><tr><th data-key="company">الشركة</th><th data-key="contact">الاتصال</th><th data-key="status">الحالة</th><th data-key="actions">الإجراءات</th></tr></thead>
                        <tbody>
                            <tr>
                                <td><div class="d-flex align-items-center gap-2"><img src="https://via.placeholder.com/40" class="rounded"> <b>أرامكس</b></div></td>
                                <td>+9665000000</td>
                                <td><span class="badge bg-light-success text-success" data-key="activeOption">نشط</span></td>
                                <td>
                                    <button class="action-btn btn-view" data-bs-toggle="modal" data-bs-target="#modalViewCompany" aria-label="view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit" data-bs-toggle="modal" data-bs-target="#modalEditCompany" aria-label="edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn btn-delete" aria-label="delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="tab-rates">
                    <table class="table align-middle">
                        <thead class="table-light"><tr><th data-key="route">المسار</th><th data-key="weight">الوزن</th><th data-key="price">السعر</th><th data-key="actions">الإجراءات</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>الرياض - جدة</td>
                                <td>0 - 5 كجم</td>
                                <td class="fw-bold text-primary">35 ر.س</td>
                                <td>
                                    <button class="action-btn btn-edit" data-bs-toggle="modal" data-bs-target="#modalEditRate"><i class="fas fa-edit"></i></button>
                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="tab-track">
                    <table class="table align-middle">
                        <thead class="table-light"><tr><th data-key="trackingNumber">رقم التتبع</th><th data-key="customer">العميل</th><th data-key="status">الحالة</th><th data-key="actions">الإجراءات</th></tr></thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">#TRK-8821</td>
                                <td>محمد العلي</td>
                                <td><span class="badge bg-info">في الطريق</span></td>
                                <td>
                                    <button class="action-btn btn-view" data-bs-toggle="modal" data-bs-target="#modalTrackView"><i class="fas fa-location-arrow"></i></button>
                                    <button class="action-btn btn-status" data-bs-toggle="modal" data-bs-target="#modalStatusUpdate"><i class="fas fa-sync"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalViewCompany" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" data-key="view"> <i class="fas fa-info-circle"></i> تفاصيل الشركة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://via.placeholder.com/80" class="rounded-circle mb-3 border p-1">
                    <h5 class="fw-bold mb-1" data-key="companyName">أرامكس السعودية</h5>
                    <p class="text-muted mb-4" data-key="companyDesc">شركة شحن لوجستي دولية ومحلية</p>
                    <div class="row g-3 text-start">
                        <div class="col-6 bg-light p-2 rounded">
                            <small class="text-muted d-block" data-key="contactNumber">رقم التواصل</small>
                            <span class="fw-bold">+966 50 123 4567</span>
                        </div>
                        <div class="col-6 bg-light p-2 rounded">
                            <small class="text-muted d-block" data-key="companyEmail">البريد الإلكتروني</small>
                            <span class="fw-bold">info@aramex.com</span>
                        </div>
                        <div class="col-12 bg-light p-2 rounded">
                            <small class="text-muted d-block" data-key="headquarters">المقر الرئيسي</small>
                            <span class="fw-bold">الرياض - حي السلي - مخرج 16</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="addCompanyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-key="addCompanyModalTitle"><i class="fas fa-plus-circle text-primary"></i> إضافة شركة شحن جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm" class="row g-3">
                        <div class="col-12">
                            <label class="form-label" data-key="companyName"><i class="fas fa-building label-icon"></i> اسم الشركة</label>
                            <input type="text" class="form-control" placeholder="أدخل اسم الشركة" data-key="companyNamePlaceholder">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" data-key="contactNumber"><i class="fas fa-phone label-icon"></i> رقم التواصل</label>
                            <input type="tel" class="form-control" placeholder="05xxxxxxxx" data-key="contactNumberPlaceholder">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" data-key="companyEmail"><i class="fas fa-envelope label-icon"></i> البريد الإلكتروني</label>
                            <input type="email" class="form-control" placeholder="email@company.com" data-key="companyEmailPlaceholder">
                        </div>
                        <div class="col-12">
                            <label class="form-label" data-key="activityStatus"><i class="fas fa-list label-icon"></i> حالة النشاط</label>
                            <select class="form-select">
                                <option value="1" data-key="activeOption">نشط</option>
                                <option value="0" data-key="inactiveOption">غير نشط</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" data-key="cancel">إلغاء</button>
                    <button type="submit" form="addForm" class="btn btn-primary px-4" data-key="saveData">حفظ البيانات</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditCompany" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" data-key="editCompanyTitle"><i class="fas fa-edit"></i> تعديل بيانات الشركة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-12"><label class="form-label" data-key="companyName"><i class="fas fa-tag"></i> اسم الشركة</label><input type="text" class="form-control" value="أرامكس"></div>
                        <div class="col-md-6"><label class="form-label" data-key="phone"><i class="fas fa-phone"></i> الهاتف</label><input type="text" class="form-control" value="050000000"></div>
                        <div class="col-md-6"><label class="form-label" data-key="activityStatus"><i class="fas fa-check-circle"></i> الحالة</label>
                            <select class="form-select"><option selected data-key="activeOption">نشط</option><option data-key="inactiveOption">غير نشط</option></select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-primary w-100 py-2 fw-bold" data-key="saveData">تحديث البيانات</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditRate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-key="editRateTitle"><i class="fas fa-dollar-sign text-success"></i> تعديل السعر</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <label class="form-label justify-content-center mb-3 text-muted" data-key="enterRate">أدخل تكلفة الشحن للمسار المختار</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control form-control-lg text-center" value="35">
                        <span class="input-group-text">ر.س</span>
                    </div>
                    <button class="btn btn-success w-100" data-key="saveData">حفظ التغيير</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTrackView" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info" data-key="trackTitle"><i class="fas fa-route"></i> تتبع مسار الشحنة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info py-2 small mb-4">رقم الشحنة: <b>#TRK-8821</b></div>
                    <ul class="timeline">
                        <li class="timeline-item active">
                            <h6 class="fw-bold mb-0">تم الاستلام من التاجر</h6>
                            <small class="text-muted">اليوم - 10:30 صباحاً</small>
                        </li>
                        <li class="timeline-item active">
                            <h6 class="fw-bold mb-0">في مركز الفرز الرئيسي</h6>
                            <small class="text-muted">اليوم - 02:15 مساءً</small>
                        </li>
                        <li class="timeline-item">
                            <h6 class="fw-bold mb-0 text-muted">جاري التوصيل للعميل</h6>
                            <small class="text-muted">متوقع غداً</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalStatusUpdate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-key="updateStatusTitle"><i class="fas fa-sync text-info"></i> تحديث الحالة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label small" data-key="chooseNewStatus">اختر الحالة الجديدة للشحنة:</label>
                    <select class="form-select mb-3">
                        <option data-key="statusWaiting">قيد الانتظار</option>
                        <option selected data-key="statusInTransit">في الطريق</option>
                        <option data-key="statusDelivered">تم التسليم</option>
                        <option data-key="statusFailed">فشل التسليم / مرتجع</option>
                    </select>
                    <button class="btn btn-info text-white w-100" data-key="updateStatusBtn">تحديث الحالة الآن</button>
                </div>
            </div>
        </div>
    </div>

<?php include ("footer.php"); ?>





