<?php 
/**
 * Template Name: Records
 */
get_header();
?>


    <!-- Hero section  -->
    <?php 
    $show_hero   = get_theme_mod(SPIDER_PREFIX . 'record_enable_hero', true);
    $headline    = get_theme_mod(SPIDER_PREFIX . 'record_hero_headline', 'Dokumentert optimeringskvalitet i verdensklasse');
    $desc        = get_theme_mod(SPIDER_PREFIX . 'record_hero_desc', '');
    $bench_title = get_theme_mod(SPIDER_PREFIX . 'record_bench_title', 'Dokumentert ytelse på internasjonale benchmark-tester');
    $stats       = get_theme_mod(SPIDER_PREFIX . 'record_stats', []);
    $bench_top = get_theme_mod( SPIDER_PREFIX . 'record_benchmark_top_desc' );
    $bench_bottom = get_theme_mod( SPIDER_PREFIX . 'record_benchmark_bottom_desc' );

    if ( $show_hero ) : 
    ?>
    <section class="py-8 md:py-24 font-sans text-[#333]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-32">
                <h1 class="reveal-type text-4xl md:text-5xl font-serif text-[#1a1a1a] mb-8 leading-tight tracking-tight">
                    <?php echo wp_kses_post($headline); ?>
                </h1>
                <div class="reveal-text max-w-3xl mx-auto space-y-6 text-sm md:text-base text-gray-600 leading-relaxed">
                    <?php 
                    if($desc) {
                        $paras = explode("\n\n", $desc);
                        foreach($paras as $p) echo '<p>' . esc_html($p) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="bg-[#F1ECEA] py-20 px-6">
            <div class="text-center container mx-auto">
                <h2 class="reveal-type text-3xl md:text-4xl font-serif text-[#1a1a1a] mb-6 leading-tight tracking-tight">
                    <?php echo wp_kses_post($bench_title); ?>
                </h2>
                <p class="reveal-text max-w-2xl mx-auto text-sm text-gray-500 mb-16 leading-relaxed">
                    <?php echo esc_html( $bench_top) ?>
                </p>

                <div class="reveal-grid grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                    <?php foreach ( $stats as $stat ) : ?>
                        <div class="reveal-card bg-white rounded-[2rem] p-10 pt-12 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.08)] text-left relative">
                            <div class="absolute top-8 right-8 bg-[#dcf2d1] rounded-full p-1.5">
                                <svg class="w-3 h-3 text-[#2d5a27]" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 24 24">
                                    <path d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="text-[5.5rem] font-serif leading-none mb-8 tracking-tighter text-[#1a1a1a]">
                                <?php echo esc_html($stat['number']); ?>
                            </div>
                            <p class="text-gray-500 text-sm leading-snug max-w-[220px]">
                                <?php echo esc_html($stat['label']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <p class="max-w-2xl mx-auto text-[0.95rem] text-gray-700 font-medium leading-relaxed">
                    <?php echo esc_html( $bench_bottom) ?>
                </p>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Hero section ends  -->

    <?php 
    $show_opt     = get_theme_mod(SPIDER_PREFIX . 'record_enable_optimization', true);
    $test_h       = get_theme_mod(SPIDER_PREFIX . 'record_test_headline', 'Hvorfor disse testene er viktige');
    $test_d       = get_theme_mod(SPIDER_PREFIX . 'record_test_desc', '');
    $grid_h       = get_theme_mod(SPIDER_PREFIX . 'record_optimization_headline', 'Hva som faktisk optimaliseres');
    $grid_items   = get_theme_mod(SPIDER_PREFIX . 'record_optimization_items', []);

    if ( $show_opt ) : 
    ?>
        <section class="px-6 py-16 text-center">
            <div class="container mx-auto">
                <h2 class="reveal-type text-4xl md:text-5xl font-serif text-[#1a1a1a] mb-8 leading-tight">
                    <?php echo esc_html($test_h); ?>
                </h2>
                <div class="reveal-text space-y-6 text-gray-600 text-sm md:text-base leading-relaxed max-w-3xl mx-auto">
                    <?php 
                    $paras = explode("\n", $test_d);
                    foreach($paras as $p) : if(trim($p)) : ?>
                        <p><?php echo wp_kses_post($p); ?></p>
                    <?php endif; endforeach; ?>
                </div>
            </div>
        </section>

        <section class="pb-32 px-6 py-20 bg-[#F1ECEA]">
            <div class="container mx-auto text-center">
                <h2 class="reveal-type text-4xl md:text-5xl font-serif text-[#1a1a1a] mb-6">
                    <?php echo esc_html($grid_h); ?>
                </h2>
                <p class="text-gray-500 mb-16">SPIDER optimaliserer langt mer enn avstand eller kjøretid.</p>

                <div class="reveal-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php foreach ( $grid_items as $item ) : ?>
                    <div class="reveal-card bg-white rounded-2xl p-6 flex items-center gap-4 shadow-[0_15px_35px_rgba(0,0,0,0.04)] text-left h-full">
                        <div class="bg-[#f7f5f2] p-3 rounded-xl shrink-0">
                            <?php 
                            $icon = $item['icon'] ?? 'shield';
                            switch ($icon) {
                                case 'bolt':
                                    echo '<svg class="w-6 h-6 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';
                                    break;
                                case 'complex':
                                    echo '<svg class="w-6 h-6 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>';
                                    break;
                                default: // shield / robust
                                    echo '<svg class="w-6 h-6 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>';
                            }
                            ?>
                        </div>
                        <span class="font-serif text-lg leading-tight text-slate-800">
                            <?php echo wp_kses_post($item['title']); ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Call to action  -->
        <?php 
        $show_cta  = get_theme_mod(SPIDER_PREFIX . 'record_enable_cta', true);
        $headline  = get_theme_mod(SPIDER_PREFIX . 'record_cta_headline', 'Fra verdensrekorder til verdi i hverdagen');
        $desc      = get_theme_mod(SPIDER_PREFIX . 'record_cta_desc', '');
        $btn_text  = get_theme_mod(SPIDER_PREFIX . 'record_cta_btn_text', 'Book gratis demo');
        $btn_url   = get_theme_mod(SPIDER_PREFIX . 'record_cta_btn_url', '#');

        if ( $show_cta ) : 
        ?>
        <section class="bg-[#FFE587] py-32 relative overflow-hidden text-center bg-cover bg-center"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/newsletter-bg.svg');">
            
            <div class="relative z-10 max-w-4xl mx-auto px-6">
                <h2 class="reveal-type text-3xl md:text-6xl font-serif text-gray-900 leading-tight mb-8">
                    <?php echo esc_html($headline); ?>
                </h2>

                <?php if($desc): ?>
                    <p class="reveal-type text-gray-700 text-sm md:text-base max-w-2xl mx-auto leading-relaxed mb-12">
                        <?php echo esc_html($desc); ?>
                    </p>
                <?php endif; ?>

                <?php if($btn_text): ?>
                    <a href="<?php echo esc_url($btn_url); ?>"
                    class="reveal-button bg-[#0c111d] text-white px-10 py-5 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group shadow-lg">
                        <span class="text-sm tracking-wider"><?php echo esc_html($btn_text); ?></span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
    <!-- Call to action Section ends  -->


<?php get_footer(); ?>