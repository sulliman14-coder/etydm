/**
 * ملف main.js
 * جميع أكواد JavaScript للموقع
 */

// =========================================================
// 1. وظائف عامة مساعدة
// =========================================================

function showNotification(message, type = 'info') {
    const notification = document.getElementById('notification') || createNotificationElement();
    notification.textContent = message;
    notification.className = `notification show ${type}`;
    
    setTimeout(() => {
        notification.classList.remove('show');
    }, 4000);
}

function createNotificationElement() {
    const notification = document.createElement('div');
    notification.id = 'notification';
    notification.className = 'notification';
    document.body.appendChild(notification);
    return notification;
}

// =========================================================
// 2. إدارة المظهر (Theme Management)
// =========================================================

function initTheme() {
    // ضبط الوضع الافتراضي نهاري (Light Mode)
    if (!localStorage.getItem('theme')) {
        localStorage.setItem('theme', 'light');
    }
    
    // تطبيق الوضع المحفوظ
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    
    // مستمع حدث لتبديل الوضع
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            const theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
            localStorage.setItem('theme', theme);
        });
    }
    
    // قائمة الجوال
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
        });
    }
    
    // إغلاق قائمة الجوال عند النقر على رابط
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', () => {
            if (mobileMenu) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
            }
        });
    });
}

// =========================================================
// 3. وظائف الكشف عن العناصر (Reveal)
// =========================================================

function initReveal() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
}

// =========================================================
// 4. وظائف الإحصائيات
// =========================================================

function initStats() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = +el.dataset.target;
                const duration = 1500;
                const start = performance.now();
                
                const step = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    el.textContent = '+' + Math.floor(progress * target);
                    if (progress < 1) {
                        requestAnimationFrame(step);
                    } else {
                        el.textContent = '+' + target;
                    }
                };
                
                requestAnimationFrame(step);
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.stat-number[data-target]').forEach(el => observer.observe(el));
}

// =========================================================
// 5. بيانات الخدمات والمشاريع
// =========================================================

const servicesData = [
    { id: 'profile', icon: 'ph-book-open', title: 'بروفايل الشركات والمؤسسات', shortDesc: 'ملفات تعريفية احترافية تبرز قوة مؤسستك', tags: ['تصميم', 'احترافي'] },
    { id: 'seo', icon: 'ph-trend-up', title: 'تحسين محركات البحث (SEO)', shortDesc: 'تصدر النتائج الأولى في بحث جوجل', tags: ['تحسين', 'بحث'] },
    { id: 'web', icon: 'ph-browser', title: 'تصميم المواقع والمتاجر', shortDesc: 'مواقع سريعة وتفاعلية', tags: ['ويب', 'متجر'] },
    { id: 'ai', icon: 'ph-robot', title: 'وكلاء الذكاء الاصطناعي', shortDesc: 'روبوتات محادثة ذكية', tags: ['AI', 'ذكاء'] },
    { id: 'identity', icon: 'ph-bezier-curve', title: 'تصميم الهوية البصرية', shortDesc: 'شعارات وأدلة هوية بصرية', tags: ['تصميم', 'هوية'] },
    { id: 'marketing', icon: 'ph-megaphone', title: 'إدارة التسويق والحملات', shortDesc: 'وصول لجمهورك المستهدف', tags: ['تسويق', 'حملات'] },
    { id: 'edu', icon: 'ph-student', title: 'الخدمات التعليمية', shortDesc: 'حلول للمنشآت التعليمية', tags: ['تعليم', 'حلول'] },
    { id: 'menu', icon: 'ph-hamburger', title: 'تصميم قوائم الطعام', shortDesc: 'قوائم رقمية وورقية مصممة', tags: ['مطاعم', 'تصميم'] },
];

const portfolioItems = [
    { id: 1, title: 'تقرير سنوي جمعية مسارات', category: 'profile', image: 'https://via.placeholder.com/400x300/667eea/ffffff?text=Portfolio+1', desc: 'تقرير احترافي مميز', tags: ['PDF', 'تقرير'] },
    { id: 2, title: 'بروفايل إعمار المساند', category: 'profile', image: 'https://via.placeholder.com/400x300/667eea/ffffff?text=Portfolio+2', desc: 'بروفايل شركة متخصصة', tags: ['شركة', 'بروفايل'] },
    { id: 3, title: 'أوفى للتطوير العقاري', category: 'profile', image: 'https://via.placeholder.com/400x300/667eea/ffffff?text=Portfolio+3', desc: 'بروفايل تطوير عقاري', tags: ['عقار', 'تطوير'] },
    { id: 4, title: 'مناسيب للمقاولات', category: 'profile', image: 'https://via.placeholder.com/400x300/667eea/ffffff?text=Portfolio+4', desc: 'بروفايل شركة مقاولات', tags: ['مقاولات', 'بناء'] },
    { id: 5, title: 'متجر سكون للعناية', category: 'web', image: 'https://via.placeholder.com/400x300/10b981/ffffff?text=Portfolio+5', desc: 'متجر إلكتروني متقدم', tags: ['متجر', 'ويب'] },
    { id: 6, title: 'رواد الإعمار الكبرى', category: 'web', image: 'https://via.placeholder.com/400x300/10b981/ffffff?text=Portfolio+6', desc: 'موقع إعمار احترافي', tags: ['عقار', 'موقع'] },
    { id: 7, title: 'متجر عسل صبوح', category: 'web', image: 'https://via.placeholder.com/400x300/10b981/ffffff?text=Portfolio+7', desc: 'متجر منتجات طبيعية', tags: ['منتجات', 'متجر'] },
    { id: 8, title: 'مرونة القوة اللوجستية', category: 'web', image: 'https://via.placeholder.com/400x300/10b981/ffffff?text=Portfolio+8', desc: 'موقع خدمات لوجستية', tags: ['خدمات', 'لوجستية'] },
    { id: 9, title: 'منيو كوفي هاوس', category: 'menu', image: 'https://via.placeholder.com/400x300/f59e0b/ffffff?text=Portfolio+9', desc: 'منيو مقهى احترافي', tags: ['مقهى', 'منيو'] },
    { id: 10, title: 'برجر لارنج', category: 'menu', image: 'https://via.placeholder.com/400x300/f59e0b/ffffff?text=Portfolio+10', desc: 'منيو مطعم وجبات سريعة', tags: ['مطعم', 'طعام'] },
];

