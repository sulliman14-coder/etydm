<?php get_header(); ?>

<main>
    <!-- Hero Section -->
    <section id="home" class="gradient-bg text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-6xl font-bold mb-6 leading-tight">إي تي واي للتصميم</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6"><div class="text-3xl font-bold">13+</div><div class="text-sm opacity-80">سنة خبرة</div></div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6"><div class="text-3xl font-bold">500+</div><div class="text-sm opacity-80">مشروع</div></div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6"><div class="text-3xl font-bold">200+</div><div class="text-sm opacity-80">عميل</div></div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6"><div class="text-3xl font-bold">24/7</div><div class="text-sm opacity-80">دعم</div></div>
            </div>
            <div class="flex flex-col lg:flex-row justify-center items-center gap-4 lg:gap-6 max-w-4xl mx-auto">
                <a href="#services" class="group relative bg-white text-blue-600 px-8 py-4 rounded-2xl font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all w-full lg:w-auto">
                    <div class="relative flex items-center justify-center gap-3"><span>استكشف خدماتنا</span></div>
                </a>
                <a href="#contact" class="group relative bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all w-full lg:w-auto">
                    <div class="relative flex items-center justify-center gap-3"><span class="text-2xl animate-pulse">⚡</span><span>احجز استشارة مجانية</span></div>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
         <div class="container mx-auto px-4">
            <div class="text-center mb-16"><h2 class="text-4xl font-bold text-gray-800 mb-4">خدماتنا المتميزة</h2><p class="text-xl text-gray-600">نقدم حلولاً متكاملة تشمل التصميم، التسويق، والحلول التعليمية لنمو أعمالك</p></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $services = get_app_data()['services'];
                foreach ($services as $key => $srv) :
                ?>
                <div class="service-card rounded-xl p-8 text-white" style="--start-color: <?php echo $srv['startColor']; ?>; --end-color: <?php echo $srv['endColor']; ?>;" data-key="<?php echo $key; ?>">
                    <div class="text-4xl mb-4"><?php echo $srv['icon']; ?></div>
                    <h3 class="text-2xl font-bold mb-4"><?php echo $srv['name']; ?></h3>
                    <p class="mb-6 opacity-90">يبدأ من <?php echo number_format($srv['price']); ?> ريال</p>
                    <div class="space-y-3">
                        <button data-action="show-details" class="w-full bg-white/20 text-white py-3 rounded-lg hover:bg-white/30">👁️ تفاصيل الخدمة</button>
                        <button data-action="open-calculator" class="w-full bg-white text-blue-600 py-3 rounded-lg font-semibold hover:shadow-lg">💰 احسب عرض السعر</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Works Section -->
    <section id="works" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16"><h2 class="text-4xl font-bold text-gray-800 mb-4">نماذج من أعمالنا</h2><p class="text-xl text-gray-600">نفخر بتقديم أعمال ذات جودة عالية تعكس رؤية عملائنا.</p></div>
            <div class="flex justify-center flex-wrap gap-4 mb-12" id="work-filters">
                <button class="px-6 py-2 rounded-full font-bold transition-all bg-blue-600 text-white shadow-lg transform scale-105" data-filter="all">الكل</button>
                <button class="px-6 py-2 rounded-full font-bold" data-filter="profile">ملفات تعريفية</button>
                <button class="px-6 py-2 rounded-full font-bold" data-filter="e-commerce">متجر إلكتروني</button>
                <button class="px-6 py-2 rounded-full font-bold" data-filter="menu">منيو</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $works = get_app_data()['works'];
                foreach ($works as $work) :
                ?>
                <div class="work-item rounded-xl p-6 bg-white shadow-lg flex flex-col" data-category="<?php echo $work['category']; ?>">
                    <img src="<?php echo $work['imageUrl']; ?>" class="w-full h-40 object-cover rounded-lg mb-4" alt="<?php echo $work['title']; ?>">
                    <h3 class="font-bold text-lg"><?php echo $work['title']; ?></h3>
                    <p class="text-sm text-gray-600 flex-grow"><?php echo $work['desc']; ?></p>
                    <button data-action="show-work-details" data-work-id="<?php echo $work['id']; ?>" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors mt-4">مشاهدة العمل</button>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section id="partners" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16"><h2 class="text-4xl font-bold text-gray-800 mb-4">شركاء النجاح</h2><p class="text-xl text-gray-600 mb-8">نفخر بشراكاتنا الاستراتيجية مع أفضل الشركات والمؤسسات</p></div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center">
                <?php
                $partners = get_app_data()['partners'];
                foreach ($partners as $partner) :
                ?>
                <div class="flex justify-center">
                    <img src="<?php echo $partner['src']; ?>" alt="<?php echo $partner['alt']; ?>" class="max-h-16 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-us" class="py-20 bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16"><h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">لماذا تختار إي تي واي؟</h2><p class="text-xl text-gray-600 max-w-3xl mx-auto">نحن لسنا مجرد مقدمي خدمات، بل شركاء نجاح نسعى لتحقيق أهدافك.</p></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $why_us = get_app_data()['whyUs'];
                foreach ($why_us as $item) :
                ?>
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-transform transform hover:-translate-y-2 h-full text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6 mx-auto">
                        <span class="text-3xl text-white"><?php echo $item['icon']; ?></span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4"><?php echo $item['title']; ?></h3>
                    <p class="text-gray-600"><?php echo $item['desc']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16"><h2 class="text-4xl font-bold text-gray-800 mb-4">التواصل</h2><p class="text-xl text-gray-600">نحن هنا لمساعدتك في تحقيق أهدافك</p></div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-8">طرق التواصل السريع</h3>
                    <div class="space-y-6">
                        <a href="https://wa.me/966596466303" class="flex items-center p-6 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:shadow-lg transition-shadow"><span class="text-3xl ml-4">📱</span><div><div class="font-bold text-lg">واتساب مباشر</div><div>+966596466303</div></div></a>
                        <a href="tel:+966596466303" class="flex items-center p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:shadow-lg transition-shadow"><span class="text-3xl ml-4">📞</span><div><div class="font-bold text-lg">اتصال هاتفي</div><div>+966596466303</div></div></a>
                        <a href="mailto:info@etydm.com" class="flex items-center p-6 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-xl hover:shadow-lg transition-shadow"><span class="text-3xl ml-4">📧</span><div><div class="font-bold text-lg">بريد إلكتروني</div><div>info@etydm.com</div></div></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-8">احجز اجتماع مجاني</h3>
                    <form id="meeting-form" class="space-y-6">
                        <input type="text" placeholder="الاسم الكامل" required class="w-full p-3 border rounded-lg">
                        <input type="email" placeholder="البريد الإلكتروني" required class="w-full p-3 border rounded-lg">
                        <input type="tel" placeholder="رقم الهاتف" required class="w-full p-3 border rounded-lg">
                        <select required class="w-full p-3 border rounded-lg">
                            <option value="">اختر الخدمة المطلوبة</option>
                            <?php
                            $services_for_select = get_app_data()['services'];
                            foreach ($services_for_select as $service) {
                                echo '<option value="' . $service['name'] . '">' . $service['name'] . '</option>';
                            }
                            ?>
                        </select>
                        <textarea rows="4" placeholder="أخبرنا المزيد عن مشروعك..." class="w-full p-3 border rounded-lg"></textarea>
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 rounded-lg font-semibold hover:shadow-xl">🚀 احجز الاجتماع الآن</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
```

#### **3. ملف `main.js` (مهم جداً)**
* **المسار:** `ety-theme/assets/js/main.js`
* **التعديل:** تم حذف دالة `populateUI()` لأن المحتوى أصبح يُطبع مباشرة من PHP. بقيت فقط الوظائف التفاعلية.

```javascript
// --- STATE MANAGEMENT ---
let calculatorState = { currentServiceKey: null, selectedItems: new Set() };

