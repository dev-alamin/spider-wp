<?php
/**
 * Template Name: Functionality
 */
get_header(); ?>

</div> <!-- Header end  -->

    <!-- First Two section e.g hero and result -->

        <!-- starter div is in header  -->

            <!-- Hero section  -->
            <?php 
            $show_hero = get_theme_mod( SPIDER_PREFIX . 'functionality_enable_hero', true );

            if ( $show_hero ) : 
                $headline = get_theme_mod( SPIDER_PREFIX . 'functionality_hero_headline', 'Reell verdi i den daglige driften' );
                $desc     = get_theme_mod( SPIDER_PREFIX . 'functionality_hero_desc' );
                $image    = get_theme_mod( SPIDER_PREFIX . 'functionality_hero_image', get_template_directory_uri() . '/images/healthcare-provider.png' );
                $cta_text = get_theme_mod( SPIDER_PREFIX . 'functionality_hero_cta_text', 'Book gratis demo' );
                $cta_link = get_theme_mod( SPIDER_PREFIX . 'functionality_hero_btn_link', '#' ); // Reusing home link or add new
            ?>

            <section class="relative px-4 md:px-12 pt-8 font-sans pb-4 md:mb-12">
                <div class="container mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                    <div class="lg:col-span-5 space-y-8">
                        <h1 class="reveal-type font-light text-4xl md:text-6xl lg:text-7xl text-slate-800 font-serif leading-[1.1]">
                            <?php echo wp_kses_post( $headline ); ?>
                        </h1>
                        
                        <?php if ( $desc ) : ?>
                        <div class="reveal-text">
                            <p class="text-lg text-slate-600 leading-relaxed max-w-lg">
                                <?php echo esc_html( $desc ); ?>
                            </p>
                        </div>
                        <?php endif; ?>

                        <a href="<?php echo esc_url( $cta_link ); ?>"
                            class="reveal-button group inline-flex items-center bg-[#0f0f0f] text-white pl-2 pr-8 py-2 rounded-full font-medium transition-all hover:pr-10">
                            <div class="bg-white rounded-full w-10 h-10 flex items-center justify-center mr-4 text-slate-900 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 transition-transform group-hover:translate-x-0.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                            <?php echo esc_html( $cta_text ); ?>
                        </a>
                    </div>

                    <div class="lg:col-span-7">
                        <div class="relative rounded-[3rem] overflow-hidden shadow-2xl spider__image-reveal">
                            <img @click="$store.lightbox.show('<?php echo esc_url( $image ); ?>')"
                                src="<?php echo esc_url( $image ); ?>"
                                alt="<?php echo esc_attr( $headline ); ?>"
                                class="w-full h-auto object-cover aspect-[4/3] spider__image-magnetic-animation" />
                        </div>
                    </div>

                </div>
            </section>
                        <!-- Hero section ends  -->
                        
            <!-- Seperator, Border  -->
            <div class="relative flex items-center justify-center container mx-auto">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-200/60"></div>
                </div>
            </div>
            <!-- Seperator, Border ends  -->
            <?php endif; ?>




        <!-- Feature cards  -->
        <?php 
        $show_benefits = get_theme_mod( SPIDER_PREFIX . 'functionality_enable_benefits', true );

        if ( $show_benefits ) : 
            $section_badge    = get_theme_mod( SPIDER_PREFIX . 'functionality_benefits_badge', 'Nøkkelfordeler' );
            $section_headline = get_theme_mod( SPIDER_PREFIX . 'funcitonality_benefits_headline' );

            $args = array(
                'post_type'      => 'spider_benefit',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC'
            );
            $benefits_query = new WP_Query( $args );

            if ( $benefits_query->have_posts() ) :
        ?>
        <section class="py-24 px-6 bg-[#F9F8F7]">
            <div class="container mx-auto space-y-12">

                <div class="mb-8">
                    <span class="bg-white px-4 py-1.5 rounded-md text-xs font-semibold text-slate-500 shadow-sm border border-slate-100 italic">
                        <?php echo esc_html( $section_badge ); ?>
                    </span>
                </div>

                <h2 class="reveal-type font-light text-4xl md:text-5xl text-slate-800 font-serif mb-16 max-w-3xl">
                    <?php echo wp_kses_post( $section_headline ); ?>
                </h2>

                <div class="reveal-grid grid grid-cols-1 gap-8">

                    <?php while ( $benefits_query->have_posts() ) : $benefits_query->the_post(); 
                        $is_key        = get_post_meta( get_the_ID(), '_is_key_benefit', true );
                        $icon_type     = get_post_meta( get_the_ID(), '_benefit_icon', true ) ?: 'location';
                        $bullets_raw   = get_post_meta( get_the_ID(), '_benefit_bullets', true );
                        $bullets_array = !empty($bullets_raw) ? explode("\n", str_replace("\r", "", $bullets_raw)) : [];
                    ?>
                    <article class="reveal-card bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-slate-100 grid grid-cols-1 lg:grid-cols-3 min-h-[500px]">
                        
                        <div class="bg-[#f2f4f7] flex items-center justify-center relative col-span-1 overflow-hidden">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                            <?php else : ?>
                                <div class="p-12 text-slate-300">
                                    <svg viewBox="0 0 400 300" class="w-full h-full fill-current opacity-40">
                                        <rect x="20" y="20" width="60" height="100" rx="4" />
                                        <rect x="100" y="20" width="120" height="80" rx="4" />
                                        <rect x="240" y="20" width="80" height="150" rx="4" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="p-10 lg:p-16 flex flex-col justify-between col-span-2">
                            <div>
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                                        <?php echo spider_solutions_get_benefit_icon( $icon_type ); ?>
                                    </div>
                                    
                                    <div class="flex flex-col">
                                        <?php if ( $is_key === 'yes' ) : ?>
                                            <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-1">Fremhevet</span>
                                        <?php endif; ?>
                                        <h3 class="text-2xl font-medium text-slate-800"><?php the_title(); ?></h3>
                                    </div>
                                </div>

                                <div class="text-slate-500 text-sm leading-relaxed mb-8 prose prose-slate">
                                    <?php the_content(); ?>
                                </div>

                                <div class="mb-8" style="height: 1px; width:70%; background-color:#DFD5CF;"></div>

                                <?php if ( ! empty( $bullets_array ) ) : ?>
                                <ul class="space-y-4">
                                    <?php foreach ( $bullets_array as $bullet ) : if(trim($bullet) == '') continue; ?>
                                    <li class="flex items-center gap-3 text-sm text-slate-700">
                                        <div class="bg-[#fcebb6] rounded-full p-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <?php echo esc_html( $bullet ); ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </div>

                            <div class="mt-12 ml-auto mr-0">
                                <a href="<?php echo esc_url( home_url('/kontakt') ); ?>"
                                    class="flex items-center gap-3 bg-[#F9F5F3] hover:bg-slate-200 text-slate-800 px-6 py-3 rounded-full text-sm font-medium transition-colors">
                                    <span class="bg-white rounded-full w-5 h-5 flex items-center justify-center text-[10px]">→</span>
                                    Book gratis demo
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php endwhile; wp_reset_postdata(); ?>

                </div>
            </div>
        </section>
        <?php 
            endif; // have_posts check
        endif; // show_benefits check
        ?>
        <!-- Feature cards ends  -->

    </div>
    <!-- First Two section e.g hero and result -->

    <!-- Slider section  -->
