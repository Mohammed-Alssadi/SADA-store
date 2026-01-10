<?php
include("header.php");
// update_stock.php
?>


            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 data-key="updateStock">تحديث المخزون</h4>
                        <a href="inventory.php" class="btn btn-outline-secondary"><span data-key="back">العودة</span></a>
                    </div>

                    <div class="update-card">
                        <div class="product-info">
                            <img src="https://via.placeholder.com/80" class="product-img" alt="Product">
                            <div>
                                <h5 class="mb-1">آيفون 15 برو</h5>
                                <p class="text-muted mb-0">SKU: IP15P-BLU-256</p>
                            </div>
                        </div>
                        <form>
                            <div class="mb-4">
                                <label class="form-label" data-key="currentQty">الكمية الحالية</label>
                                <input type="text" class="form-control" value="5" disabled>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" data-key="newQty">الكمية الجديدة</label>
                                <input type="number" class="form-control" placeholder="أدخل الكمية الجديدة">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" data-key="reason">سبب التحديث</label>
                                <select class="form-select">
                                    <option value="restock" data-key="restock">توريد جديد</option>
                                    <option value="correction" data-key="correction">تصحيح جرد</option>
                                    <option value="damage" data-key="damage">تلف / فاقد</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2" data-key="save">تحديث الكمية</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
    <script>
        const updateStockTranslations = {
            ar: { updateStock: 'تحديث المخزون', back: 'العودة', currentQty: 'الكمية الحالية', newQty: 'الكمية الجديدة', reason: 'سبب التحديث', restock: 'توريد جديد', correction: 'تصحيح جرد', damage: 'تلف / فاقد', save: 'تحديث الكمية' },
            en: { updateStock: 'Update Stock', back: 'Back', currentQty: 'Current Quantity', newQty: 'New Quantity', reason: 'Reason for Update', restock: 'New Stock', correction: 'Inventory Correction', damage: 'Damage / Loss', save: 'Update Quantity' }
        };
        const originalUpdate = window.updatePageContent;
        window.updatePageContent = function() {
            if (typeof originalUpdate === 'function') originalUpdate();
            const lang = localStorage.getItem('language') || 'ar';
            const t = updateStockTranslations[lang];
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
