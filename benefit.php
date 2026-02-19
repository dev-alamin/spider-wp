<?php
/**
 * Template Name: Benefit
 */
get_header(); ?>

    <!-- First Two section e.g hero and result -->


            <!-- Hero section  -->
            <?php 
            $show_hero    = get_theme_mod(SPIDER_PREFIX . 'benefit_enable_hero', true);
            $headline     = get_theme_mod(SPIDER_PREFIX . 'benefit_hero_headline', 'Funksjonalitet bygget for virkeligheten');
            $description  = get_theme_mod(SPIDER_PREFIX . 'benefit_hero_desc', '');
            $slides       = get_theme_mod(SPIDER_PREFIX . 'benefit_hero_slides', []);
            $slider_speed = get_theme_mod(SPIDER_PREFIX . 'benefit_slider_speed', 5000);

            if ( $show_hero ) : 
            ?>
            <section class="py-20 overflow-hidden">
                <div class="max-w-4xl mx-auto text-center mb-16 px-6">
                    <h2 class="reveal-type text-4xl md:text-5xl font-serif font-light text-slate-900 mb-8 leading-tight">
                        <?php echo esc_html($headline); ?>
                    </h2>
                    <?php if($description): ?>
                    <div class="reveal-text">
                        <p class="text-slate-600 leading-relaxed mx-auto max-w-2xl">
                            <?php echo esc_html($description); ?>
                        </p>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="swiper functionalities-slider mb-12">
                    <div class="swiper-wrapper">
                        <?php foreach ( $slides as $slide ) : ?>
                            <div class="swiper-slide !w-auto flex-shrink-0">
                                <div class="w-[300px] min-h-[350px] bg-white rounded-[1.5rem] p-10 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.08)] flex flex-col">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center mb-12" 
                                        style="background-color: <?php echo esc_attr($slide['icon_bg']); ?>;">
                                        <svg class="w-4 h-4 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-serif font-light mb-4"><?php echo esc_html($slide['title']); ?></h3>
                                    <div class="h-[1px] w-full bg-slate-100 mb-6"></div>
                                    <p class="text-sm text-slate-500 leading-relaxed">
                                        <?php echo esc_html($slide['description']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <script>
            document.addEventListener('DOMContentLoaded', () => {
                new Swiper(".functionalities-slider", {
                    slidesPerView: "5.5",
                    spaceBetween: 24,
                    centeredSlides: true,
                    loop: true,
                    speed: <?php echo intval($slider_speed); ?>,
                    allowTouchMove: true,
                    autoplay: {
                        delay: 0,
                        disableOnInteraction: false
                    },
                    freeMode: true
                });
            });
            </script>
            <?php endif; ?>
            <!-- Hero section ends  -->

            <!-- Core Areas  -->
            <?php 
            $show_core = get_theme_mod(SPIDER_PREFIX . 'benefit_enable_core_area', true);
            $headline  = get_theme_mod(SPIDER_PREFIX . 'benefit_core_area_headline', 'Fire kjerneområder...');
            $areas     = get_theme_mod(SPIDER_PREFIX . 'benefit_core_area_items', []);

            if ( $show_core && !empty($areas) ) : 
            ?>
            <section class="py-24">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16">
                        <h2 class="reveal-type text-4xl md:text-5xl font-serif font-light text-slate-900 leading-tight max-w-4xl mx-auto">
                            <?php echo wp_kses_post($headline); ?>
                        </h2>
                    </div>

                    <div class="reveal-grid grid grid-cols-1 md:grid-cols-2 gap-8">
                        <?php foreach ( $areas as $area ) : ?>
                            <div class="reveal-card bg-white p-10 rounded-[2rem] shadow-sm flex flex-col items-start space-y-6 hover:shadow-md transition-shadow duration-300">
                                
                                <div class="bg-slate-50 p-4 rounded-xl">
                                    <?php 
                                    $icon_type = $area['icon'] ?? 'plan';
                                    switch ($icon_type) {
                                        case 'quality':
                                            echo '<svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M12 5l7 8H5l7-8z" /></svg>';
                                            break;
                                        case 'rules':
                                            echo '<svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
                                            break;
                                        case 'flex':
                                            echo '<svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>';
                                            break;
                                        default: // plan
                                            echo '<svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>';
                                    }
                                    ?>
                                </div>

                                <div class="space-y-4">
                                    <h3 class="text-2xl font-serif font-light text-slate-900">
                                        <?php echo esc_html($area['title']); ?>
                                    </h3>
                                    <p class="text-slate-500 text-sm leading-relaxed">
                                        <?php echo esc_html($area['description']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <!-- Core Areas ends  -->

    </div>
    <!-- First Two section e.g hero and result -->

    <!-- Optimization Section  -->
        <?php 
        $show_opt = get_theme_mod(SPIDER_PREFIX . 'benefit_enable_optimization', true);
        $headline = get_theme_mod(SPIDER_PREFIX . 'benefit_optimization_headline', 'Optimalisering der det faktisk betyr noe');
        $main_desc = get_theme_mod(SPIDER_PREFIX . 'benefit_optimization_desc', '');
        $cards    = get_theme_mod(SPIDER_PREFIX . 'benefit_optimization_cards', []);

        if ( $show_opt && !empty($cards) ) : 
        ?>
        <section class="bg-[#faf7f2] py-24">
            <div class="container mx-auto px-6">

                <div class="text-center mb-20 space-y-4">
                    <h2 class="reveal-type text-4xl md:text-5xl font-serif font-light text-slate-900">
                        <?php echo esc_html($headline); ?>
                    </h2>
                    <?php if($main_desc): ?>
                        <p class="text-slate-600 max-w-3xl mx-auto">
                            <?php echo esc_html($main_desc); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="reveal-grid grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <?php foreach ( $cards as $card ) : ?>
                        <div class="reveal-card bg-white p-10 rounded-[1.5rem] shadow-sm flex flex-col h-full hover:shadow-md">
                            
                            <div class="bg-slate-50 w-12 h-12 rounded-xl flex items-center justify-center mb-8">
                                <?php 
                                $icon = $card['icon'] ?? 'comp';
                                if ($icon === 'cont') : ?>
                                    <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                <?php elseif ($icon === 'reopt') : ?>
                                    <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                                <?php else : ?>
                                    <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
                                <?php endif; ?>
                            </div>

                            <h3 class="text-2xl font-serif font-light mb-6 leading-tight">
                                <?php echo wp_kses_post($card['title']); ?>
                            </h3>
                            
                            <p class="text-slate-500 text-sm leading-relaxed mb-8">
                                <?php echo esc_html($card['description']); ?>
                            </p>

                            <?php 
                            $bullets = !empty($card['bullets']) ? explode("\n", str_replace("\r", "", $card['bullets'])) : [];
                            if ( !empty($bullets) ) : ?>
                                <ul class="space-y-4 mt-auto">
                                    <?php foreach ( $bullets as $bullet ) : if(trim($bullet) == '') continue; ?>
                                        <li class="flex items-start gap-3 text-sm text-slate-700">
                                            <span class="mt-1 flex-shrink-0 w-5 h-5 bg-[#fceebb] rounded-full flex items-center justify-center">
                                                <svg class="w-3 h-3 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </span>
                                            <?php echo esc_html($bullet); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
    <!-- Optimization Section ends  -->

    <!-- Promo section  -->
        <?php 
        $show_promo = get_theme_mod(SPIDER_PREFIX . 'promo_enable_promo', true);
        $headline   = get_theme_mod(SPIDER_PREFIX . 'promo_promo_headline', 'Utviklet sammen med kommunene');
        $desc       = get_theme_mod(SPIDER_PREFIX . 'promo_promo_desc', '');
        $image      = get_theme_mod(SPIDER_PREFIX . 'promo_promo_image', '');
        $btn_text   = get_theme_mod(SPIDER_PREFIX . 'promo_promo_btn_text', 'Book gratis demo');
        $btn_url    = get_theme_mod(SPIDER_PREFIX . 'promo_promo_btn_url', '#');

        if ( $show_promo ) : 
        ?>
        <section class="bg-[#efebe6] py-20 px-6 md:px-20 rounded-[2rem] py-10 mx-6">
            <div class="container mx-auto flex flex-col lg:flex-row items-center gap-16">

                <div class="lg:w-1/2 space-y-8">
                    <h2 class="reveal-type text-4xl md:text-5xl font-serif font-light text-slate-900 leading-tight">
                        <?php echo esc_html($headline); ?>
                    </h2>
                    
                    <?php if($desc): ?>
                    <div class="reveal-text">
                        <p class="text-slate-600 leading-relaxed text-sm md:text-base">
                            <?php echo nl2br(esc_html($desc)); ?>
                        </p>
                    </div>
                    <?php endif; ?>

                    <?php if($btn_text): ?>
                    <div class="pt-4">
                        <a href="<?php echo esc_url($btn_url); ?>"
                            class="reveal-button group inline-flex items-center gap-3 bg-[#111111] hover:bg-slate-800 text-white px-8 py-4 rounded-full transition-all">
                            <span class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                            <span class="font-medium text-sm"><?php echo esc_html($btn_text); ?></span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="lg:w-1/2 relative w-full">
                    <?php if($image): ?>
                    <div @click="$store.lightbox.show('<?php echo esc_url($image); ?>')"
                        class="spider__image-reveal relative rounded-[2.5rem] overflow-hidden shadow-2xl group cursor-pointer">
                        <img src="<?php echo esc_url($image); ?>" 
                            alt="<?php echo esc_attr($headline); ?>"
                            class="spider__image-magnetic-animation w-full h-[400px] md:h-[500px] object-cover" />
                        
                        <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="bg-white/20 backdrop-blur-md rounded-full p-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0h-3" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>
    <!-- Promo section ends  -->

    <!-- Integration section  -->
        <?php 
        $show_int    = get_theme_mod(SPIDER_PREFIX . 'benefit_enable_integration', true);
        $headline    = get_theme_mod(SPIDER_PREFIX . 'benefit_integration_headline', 'Integrasjoner som passer inn');
        $desc        = get_theme_mod(SPIDER_PREFIX . 'benefit_integration_desc', '');
        $inner_icons = get_theme_mod(SPIDER_PREFIX . 'integration_inner_icons', []);
        $outer_icons = get_theme_mod(SPIDER_PREFIX . 'integration_outer_icons', []);

        if ( $show_int ) : 
        ?>
        <section class="relative py-24 px-6 overflow-hidden min-h-[400px] md:min-h-[850px] flex items-center justify-center bg-white"
        data-glows='[
        { "color": "#f7dc72", "top": "5%", "left": "-50%", "width": "100vw" },
        { "color": "#88b9fa", "top": "50%", "right": "-20%", "height": "100vh" }
        ]'>
            
            <div class="relative z-10 text-center max-w-2xl pointer-events-auto">
                <span class="inline-block px-4 py-1 mb-6 text-[10px] font-bold tracking-[0.2em] uppercase bg-[#E8E2E1] text-slate-500 rounded backdrop-blur-sm">
                    Bevar fleksibiliteten
                </span>
                <h2 class="text-xl md:text-4xl font-serif font-light text-slate-900 mb-6 tracking-tight">
                    <?php echo wp_kses_post($headline); ?>
                </h2>

                <div class="reveal-text space-y-4">
                    <?php 
                    $desc_paragraphs = explode("\n", $desc);
                    foreach($desc_paragraphs as $p) : if(trim($p)) : ?>
                        <p class="text-slate-600 leading-relaxed text-[12px] md:text-base">
                            <?php echo esc_html($p); ?>
                        </p>
                    <?php endif; endforeach; ?>
                </div>
            </div>

            <div class="absolute inset-0 flex items-center justify-center pointer-events-none m-16">

                <div class="absolute w-[600px] h-[600px] bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px] rounded-full opacity-40"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/integration-bg.png'); background-size: cover; background-position: center;">
                </div>

                <?php if(!empty($inner_icons)): $total_inner = count($inner_icons); ?>
                <div class="inner-orbit absolute w-[210px] h-[210px] z-30 md:w-[450px] md:h-[450px] border border-[#DBD6D3] rounded-full animate-[spin_50s_linear_infinite]">
                    <?php foreach($inner_icons as $index => $item): ?>
                        <div class="orbit-bead" style="--i:<?php echo $index + 1; ?>; --total:<?php echo $total_inner; ?>;">
                            <div class="bead-content bead-content-sm rounded-full" style="border-radius: 50%;">
                                <img src="<?php echo esc_url($item['icon_url']); ?>" class="rounded-full" alt="Integration Logo">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if(!empty($outer_icons)): $total_outer = count($outer_icons); ?>
                <div class="outer-orbit absolute w-[310px] h-[310px] z-30 md:w-[750px] md:h-[750px] border border-[#DBD6D3] rounded-full animate-[spin_80s_linear_infinite_reverse]">
                    <?php foreach($outer_icons as $index => $item): ?>
                        <div class="orbit-bead" style="--i:<?php echo $index + 1; ?>; --total:<?php echo $total_outer; ?>;">
                            <div class="bead-content-sm rounded-full" style="border-radius: 50%;">
                                <img src="<?php echo esc_url($item['icon_url']); ?>" class="rounded-full" alt="Integration Logo">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <?php endif; ?>
    <!-- Integration section ends  -->

    <!-- Call to action  -->
        <?php 
        $show_cta  = get_theme_mod(SPIDER_PREFIX . 'benefit_enable_cta', true);
        $headline  = get_theme_mod(SPIDER_PREFIX . 'benefit_cta_headline', 'Hver kommune er forskjellig');
        $desc      = get_theme_mod(SPIDER_PREFIX . 'benefit_cta_desc', '');
        $btn_text  = get_theme_mod(SPIDER_PREFIX . 'benefit_cta_btn_text', 'Book gratis demo');
        $btn_url   = get_theme_mod(SPIDER_PREFIX . 'benefit_cta_btn_url', '#');

        if ( $show_cta ) : 
        ?>
        <section class="py-32 relative overflow-hidden text-center bg-cover bg-center"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/newsletter-bg.svg');">
            
            <div class="absolute inset-0 bg-[#FFE587]/10 pointer-events-none"></div>

            <div class="relative z-10 max-w-4xl mx-auto px-6">
                <h2 class="reveal-type text-3xl md:text-6xl font-serif text-gray-900 leading-tight mb-8">
                    <?php echo esc_html($headline); ?>
                </h2>

                <?php if($desc): ?>
                    <p class="reveal-type text-gray-700 text-sm max-w-2xl mx-auto leading-relaxed mb-12">
                        <?php echo esc_html($desc); ?>
                    </p>
                <?php endif; ?>

                <?php if($btn_text): ?>
                    <a href="<?php echo esc_url($btn_url); ?>"
                        class="bg-[#0c111d] text-white px-10 py-5 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group reveal-button">
                        <span class="font-bold text-sm"><?php echo esc_html($btn_text); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
    <!-- Call to action Section ends  -->


<?php get_footer(); ?>