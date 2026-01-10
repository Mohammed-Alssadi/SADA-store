
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
 
    <style>
        .method-card { background: #fff; border-radius: 12px; padding: 25px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; border: 1px solid transparent; }
        body.dark-mode .method-card { background: #2a2a2a; }
        .method-card:hover { transform: translateY(-5px); border-color: var(--primary-color); }
        .method-icon { width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 20px; }
    </style>
</head>

<?php include ("header.php");
?>


            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <h4 class="mb-4" data-key="paymentMethods">وسائل الدفع</h4>
                        <div class="payment-card">
                        <div class="card">
                        <div class="tab-nav d-flex">
                         <a href="payments.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payments</button></a>
                          <a href="payment_gateways.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payment card</button></a>
                            <a href="payment_methods.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payment methods</button></a>

                        </div>
                    <div class="row">
                        <!-- Cash -->
                        <div class="col-md-4 mb-4">
                            <div class="method-card">
                                <div class="method-icon bg-light-success text-success"><i class="fas fa-money-bill-wave"></i></div>
                                <h5 data-key="cash">نقدي</h5>
                                <p class="text-muted small" data-key="cashDesc">الدفع عند الاستلام أو في المتجر.</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label" data-key="active">نشط</label>
                                </div>
                            </div>
                        </div>
                        <!-- Bank Transfer -->
                        <div class="col-md-4 mb-4">
                            <div class="method-card">
                                <div class="method-icon bg-light-info text-info"><i class="fas fa-university"></i></div>
                                <h5 data-key="transfer">تحويل بنكي</h5>
                                <p class="text-muted small" data-key="transferDesc">تحويل مباشر إلى الحساب البنكي.</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label" data-key="active">نشط</label>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="col-md-4 mb-4">
                            <div class="method-card">
                                <div class="method-icon bg-light-primary text-primary"><i class="fas fa-credit-card"></i></div>
                                <h5 data-key="card">بطاقة ائتمان</h5>
                                <p class="text-muted small" data-key="cardDesc">الدفع عبر البطاقات البنكية.</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label" data-key="active">نشط</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
    <script>
        const methodTranslations = {
            ar: { paymentMethods: 'وسائل الدفع', cash: 'نقدي', cashDesc: 'الدفع عند الاستلام أو في المتجر.', transfer: 'تحويل بنكي', transferDesc: 'تحويل مباشر إلى الحساب البنكي.', card: 'بطاقة ائتمان', cardDesc: 'الدفع عبر البطاقات البنكية.', active: 'نشط', payments: 'إدارة الدفع' },
            en: { paymentMethods: 'Payment Methods', cash: 'Cash', cashDesc: 'Payment on delivery or in-store.', transfer: 'Bank Transfer', transferDesc: 'Direct transfer to bank account.', card: 'Credit Card', cardDesc: 'Payment via bank cards.', active: 'Active', payments: 'Payment Management' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = methodTranslations[lang];
            if (t) {
                document.querySelectorAll('[data-key]').forEach(el => {
                    const key = el.getAttribute('data-key');
                    if (t[key]) el.textContent = t[key];
                });
            }
        };
        document.addEventListener('DOMContentLoaded', () => window.updatePageContent());
    </script>
</body>
</html>
