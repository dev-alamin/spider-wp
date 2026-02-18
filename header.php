<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php if ( function_exists( 'has_site_icon' ) && has_site_icon() ) : ?>
    <?php wp_site_icon(); ?>
  <?php endif; ?>


  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> x-data>
  <?php wp_body_open(); ?>

  <div id="page" class="site page-wrapper" style="position: relative; overflow: hidden;">
    <?php if(is_front_page()): ?>
    <div class="glow-blob yellow-glow"></div>
    <div class="glow-blob blue-glow"></div>
    <?php endif; ?>

    <div class="<?php is_front_page() ? 'md:min-h-screen' : '' ?>">
      <nav x-data="{ mobileMenuOpen: false }" class="container relative flex items-center justify-between px-6 md:px-12 py-6 mx-auto z-50">
        <div class="flex items-center gap-2 z-50">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/main-logo-dark.svg" alt="<?php bloginfo('name'); ?>" class="h-8" />
          </a>
        </div>

        <div class="hidden lg:flex items-center gap-1 bg-white/60 backdrop-blur-md p-1.5 rounded-full border border-gray-100 shadow-sm">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
            'walker'         => new Spider_Walker_Nav_Menu(), // Add this!
          ));
          ?>
        </div>

        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="hidden lg:block px-8 py-4 rounded-full bg-white text-black text-sm shadow-sm hover:bg-spider-dark hover:text-black transition-all">
          Kontakt oss
        </a>

        <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden z-[110] p-2 text-[#413934] relative">
          <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>

        <template x-teleport="body">
          <div x-show="mobileMenuOpen" class="fixed inset-0 z-[100] lg:hidden" style="display: none;">
            <div x-show="mobileMenuOpen" x-transition.opacity @click="mobileMenuOpen = false" class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>

            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300 transform"
              x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
              x-transition:leave="transition ease-in duration-300 transform"
              x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
              class="absolute right-0 top-0 h-full w-[80%] max-w-sm bg-white shadow-2xl p-8 pt-24">

              <button @click="mobileMenuOpen = false" class="absolute top-6 right-8 text-[#413934]">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>

              <div class="flex flex-col gap-6 text-xl font-medium text-[#413934]">
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'menu-1',
                  'container'      => false,
                  'items_wrap'     => '%3$s',
                  'fallback_cb'    => false,
                  'walker'         => new Spider_Mobile_Walker(),
                ));
                ?>

                <a href="<?php echo esc_url(home_url('/contact')); ?>"
                  @click="mobileMenuOpen = false"
                  class="mt-8 px-8 py-4 rounded-full bg-[#111] text-white text-center text-base hover:bg-black transition-colors shadow-lg">
                  Kontakt oss
                </a>
              </div>
            </div>
          </div>
        </template>
      </nav>

      <?php if (is_front_page()) :

        $show_hero_section = spider_solutions_get_theme_option('home_enable_hero_section', true);

        $badge       = spider_solutions_get_theme_option('home_hero_badge', 'Brukt av 30+ norske kommuner – hver dag');
        $title       = spider_solutions_get_theme_option('home_hero_title', 'Verdensledende planlegging for hjemmetjenesten');
        $desc        = spider_solutions_get_theme_option('home_hero_desc', '');

        $cta_label   = spider_solutions_get_theme_option('home_hero_cta_label', 'Book gratis demo');
        $cta_link    = spider_solutions_get_theme_option('home_hero_cta_link', '#');

        $show_hero_right = spider_solutions_get_theme_option('home_enable_hero_right', true);

        $card1_title = spider_solutions_get_theme_option('home_hero_card1_title');
        $card1_desc  = spider_solutions_get_theme_option('home_hero_card1_desc');
        $card1_img   = spider_solutions_get_theme_option('home_hero_card1_image');

        $card2_title = spider_solutions_get_theme_option('home_hero_card2_title');
        $card2_desc  = spider_solutions_get_theme_option('home_hero_card2_desc');

        $card4_title = spider_solutions_get_theme_option('home_hero_card4_title');
        $card4_desc  = spider_solutions_get_theme_option('home_hero_card4_desc');

        $center_logo = spider_solutions_get_theme_option('home_hero_center_logo', get_template_directory_uri() . '/images/gear-white-hero.png');
        $show_center_logo = spider_solutions_get_theme_option('home_hero_show_center_logo', true);

      ?>
        <?php if ($show_hero_section): ?>
          <header class="container mx-auto px-4 md:px-12 pt-4 md:pt-20 grid grid-cols-1 lg:grid-cols-5 gap-6 items-center">

            <!-- Hero Left  -->
            <div class="col-span-2">

              <span class="reveal-type italic text-gray-600 bg-white/50 px-4 py-1 rounded-sm border border-gray-100 text-sm mb-8 inline-block">
                <?php echo esc_html($badge); ?>
              </span>

              <h1 class="reveal-type text-4xl md:text-6xl font-serif leading-tight mb-8">
                <?php echo esc_html($title); ?>
              </h1>

              <?php if ($desc) : ?>
                <div class="reveal-text">
                  <p class="text-md md:text-lg text-gray-600 mb-10 max-w-md leading-relaxed">
                    <?php echo esc_html($desc); ?>
                  </p>
                </div>
              <?php endif; ?>

              <a href="<?php echo esc_url($cta_link); ?>"
                class="reveal-button bg-[#0c111d] text-white px-8 py-4 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group">

                <div class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
                  <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                  </svg>
                </div>

                <span class="font-semibold text-sm">
                  <?php echo esc_html($cta_label); ?>
                </span>

              </a>

            </div>
            <!-- Hero Left ends -->

            <!-- Hero Right Starts  -->
            <?php if ($show_hero_right): ?>
              <div class="reveal-grid relative w-full md:h-[750px] lg:ml-auto col-span-3">
                <div class="reveal-card flex flex-col md:flex-row gap-4 justify-between">

                  <div>

                    <div
                      class="left-4 flex bg-white  md:max-h-[250px] rounded-2xl p-2 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.08)] border border-gray-50 z-20">

                      <div class="md:w-[295px] p-4 break-words">
                        <div class="bg-[#FFE587] w-12 h-12 rounded-2xl flex items-center justify-center mb-6">
                          <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                          </svg>
                        </div>
                        <h3 class="hero-card1-title-ref font-serif text-[14px] leading-[1.1] text-gray-900 mb-4">
                          <?php echo esc_html($card1_title); ?>
                        </h3>

                        <p class="hero-card1-desc-ref text-[12px] text-gray-500 mb-8 leading-relaxed">
                          <?php echo esc_html($card1_desc); ?>
                        </p>

                      </div>

                      <div class="bg-[#F8F7F4] rounded-2xl flex items-center justify-center relative overflow-hidden">
                        <?php if ($card1_img) : ?>
                          <img src="<?php echo esc_url($card1_img); ?>" class="h-full w-full object-cover" alt="">
                        <?php endif; ?>
                      </div>

                    </div>

                    <div class="relative">
                      <div
                        class="bottom-4 md:w-[350px] bg-white rounded-2xl p-4 py-8 md:py-15.5 mt-6 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.1)] border border-gray-50 z-30">
                        <h3 class="hero-card2-title-ref font-serif text-[14px] text-center text-gray-900 mb-4">
                          <?php echo esc_html($card2_title); ?>
                        </h3>

                        <p class="hero-card2-desc-ref text-[13px] text-gray-500 text-center mb-8 leading-relaxed">
                          <?php echo esc_html($card2_desc); ?>
                        </p>


                        <div class="flex justify-center -space-x-4 mb-8">
                          <img class="w-14 h-14 rounded-full border-[6px] border-white shadow-sm"
                            src="https://i.pravatar.cc/150?u=a1" alt="">
                          <img class="w-14 h-14 rounded-full border-[6px] border-white shadow-sm"
                            src="https://i.pravatar.cc/150?u=a2" alt="">
                          <img class="w-14 h-14 rounded-full border-[6px] border-white shadow-sm"
                            src="https://i.pravatar.cc/150?u=a3" alt="">
                          <div
                            class="w-14 h-14 rounded-full border-[6px] border-white bg-[#FFE587] flex items-center justify-center text-gray-900 text-sm font-bold shadow-sm">
                            +</div>
                        </div>

                        <button
                          class="w-full py-5 bg-[#F8F7F4] rounded-2xl text-[11px] font-bold text-gray-600 flex items-center justify-center gap-2 hover:bg-[#FFE587] hover:text-gray-900 transition-colors">
                          <span class="text-xl leading-none font-light">+</span> Legg til ny bruker
                        </button>
                      </div>



                      <div
                        class="hero-central-logo hidden md:flex w-[120px] h-[120px] absolute left-95 top-2 items-center justify-center z-40">
                        <?php if ($center_logo && $show_center_logo) : ?>
                          <img src="<?php echo esc_url($center_logo); ?>"
                            class="w-full h-full object-contain animate-spider-float"
                            alt="spider solution floating logo">
                        <?php endif; ?>
                      </div>

                    </div>


                  </div>

                  <div class="reveal-card md:flex flex-col mt-2 md:mt-0">
                    <div
                      class="md:w-[340px] md:max-h-[400px] bg-white rounded-2xl p-6 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.06)] border border-gray-50 z-10 mb-6">
                      <div class="mb-6">
                        <h3 class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-1">UNIK</h3>
                        <h4 class="hero-card2-title-ref font-serif text-[14px] leading-tight text-gray-900">
                          <?php echo esc_html($card2_title); ?>
                        </h4>
                      </div>
                      <p class="hero-card2-desc-ref text-[13px] text-gray-500 mb-8 leading-relaxed">
                        <?php echo esc_html($card2_desc); ?>
                      </p>

                      <div class="space-y-3">

                        <?php for ($i = 1; $i <= 3; $i++) :
                          $feature = get_theme_mod(SPIDER_PREFIX . "home_hero_feature_$i", 'Step-in funksjoner');
                        ?>


                          <div class="bg-[#FDF9ED] <?php if ($i >= 2) echo 'ml-' . 8 * ($i - 1); ?> px-5 py-4 rounded-2xl flex items-center gap-2 border-[#FFE587]/30">
                            <div class="bg-[#FFE587] rounded-full p-1 text-gray-900"><svg class="w-3 h-3" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                              </svg></div>

                            <span class="hero-feature-<?php echo $i; ?>-ref text-[14px] font-medium text-gray-800">
                              <?php echo esc_html($feature); ?>
                            </span>

                          </div>

                        <?php endfor; ?>


                      </div>
                    </div>

                    <div
                      class="md:w-[470px] relative bg-white rounded-2xl p-4 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.08)] border border-gray-50 z-20 overflow-hidden md:ml-[-130px]">
                      <div class="absolute -right-6 -top-6 opacity-[0.04] text-gray-900 pointer-events-none">

                        <!-- <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                  <path fill-rule="evenodd"
                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                    clip-rule="evenodd" />
                </svg> -->
                        <?php if ($center_logo && $show_center_logo) : ?>
                          <img src="<?php echo esc_url($center_logo); ?>"
                            class="w-full h-full object-contain animate-spider-float"
                            alt="spider solution floating logo">
                        <?php endif; ?>

                      </div>

                      <div class="bg-[#FFE587] w-14 h-14 rounded-2xl flex items-center justify-center mb-8">
                        <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        </svg>
                      </div>
                      <h3 class="hero-card4-title-ref font-serif text-[14px] leading-[1.1] text-gray-900 mb-5">
                        <?php echo esc_html($card4_title); ?>
                      </h3>

                      <p class="hero-card4-desc-ref text-[13px] text-gray-500 leading-relaxed max-w-[250px]">
                        <?php echo esc_html($card4_desc); ?>
                      </p>

                    </div>



                  </div>

                </div>


              </div>
            <?php endif; ?>
            <!-- Hero Right ends -->

          </header>
        <?php endif; ?>

    </div>

    <?php if (spider_solutions_get_theme_option('home_enable_result_section')): ?>
      <div class="relative flex items-center justify-center container mx-auto px-12 mt-20">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
          <div class="w-full border-t border-[#DBD1CF]"></div>
        </div>
        <div class="relative">
          <span class="res-divider-ref bg-[#E8E2E1] italic px-6 py-3 rounded-md text-[11px] tracking-[0.2em] shadow-sm">
            <?php echo esc_html(spider_solutions_get_theme_option('home_res_divider_text', 'Resultater')); ?>
          </span>
        </div>
      </div>

      <section class="container mx-auto px-6 py-24 text-center">

        <div class="space-y-2 mb-20">
          <h2 class="text-3xl md:text-4xl font-serif text-[#1F2937] line-through">
            <?php echo esc_html(spider_solutions_get_theme_option('home_res_heading_strike')); ?>
          </h2>

          <h2 class="reveal-type text-3xl md:text-4xl font-serif text-[#1F2937]">
            <?php echo wp_kses_post(spider_solutions_get_theme_option('home_res_heading_main')); ?>
          </h2>
        </div>


        <div class="hidden md:flex relative w-full container mx-auto h-20 mb-0">
          <div class="absolute left-1/2 top-0 -translate-x-1/2 w-4 h-4 rounded-full bg-[#E5E7EB] border-[3px] border-white shadow-sm z-10"></div>

          <svg class="w-full h-full text-[#E5E7EB]" preserveAspectRatio="none" viewBox="0 0 1000 100">
            <path d="M500 10 V 50 H 125 V 100 M 500 50 H 375 V 100 M 500 50 H 625 V 100 M 500 50 H 875 V 100"
              fill="none" stroke="currentColor" stroke-width="1.5" />
          </svg>
        </div>


        <?php $items = spider_solutions_get_theme_option('home_res_items'); ?>

        <div class="reveal-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
          <?php if (! empty($items)) : ?>
            <?php foreach ($items as $item) :

              $value = isset($item['value']) ? trim($item['value']) : '';

              // Determine trend dynamically
              $is_positive = true;
              if (str_starts_with($value, '-')) {
                $is_positive = false;
              }

              $bg  = $is_positive ? 'bg-[#DCFCE7]' : 'bg-[#FEE2E2]';
              $col = $is_positive ? 'text-[#22C55E]' : 'text-[#EF4444]';

              $icon_path = $is_positive
                ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'
                : 'M13 17h8m0 0V9m0 8l-8-8-4 4-6-6';
            ?>

              <div class="reveal-card bg-white rounded-3xl p-8 text-left shadow-2xl shadow-gray-300 border border-gray-50 relative">

                <div class="absolute top-6 right-6 <?php echo esc_attr($bg); ?> p-2 rounded-full">
                  <svg class="w-5 h-5 <?php echo esc_attr($col); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="<?php echo esc_attr($icon_path); ?>">
                    </path>
                  </svg>
                </div>

                <div class="text-3xl md:text-5xl font-serif text-[#111827] mt-6 md:mt-12 mb-4">
                  <?php echo esc_html($value); ?>
                </div>

                <p class="text-[#6B7280] leading-relaxed">
                  <?php echo esc_html($item['label']); ?>
                </p>

              </div>

            <?php endforeach; ?>
          <?php endif; ?>
        </div>



        <a href="<?php echo esc_url(spider_solutions_get_theme_option('home_res_cta_link')); ?>"
          class="bg-[#0c111d] text-white px-8 py-4 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group">

          <div class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
            <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
          </div>

          <span class="font-semibold text-sm">
            <?php echo esc_html(spider_solutions_get_theme_option('home_res_cta_label')); ?>
          </span>

        </a>

      </section>
    <?php endif; ?>

  <?php endif; ?>

  </div>