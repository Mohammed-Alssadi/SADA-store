<?php
include("header.php");
// payments.php
?>


            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="payments">إدارة الدفع</h4>
                       
                    </div>

                    <div class="payment-card">
                        <div class="card">
                        <div class="tab-nav d-flex">
                         <a href="payments.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payments</button></a>
                          <a href="payment_gateways.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payment card</button></a>
                            <a href="payment_methods.php">  <button class="tab-link active" onclick="switchTab('pages')"><i class="fas fa-file"></i> payment methods</button></a>

                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle">
                              
                                <thead>
                                  
                                    <tr>
                                        <th data-key="colId">رقم المعاملة</th>
                                        <th data-key="colCustomer">العميل</th>
                                        <th data-key="colMethod">الوسيلة</th>
                                        <th data-key="colAmount">المبلغ</th>
                                        <th data-key="colStatus">الحالة</th>
                                        <th data-key="colDate">التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#PAY-7721</td>
                                        <td>أحمد محمد</td>
                                        <td><span class="method-badge"><i class="fas fa-credit-card"></i> <span data-key="card">بطاقة</span></span></td>
                                        <td class="fw-bold">$999.00</td>
                                        <td><span class="status-paid" data-key="paid">مدفوع</span></td>
                                        <td>2026-01-03</td>
                                    </tr>
                                    <tr>
                                        <td>#PAY-7722</td>
                                        <td>سارة علي</td>
                                        <td><span class="method-badge"><i class="fas fa-money-bill-wave"></i> <span data-key="cash">نقدي</span></span></td>
                                        <td class="fw-bold">$120.00</td>
                                        <td><span class="status-unpaid" data-key="unpaid">غير مدفوع</span></td>
                                        <td>2026-01-03</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
    <script>
        const paymentTranslations = {
            ar: { payments: 'إدارة الدفع', searchPayment: 'البحث عن معاملة...', transactionHistory: 'سجل المعاملات', colId: 'رقم المعاملة', colCustomer: 'العميل', colMethod: 'الوسيلة', colAmount: 'المبلغ', colStatus: 'الحالة', colDate: 'التاريخ', paid: 'مدفوع', unpaid: 'غير مدفوع', card: 'بطاقة', cash: 'نقدي', paymentMethods: 'وسائل الدفع', gateways: 'بوابات الدفع' },
            en: { payments: 'Payment Management', searchPayment: 'Search transaction...', transactionHistory: 'Transaction History', colId: 'Transaction ID', colCustomer: 'Customer', colMethod: 'Method', colAmount: 'Amount', colStatus: 'Status', colDate: 'Date', paid: 'Paid', unpaid: 'Unpaid', card: 'Card', cash: 'Cash', paymentMethods: 'Payment Methods', gateways: 'Payment Gateways' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = paymentTranslations[lang];
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
    </script>
</body>
</html>
