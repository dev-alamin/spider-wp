<?php

/**
 * Template Name: About Us
 */

get_header();
?>

<div data-glows='[
    { "color": "#f7dc72", "top": "45%", "left": "-50%", "width": "100vw" },
    { "color": "#88b9fa", "top": "60%", "right": "-30%", "height": "100vh" }
]'>
    <?php
    $show_section = get_theme_mod(SPIDER_PREFIX . 'about_enable_impact_section', true);
    if ($show_section) :
        $cards = get_theme_mod(SPIDER_PREFIX . 'about_impact_cards', []);
    ?>
        <section class="relative w-full py-20 overflow-hidden">
            <div class="container mx-auto px-6 relative z-10">
                <div class="absolute inset-0 opacity-40 pointer-events-none">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/map-bg.png" alt="Background Map" class="w-full h-auto object-cover object-center scale-110">
                </div>

                <div class="md:flex md:gap-16">
                    <div class="mb-12 max-w-3xl">
                        <h2 class="reveal-type text-4xl md:text-6xl font-serif text-[#1a1a1a] font-light leading-tight tracking-tight">
                            <?php echo wp_kses_post(get_theme_mod(SPIDER_PREFIX . 'about_impact_headline')); ?>
                        </h2>
                    </div>

                    <div class="relative mt-16 md:ml-8" x-data="{ show: true }">
                        <div class="absolute top-15 left-25 transform -translate-x-1/2 flex items-center justify-center">
                            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                <div class="w-4 h-4 bg-yellow-400 rounded-full animate-pulse shadow-sm"></div>
                            </div>
                        </div>

                        <div class="md:ml-[8rem] mr-0 md:mr-20 md:mt-[6rem] max-w-md bg-white backdrop-blur-sm p-8 md:p-10 rounded-2xl shadow-[0_25px_60px_-15px_rgba(0,0,0,0.1)]">
                            <div class="space-y-6 reveal-text">
                                <div class="text-[14px] leading-relaxed text-[#1a1a1a]">
                                    <?php echo wp_kses_post(get_theme_mod(SPIDER_PREFIX . 'about_impact_floating_text')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mx-auto grid grid-cols-1 lg:grid-cols-12 gap-16 relative z-10 mt-32">
                    <div class="lg:col-span-5 flex flex-col justify-center">
                        <h2 class="reveal-type text-4xl md:text-5xl leading-[1.1] font-light font-serif text-[#1a1a1a] mb-8">
                            <?php echo wp_kses_post(get_theme_mod(SPIDER_PREFIX . 'about_impact_sub_headline')); ?>
                        </h2>
                        <p class="text-[17px] text-gray-600 leading-relaxed max-w-md mb-10">
                            <?php echo esc_html(get_theme_mod(SPIDER_PREFIX . 'about_impact_desc')); ?>
                        </p>


                        <a href="<?php echo esc_url(spider_solutions_get_theme_option('about_impact_cta_link')); ?>"
                            class="bg-[#0c111d] reveal-button text-white px-8 py-4 rounded-full w-fit inline-flex items-center gap-3 hover:bg-black transition-all group">

                            <div class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </div>

                            <span class="font-semibold text-sm">
                                <?php echo esc_html(spider_solutions_get_theme_option('about_impact_cta_text', 'Book gratis demo')); ?>
                            </span>

                        </a>
                    </div>

                    <div class="reveal-grid lg:col-span-7 grid grid-cols-1 md:grid-cols-3 gap-6 items-start" x-data="{}">
                        <?php
                        $counter = 0;
                        foreach ((array) $cards as $card) :
                            // Logic for adding hidden spacers to match your layout (at index 5 and 7)
                            if ($counter == 5 || $counter == 6) {
                                echo '<div class="md:flex"></div>';
                            }

                            $is_up = ($card['trend'] === 'up');
                        ?>
                            <div class="reveal-card bg-white p-8 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-white flex flex-col justify-between min-h-[200px] transform">
                                <div class="flex justify-end">
                                    <span class="<?php echo $is_up ? 'bg-green-100 text-green-500 -rotate-45' : 'bg-orange-100 text-orange-500 rotate-45'; ?> p-2 rounded-full">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path d="<?php echo $is_up ? 'M5 10l7-7m0 0l7 7m-7-7v18' : 'M19 14l-7 7m0 0l-7-7m7 7V3'; ?>"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <div class="text-[42px] font-light font-serif text-[#1a1a1a]"><?php echo esc_html($card['value']); ?></div>
                                    <p class="text-[12px] text-gray-500 mt-2 uppercase tracking-tight"><?php echo esc_html($card['label']); ?></p>
                                </div>
                            </div>
                        <?php
                            $counter++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Result faq section  -->
    <?php 
    $show_result = get_theme_mod(SPIDER_PREFIX . 'about_enable_result_section', true);
    if ( $show_result ) : 
        $result_headline = get_theme_mod(SPIDER_PREFIX . 'about_result_headline', 'Hva resultatene betyr i hverdagen');
        $result_tabs     = get_theme_mod(SPIDER_PREFIX . 'about_result_tabs', []);

        $icon_library = [
            'patient'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />',
            'caregiver' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />',
            'planner'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />',
            'economy'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />'
        ];
    ?>
    <section class="py-20 font-sans" x-data="{ openTab: 0 }">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <div class="bg-[#F1ECEA] px-4 py-8 md:p-12 rounded-[40px] space-y-4">
                <?php 
                if ( ! empty( $result_tabs ) ) :
                    foreach ( $result_tabs as $index => $tab ) : 
                        $selected_icon = $tab['icon_choice'] ?? 'patient';
                ?>
                    <div 
                        class="bg-white rounded-2xl p-6 shadow-sm transition-all duration-300 border-2"
                        :class="openTab === <?php echo $index; ?> ? 'border-slate-200' : 'border-transparent'"
                    >
                        <div class="flex items-center justify-between cursor-pointer" @click="openTab = <?php echo $index; ?>">
                            <div class="flex items-center gap-4">
                                <div class="bg-[#F9F5F3] p-3 rounded-lg text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <?php echo $icon_library[$selected_icon]; ?>
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <h3 class="text-xl font-light text-slate-800"><?php echo esc_html($tab['title']); ?></h3>
                                    <div 
                                        class="w-24 h-[1px] bg-gray-200 mt-4 transition-opacity duration-300"
                                        :class="openTab != <?php echo $index; ?> ? 'opacity-0' : 'opacity-100'"
                                    ></div>
                                </div>
                            </div>
                            
                            <button 
                                :class="openTab === <?php echo $index; ?> ? 'bg-slate-200 text-slate-500' : 'bg-[#fcebb6] text-slate-700'"
                                class="rounded-full w-8 h-8 flex items-center justify-center transition-colors"
                            >
                                <span class="text-xl" x-text="openTab === <?php echo $index; ?> ? '−' : '+'"></span>
                            </button>
                        </div>

                        <div x-show="openTab === <?php echo $index; ?>" x-collapse x-cloak>
                            <p class="text-slate-600 leading-relaxed text-sm ml-16 mt-2">
                                <?php echo esc_html($tab['content']); ?>
                            </p>
                        </div>
                    </div>
                <?php 
                    endforeach;
                endif; 
                ?>
            </div>

            <div class="pt-8 lg:pt-20">
                <h2 class="reveal-type text-4xl md:text-5xl lg:text-6xl text-slate-800 font-serif font-light leading-tight">
                    <?php echo wp_kses_post($result_headline); ?>
                </h2>
            </div>

        </div>
    </section>
    <?php endif; ?>
    <!-- result faq section ends  -->
</div>

<!-- Process section  -->
<?php 
$show_transf = get_theme_mod(SPIDER_PREFIX . 'about_enable_transf_section', true);
if ( $show_transf ) : 
    $transf_headline = get_theme_mod(SPIDER_PREFIX . 'about_transf_headline', 'Fra manuelt strev til reell kontroll');
    $before_items    = get_theme_mod(SPIDER_PREFIX . 'about_transf_before_list', []);
    $after_items     = get_theme_mod(SPIDER_PREFIX . 'about_transf_after_list', []);
?>
<section class="py-24 font-sans">
    <div class="container mx-auto">

        <div class="flex flex-col items-center mb-16">
            <div class="w-full h-px bg-slate-200 relative mb-8">
                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-16 bg-white border border-slate-100 shadow-sm rounded-full p-3 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 mt-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
            </div>
            <h2 class="reveal-type text-4xl font-light md:text-5xl text-slate-800 font-serif text-center leading-tight max-w-2xl">
                <?php echo wp_kses_post($transf_headline); ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch relative">

            <div class="relative pt-6">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                    <span class="bg-[#e5e2de] text-slate-600 px-6 py-1 rounded-md text-sm italic font-medium">Før SPIDER</span>
                </div>
                <div class="bg-[#eeebe7] rounded-[32px] p-8 h-full flex flex-col">
                    <div class="bg-[#f5f3f0]/50 rounded-2xl py-10 flex justify-center items-center mb-8">
                        <div class="opacity-30 grayscale flex items-center gap-2">
                            <div class="w-8 h-8 bg-slate-400 rounded-sm rotate-45"></div>
                            <span class="font-bold text-2xl tracking-widest uppercase">Spider</span>
                        </div>
                    </div>

                    <ul class="space-y-6 reveal-faq-list">
                        <?php foreach ( (array) $before_items as $index => $item ) : ?>
                        <li class="faq-item flex items-start gap-4 text-slate-600 <?php echo $index > 0 ? 'border-t border-slate-300/50 pt-6' : ''; ?>">
                            <div class="mt-1 bg-white rounded-full p-1 shadow-sm">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-sm"><?php echo esc_html($item['text']); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="relative pt-6">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 z-20">
                    <span class="bg-[#e5e2de] text-slate-600 px-6 py-1 rounded-md text-sm italic font-medium">Etter SPIDER</span>
                </div>
                <div class="bg-white rounded-[32px] p-8 h-full shadow-xl shadow-slate-200/50 border border-slate-100 flex flex-col">
                    <div class="bg-[#fcebb6] rounded-2xl py-10 flex justify-center items-center mb-8">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-slate-900 rounded-sm rotate-45"></div>
                            <span class="font-bold text-2xl tracking-widest uppercase text-slate-900">Spider</span>
                        </div>
                    </div>

                    <ul class="space-y-6 reveal-faq-list">
                        <?php foreach ( (array) $after_items as $index => $item ) : ?>
                        <li class="faq-item flex items-start gap-4 text-slate-700 <?php echo $index > 0 ? 'border-t border-slate-100 pt-6' : ''; ?>">
                            <div class="mt-1 bg-[#fcebb6] rounded-full p-1">
                                <svg class="w-3 h-3 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-sm">
                                <?php echo esc_html($item['text']); ?>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<?php endif; ?>
<!-- Process section ends  -->


<!-- Testimonials Section -->
<!-- Testimonials Section -->
<?php
$testimonials = spider_solutions_get_theme_option('home_testimonials', []);
$test_speed   = spider_solutions_get_theme_option('home_test_speed', 500);
$autoplay     = spider_solutions_get_theme_option('home_test_autoplay', true);

if (spider_solutions_get_theme_option('home_enable_testimonial_section', true) && !empty($testimonials)) :
?>
    <section class="py-24 overflow-hidden bg-[#F1ECEA]">
        <div class="container mx-auto px-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-8">
                <h2 class="reveal-type text-3xl md:text-5xl font-serif leading-tight font-light text-gray-900 max-w-xl">
                    <?php echo esc_html(spider_solutions_get_theme_option('home_tf_headline')); ?>
                </h2>

                <div class="flex gap-3">
                    <button class="swiper-prev-btn w-[100px] h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-all active:scale-95">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" stroke-width="2" />
                        </svg>
                    </button>
                    <button class="swiper-next-btn w-[100px] h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-all active:scale-95">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $t) : ?>
                        <div class="swiper-slide h-auto">
                            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative h-full">
                                <div class="m-2 bg-[#F9F5F3] p-8 rounded-[20px] flex flex-col justify-between h-[calc(100%-1rem)]">
                                    <div>
                                        <div class="flex gap-1 mb-10">
                                            <?php for ($i = 0; $i < (int)$t['rating']; $i++): ?>
                                                <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            <?php endfor; ?>
                                        </div>
                                        <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 font-light leading-[1.6] mb-8">
                                            "<?php echo esc_html($t['quote']); ?>"
                                        </p>
                                    </div>

                                    <div class="pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                                        <img src="<?php echo esc_url($t['image']); ?>" class="w-14 h-14 rounded-full object-cover avatar-grayscale border-4 border-white shadow-sm" />
                                        <div>
                                            <p class="font-bold text-gray-900 text-sm"><?php echo esc_html($t['name']); ?></p>
                                            <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold"><?php echo esc_html($t['role']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper(".testimonial-swiper", {
                slidesPerView: 1.1,
                spaceBetween: 30,
                grabCursor: true,
                loop: true,
                speed: <?php echo esc_js($test_speed); ?>,
                <?php if ($autoplay) : ?>
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false
                    },
                <?php endif; ?>
                navigation: {
                    nextEl: ".swiper-next-btn",
                    prevEl: ".swiper-prev-btn"
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2.2
                    },
                    1280: {
                        slidesPerView: 3
                    }
                }
            });
        });
    </script>