// --- DOM & UTILITY FUNCTIONS ---
const $ = (selector) => document.querySelector(selector);
const $$ = (selector) => document.querySelectorAll(selector);
const showNotification = (message, type = 'success') => {
    const el = $('#notification');
    if(!el) return;
    el.textContent = message;
    el.className = `notification ${type} show`;
    setTimeout(() => el.classList.remove('show'), 4000);
};
const toggleModal = (modalId, forceOpen = null) => {
    const el = $(`#${modalId}`);
    if(el) {
        const isOpen = el.classList.contains('open');
        const shouldOpen = forceOpen === true || (forceOpen === null && !isOpen);
        el.classList.toggle('open', shouldOpen);
        document.body.style.overflow = shouldOpen ? 'hidden' : '';
    }
};
const renderHTML = (selector, html) => { if ($(selector)) $(selector).innerHTML = html; };


// --- UNIFIED ADVANCED CALCULATOR ---
const updateAdvancedCalculatorUI = () => {
    const { currentServiceKey, selectedItems } = calculatorState;
    if (!currentServiceKey) return;
    
    const service = window.etyThemeData.services[currentServiceKey];
    const subtotal = Array.from(selectedItems).reduce((acc, itemId) => {
        const item = service.items.find(i => i.id === itemId);
        return acc + (item ? item.price : 0);
    }, 0);

    let discountPercent = 0;
    if (selectedItems.size >= 4) discountPercent = 15;
    else if (selectedItems.size >= 3) discountPercent = 10;
    else if (selectedItems.size >= 2) discountPercent = 5;
    
    const discountAmount = Math.round(subtotal * discountPercent / 100);
    const total = subtotal - discountAmount;
    
    $('#calculator-selected-services').innerHTML = selectedItems.size > 0 
        ? Array.from(selectedItems).map(id => `<div>✓ ${service.items.find(i => i.id === id)?.name || ''}</div>`).join('') 
        : 'لم يتم اختيار أي خدمة بعد';
        
    $('#calculator-subtotal').textContent = `SAR ${subtotal.toLocaleString('en-US')}`;
    $('#calculator-discount').textContent = `- SAR ${discountAmount.toLocaleString('en-US')} (${discountPercent}%)`;
    $('#calculator-discount-row').style.display = discountPercent > 0 ? 'flex' : 'none';
    $('#calculator-total').textContent = `SAR ${total.toLocaleString('en-US')}`;

    const isSelectionEmpty = selectedItems.size === 0;
    ['#calculator-pdf-btn', '#calculator-whatsapp-btn'].forEach(selector => {
        const btn = $(selector);
        btn.disabled = isSelectionEmpty;
        btn.classList.toggle('opacity-50', isSelectionEmpty);
        btn.classList.toggle('cursor-not-allowed', isSelectionEmpty);
    });
};

