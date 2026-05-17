<?php
// Eng: Theme functions and definitions.
// Ar: وظائف القالب والتعريفات.

function ety_theme_scripts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&family=Cairo:wght@300;400;600;700&display=swap', array(), null );
    wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false );
    wp_enqueue_script( 'jspdf', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js', array(), '2.5.1', true );
    wp_enqueue_script( 'html2canvas', 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js', array(), '1.4.1', true );
    wp_enqueue_script( 'ety-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jspdf', 'html2canvas'), '1.0', true );
    wp_localize_script( 'ety-main-js', 'etyThemeData', get_app_data() );
}
add_action( 'wp_enqueue_scripts', 'ety_theme_scripts' );

function ety_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'ety-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'ety_register_nav_menu' );

// Custom Nav Walker for Desktop Menu
class Ety_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $output .= '<a href="' . $item->url . '" class="text-gray-700 hover:text-blue-600 transition-colors">' . $item->title . '</a>';
    }
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "";
    }
}

// Custom Nav Walker for Mobile Menu
class Ety_Nav_Walker_Mobile extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $output .= '<a href="' . $item->url . '" class="block text-gray-700 hover:text-blue-600 py-2">' . $item->title . '</a>';
    }
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "";
    }
}

function get_app_data() {
    return [
        'services' => [
            'profile' => [ 'name' => 'تصميم ملف تعريفي', 'icon' => '📋', 'price' => 250, 'startColor' => '#0b7d85', 'endColor' => '#065f65', 'items' => [ [ 'id' => 'ar-profile', 'name' => 'ملف تعريفي عربي (5-12 صفحة)', 'price' => 250 ], [ 'id' => 'en-profile', 'name' => 'ملف تعريفي إنجليزي', 'price' => 300 ], [ 'id' => 'bilingual-profile', 'name' => 'ملف تعريفي عربي/إنجليزي', 'price' => 450 ], [ 'id' => 'landing-page', 'name' => 'صفحة هبوط تفاعلية', 'price' => 800 ], [ 'id' => 'business-card', 'name' => 'بزنيس كارد عالي الجودة', 'price' => 25 ], [ 'id' => 'receipt-voucher', 'name' => 'سند قبض وصرف', 'price' => 35 ], [ 'id' => 'simple-logo', 'name' => 'شعار بسيط', 'price' => 150 ], [ 'id' => 'professional-logo', 'name' => 'شعار احترافي مرسوم', 'price' => 800 ], [ 'id' => 'envelopes', 'name' => 'تصميم مظاريف', 'price' => 35 ] ], 'details' => [ 'overview' => 'نقدم خدمة تصميم الملفات التعريفية الاحترافية التي تعكس هوية شركتك وتبرز نقاط قوتها بأسلوب مبتكر وجذاب.', 'features' => ['تصميم احترافي يعكس هوية الشركة', 'محتوى مكتوب بعناية باللغتين', 'رسوم بيانية وإنفوجرافيك', 'تنسيق جاهز للطباعة بجودة عالية'], 'benefits' => ['زيادة الثقة والمصداقية', 'تحسين الصورة المهنية للشركة', 'سهولة التسويق والعرض'], 'workProcess' => ['استلام المتطلبات وجمع المعلومات', 'تصميم النموذج الأولي', 'المراجعة والتعديل حسب ملاحظاتك', 'التسليم النهائي للملفات بجودة عالية'] ] ],
            'websites' => [ 'name' => 'المواقع والمتاجر', 'icon' => '🌐', 'price' => 800, 'startColor' => '#3b82f6', 'endColor' => '#1d4ed8', 'items' => [ [ 'id' => 'landing-page-web', 'name' => 'صفحة هبوط واحدة', 'price' => 800 ], [ 'id' => 'basic-site', 'name' => 'موقع تعريفي أساسي (5-8 صفحات)', 'price' => 1500 ], [ 'id' => 'salla-store', 'name' => 'متجر إلكتروني (سلة)', 'price' => 1500 ], [ 'id' => 'advanced-store', 'name' => 'متجر إلكتروني متقدم', 'price' => 4000 ], [ 'id' => 'seo-basic', 'name' => 'تحسين محركات البحث', 'price' => 400 ], [ 'id' => 'hosting-domain', 'name' => 'استضافة ونطاق لسنة', 'price' => 300 ] ], 'details' => [ 'overview' => 'نصمم مواقع تعريفية ومتاجر احترافية تواكب أحدث التقنيات وتساعد في نمو أعمالك وزيادة انتشارك.', 'features' => ['تصميم متجاوب لجميع الأجهزة', 'سرعة تحميل فائقة وأداء محسّن', 'تحسين محركات البحث SEO مدمج', 'نظام إدارة محتوى سهل'], 'benefits' => ['زيادة الوصول للعملاء', 'تحسين المبيعات', 'بناء الثقة الرقمية'], 'workProcess' => ['تحليل المتطلبات وتخطيط الموقع', 'تصميم الواجهات وتجربة المستخدم (UI/UX)', 'برمجة وتطوير الموقع', 'الاختبار والنشر على الاستضافة'] ] ],
            'content' => [ 'name' => 'إنتاج المحتوى', 'icon' => '📝', 'price' => 500, 'startColor' => '#8b5cf6', 'endColor' => '#7c3aed', 'items' => [ [ 'id' => 'social-media-30', 'name' => 'محتوى وسائل التواصل (30 منشور)', 'price' => 500 ], [ 'id' => 'blog-posts-10', 'name' => 'مقالات مدونة (10 مقالات)', 'price' => 400 ], [ 'id' => 'video-content-5', 'name' => 'محتوى فيديو (5 فيديوهات)', 'price' => 800 ] ], 'details' => [ 'overview' => 'نقدم خدمات إنتاج المحتوى الذكي والإبداعي الذي يجذب جمهورك ويحقق أهدافك التسويقية.', 'features' => ['محتوى مخصص ومبتكر', 'استخدام تقنيات الذكاء الاصطناعي', 'تصميم بصري جذاب'], 'benefits' => ['زيادة التفاعل والمشاركة', 'بناء علاقة قوية مع الجمهور', 'تحسين الوعي بالعلامة التجارية'], 'workProcess' => ['وضع استراتيجية المحتوى', 'كتابة وإنشاء المحتوى', 'التصميم والمراجعة', 'النشر والجدولة على المنصات'] ] ],
            'analytics' => [ 'name' => 'تحليلات ذكية', 'icon' => '📊', 'price' => 400, 'startColor' => '#10b981', 'endColor' => '#059669', 'items' => [ [ 'id' => 'basic-analytics', 'name' => 'تحليل أساسي للموقع', 'price' => 400 ], [ 'id' => 'advanced-analytics', 'name' => 'تحليل متقدم ومفصل', 'price' => 800 ], [ 'id' => 'competitor-analysis', 'name' => 'تحليل المنافسين', 'price' => 500 ] ], 'details' => [ 'overview' => 'نوفر خدمات التحليلات الذكية التي تساعدك في فهم جمهورك وقياس أداء أعمالك الرقمية.', 'features' => ['تحليل شامل لسلوك الزوار', 'تقارير مفصلة وسهلة الفهم', 'لوحات تحكم تفاعلية'], 'benefits' => ['اتخاذ قرارات مبنية على البيانات', 'تحسين الاستراتيجيات التسويقية', 'زيادة العائد على الاستثمار'], 'workProcess' => ['ربط أدوات التحليل (مثل Google Analytics)', 'جمع وتحليل البيانات', 'إعداد التقارير الدورية', 'تقديم التوصيات والاستشارات'] ] ],
            'identity' => [ 'name' => 'الهوية البصرية', 'icon' => '🎨', 'price' => 600, 'startColor' => '#1e40af', 'endColor' => '#1e3a8a', 'items' => [ [ 'id' => 'logo-package', 'name' => 'حزمة الشعار الكاملة', 'price' => 600 ], [ 'id' => 'color-palette', 'name' => 'لوحة الألوان والخطوط', 'price' => 200 ], [ 'id' => 'business-card-design', 'name' => 'تصميم كروت العمل', 'price' => 150 ] ], 'details' => [ 'overview' => 'نصمم هويات بصرية متكاملة ومميزة تعكس شخصية علامتك التجارية وتميزها عن المنافسين.', 'features' => ['تصميم شعار احترافي', 'لوحة ألوان متناسقة', 'دليل استخدام شامل'], 'benefits' => ['تميز العلامة التجارية', 'زيادة التعرف على العلامة', 'بناء الثقة والمصداقية'], 'workProcess' => ['جلسة استكشاف لفهم العلامة التجارية', 'تصميم عدة نماذج للشعار', 'اختيار النموذج وتطويره', 'تصميم تطبيقات الهوية وتسليم الدليل'] ] ],
            'menu' => [ 'name' => 'تصميم المنيو', 'icon' => '🍽️', 'price' => 300, 'startColor' => '#f59e0b', 'endColor' => '#d97706', 'items' => [ [ 'id' => 'paper-menu', 'name' => 'منيو ورقي أساسي', 'price' => 300 ], [ 'id' => 'digital-menu', 'name' => 'منيو إلكتروني تفاعلي', 'price' => 600 ], [ 'id' => 'food-photography', 'name' => 'تصوير احترافي للأطباق', 'price' => 400 ] ], 'details' => [ 'overview' => 'نصمم منيو احترافي وجذاب لمطعمك أو مقهاك يعكس هوية علامتك التجارية ويحفز العملاء على الطلب.', 'features' => ['تصميم منيو ورقي وإلكتروني', 'تصميم يعكس هوية المطعم', 'استخدام صور جذابة'], 'benefits' => ['زيادة جاذبية الأطباق', 'تحسين تجربة العميل', 'سهولة التحديث'], 'workProcess' => ['استلام قائمة الأصناف والصور (إن وجدت)', 'تصميم نسخة أولية للمنيو', 'المراجعة والتعديل', 'تسليم الملفات جاهزة للطباعة أو للنشر'] ] ],
            'marketing' => [ 'name' => 'التسويق الرقمي', 'icon' => '📱', 'price' => 800, 'startColor' => '#64748b', 'endColor' => '#475569', 'items' => [ [ 'id' => 'social-management', 'name' => 'إدارة وسائل التواصل', 'price' => 800 ], [ 'id' => 'paid-ads', 'name' => 'حملات إعلانية مدفوعة', 'price' => 1000 ], [ 'id' => 'seo-monthly', 'name' => 'تحسين محركات البحث', 'price' => 600 ] ], 'details' => [ 'overview' => 'نقدم خدمات التسويق الرقمي المتكاملة التي تساعدك في الوصول لجمهورك المستهدف وزيادة مبيعاتك.', 'features' => ['استراتيجيات تسويقية مخصصة', 'إدارة احترافية للسوشيال ميديا', 'حملات إعلانية فعالة'], 'benefits' => ['زيادة الوعي بالعلامة التجارية', 'جذب عملاء جدد', 'زيادة المبيعات'], 'workProcess' => ['وضع الخطة التسويقية', 'إعداد وإطلاق الحملات', 'مراقبة وتحليل الأداء', 'تقديم تقارير دورية بالنتائج'] ] ],
            'letterhead' => [ 'name' => 'الورق الرسمي', 'icon' => '📄', 'price' => 150, 'startColor' => '#dc2626', 'endColor' => '#b91c1c', 'items' => [ [ 'id' => 'letterhead-basic', 'name' => 'ورق رسمي أساسي', 'price' => 150 ], [ 'id' => 'letterhead-pack', 'name' => 'ورق رسمي + مظروف', 'price' => 200 ], [ 'id' => 'invoice-design', 'name' => 'تصميم فاتورة رسمية', 'price' => 120 ] ], 'details' => [ 'overview' => 'نقدم خدمة تصميم الورق الرسمي الاحترافي للشركات والمؤسسات، والذي يعكس الهوية المؤسسية.', 'features' => ['تصميم يعكس هوية الشركة', 'تخطيط احترافي للمعلومات', 'ملفات جاهزة للطباعة'], 'benefits' => ['إضفاء طابع مهني', 'تعزيز الثقة والمصداقية', 'توحيد الهوية البصرية'], 'workProcess' => ['استلام الشعار وبيانات الشركة', 'تصميم النموذج الأولي', 'المراجعة والتعديل', 'تسليم الملفات جاهزة للطباعة'] ] ],
            'schoolActivities' => [ 'name' => 'الأنشطة المدرسية', 'icon' => '🎓', 'price' => 200, 'startColor' => '#059669', 'endColor' => '#047857', 'items' => [ [ 'id' => 'worksheets', 'name' => 'أوراق عمل تفاعلية', 'price' => 200 ], [ 'id' => 'flashcards', 'name' => 'بطاقات تعليمية ملونة', 'price' => 150 ], [ 'id' => 'classroom-board', 'name' => 'لوحة تعليمية كبيرة', 'price' => 180 ] ], 'details' => [ 'overview' => 'نقدم خدمات تصميم الأنشطة المدرسية التفاعلية والإبداعية التي تساعد في تحسين العملية التعليمية.', 'features' => ['تصميم أنشطة تفاعلية', 'أوراق عمل جذابة', 'ألعاب تعليمية مطبوعة'], 'benefits' => ['تحسين تفاعل الطلاب', 'جعل التعلم أكثر متعة', 'تطوير المهارات'], 'workProcess' => ['تحديد الهدف التعليمي للنشاط', 'تصميم النشاط بشكل جذاب وتفاعلي', 'المراجعة والتعديل', 'تسليم الملفات جاهزة للاستخدام'] ] ],
            'teachers' => [ 'name' => 'خدمات المعلمين', 'icon' => '👨‍🏫', 'price' => 180, 'startColor' => '#7c3aed', 'endColor' => '#6d28d9', 'items' => [ [ 'id' => 'teacher-portfolio', 'name' => 'ملف إنجازات معلم', 'price' => 350 ], [ 'id' => 'presentation-design', 'name' => 'عرض تقديمي تفاعلي', 'price' => 200 ], [ 'id' => 'teacher-cv', 'name' => 'سيرة ذاتية تعليمية', 'price' => 180 ] ], 'details' => [ 'overview' => 'نوفر مجموعة شاملة من الخدمات المتخصصة للمعلمين لتطوير أدواتهم التعليمية.', 'features' => ['تصميم ملف إنجازات احترافي', 'عروض تقديمية تفاعلية', 'تصميم أوراق عمل'], 'benefits' => ['تطوير الهوية المهنية', 'تحسين جودة المواد التعليمية', 'زيادة تفاعل الطلاب'], 'workProcess' => ['استلام المحتوى المطلوب', 'تصميم المواد بشكل احترافي', 'المراجعة والتعديل', 'تسليم الملفات النهائية'] ] ],
            'students' => [ 'name' => 'خدمات الطلاب', 'icon' => '🎒', 'price' => 120, 'startColor' => '#0891b2', 'endColor' => '#0e7490', 'items' => [ [ 'id' => 'graduation-project', 'name' => 'مشروع تخرج كامل', 'price' => 400 ], [ 'id' => 'academic-presentation', 'name' => 'عرض تقديمي أكاديمي', 'price' => 180 ], [ 'id' => 'student-cv', 'name' => 'سيرة ذاتية طلابية', 'price' => 120 ] ], 'details' => [ 'overview' => 'نقدم خدمات تصميم متخصصة للطلاب في جميع المراحل لمساعدتهم في تقديم أعمالهم بشكل احترافي.', 'features' => ['تصميم مشاريع التخرج', 'عروض تقديمية أكاديمية', 'سيرة ذاتية مميزة'], 'benefits' => ['تحسين جودة العروض', 'إبراز الإنجازات', 'زيادة فرص القبول'], 'workProcess' => ['فهم متطلبات المشروع أو العرض', 'تصميم وتنسيق المحتوى', 'المراجعة والتعديل', 'تسليم العمل جاهزاً للتقديم'] ] ],
            'annualReport' => [ 'name' => 'التقرير السنوي', 'icon' => '📊', 'price' => 800, 'startColor' => '#ea580c', 'endColor' => '#c2410c', 'items' => [ [ 'id' => 'report-basic', 'name' => 'تقرير سنوي أساسي', 'price' => 800 ], [ 'id' => 'infographics', 'name' => 'رسوم بيانية وإنفوجرافيك', 'price' => 400 ], [ 'id' => 'report-cover', 'name' => 'تصميم غلاف التقرير', 'price' => 200 ] ], 'details' => [ 'overview' => 'نقدم خدمة تصميم التقارير السنوية الاحترافية للشركات والتي تعكس الإنجازات بطريقة بصرية جذابة.', 'features' => ['تصميم شامل ومفصل', 'رسوم بيانية احترافية', 'تخطيط متقن للمحتوى'], 'benefits' => ['تعزيز الثقة لدى المساهمين', 'إبراز الإنجازات والنمو', 'تحسين الصورة المهنية'], 'workProcess' => ['استلام البيانات والتقارير المالية', 'تصميم هيكل التقرير والرسوم البيانية', 'المراجعة والتعديل', 'تسليم التقرير النهائي جاهزاً للنشر'] ] ]
        ],
        'packages' => [],
        'partners' => [
            [ 'alt' => 'شريك 1', 'src' => 'https://placehold.co/150x80/cccccc/ffffff?text=شريك+1' ],
            [ 'alt' => 'شريك 2', 'src' => 'https://placehold.co/150x80/cccccc/ffffff?text=شريك+2' ],
            [ 'alt' => 'شريك 3', 'src' => 'https://placehold.co/150x80/cccccc/ffffff?text=شريك+3' ],
            [ 'alt' => 'شريك 4', 'src' => 'https://placehold.co/150x80/cccccc/ffffff?text=شريك+4' ],
            [ 'alt' => 'شريك 5', 'src' => 'https://placehold.co/150x80/cccccc/ffffff?text=شريك+5' ],
            [ 'alt' => 'شريك 6', 'src' => 'https://placehold.co/150x80/cccccc/ffffff?text=شريك+6' ],
        ],
        'works' => [
            [ 'id' => 'work-medical', 'title' => 'بروفايل مركز طبي', 'desc' => 'تصميم ملف تعريفي شامل لمركز طبي.', 'category' => 'profile', 'imageUrl' => 'https://placehold.co/400x300/4C1D95/FFFFFF?text=بروفايل%20طبي' ],
            [ 'id' => 'work-store1', 'title' => 'متجر إلكتروني للمجوهرات', 'desc' => 'متجر فاخر يعرض المجوهرات بتصميم جذاب.', 'category' => 'e-commerce', 'imageUrl' => 'https://placehold.co/400x300/10B981/FFFFFF?text=متجر%20مجوهرات' ],
            [ 'id' => 'work-menu1', 'title' => 'منيو مطعم إيطالي', 'desc' => 'تصميم منيو رقمي وورقي لمطعم إيطالي.', 'category' => 'menu', 'imageUrl' => 'https://placehold.co/400x300/F59E0B/FFFFFF?text=منيو%20إيطالي' ],
            [ 'id' => 'work-menu2', 'title' => 'منيو مقهى حديث', 'desc' => 'منيو إلكتروني تفاعلي لمقهى عصري.', 'category' => 'menu', 'imageUrl' => 'https://placehold.co/400x300/F59E0B/FFFFFF?text=منيو%20مقهى' ],
        ],
        'whyUs' => [
            [ 'icon' => '🤝', 'title' => 'دعم فني مستمر', 'desc' => 'نقدم دعماً فنياً ومتابعة بعد التسليم لضمان رضاكم التام.' ],
            [ 'icon' => '⚡️', 'title' => 'التزام بالمواعيد', 'desc' => 'نحترم وقتك ونلتزم بالمواعيد المحددة مع تقديم تحديثات دورية.' ],
            [ 'icon' => '💵', 'title' => 'أسعار تنافسية', 'desc' => 'نقدم حلولاً احترافية بأسعار عادلة ومناسبة لميزانيتك.' ],
            [ 'icon' => '💎', 'title' => 'جودة عالية', 'desc' => 'نلتزم بأعلى معايير الجودة في كل مشروع لضمان تقديم نتائج تفوق توقعاتك.' ]
        ]
    ];
    return $app_data;
}

?>