<?php endif; ?>
<!-- Testimonials Section Ends -->
<!-- Testimonials Section Ends -->

<!-- another result section  -->
<?php 
$headline = get_theme_mod(SPIDER_PREFIX . 'about_interact_headline', 'Resultater drevet av riktig samspill mellom mennesker og teknologi');
$desc_main = get_theme_mod(SPIDER_PREFIX . 'about_interact_desc_main');
$desc_sub = get_theme_mod(SPIDER_PREFIX . 'about_interact_desc_sub');
?>

<section class="relative py-32 overflow-hidden bg-right bg-no-repeat" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/about-integration-bg.png);background-size:105%;background-repeat:no-repeat;">
    <div class="hidden md:block" style="height: 250px;"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center" style="margin-top:4rem;">
        <h2 class="reveal-type text-4xl md:text-5xl lg:text-[56px] text-slate-900 font-serif font-light leading-[1.15] mb-12 max-w-3xl mx-auto">
            <?php echo wp_kses_post($headline); ?>
        </h2>

        <div class="reveal-text max-w-2xl mx-auto space-y-8">
            <p class="text-slate-500 text-lg leading-relaxed">
                <?php echo esc_html($desc_main); ?>
            </p>

            <p class="text-slate-700 text-lg">
                <?php echo esc_html($desc_sub); ?>
            </p>
        </div>
    </div>
