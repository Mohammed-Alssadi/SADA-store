<?php
include("header.php");
// payment_gateways.php
?>


            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <h4 class="mb-4" data-key="gateways">بوابات الدفع</h4>
                        <div class="payment-card">
                        <div class="card">
                        <div class="tab-nav d-flex">
                         <a href="payments.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payments</button></a>
                          <a href="payment_gateways.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payment card</button></a>
                            <a href="payment_methods.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payment methods</button></a>

                        </div>
                    <div class="row">
                        <!-- PayPal -->
                        <div class="col-md-6 mb-4">
                            <div class="gateway-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="gateway-logo" alt="PayPal">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Client ID</label>
                                        <input type="text" class="form-control" placeholder="Enter PayPal Client ID">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Secret Key</label>
                                        <input type="password" class="form-control" placeholder="Enter PayPal Secret Key">
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label" data-key="enable">تفعيل</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm" data-key="save">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Stripe -->
                        <div class="col-md-6 mb-4">
                            <div class="gateway-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Stripe_Logo%2C_revised_2016.svg" class="gateway-logo" alt="Stripe">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Publishable Key</label>
                                        <input type="text" class="form-control" placeholder="Enter Stripe Publishable Key">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Secret Key</label>
                                        <input type="password" class="form-control" placeholder="Enter Stripe Secret Key">
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label" data-key="enable">تفعيل</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm" data-key="save">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
    <script>
        const gatewayTranslations = {
            ar: { gateways: 'بوابات الدفع', enable: 'تفعيل', save: 'حفظ', payments: 'إدارة الدفع' },
            en: { gateways: 'Payment Gateways', enable: 'Enable', save: 'Save', payments: 'Payment Management' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = gatewayTranslations[lang];
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