// =========================================================
// 6. وظائف الرندر
// =========================================================

function renderServices() {
    const grid = document.getElementById('servicesGrid');
    if (!grid) return;
    
    grid.innerHTML = servicesData.map((s, i) => {
        const delay = (i % 3) * 80;
        return `<div class="bg-white dark:bg-surface-dark-card border border-gray-200 dark:border-surface-dark-border service-card p-6 flex flex-col reveal cursor-pointer hover:shadow-lg transition" style="transition-delay:${delay}ms" onclick="openServiceModal('${s.id}')">
            <div class="w-12 h-12 rounded-xl bg-brand-50 dark:bg-brand-900/20 text-brand-600 flex items-center justify-center text-2xl mb-4"><i class="ph ${s.icon}"></i></div>
            <h3 class="text-xl font-black mb-2">${s.title}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 flex-grow">${s.shortDesc}</p>
            <div class="flex flex-wrap gap-2 mb-3">${s.tags.map(t=>`<span class="text-xs bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded-md font-bold">${t}</span>`).join('')}</div>
            <button class="text-brand-600 font-bold flex items-center gap-1 text-sm">تفاصيل <i class="ph ph-arrow-left"></i></button>
        </div>`;
    }).join('');
}

function renderPortfolio(filter = 'all') {
    const grid = document.getElementById('portfolioContainer');
    if (!grid) return;
    
    const items = filter === 'all' ? portfolioItems : portfolioItems.filter(i => i.category === filter);
    grid.innerHTML = items.map((item, i) => {
        const cat = item.category === 'profile' ? 'بروفايل' : item.category === 'web' ? 'موقع إلكتروني' : 'منيو';
        return `<div class="bg-white dark:bg-surface-dark-card rounded-2xl overflow-hidden border border-gray-200 dark:border-surface-dark-border service-card cursor-pointer reveal hover:shadow-lg transition" style="transition-delay:${i*50}ms" onclick="openPortfolioModal(${item.id})">
            <div class="aspect-[4/3] overflow-hidden"><img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover hover:scale-105 transition duration-500" loading="lazy"/></div>
            <div class="p-5"><span class="text-xs text-brand-600 font-bold bg-brand-50 px-2 py-1 rounded">${cat}</span><h3 class="font-black mt-2 mb-1">${item.title}</h3><p class="text-sm text-gray-600 dark:text-gray-400">${item.desc}</p></div>
        </div>`;
    }).join('');
}

function renderContact() {
    const container = document.getElementById('contactServicesTags');
    if (!container) return;
    
    container.innerHTML = servicesData.map(s => `
        <label class="flex items-center gap-3 p-3 bg-white/5 border border-white/10 rounded-xl cursor-pointer hover:bg-white/10 transition">
            <input type="checkbox" class="service-cb text-brand-500 w-5 h-5 rounded" value="${s.title}">
            <span class="text-sm font-bold text-white">${s.title}</span>
        </label>`).join('');
}

// =========================================================
// 7. وظائف المشاريع والخدمات
// =========================================================

window.openServiceModal = function(id) {
    const service = servicesData.find(x => x.id === id);
    if (!service) return;
    
    alert(`خدمة: ${service.title}\n\n${service.shortDesc}\n\nسيتم التواصل معك قريباً عبر WhatsApp`);
    window.open(`https://wa.me/966596466303?text=${encodeURIComponent(`مرحباً، أريد خدمة: ${service.title}`)}`, '_blank');
};

window.openPortfolioModal = function(id) {
    const item = portfolioItems.find(p => p.id === id);
    if (!item) return;
    
    alert(`${item.title}\n\n${item.desc}`);
};

// =========================================================
// 8. وظائف WhatsApp
// =========================================================

window.sendWhatsApp = function() {
    const selected = Array.from(document.querySelectorAll('.service-cb:checked')).map(cb => cb.value);
    const notes = document.getElementById('projectNotes').value.trim();
    
    if (!selected.length && !notes) {
        alert('الرجاء اختيار خدمة واحدة على الأقل أو كتابة ملاحظات');
        return;
    }
    
    let msg = "مرحباً إي تي واي 👋\nأرغب في:\n";
    selected.forEach(s => msg += `✅ ${s}\n`);
    if (notes) msg += `\n📝 ${notes}`;
    
    window.open(`https://wa.me/966596466303?text=${encodeURIComponent(msg)}`, '_blank');
};

// =========================================================
// 9. وظائف التصفية
// =========================================================

document.addEventListener('click', (e) => {
    if (e.target.classList.contains('filter-chip')) {
        document.querySelectorAll('.filter-chip').forEach(b => b.classList.remove('active'));
        e.target.classList.add('active');
        renderPortfolio(e.target.dataset.filter);
    }
});

// =========================================================
// 10. التهيئة
// =========================================================

document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    renderServices();
    renderPortfolio();
    renderContact();
    initReveal();
    initStats();
    
    // سحس سلس
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
