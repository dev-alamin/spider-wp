<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> x-data>
  <?php wp_body_open(); ?>

  <div id="page" class="site page-wrapper" style="position: relative; overflow: hidden;">
    <div class="glow-blob yellow-glow"></div>
    <div class="glow-blob blue-glow"></div>

    <div class="<?php is_front_page() ? 'md:min-h-screen' : '' ?>">
      <nav x-data="{ mobileMenuOpen: false }" class="container relative flex items-center justify-between px-6 md:px-12 py-6 mx-auto">
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

      <?php if (is_front_page()) : ?>
        <header class="container mx-auto px-4 md:px-12 pt-4 md:pt-20 grid grid-cols-1 lg:grid-cols-5 gap-6 items-center">

          <div class="col-span-2">
            <span class="hero-badge-ref reveal-type italic text-gray-600 bg-white/50 px-4 py-1 rounded-sm border border-gray-100 text-sm mb-8 inline-block">
              <?php echo esc_html(get_theme_mod('hero_badge_text', 'Brukt av 30+ norske kommuner – hver dag')); ?>
            </span>

            <h1 class="hero-title-ref reveal-type text-4xl md:text-6xl font-serif leading-tight mb-8">
              <?php echo wp_kses_post(get_theme_mod('hero_main_title', 'Verdensledende planlegging for hjemmetjenesten')); ?>
            </h1>

            <div class="reveal-text">
              <p class="hero-desc-ref text-md md:text-lg text-gray-600 mb-10 max-w-md leading-relaxed">
                <?php echo esc_html(get_theme_mod('hero_desc', 'SPIDER bygger optimale arbeidslister og ruter på minutter...')); ?>
              </p>
            </div>

            <button class="reveal-button bg-[#0c111d] text-white px-8 py-4 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group">
              <div class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
              </div>
              <span class="hero-cta-ref font-semibold text-sm">
                <?php echo esc_html(get_theme_mod('hero_cta_text', 'Book gratis demo')); ?>
              </span>
            </button>
          </div>

          <div class="reveal-grid relative w-full md:h-[750px] lg:ml-auto col-span-3">
            <div class="reveal-card flex flex-col md:flex-row gap-4 justify-between">

              <div>
                <div class="left-4 flex bg-white md:max-h-[250px] rounded-2xl p-2 shadow-2xl border border-gray-50 z-20">
                  <div class="md:w-[295px] p-4">
                    <div class="bg-[#FFE587] w-12 h-12 rounded-2xl flex items-center justify-center mb-6">
                      <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                      </svg>
                    </div>
                    <h3 class="font-serif text-[14px] leading-[1.1] text-gray-900 mb-4">UNIKE <br />oppkoblingsmuligheter</h3>
                    <p class="text-[12px] text-gray-500 mb-8 leading-relaxed">SPIDER kobles sømløst mot EPJ...</p>
                  </div>

                  <div class="bg-[#F8F7F4] rounded-2xl flex items-center justify-center relative overflow-hidden">
                    <?php
                    $card1_img = get_theme_mod('hero_card_1_img');
                    $default_card1 = get_template_directory_uri() . '/images/hero-first-group-logo.png';
                    ?>
                    <img src="<?php echo $card1_img ? esc_url($card1_img) : esc_url($default_card1); ?>" class="h-full w-full object-cover" alt="Spider Solutions">
                  </div>
                </div>

                <div class="relative">
                  <div class="bottom-4 md:w-[350px] bg-white rounded-2xl p-4 py-8 md:py-15.5 mt-6 shadow-2xl border border-gray-50 z-30">
                    <h3 class="hero-card2-title-ref font-serif text-[14px] text-center text-gray-900 mb-4">
                      <?php echo esc_html(get_theme_mod('hero_card_2_title', 'UNIK fleksibilitet')); ?>
                    </h3>
                    <p class="hero-card2-desc-ref text-[13px] text-gray-500 text-center mb-8 leading-relaxed">
                      <?php echo esc_html(get_theme_mod('hero_card_2_desc', 'SPIDER tilpasses lokale regler...')); ?>
                    </p>
                    <div class="flex justify-center -space-x-4 mb-8">
                      <img class="w-14 h-14 rounded-full border-[6px] border-white shadow-sm" src="https://i.pravatar.cc/150?u=a1" alt="">
                      <img class="w-14 h-14 rounded-full border-[6px] border-white shadow-sm" src="https://i.pravatar.cc/150?u=a2" alt="">
                      <div class="w-14 h-14 rounded-full border-[6px] border-white bg-[#FFE587] flex items-center justify-center text-gray-900 text-sm font-bold shadow-sm">+</div>
                    </div>
                    <button class="w-full py-5 bg-[#F8F7F4] rounded-2xl text-[11px] font-bold text-gray-600 flex items-center justify-center gap-2 hover:bg-[#FFE587] transition-colors">
                      <span class="text-xl leading-none font-light">+</span> Legg til ny bruker
                    </button>
                  </div>

                  <div
                    class="hero-central-logo hidden md:flex w-[120px] h-[120px] absolute left-95 top-2 items-center justify-center z-40">
                    <img src="<?php echo esc_url(get_theme_mod('hero_center_logo')) ?? './images/hero-center-logo.svg'; ?>" class="w-full h-full object-contain animate-spider-float"
                      alt="Spider Center Logo">
                  </div>
                </div>
              </div>

              <div class="reveal-card md:flex flex-col mt-2 md:mt-0">
                <div class="md:w-[340px] md:max-h-[400px] bg-white rounded-2xl p-6 shadow-lg border border-gray-50 z-10 mb-6">
                  <div class="mb-6">
                    <h3 class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-1">UNIK</h3>
                    <h4 class="hero-card3-title-ref font-serif text-[14px] leading-tight text-gray-900">
                      <?php echo esc_html(get_theme_mod('hero_card_3_title', 'funksjonalitetsrikdom')); ?>
                    </h4>
                  </div>
                  <div class="space-y-3">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                      <div class="bg-[#FDF9ED] px-5 py-4 rounded-2xl flex items-center gap-2 <?php echo ($i == 2) ? 'ml-8' : (($i == 3) ? 'ml-16' : ''); ?>">
                        <div class="bg-[#FFE587] rounded-full p-1 text-gray-900">
                          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                          </svg>
                        </div>
                        <span class="hero-card3-list-<?php echo $i; ?>-ref text-[14px] font-medium text-gray-800">
                          <?php echo esc_html(get_theme_mod("hero_card_3_list_$i", 'Step-in funksjoner')); ?>
                        </span>
                      </div>
                    <?php endfor; ?>
                  </div>
                </div>

                <div class="md:w-[470px] relative bg-white rounded-2xl p-4 shadow-2xl border border-gray-50 z-20 overflow-hidden md:ml-[-130px]">
                  <div class="absolute -right-6 -top-6 opacity-[0.04] text-gray-900 pointer-events-none">
                    <?php
                    $gear_img = get_theme_mod('hero_card_4_img');
                    $default_gear = get_template_directory_uri() . '/images/gear-white-hero.png';
                    ?>
                    <img src="<?php echo $gear_img ? esc_url($gear_img) : esc_url($default_gear); ?>" class="w-48 h-48 bg-[#F9F5F3] rounded-full" alt="">
                  </div>
                  <h3 class="font-serif text-[14px] leading-[1.1] text-gray-900 mb-5">UNIK <br />optimeringskvalitet</h3>
                  <p class="hero-card4-desc-ref text-[13px] text-gray-500 leading-relaxed max-w-[250px]">
                    <?php echo esc_html(get_theme_mod('hero_card_4_desc', 'SPIDER leverer dokumentert verdensledende optimering...')); ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </header>

    </div>

    <div class="relative flex items-center justify-center container mx-auto px-12 mt-20">
      <div class="absolute inset-0 flex items-center" aria-hidden="true">
        <div class="w-full border-t border-[#DBD1CF]"></div>
      </div>
      <div class="relative">
        <span class="res-divider-ref bg-[#E8E2E1] italic px-6 py-3 rounded-md text-[11px] tracking-[0.2em] shadow-sm">
          <?php echo esc_html(get_theme_mod('res_divider_text', 'Resultater')); ?>
        </span>
      </div>
    </div>

    <section class="container mx-auto px-6 py-24 text-center">
      <div class="space-y-2 mb-20">
        <h2 class="res-old-ref text-3xl md:text-4xl font-serif text-[#1F2937] line-through">
          <?php echo esc_html(get_theme_mod('res_headline_old', 'Har du råd til å bruke SPIDER?')); ?>
        </h2>
        <h2 class="res-new-ref reveal-type text-3xl md:text-4xl font-serif text-[#1F2937]">
          <?php echo wp_kses_post(get_theme_mod('res_headline_new', 'Har du råd til å <span class="italic">ikke</span> bruke SPIDER?')); ?>
        </h2>
      </div>

      <div class="hidden md:flex relative w-full container mx-auto h-20 mb-0">
        <div class="absolute left-1/2 top-0 -translate-x-1/2 w-4 h-4 rounded-full bg-[#E5E7EB] border-[3px] border-white shadow-sm z-10"></div>
        <svg class="w-full h-full text-[#E5E7EB]" preserveAspectRatio="none" viewBox="0 0 1000 100">
          <path d="M500 10 V 50 H 125 V 100 M 500 50 H 375 V 100 M 500 50 H 625 V 100 M 500 50 H 875 V 100" fill="none" stroke="currentColor" stroke-width="1.5" />
        </svg>
      </div>

      <div class="reveal-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        <?php for ($i = 1; $i <= 4; $i++):
          $trend = get_theme_mod("res_card_{$i}_trend", ($i <= 2 ? 'down' : 'up'));
          $val = get_theme_mod("res_card_{$i}_val");
          $txt = get_theme_mod("res_card_{$i}_txt");
        ?>
          <div class="reveal-card bg-white rounded-3xl p-8 text-left shadow-2xl shadow-gray-300 border border-gray-50 relative">
            <div class="absolute top-6 right-6 <?php echo ($trend === 'up') ? 'bg-[#DCFCE7]' : 'bg-[#FEE2E2]'; ?> p-2 rounded-full">
              <?php if ($trend === 'up'): ?>
                <svg class="w-5 h-5 text-[#22C55E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
              <?php else: ?>
                <svg class="w-5 h-5 text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                </svg>
              <?php endif; ?>
            </div>
            <div class="res-card-<?php echo $i; ?>-val text-3xl md:text-5xl font-serif text-[#111827] mt-6 md:mt-12 mb-4">
              <?php echo esc_html($val); ?>
            </div>
            <p class="res-card-<?php echo $i; ?>-txt text-[#6B7280] leading-relaxed">
              <?php echo esc_html($txt); ?>
            </p>
          </div>
        <?php endfor; ?>
      </div>

      <button class="bg-[#0c111d] text-white px-8 py-4 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group">
        <div class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
          <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
          </svg>
        </div>
        <span class="res-cta-ref font-semibold text-sm">
          <?php echo esc_html(get_theme_mod('res_cta_text', 'Se flere resultater')); ?>
        </span>
      </button>
    </section>

  <?php endif; ?>
  </div>