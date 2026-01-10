<?php
include("header.php");
?>

   

            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <h2 class="mb-4"><i class="fas fa-cog"></i> <span data-key="settingsTitle">الإعدادات</span></h2>

                    <!-- التبويبات -->
                    <div class="card">
                        <div class="tab-nav d-flex flex-wrap">
                            <button class="tab-link active" onclick="switchTab('store')"><i class="fas fa-store"></i> <span data-key="tabStore">معلومات المتجر</span></button>
                            <button class="tab-link" onclick="switchTab('currency')"><i class="fas fa-money-bill"></i> <span data-key="tabCurrency">العملة</span></button>
                            <button class="tab-link" onclick="switchTab('tax')"><i class="fas fa-percent"></i> <span data-key="tabTax">الضرائب</span></button>
                            <button class="tab-link" onclick="switchTab('language')"><i class="fas fa-language"></i> <span data-key="tabLanguage">اللغة</span></button>
                            <button class="tab-link" onclick="switchTab('email')"><i class="fas fa-envelope"></i> <span data-key="tabEmail">البريد الإلكتروني</span></button>
                            <button class="tab-link" onclick="switchTab('policies')"><i class="fas fa-file-contract"></i> <span data-key="tabPolicies">السياسات</span></button>
                        </div>

                        <!-- معلومات المتجر -->
                        <div id="store-tab" class="tab-content">
                            <div class="section-header"><i class="fas fa-store"></i> <span data-key="storeInfo">معلومات المتجر</span></div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" data-key="storeName">اسم المتجر</label>
                                    <input type="text" class="form-control" value="متجر MATERIO" placeholder="أدخل اسم المتجر" data-key="storeNamePlaceholder">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="description">الوصف</label>
                                    <textarea class="form-control" rows="4" placeholder="أدخل وصف المتجر" data-key="descriptionPlaceholder">متجر إلكتروني متخصص في بيع الملابس والأحذية والإكسسوارات</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-key="phone">رقم الهاتف</label>
                                            <input type="tel" class="form-control" value="+966 12 345 6789" placeholder="أدخل رقم الهاتف" data-key="phonePlaceholder">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-key="email">البريد الإلكتروني</label>
                                            <input type="email" class="form-control" value="info@materio.com" placeholder="أدخل البريد الإلكتروني" data-key="emailPlaceholder">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="address">العنوان</label>
                                    <input type="text" class="form-control" value="الرياض، شارع الملك فهد" placeholder="أدخل عنوان المتجر" data-key="addressPlaceholder">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-key="city">المدينة</label>
                                            <input type="text" class="form-control" value="الرياض" placeholder="أدخل المدينة" data-key="cityPlaceholder">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-key="country">الدولة</label>
                                            <input type="text" class="form-control" value="المملكة العربية السعودية" placeholder="أدخل الدولة" data-key="countryPlaceholder">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" data-key="saveChanges"><i class="fas fa-save"></i> حفظ التغييرات</button>
                            </form>
                        </div>

                        <!-- العملة -->
                        <div id="currency-tab" class="tab-content" style="display:none;">
                            <div class="section-header"><i class="fas fa-money-bill"></i> <span data-key="currencySettings">إعدادات العملة</span></div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" data-key="defaultCurrency">العملة الافتراضية</label>
                                    <select class="form-select">
                                        <option selected>الريال السعودي (ر.س)</option>
                                        <option>الدولار الأمريكي ($)</option>
                                        <option>اليورو (€)</option>
                                        <option>الجنيه الإسترليني (£)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="currencySymbol">رمز العملة</label>
                                    <input type="text" class="form-control" value="ر.س" placeholder="أدخل رمز العملة" data-key="currencySymbolPlaceholder">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="decimals">عدد الكسور العشرية</label>
                                    <input type="number" class="form-control" value="2" min="0" max="4" data-key="decimalsInput">
                                </div>
                                <div class="setting-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="setting-title" data-key="showExchangeRates">عرض سعر الصرف</div>
                                            <div class="setting-desc" data-key="showExchangeRatesDesc">عرض أسعار الصرف للعملات الأخرى</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" checked>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" data-key="saveChanges"><i class="fas fa-save"></i> حفظ التغييرات</button>
                            </form>
                        </div>

                        <!-- الضرائب -->
                        <div id="tax-tab" class="tab-content" style="display:none;">
                            <div class="section-header"><i class="fas fa-percent"></i> <span data-key="taxSettings">إعدادات الضرائب</span></div>
                            <div class="info-box">
                                <i class="fas fa-info-circle"></i> <span data-key="taxInfo">تحديد معدلات الضرائب المطبقة على المنتجات والخدمات</span>
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" data-key="taxRate">معدل الضريبة الافتراضي (%)</label>
                                    <input type="number" class="form-control" value="15" min="0" max="100" step="0.01" data-key="taxRateInput">
                                </div>
                                <div class="setting-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="setting-title" data-key="applyTaxOnShipping">تطبيق الضريبة على الشحن</div>
                                            <div class="setting-desc" data-key="applyTaxOnShippingDesc">إضافة الضريبة على تكاليف الشحن</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" checked>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="setting-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="setting-title" data-key="applyTaxOnDiscounts">تطبيق الضريبة على الخصومات</div>
                                            <div class="setting-desc" data-key="applyTaxOnDiscountsDesc">حساب الضريبة قبل أو بعد الخصم</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" data-key="saveChanges"><i class="fas fa-save"></i> حفظ التغييرات</button>
                            </form>
                        </div>

                        <!-- اللغة -->
                        <div id="language-tab" class="tab-content" style="display:none;">
                            <div class="section-header"><i class="fas fa-language"></i> <span data-key="languageSettings">إعدادات اللغة</span></div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" data-key="defaultLanguage">اللغة الافتراضية</label>
                                    <select class="form-select">
                                        <option selected>العربية</option>
                                        <option>English</option>
                                        <option>Français</option>
                                        <option>Español</option>
                                    </select>
                                </div>
                                <div class="setting-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="setting-title" data-key="allowMultiLang">السماح بتعدد اللغات</div>
                                            <div class="setting-desc" data-key="allowMultiLangDesc">السماح للعملاء باختيار اللغة المفضلة</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" checked>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="setting-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="setting-title" data-key="rtlSupport">اتجاه النص من اليمين إلى اليسار</div>
                                            <div class="setting-desc" data-key="rtlSupportDesc">تفعيل دعم RTL للغات العربية</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" checked>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" data-key="saveChanges"><i class="fas fa-save"></i> حفظ التغييرات</button>
                            </form>
                        </div>

                        <!-- البريد الإلكتروني -->
                        <div id="email-tab" class="tab-content" style="display:none;">
                            <div class="section-header"><i class="fas fa-envelope"></i> <span data-key="emailSettings">إعدادات البريد الإلكتروني</span></div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" data-key="smtpServer">خادم SMTP</label>
                                    <input type="text" class="form-control" value="smtp.gmail.com" placeholder="أدخل خادم SMTP" data-key="smtpServerInput">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="smtpPort">منفذ SMTP</label>
                                    <input type="number" class="form-control" value="587" placeholder="أدخل منفذ SMTP" data-key="smtpPortInput">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="smtpUser">اسم المستخدم</label>
                                    <input type="email" class="form-control" value="info@materio.com" placeholder="أدخل اسم المستخدم" data-key="smtpUserInput">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="smtpPassword">كلمة المرور</label>
                                    <input type="password" class="form-control" placeholder="أدخل كلمة المرور" data-key="smtpPasswordInput">
                                </div>
                                <div class="setting-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="setting-title" data-key="useTLS">استخدام TLS</div>
                                            <div class="setting-desc" data-key="useTLSDesc">تفعيل التشفير TLS للبريد الإلكتروني</div>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" checked>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" data-key="saveChanges"><i class="fas fa-save"></i> حفظ التغييرات</button>
                            </form>
                        </div>

                        <!-- السياسات -->
                        <div id="policies-tab" class="tab-content" style="display:none;">
                            <div class="section-header"><i class="fas fa-file-contract"></i> <span data-key="policiesTitle">سياسات المتجر</span></div>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" data-key="privacyPolicy">سياسة الخصوصية</label>
                                    <textarea class="form-control" rows="4" placeholder="أدخل نص سياسة الخصوصية" data-key="privacyPolicyInput">نحن نحترم خصوصيتك ولا نشارك بيانات العملاء مع أطراف ثالثة...</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="termsOfService">شروط الخدمة</label>
                                    <textarea class="form-control" rows="4" placeholder="أدخل شروط الخدمة" data-key="termsOfServiceInput">باستخدام هذا المتجر، فإنك توافق على جميع الشروط والأحكام...</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" data-key="returnPolicy">سياسة الاسترجاع</label>
                                    <textarea class="form-control" rows="4" placeholder="أدخل سياسة الاسترجاع" data-key="returnPolicyInput">يمكن استرجاع المنتجات خلال 30 يوم من تاريخ الشراء...</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" data-key="saveChanges"><i class="fas fa-save"></i> حفظ التغييرات</button>
                            </form>
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