</section>
<!-- another result section ends  -->

<!-- Call to action  -->
<?php 
$show_cta = get_theme_mod(SPIDER_PREFIX . 'about_enable_cta_section', true);

if ( $show_cta ) : 
    $cta_headline = get_theme_mod(SPIDER_PREFIX . 'about_cta_headline');
    $cta_bg       = get_theme_mod(SPIDER_PREFIX . 'about_cta_bg', get_template_directory_uri() . '/images/newsletter-bg.svg');
    $cta_text     = get_theme_mod(SPIDER_PREFIX . 'about_impact_cta_text', 'Book gratis demo');
    $cta_link     = get_theme_mod(SPIDER_PREFIX . 'about_impact_cta_link', '#');
?>

<section class="relative py-32 px-6 overflow-hidden bg-cover bg-center" style="background-image: url('<?php echo esc_url($cta_bg); ?>');">
    <div class="absolute inset-0 bg-white/10 pointer-events-none"></div>

    <div class="container mx-auto relative z-10 text-center md:text-left">
        <h2 class="reveal-type text-left text-4xl md:text-6xl text-slate-900 leading-[1.15] mb-12 font-light">
            <?php echo wp_kses_post($cta_headline); ?>
        </h2>

        <?php if ( ! empty($cta_text) ) : ?>
            <div class="text-left">
                <a href="<?php echo esc_url($cta_link); ?>"
                class="reveal-button ml-0 mr-auto text-left inline-block bg-[#0f0f0f] text-white px-10 py-5 rounded-full font-medium transition-all hover:scale-105 active:scale-95 shadow-xl hover:bg-black">
                <?php echo esc_html($cta_text); ?>
            </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php endif; ?>
<!-- Call to action Section ends  -->

<!-- Footer statrs  -->
<?php get_footer(); ?>