<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spider-solution
 */
?>

<footer class="pb-12 border-t border-gray-100 font-sans" data-glows='[
        { "color": "#f7dc72", "top": "60%", "right": "-50%", "width": "100%" },
        { "color": "#D8E4FF", "top": "-50%", "right": "-30%", "height": "100%" }
    ]'>

    <div class="border-b border-gray-200 py-12">
        <div class="container mx-auto px-12 md:pl-12">
            <img src="<?php echo get_template_directory_uri(); ?>/images/main-logo-dark.svg" alt="SPIDER Solutions" class="h-10" />
        </div>
    </div>

    <div class="container mx-auto px-4 md:px-12 pt-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
            <div class="lg:col-span-5 space-y-8">
                <p class="reveal-type text-[#667085] text-[15px] leading-relaxed max-w-sm">
                    Hjemmetjenesten er kompleks: kompetansekrav, tidsvinduer, pauser, kontinuitet og store variasjoner gjennom dagen.
                </p>

                <div class="space-y-4 max-w-md">
                    <div class="p-3 md:p-4 rounded-[15px] border border-gray-300 flex items-center gap-6 transition-all hover:bg-white hover:shadow-xl hover:shadow-gray-200/40 group">
                        <div class="w-12 h-12 bg-[#FFE587] rounded-full flex items-center justify-center flex-shrink-0 shadow-sm transition-transform group-hover:scale-105">
                            <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79a15.15 15.15 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.27c1.12.45 2.33.69 3.58.69a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.24 2.46.69 3.58a1 1 0 01-.27 1.11l-2.2 2.2z" />
                            </svg>
                        </div>
                        <span class="text-md md:text-[18px] font-light font-serif text-gray-900 tracking-tight">+47 41.21.44.57</span>
                    </div>

                    <div class="p-3 md:p-4 rounded-[15px] border border-gray-300 flex items-center gap-6 transition-all hover:bg-white hover:shadow-xl hover:shadow-gray-200/40 group">
                        <div class="w-12 h-12 bg-[#FFE587] rounded-full flex items-center justify-center flex-shrink-0 shadow-sm transition-transform group-hover:scale-105">
                            <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                            </svg>
                        </div>
                        <span class="text-md md:text-[18px] font-light font-serif text-gray-900 tracking-tight">info@spidersolutions.no</span>
                    </div>

                    <div class="p-3 md:p-4 rounded-[15px] border border-gray-300 flex items-center gap-6 transition-all hover:bg-white hover:shadow-xl hover:shadow-gray-200/40 group">
                        <div class="w-12 h-12 bg-[#FFE587] rounded-full flex items-center justify-center flex-shrink-0 shadow-sm transition-transform group-hover:scale-105">
                            <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                            </svg>
                        </div>
                        <span class="text-md md:text-[18px] font-light font-serif text-gray-900 tracking-tight">Gaustadalléen 21, 0349 Oslo</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 grid grid-cols-2 md:grid-cols-3 gap-8">
                <div class="hidden md:block"></div>
                <ul class="flex flex-col gap-5 list-none">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-1',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </ul>

                <ul class="flex flex-col gap-5 list-none">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-2',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </ul>
            </div>
        </div>

        <div class="pt-10 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex gap-4">
                <a href="#"
                    class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-gray-900 hover:scale-110 transition-transform">
                    <svg class="w-[14px] h-[14px]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                    </svg>
                </a>

                <a href="#"
                    class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-gray-900 hover:scale-110 transition-transform">
                    <svg class="w-[16px] h-[16px]" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>

                <a href="#"
                    class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-gray-900 hover:scale-110 transition-transform">
                    <svg class="w-[14px] h-[14px]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.451-6.231zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z" />
                    </svg>
                </a>

                <a href="#"
                    class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-gray-900 hover:scale-110 transition-transform">
                    <svg class="w-[14px] h-[14px]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-2.201c0-1.13.273-1.605 1.412-1.605h2.588v-4.194l-3.564-.006c-4.257 0-5.436 2.059-5.436 5.304v2.701z" />
                    </svg>
                </a>
            </div>

            <p class="text-[13px] text-[#98A2B3]">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Alle rettigheter reservert.
            </p>
        </div>
    </div>
</footer>

</div><?php wp_footer(); ?>

</body>

</html>