const openAdvancedCalculator = (serviceKey) => {
    calculatorState = { currentServiceKey: serviceKey, selectedItems: new Set() };
    const service = window.etyThemeData.services[serviceKey];
    
    $('#calculatorTitle').textContent = `حاسبة أسعار ${service.name}`;
    
    renderHTML('#calculator-services-content', `
        <div class="mb-8"><h4 class="text-xl font-bold text-gray-800 mb-4 text-center" style="font-family: 'Cairo', sans-serif;">🎯 نظام الخصم التدريجي</h4><div class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 p-6 rounded-3xl border-2 border-purple-200 shadow-lg"><div class="grid grid-cols-1 sm:grid-cols-3 gap-4"><div class="bg-white p-5 rounded-2xl shadow-md border-2 border-green-200 text-center"><div class="text-3xl font-bold text-green-600 mb-2">5%</div><div class="text-sm font-semibold text-gray-700">خدمتان</div></div><div class="bg-white p-5 rounded-2xl shadow-md border-2 border-blue-200 text-center"><div class="text-3xl font-bold text-blue-600 mb-2">10%</div><div class="text-sm font-semibold text-gray-700">3 خدمات</div></div><div class="bg-white p-5 rounded-2xl shadow-md border-2 border-purple-200 text-center"><div class="text-3xl font-bold text-purple-600 mb-2">15%</div><div class="text-sm font-semibold text-gray-700">4+ خدمات</div></div></div></div></div>
        <div class="mb-8"><h4 class="text-xl font-bold text-gray-800 mb-4 text-center">📋 بيانات الشركة (اختيارية)</h4><div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-6 rounded-3xl border-2 border-indigo-200 shadow-lg grid grid-cols-1 md:grid-cols-2 gap-4"><input type="text" id="calculator-companyName" placeholder="اسم الشركة" class="w-full p-3 border-2 rounded-xl"><input type="text" id="calculator-contactPerson" placeholder="اسم المسؤول" class="w-full p-3 border-2 rounded-xl"><input type="tel" id="calculator-phoneNumber" placeholder="رقم الهاتف" class="w-full p-3 border-2 rounded-xl"><input type="email" id="calculator-email" placeholder="البريد الإلكتروني" class="w-full p-3 border-2 rounded-xl"></div></div>
        <div><h4 class="text-xl font-bold text-gray-800 mb-4" style="font-family: 'Cairo', sans-serif;">اختر الخدمات المطلوبة</h4><div class="space-y-4">${service.items.map(item => `<div class="service-item bg-gray-50 p-4 rounded-xl border-2 border-transparent hover:bg-gray-100" data-item-id="${item.id}"><div class="flex justify-between items-center"><div class="flex items-center gap-3"><input type="checkbox" class="w-5 h-5 text-purple-600 pointer-events-none"><div><h5 class="font-semibold">${item.name}</h5></div></div><div class="text-lg font-bold text-purple-600" dir="ltr">SAR ${item.price.toLocaleString('en-US')}</div></div></div>`).join('')}</div></div>`
    );
    
    updateAdvancedCalculatorUI();
    toggleModal('advancedCalculatorModal', true);
};