<?php 
$slider_bg    = get_theme_mod( SPIDER_PREFIX . 'func_slider_bg', '#F1ECEA' );
$slider_title = get_theme_mod( SPIDER_PREFIX . 'func_slider_title', 'Verdien merkes i hele tjenesten' );
$slider_items = get_theme_mod( SPIDER_PREFIX . 'func_slider_items', [] );
$autoplay_speed = get_theme_mod( SPIDER_PREFIX . 'func_slider_speed', 3000 );
?>

<section class="py-24 overflow-hidden" style="background-color: <?php echo esc_attr($slider_bg); ?>;">
    <div class="max-w-7xl mx-auto px-6 mb-12 flex items-end justify-between">
        <h2 class="reveal-type font-light text-4xl md:text-5xl lg:text-6xl text-slate-800 font-serif leading-tight">
            <?php echo wp_kses_post($slider_title); ?>
        </h2>

        <div class="flex gap-3 pb-2">
            <button class="swiper-prev-custom w-[100px] h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-all active:scale-95 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="swiper-next-custom w-[100px] h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-all active:scale-95 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    <div class="swiper value-swiper !pl-6 lg:!pl-[calc((100vw-80rem)/2+1.5rem)]">
        <div class="swiper-wrapper">
            <?php foreach ( $slider_items as $item ) : ?>
                <div class="swiper-slide !h-auto">
                    <div class="bg-white rounded-[1.5rem] p-4 shadow-sm h-full flex flex-col group">
                        <div class="rounded-[2rem] overflow-hidden mb-8">
                            <img src="<?php echo esc_url($item['image']); ?>" 
                                 alt="Care Value"
                                 class="w-full aspect-[4/3] object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <div class="px-6 pb-8 text-center">
                            <p class="text-slate-600 leading-relaxed text-sm">
                                <?php echo esc_html($item['text']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    // You can pass the PHP value using wp_localize_script or read it from a data-attribute
const sliderSpeed = <?php echo (int)$autoplay_speed; ?>;
                document.addEventListener('DOMContentLoaded', () => {
                new Swiper(".value-swiper", {
                    slidesPerView: 1.2,
                    spaceBetween: 24,
                    loop: true,
                    speed: 800, // Transition speed
                    grabCursor: true,
                    navigation: {
                        nextEl: ".swiper-next-custom",
                        prevEl: ".swiper-prev-custom"
                    },
                    autoplay: {
                        delay: sliderSpeed,
                        disableOnInteraction: false
                    },
                    breakpoints: {
                        640: { slidesPerView: 2.2 },
                        1024: { slidesPerView: 2.9 }
                    }
                });
            });
</script>
    <!-- Slider section ends  -->

    <div class="page-wrapper" data-glows='[
        { "color": "#88b9fa", "top": "50%", "left": "-50%", "width": "100vw" },
        { "color": "#f7dc72", "top": "5%", "right": "-20%", "height": "100vh" }
    ]'>
        <!-- Comparison section  -->
        <section class="py-32 px-6 overflow-hidden">
            <div class=" max-w-5xl mx-auto">

                <h2 class="reveal-type font-light text-4xl md:text-5xl text-slate-800 font-serif text-center mb-24">
                    Fra manuell kamp til operativ kontroll
                </h2>

                <div class="overflow-x-auto pb-12 -mx-6 px-6 hide-scrollbar md:overflow-visible">
                    <div
                        class="reveal-grid grid grid-cols-[1.5fr_1fr_1fr] md:grid-cols-[1.2fr_1fr_1fr] md:gap-x-8 relative min-w-[700px] md:min-w-full">

                        <div class="reveal-card flex flex-col">
                            <div class="h-16"></div>
                            <div
                                class="h-20 flex items-center border-b border-slate-200 text-slate-700 font-medium text-sm">
                                Planer genereres automatisk</div>
                            <div
                                class="h-20 flex items-center border-b border-slate-200 text-slate-700 font-medium text-sm">
                                Planene oppdateres og reoptimaliseres</div>
                            <div
                                class="h-20 flex items-center border-b border-slate-200 text-slate-700 font-medium text-sm">
                                Optimalisering på tvers av alle hensyn</div>
                            <div
                                class="h-20 flex items-center border-b border-slate-200 text-slate-700 font-medium text-sm">
                                Kvalitet og presisjon i ferdige planer</div>
                            <div
                                class="h-20 flex items-center border-b border-slate-200 text-slate-700 font-medium text-sm">
                                Fleksibilitet ved endringer i løpet av dagen</div>
                            <div class="h-20 flex items-center text-slate-700 font-medium text-sm">Kontinuitet og
                                kompetanse
                                håndteres</div>
                        </div>

                        <div class="reveal-card bg-[#f2f0ec] rounded-[1.5rem] flex flex-col relative">
                            <div class="h-16 flex items-center justify-center">
                                <span
                                    class="bg-[#e2e0db] text-slate-500 px-4 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Før
                                    SPIDER</span>
                            </div>
                            <div
                                class="h-20 flex items-center justify-center border-b border-slate-300/30 text-slate-400">
                                <div
                                    class="w-7 h-7 rounded-full border border-slate-300 flex items-center justify-center font-bold">
                                    ✕</div>
                            </div>
                            <div
                                class="h-20 flex items-center justify-center border-b border-slate-300/30 text-slate-400">
                                <div
                                    class="w-7 h-7 rounded-full border border-slate-300 flex items-center justify-center font-bold">
                                    ✕</div>
                            </div>
                            <div
                                class="h-20 flex items-center justify-center border-b border-slate-300/30 text-slate-400">
                                <div
                                    class="w-7 h-7 rounded-full border border-slate-300 flex items-center justify-center font-bold">
                                    ✕</div>
                            </div>
                            <div
                                class="h-20 flex items-center justify-center border-b border-slate-300/30 px-4 text-center text-[11px] italic text-slate-400">
                                Avhenger av manuell erfaring og tid</div>
                            <div
                                class="h-20 flex items-center justify-center border-b border-slate-300/30 text-slate-400">
                                <div
                                    class="w-7 h-7 rounded-full border border-slate-300 flex items-center justify-center font-bold">
                                    ✕</div>
                            </div>
                            <div class="h-20 flex items-center justify-center text-slate-400">
                                <div
                                    class="w-7 h-7 rounded-full border border-slate-300 flex items-center justify-center font-bold">
                                    ✕</div>
                            </div>
                        </div>

                        <div
                            class="reveal-card bg-white rounded-[1.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.08)] flex flex-col relative z-10 border border-slate-100">
                            <div class="h-16 flex items-center justify-center">
                                <span
                                    class="bg-[#fcebb6] text-slate-800 px-4 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Etter
                                    SPIDER</span>
                            </div>
                            <div class="h-20 flex items-center justify-center border-b border-slate-100">
                                <div
                                    class="w-7 h-7 rounded-full bg-[#fcebb6] flex items-center justify-center text-slate-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="h-20 flex items-center justify-center border-b border-slate-100 text-slate-800 font-medium text-sm">
                                Kontinuerlig</div>
                            <div class="h-20 flex items-center justify-center border-b border-slate-100">
                                <div
                                    class="w-7 h-7 rounded-full bg-[#fcebb6] flex items-center justify-center text-slate-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="h-20 flex items-center justify-center border-b border-slate-100 px-6 text-center text-[11px] font-medium text-slate-700 leading-tight">
                                Dokumentert toppoptimal kvalitet – hver dag</div>
                            <div class="h-20 flex items-center justify-center border-b border-slate-100">
                                <div
                                    class="w-7 h-7 rounded-full bg-[#fcebb6] flex items-center justify-center text-slate-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="h-20 flex items-center justify-center">
                                <div
                                    class="w-7 h-7 rounded-full bg-[#fcebb6] flex items-center justify-center text-slate-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- Comparison section ends  -->

        <!-- Seperator, Border  -->
        <div class="relative flex items-center justify-center container mx-auto">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-200/60"></div>
            </div>
        </div>
        <!-- Seperator Border ends  -->

        <!-- Result section  -->
        <section class="min-h-screen p-8 md:p-20 font-sans text-slate-900">
            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div class="space-y-8">
                    <hh2
                        class="reveal-type text-4xl md:text-5xl font-light lg:text-6xl font-light leading-tight tracking-tight text-balance">
                        Verdien av SPIDER ligger i samspillet mellom teknologi og mennesker.
                    </hh2>

                    <div class="reveal-text space-y-6 max-w-lg">
                        <p class="text-lg font-medium text-slate-700">
                            Teknologi som forsterker mennesket.
                        </p>
                        <p class="text-slate-600 leading-relaxed">
                            Ved å kombinere avansert optimalisering med forståelse for hverdagen i hjemmetjenesten,
                            skaper SPIDER resultater som merkes i hele organisasjonen – fra administrasjon til det
                            enkelte
                            hjemmebesøk.
                        </p>
                    </div>
                </div>

                <div class="space-y-6 reveal-grid">

                    <div
                        class="reveal-card bg-white p-8 md:p-10 rounded-[2rem] shadow-sm hover:shadow-md transition-shadow duration-300 border border-white">
                        <div class="bg-slate-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-light mb-4">Slik fungerer teknologien</h3>
                        <p class="text-slate-500 mb-8 leading-relaxed">
                            Utforsk hvordan SPIDER automatiserer ruteplanlegging og ressursbruk.
                        </p>
                        <button
                            class="group flex items-center gap-3 bg-slate-50 hover:bg-slate-100 px-6 py-4 rounded-full transition-all">
                            <span class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                            <span class="font-medium text-sm">Utforsk funksjonalitet</span>
                        </button>
                    </div>

                    <div
                        class="reveal-card bg-white p-8 md:p-10 rounded-[2rem] shadow-sm hover:shadow-md transition-shadow duration-300 border border-white">
                        <div class="bg-slate-50 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-light mb-4">Dokumentert effekt</h3>
                        <p class="text-slate-500 mb-8 leading-relaxed text-pretty">
                            Se de faktiske tallene og resultatene fra over 30 norske kommuner som allerede bruker
                            SPIDER.
                        </p>
                        <button
                            class="group flex items-center gap-3 bg-slate-50 hover:bg-slate-100 px-6 py-4 rounded-full transition-all">
                            <span class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                            <span class="font-medium text-sm">Se dokumenterte resultater</span>
                        </button>
                    </div>

                </div>
            </div>
        </section>
        <!-- Result section ends  -->
    </div>

    <!-- Call to action  -->
    <section class="bg-[#FFE587] py-32 relative overflow-hidden text-center bg-cover bg-center"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/newsletter-bg.svg');">
        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <h2 class="reveal-type font-light text-3xl md:text-6xl font-serif text-gray-900 leading-tight mb-8">
                Hver kommune er forskjellig
            </h2>

            <p class="reveal-type text-gray-700 text-sm max-w-2xl mx-auto leading-relaxed mb-12">
                SPIDER tilpasses lokale regler, arbeidsflyt og prioriteringer – og leverer verdi der det betyr mest.
            </p>

            <button
                class="reveal-button bg-[#0c111d] text-white px-10 py-5 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group">
                <span class="font-bold text-sm">Book gratis demo</span>
            </button>
        </div>
    </section>
    <!-- Call to action Section ends  -->

<?php get_footer(); ?>