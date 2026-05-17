<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class("bg-gray-50"); ?>>

    <!-- Notification Container -->
    <div id="notification" class="notification"></div>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/966596466303" target="_blank" class="whatsapp-float" title="تواصل معنا عبر واتساب">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.488"/></svg>
    </a>

    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="<?php echo home_url(); ?>" class="flex items-center space-x-3 space-x-reverse">
                    <img src="https://placehold.co/120x120/4C1D95/FFFFFF?text=شعار" alt="<?php bloginfo('name'); ?>" class="w-12 h-12 object-contain rounded-lg">
                    <div><h1 class="text-lg md:text-xl font-bold text-gray-800 leading-tight">إي تي واي</h1></div>
                </a>
                <nav class="hidden md:flex items-center space-x-8 space-x-reverse">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary_menu',
                            'container'      => false,
                            'items_wrap'     => '%3$s',
                            'walker'         => new Ety_Nav_Walker()
                        ) );
                    ?>
                </nav>
                <button data-action="toggle-menu" class="md:hidden text-gray-700">
                    <svg class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
        <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 h-full w-64 bg-white shadow-xl z-50 md:hidden">
            <div class="p-6">
                <button data-action="toggle-menu" class="float-left text-gray-600 mb-8">
                    <svg class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                <nav class="space-y-4 mt-8">
                     <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary_menu',
                            'container'      => false,
                            'items_wrap'     => '%3$s',
                            'walker'         => new Ety_Nav_Walker_Mobile()
                        ) );
                    ?>
                </nav>
            </div>
        </div>
    </header>