// --- PDF & WHATSAPP LOGIC ---
const generateQuoteHTML = () => {
    const { currentServiceKey, selectedItems } = calculatorState;
    if (!currentServiceKey || selectedItems.size === 0) return '';
    const service = window.etyThemeData.services[currentServiceKey];
    const servicesList = Array.from(selectedItems).map(id => service.items.find(i => i.id === id)).filter(Boolean);
    const subtotal = servicesList.reduce((acc, item) => acc + (item ? item.price : 0), 0);
    let discountPercent = [0,0,5,10,15][Math.min(selectedItems.size, 4)] || 0;
    const discountAmount = Math.round(subtotal * discountPercent / 100);
    const total = subtotal - discountAmount;
    const currentDate = new Date().toLocaleDateString('en-GB');
    const quoteNumber = `ETY-${Date.now().toString().slice(-6)}`;
    const companyData = { name: $('#calculator-companyName').value.trim(), contact: $('#calculator-contactPerson').value.trim(), phone: $('#calculator-phoneNumber').value.trim(), email: $('#calculator-email').value.trim() };

    return `<!DOCTYPE html><html lang="ar" dir="rtl"><head><meta charset="UTF-8"><link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet"><style>*{margin:0;padding:0;box-sizing:border-box;font-family:'Cairo',sans-serif;}@page{size:A4;margin:0;}body{background:white;width:210mm;height:297mm;font-size:10pt;color:#374151;}.quote-container{width:100%;height:100%;display:flex;flex-direction:column;}.header{background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:white;padding:10mm 12mm;text-align:center;}.header h1{font-size:22pt;font-weight:700;margin-bottom:2mm;}.header p{font-size:11pt;opacity:0.9;}.meta-section{padding:8mm 12mm;display:grid;grid-template-columns:1fr 1fr;gap:10mm;border-bottom:1px solid #e5e7eb;background:#f9fafb;}.meta-box h3{font-size:11pt;font-weight:700;color:#1f2937;margin-bottom:3mm;padding-bottom:2mm;border-bottom:2px solid #667eea;}.meta-box p{font-size:9pt;color:#4b5563;margin-bottom:1.5mm;line-height:1.6;}.meta-box .label{font-weight:600;color:#374151;margin-left:5px;}.services-section{padding:8mm 12mm;flex-grow:1;}.section-title{font-size:14pt;font-weight:700;color:#1f2937;margin-bottom:5mm;}.services-table{width:100%;border-collapse:collapse;}.services-table th, .services-table td{padding:4mm 3mm;text-align:right;border-bottom:1px solid #e5e7eb;}.services-table th{background:#f3f4f6;font-size:9pt;font-weight:700;color:#4b5563;}.services-table .price-col{text-align:left;font-weight:600;font-family:sans-serif;}.summary-section{padding:8mm 12mm;display:flex;justify-content:flex-end;}.summary-box{width:50%;}.summary-row{display:flex;justify-content:space-between;padding:2.5mm 0;font-size:10pt;}.summary-row.total{font-size:14pt;font-weight:700;color:#667eea;border-top:2px solid #667eea;margin-top:2mm;padding-top:3mm;}.summary-label{font-weight:600;color:#4b5563;}.summary-value{font-weight:700;color:#1f2937;font-family:sans-serif;}.summary-value.discount{color:#10b981!important;}.terms-section{background:#f9fafb;padding:8mm 12mm;border-top:1px solid #e5e7eb;}.terms-title{font-size:11pt;font-weight:700;margin-bottom:3mm;color:#1f2937;}.terms-list{list-style-position:inside;padding-right:0;font-size:8.5pt;color:#4b5563;}.terms-list li{margin-bottom:1.5mm;}.footer{background:#1e293b;color:#cbd5e1;text-align:center;padding:4mm;font-size:8pt;flex-shrink:0;}@media (max-width: 600px){.meta-section{grid-template-columns:1fr;}.summary-box{width:100%;}}</style></head><body><div class="quote-container"><div class="header"><h1>عرض سعر</h1><p>خاص بخدمات ${service.name}</p></div><div class="meta-section"><div class="meta-box"><h3>معلومات العرض</h3><p><span class="label">رقم العرض:</span> ${quoteNumber}</p><p><span class="label">تاريخ الإصدار:</span> ${currentDate}</p><p><span class="label">صالح لمدة:</span> 30 يوماً</p></div>${(companyData.name||companyData.contact)?`<div class="meta-box"><h3>بيانات العميل</h3>${companyData.name?`<p><span class="label">الشركة:</span> ${companyData.name}</p>`:''}${companyData.contact?`<p><span class="label">المسؤول:</span> ${companyData.contact}</p>`:''}${companyData.phone?`<p><span class="label">الهاتف:</span> ${companyData.phone}</p>`:''}${companyData.email?`<p><span class="label">البريد الإلكتروني:</span> ${companyData.email}</p>`:''}</div>`:''}</div><div class="services-section"><h3 class="section-title">الخدمات المطلوبة</h3><table class="services-table"><thead><tr><th>الخدمة</th><th class="price-col">السعر</th></tr></thead><tbody>${servicesList.map(s=>`<tr><td>${s.name}</td><td class="price-col">SAR ${s.price.toLocaleString('en-US')}</td></tr>`).join('')}</tbody></table></div><div class="summary-section"><div class="summary-box"><div class="summary-row"><span class="summary-label">المجموع الفرعي</span><span class="summary-value">SAR ${subtotal.toLocaleString('en-US')}</span></div>${discountPercent>0?`<div class="summary-row"><span class="summary-label">الخصم (${discountPercent}%)</span><span class="summary-value discount">- SAR ${discountAmount.toLocaleString('en-US')}</span></div>`:''}<div class="summary-row total"><span class="summary-label">المجموع النهائي</span><span class="summary-value">SAR ${total.toLocaleString('en-US')}</span></div></div></div><div class="terms-section"><h3 class="terms-title">الشروط والأحكام</h3><ul class="terms-list"><li>مدة التسليم: حسب حجم العمل والتعديلات من يوم إلى 7 أيام عمل وبحد أقصى 15 يوم.</li><li>يبدأ العمل على التصميم بتعميد الطلب ودفع 50% من قيمة العرض.</li><li>عدد المراجعات المتاحة للتصميم: 2 مراجعة مجانية.</li></ul></div><div class="footer"><p>شكراً لاختياركم إي تي واي للتصميم | للتواصل: 059646303 | وثيقة عمل حر: FL-63005888</p></div></div></body></html>`;
    };

    const downloadAsPDF = async () => {
        if (calculatorState.selectedItems.size === 0) {
            showNotification('يرجى اختيار خدمة واحدة على الأقل', 'error');
            return;
        }
        const btn = $('#calculator-pdf-btn');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<span>جاري الإنشاء...</span>';
        btn.disabled = true;

        try {
            const iframe = document.createElement('iframe');
            iframe.style.position = 'absolute';
            iframe.style.left = '-9999px';
            iframe.style.width = '794px';
            iframe.style.height = '1123px';
            document.body.appendChild(iframe);

            const quoteHtml = generateQuoteHTML();
            iframe.contentDocument.open();
            iframe.contentDocument.write(quoteHtml);
            iframe.contentDocument.close();

            await new Promise(resolve => { 
                iframe.onload = () => {
                    setTimeout(resolve, 1500); 
                };
            });

            const canvas = await html2canvas(iframe.contentDocument.body, { scale: 2, useCORS: true });
            document.body.removeChild(iframe);

            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF({ orientation: 'portrait', unit: 'mm', format: 'a4' });
            const imgData = canvas.toDataURL('image/png');
            pdf.addImage(imgData, 'PNG', 0, 0, 210, 297, undefined, 'FAST');
            pdf.save(`عرض_سعر_ETY.pdf`);
            showNotification('تم تحميل عرض السعر بنجاح!', 'success');
        } catch (error) {
            console.error('PDF Error:', error);
            showNotification('حدث خطأ أثناء إنشاء PDF', 'error');
        } finally {
            btn.innerHTML = '<span>تحميل PDF</span>';
            btn.disabled = calculatorState.selectedItems.size === 0;
        }
    };
    
    const sendToWhatsApp = () => {
        const { currentServiceKey, selectedItems } = calculatorState;
        if (selectedItems.size === 0) return;

        const service = window.etyThemeData.services[currentServiceKey];
        const subtotal = Array.from(selectedItems).reduce((acc, itemId) => acc + (service.items.find(i => i.id === itemId)?.price || 0), 0);
        
        let discountPercent = [0,0,5,10,15][Math.min(selectedItems.size, 4)] || 0;

        const discountAmount = Math.round(subtotal * discountPercent / 100);
        const total = subtotal - discountAmount;

        const servicesText = Array.from(selectedItems).map(id => `• ${service.items.find(i => i.id === id)?.name || ''}`).join('\n');

        const message = `مرحباً، أرغب في عرض سعر للخدمات التالية من قسم "${service.name}":\n\n${servicesText}\n\nالمجموع النهائي بعد الخصم: SAR ${total.toLocaleString('en-US')}\n\nشكراً لكم.`;
        const whatsappUrl = `https://wa.me/966596466303?text=${encodeURIComponent(message)}`;
        window.open(whatsappUrl, '_blank');
    };

    // --- EVENT HANDLERS ---
    const handleGlobalClick = (e) => {
        const target = e.target;
        const action = target.closest('[data-action]')?.dataset.action;
        if (!action) {
            if (target.classList.contains('modal-container')) toggleModal(target.id, false);
            return;
        }

        const serviceKey = target.closest('.service-card')?.dataset.key;
        const workId = target.closest('[data-work-id]')?.dataset.workId;


        switch (action) {
            case 'toggle-menu': toggleModal('mobileMenu'); break;
            case 'close-modal': toggleModal(target.closest('.modal-container').id, false); break;
            case 'show-details': 
                if (serviceKey) {
                    const service = window.etyThemeData.services[serviceKey];
                    renderHTML('#serviceDetailsTitle', service.name);
                    renderHTML('#serviceDetailsContent', `<div class="bg-blue-50 p-6 rounded-lg"><h3 class="text-xl font-bold text-blue-800 mb-4">نظرة عامة</h3><p>${service.details.overview}</p></div><div class="bg-green-50 p-6 rounded-lg"><h3 class="text-xl font-bold text-green-800 mb-4">المميزات</h3><ul class="list-disc pr-5">${service.details.features.map(f => `<li>${f}</li>`).join('')}</ul></div><div class="bg-purple-50 p-6 rounded-lg"><h3 class="text-xl font-bold text-purple-800 mb-4">الفوائد</h3><ul class="list-disc pr-5">${service.details.benefits.map(b => `<li>${b}</li>`).join('')}</ul></div><div class="bg-yellow-50 p-6 rounded-lg"><h3 class="text-xl font-bold text-yellow-800 mb-4">طريقة العمل</h3><ul class="list-decimal pr-5">${service.details.workProcess.map(s => `<li>${s}</li>`).join('')}</ul></div>`);
                    toggleModal('serviceDetailsModal', true);
                }
                break;
            case 'open-calculator':
            case 'select-package':
                if (serviceKey) openAdvancedCalculator(serviceKey);
                break;
            case 'download-pdf': downloadAsPDF(); break;
            case 'send-whatsapp': sendToWhatsApp(); break;
            case 'show-work-details':
                if (workId) {
                    const work = window.etyThemeData.works.find(w => w.id === workId);
                    if (work) {
                        renderHTML('#workDetailsTitle', work.title);
                        renderHTML('#workDetailsContent', `<img src="${work.imageUrl}" alt="${work.title}" class="w-full h-auto rounded-lg">`);
                        toggleModal('workDetailsModal', true);
                    }
                }
                break;
        }
        
        const filter = target.closest('[data-filter]')?.dataset.filter;
        if (filter) {
            $$('#work-filters button').forEach(btn => btn.className = 'px-6 py-2 rounded-full font-bold transition-all');
            target.className = 'px-6 py-2 rounded-full font-bold transition-all bg-blue-600 text-white shadow-lg transform scale-105';
            $$('#works-container .work-item').forEach(item => {
                item.style.display = (filter === 'all' || item.dataset.category === filter) ? 'flex' : 'none';
            });
        }
    };
    
    // --- INITIALIZATION ---
    document.addEventListener('DOMContentLoaded', () => {
        populateUI();
        document.body.addEventListener('click', handleGlobalClick);
        
        $('#advancedCalculatorModal').addEventListener('click', (e) => {
            const itemEl = e.target.closest('.service-item');
            if (!itemEl) return;
            
            const itemId = itemEl.dataset.itemId;
            const checkbox = itemEl.querySelector('input');

            if (calculatorState.selectedItems.has(itemId)) {
                calculatorState.selectedItems.delete(itemId);
                itemEl.classList.remove('selected');
                checkbox.checked = false;
            } else {
                calculatorState.selectedItems.add(itemId);
                itemEl.classList.add('selected');
                checkbox.checked = true;
            }
            updateAdvancedCalculatorUI();
        });

        $('#meeting-form')?.addEventListener('submit', (e) => {
            e.preventDefault();
            showNotification('تم إرسال طلب الاجتماع بنجاح!', 'success');
            e.target.reset();
        });
        $$('#mobileMenu a').forEach(link => link.addEventListener('click', () => toggleModal('mobileMenu', false)));
    });
    </script>
</body>
</html>

