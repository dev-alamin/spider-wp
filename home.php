<?php

/**
 * Template Name: Homepage
 * 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spider_Solutions
 */

get_header();
?>


  <!-- Use glow effect for key benefits and technology section -->
  <div class="relative overflow-hidden">
    <div class="spider-benefit-technology-glow-right"></div>
    
    <!-- Key Benefit section  -->
     <?php if( spider_solutions_get_theme_option( 'home_enable_benefit_section', true ) ): ?>
    <div class="relative flex items-center justify-center container mx-auto px-12 mt-20">

          <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200/60"></div>
          </div>

          <div class="relative">
            <span class="ben-badge-ref bg-white px-4 py-1.5 rounded-md text-[11px] font-bold tracking-[0.2em] uppercase text-gray-400 border border-gray-100 shadow-sm">
              <?php echo esc_html( spider_solutions_get_theme_option( 'benefits_badge', 'Nøkkelfordeler' ) ); ?>
            </span>
          </div>
    </div>

    <section class="relative container mx-auto px-4 md:px-12 py-20">
      <div class="key-benefit-blue-glow-left"></div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start mb-16">
        <h2 class="benefits-title-ref reveal-type text-5xl font-serif leading-tight text-gray-900">
          <?php echo esc_html( spider_solutions_get_theme_option( 'benefits_title', 'Planlegging som gir mer tid...' ) ); ?>
        </h2>
        <div class="reveal-text lg:pl-12 lg:border-l border-gray-200">
          <p class="benefits-desc-ref text-gray-500 leading-relaxed text-sm">
            <?php echo esc_html( spider_solutions_get_theme_option( 'benefits_desc' ) ); ?>
          </p>
        </div>
      </div>

      <div class="reveal-grid grid grid-cols-1 lg:grid-cols-3 gap-6">
        <?php 
        $benefits = spider_solutions_get_theme_option( 'home_key_benefits', [] );

        foreach ( $benefits as $index => $item ) : 
            $is_first = ( $index === 0 ); ?>
            <div class="reveal-card <?php echo $is_first ? 'lg:col-span-1 lg:row-span-2' : ''; ?> bg-white rounded-[32px] p-4 md:p-8 shadow-2xl shadow-gray-200 border border-gray-50 flex flex-col h-full">
              
              <?php if ( $is_first && ! empty( $item['image'] ) ) : ?>
                <div class="bg-[#EEF2FF] rounded-2xl h-80 w-full mb-8 relative overflow-hidden border border-blue-50">
                    <img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" class="w-full h-full object-cover opacity-60" />
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white px-4 py-2 rounded-lg shadow-md text-[10px] font-bold">
                        Pasient
                    </div>
                </div>
              <?php endif; ?>

              <div class="bg-[#F9F5F3] w-10 h-10 rounded-xl flex items-center justify-center mb-6">
                <?php echo spider_solutions_get_benefit_icon( $item['icon_type'] ); ?>
              </div>

              <h3 class="text-2xl font-serif mb-4 leading-tight">
                <?php echo esc_html( $item['title'] ); ?>
              </h3>

              <div class="w-24 h-[1px] bg-gray-200 mb-6"></div>

              <p class="<?php echo $is_first ? 'text-sm' : 'text-xs'; ?> text-gray-500 leading-relaxed mb-8">
                <?php echo esc_html( $item['desc'] ); ?>
              </p>

              <a href="<?php echo esc_url( $item['link_url'] ); ?>" 
              class="mt-auto flex items-center gap-2 text-[11px] font-bold uppercase tracking-widest text-gray-400 bg-[#F9F5F3] w-fit px-4 py-2 rounded-full hover:bg-gray-100 transition-colors">
                
                <span class="bg-white rounded-full w-4 h-4 flex items-center justify-center text-[10px] shadow-sm">›</span>
                
                <?php 
                // Fallback to 'Les mer' if the field is empty
                echo esc_html( !empty($item['link_text']) ? $item['link_text'] : __('Les mer', 'spider') ); 
                ?>
            </a>
            </div>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endif; ?>
    <!-- Key Benefit section Ends  -->


    <!-- Functionlities section  -->
    <div class="relative flex items-center justify-center container mx-auto px-4 mt-12 md:px-12 md:mt-32">
      <div class="absolute inset-0 flex items-center" aria-hidden="true">
        <div class="w-full border-t border-gray-200/60"></div>
      </div>
    </div>

    <section x-data="functionalityFilter" class="container mx-auto px-6 py-16 text-center">
      <div class="mb-12">
        <!-- <span class="reveal-type bg-[#EAE8E4] px-6 py-2 rounded font-serif italic text-gray-600">Hvorfor SPIDER?</span> -->
        <span class="bg-[#E8E2E1] italic px-6 py-3 rounded-md text-[11px] tracking-[0.2em] shadow-sm inline-block">
          Hvorfor SPIDER?
        </span>
      </div>
      <h2 class="reveal-type text-3xl md:text-5xl font-serif text-gray-900 mb-8 md:mt-6">Funksjonalitet uten grenser
      </h2>
      <div class="reveal-text">
        <p class="max-w-3xl mx-auto text-gray-500 leading-relaxed mb-16 text-sm">
          SPIDER er utviklet tett sammen med over 1000 brukere i hjemmetjenesten – og alle viktige ønsker fra kommunene
          er
          implementert. Resultatet er et system med hundrevis av funksjoner som dekker hele virkeligheten i
          hjemmetjenesten.
        </p>
      </div>

      <div
        class="max-w-6xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-2 flex flex-wrap md:flex-nowrap items-center justify-between gap-2 mb-12">
        <template x-for="category in categories" :key="category">
          <button @click="activeTab = category"
            class="flex-1 py-4 px-6 font-medium rounded-xl text-sm transition-all duration-300"
            :class="activeTab === category ? 'bg-[#FFE587] text-gray-900 shadow-sm' : 'text-gray-500 hover:bg-gray-50'"
            x-text="category">
          </button>
        </template>
      </div>

      <div class="max-w-5xl mx-auto flex flex-wrap justify-center gap-3 mb-20">
        <template x-for="tag in tags[activeTab]" :key="tag">
          <div x-show="activeTab" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            class="bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-100 text-sm text-gray-700 hover:border-[#FFE587] transition-colors cursor-default"
            x-text="tag">
          </div>
        </template>
      </div>

      <div class="flex flex-col items-center gap-8">
        <div
          class="w-10 h-10 rounded-full bg-white shadow-md border border-gray-100 flex items-center justify-center animate-bounce">
          <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
          </svg>
        </div>

        <div class="flex items-center gap-6">
          <div class="flex gap-1.5">
            <div class="w-1.5 h-1.5 rotate-45 border border-gray-300"></div>
            <div class="w-1.5 h-1.5 rotate-45 bg-gray-300"></div>
            <div class="w-1.5 h-1.5 rotate-45 border border-gray-300"></div>
          </div>
          <span class="bg-[#EAE8E4] px-6 py-2 rounded-lg text-[12px] font-serif italic text-gray-700 tracking-wide">
            SPIDER er unik på flere områder
          </span>
          <div class="flex gap-1.5">
            <div class="w-1.5 h-1.5 rotate-45 border border-gray-300"></div>
            <div class="w-1.5 h-1.5 rotate-45 bg-gray-300"></div>
            <div class="w-1.5 h-1.5 rotate-45 border border-gray-300"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Functionalities section Ends -->
     
  </div>
  <!-- Use glow effect for key benefits and technology section ends  -->

  <div class="relative overflow-hidden">
    <div class="key-benefit-blue-glow-left technology"></div>
    <div class="spider-benefit-technology-glow-right"></div>

    <section class="container mx-auto px-6 py-20 text-center">

      <h2 class="reveal-type text-3xl md:text-5xl font-serif text-gray-900 mb-6">Teknologi som matcher virkeligheten
      </h2>
      <div class="reveal-text">
        <p class="max-w-3xl mx-auto text-gray-500 text-sm leading-relaxed mb-10">
          SPIDER håndterer alle detaljene som avgjør kvaliteten i en arbeidsliste: riktig kompetanse på riktig oppdrag,
          kontinuitet for pasientene, færre pleierskift og fleksible regler som tilpasses hver kommune. Alt optimalisert
          på
          minutter – ikke timer.
        </p>
      </div>

      <button
        class="bg-[#0c111d] text-white px-8 py-4 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group mb-20">
        <div class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
          <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
          </svg>
        </div>
        <span class="font-semibold text-sm">Utforsk alle funksjoner</span>
      </button>
    </section>
    <section x-data="spiderSolutionFAQ"
      class="container mx-auto px-4 md:px-12 pb-8 md:pb-16 grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-16 items-center">

      <div class="relative spider__image-reveal md:h-[600px] w-full rounded-[20px] overflow-hidden">
        <!-- <img src="/images/technology-section-main.png" alt="Care worker with elderly patient"
        class="w-full h-full object-cover spider__image-magnetic-animation" />
         -->

        <img @click="$store.lightbox.show(faqData[openIndex].image)"
          :src="openIndex !== null ? faqData[openIndex].image : '/images/technology-section-main.png'"
          alt="Technology visual" class="w-full h-full object-cover spider__image-magnetic-animation" />

      </div>

      <div class="space-y-4 reveal-faq-lis">
        <template x-for="(item, index) in faqData" :key="index">
          <div class="faq-item">
            <div x-show="openIndex !== index" @click="openIndex = index"
              class="flex items-center gap-4 py-6 border-b border-[#DBD6D3] cursor-pointer hover:bg-gray-50/50 transition-colors group">
              <div
                class="w-8 h-8 rounded-full flex items-center justify-center text-black font-bold group-hover:border-gray-400 bg-white p-4 text-xl transition-all">
                +
              </div>
              <h3 class="text-lg font-medium text-gray-800" x-text="item.title"></h3>
            </div>

            <div x-show="openIndex === index" x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 transform scale-95"
              x-transition:enter-end="opacity-100 transform scale-100"
              class="bg-[#E8E2E180] rounded-[32px] p-8 relative overflow-hidden my-4 border border-[#E8E2E1]">
              <div @click="openIndex = null"
                class="absolute top-8 right-8 bg-white w-10 h-10 rounded-full shadow-sm flex items-center justify-center cursor-pointer hover:scale-110 transition-transform">
                <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>

              <h3 class="text-xl font-medium mb-4 pr-12 text-gray-900" x-text="item.title"></h3>
              <p class="text-gray-600 text-sm leading-relaxed max-w-[85%]" x-text="item.content"></p>

              <div class="mt-6 flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                <span class="w-1.5 h-1.5 bg-gray-300 rotate-45"></span>
                Aktivt fokus
              </div>
            </div>
          </div>
        </template>
      </div>
    </section>
  </div>
  <!-- Technology section ends  -->

  <!-- Testimonials Section -->
  <section class="py-24 overflow-hidden bg-[#F1ECEA]">
    <div class="container mx-auto px-12">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-8">
        <h2 class="reveal-type text-3xl md:text-5xl font-serif leading-tight text-gray-900 max-w-xl">
          Ikke hør på oss, hør på de som bruker oss.
        </h2>

        <div class="flex gap-3">
          <button
            class="swiper-prev-btn w-[100px] h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-all active:scale-95">
            <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
          </button>
          <button
            class="swiper-next-btn w-[100px] h-14 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-all active:scale-95">
            <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </div>

      <div class="swiper testimonial-swiper">
        <div class="swiper-wrapper">

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

          <!-- Single Testimonial Slide -->
          <div class="swiper-slide">
            <div class="testimonial-card bg-white border rounded-[20px] border-white/50 shadow-sm relative">
              <div class="m-2 bg-[#F9F5F3] p-6 rounded-[20px] flex flex-col justify-between">
                <div class="flex gap-1 mb-10">
                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>

                  <svg class="w-4 h-4 text-[#F38E5F] fill-current" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-[18px] md:text-[22px] font-serif italic text-gray-800 leading-[1.6] mb-4 md:mb-12">
                  "Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben"
                </p>
                <div class="md:mt-auto pt-4 md:pt-8 border-t border-[#DFD5CF] flex items-center gap-4">
                  <div class="border-5 border-white rounded-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-person.jpg"
                      class="w-14 h-14 rounded-full object-cover avatar-grayscale" />
                  </div>
                  <div>
                    <p class="font-bold text-gray-900 text-sm">Farsund Kommune</p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.15em] font-bold">CEO of Company</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Testimonial Slide Ends -->

        </div>
      </div>
    </div>
  </section>
  <!-- Testimonials Section Ends -->

  <!-- Everyone should be satisfied  -->
  <section class="py-24 bg-[#FAF9F6] relative overflow-hidden">
    <div class="container mx-auto px-12 text-center mb-20">
      <h2 class="reveal-type text-3xl md:text-6xl font-serif text-gray-900 mb-8">Alle skal bli fornøyde!</h2>
      <div class="reveal-text">
        <p class="max-w-3xl mx-auto text-gray-500 leading-relaxed mb-10 text-sm">
          SPIDER løser utfordringer for alle ledd i hjemmetjenesten. Pleierne får tette, men lovlige og trygge planer.
          Planleggerne får mindre tidsbruk og bedre oversikt. Brukerne får kontinuitet og riktig kompetanse til riktig
          tid. Og ledelsen får bedre økonomi, styringsdata og kontroll. Når alt henger sammen, blir hverdagen bedre for
          alle.
        </p>
      </div>
      <button
        class="bg-[#0c111d] text-white px-8 py-4 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group">
        <div class="bg-white rounded-full p-1 group-hover:translate-x-1 transition-transform">
          <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
          </svg>
        </div>
        <span class="font-semibold text-sm">Book gratis demo</span>
      </button>
    </div>

<div class="max-w-5xl mx-auto relative min-h-[400px] md:min-h-[800px] lg:min-h-[600px] flex items-center justify-center p-4">

  <div class="absolute inset-0 opacity-20 hidden sm:block" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 30px 30px;">
  </div>

  <div class="relative z-10 bg-white/60 backdrop-blur-md rounded-[32px] lg:rounded-[48px] p-10 lg:p-20 shadow-2xl shadow-gray-200/50 border border-white flex flex-col items-center transition-all">
    <img src="<?php echo get_template_directory_uri(); ?>/images/main-logo-dark.svg" alt="SPIDER Solutions" class="h-8 lg:h-12 mb-2">
    
    <div class="hidden lg:block absolute -top-12 left-1/2 -translate-x-1/2 w-[1px] h-12 bg-gray-200"></div>
    <div class="hidden lg:block absolute -bottom-12 left-1/2 -translate-x-1/2 w-[1px] h-12 bg-gray-200"></div>
    <div class="hidden lg:block absolute top-1/2 -left-12 -translate-y-1/2 h-[1px] w-12 bg-gray-200"></div>
    <div class="hidden lg:block absolute top-1/2 -right-12 -translate-y-1/2 h-[1px] w-12 bg-gray-200"></div>
  </div>

  <div class="absolute top-[20%] lg:top-[10%] left-1/2 -translate-x-1/2 flex flex-col items-center z-20 w-full lg:w-auto px-4">
    <div class="bg-[#F1ECEA] rounded-2xl p-4 lg:p-6 shadow-sm border border-[#E8E2E1] text-center w-full max-w-[260px] lg:w-64 mb-4 lg:mb-12">
      <p class="text-xs lg:text-sm font-medium text-gray-700">Økonomi, oversikt &amp; rapporter</p>
    </div>
    <div class="bg-white px-4 py-1.5 rounded-full border border-gray-100 shadow-sm flex items-center gap-2">
      <span class="text-[10px] lg:text-[11px] font-bold text-gray-800 uppercase tracking-wider">Ledelsen</span>
      <div class="w-4 h-4 bg-[#FFE587] rounded-full flex items-center justify-center">
        <svg class="w-2.5 h-2.5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
          <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="absolute left-4 lg:left-0 top-[65%] lg:top-1/2 -translate-y-1/2 flex flex-col lg:flex-row items-center z-20 w-[45%] lg:w-auto">
    <div class="bg-[#F1ECEA] rounded-2xl p-4 lg:p-6 shadow-sm border border-[#E8E2E1] text-center w-full lg:w-64 order-2 lg:order-1 lg:mr-4 mt-4 lg:mt-0">
      <p class="text-xs lg:text-sm font-medium text-gray-700">Mindre tidsbruk og færre frustrasjoner</p>
    </div>
    <div class="bg-white px-4 py-1.5 rounded-full border border-gray-100 shadow-sm flex items-center gap-2 order-1 lg:order-2">
      <span class="text-[10px] lg:text-[11px] font-bold text-gray-800 uppercase tracking-wider">Planleggerne</span>
      <div class="w-4 h-4 bg-[#FFE587] rounded-full flex items-center justify-center">
        <svg class="w-2.5 h-2.5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
          <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="absolute right-4 lg:right-0 top-[65%] lg:top-1/2 -translate-y-1/2 flex flex-col lg:flex-row-reverse items-center z-20 w-[45%] lg:w-auto">
    <div class="bg-[#F1ECEA] rounded-2xl p-4 lg:p-6 shadow-sm border border-[#E8E2E1] text-center w-full lg:w-64 order-2 lg:order-1 lg:ml-4 mt-4 lg:mt-0">
      <p class="text-xs lg:text-sm font-medium text-gray-700">Tette, men gode og lovlige planer</p>
    </div>
    <div class="bg-white px-4 py-1.5 rounded-full border border-gray-100 shadow-sm flex items-center gap-2 order-1 lg:order-2">
      <span class="text-[10px] lg:text-[11px] font-bold text-gray-800 uppercase tracking-wider">Pleierne</span>
      <div class="w-4 h-4 bg-[#FFE587] rounded-full flex items-center justify-center">
        <svg class="w-2.5 h-2.5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
          <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="absolute bottom-[-10px] lg:bottom-[7%] left-1/2 -translate-x-1/2 flex flex-col-reverse items-center z-20 w-full lg:w-auto px-4">
    <div class="bg-[#F1ECEA] rounded-2xl p-4 lg:p-6 shadow-sm border border-[#E8E2E1] text-center w-full max-w-[260px] lg:w-64 mt-4 lg:mt-12">
      <p class="text-xs lg:text-sm font-medium text-gray-700">Kontinuitet, rett kompetanse til rett tid</p>
    </div>
    <div class="bg-white px-4 py-1.5 rounded-full border border-gray-100 shadow-sm flex items-center gap-2">
      <span class="text-[10px] lg:text-[11px] font-bold text-gray-800 uppercase tracking-wider">Brukerne</span>
      <div class="w-4 h-4 bg-[#FFE587] rounded-full flex items-center justify-center">
        <svg class="w-2.5 h-2.5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
          <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path>
        </svg>
      </div>
    </div>
  </div>

</div>
  </section>
  <!-- Everyone should be satisfied Ends -->

  <!-- Call to action  -->
  <section class="bg-[#FFE587] py-32 relative overflow-hidden text-center bg-cover bg-center"
    style="background-image: url('images/newsletter-bg.svg');">
    <!-- <div class="absolute inset-0 opacity-20 pointer-events-none">
      <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
        <circle cx="50" cy="50" r="40" fill="none" stroke="black" stroke-width="0.1" />
        <circle cx="50" cy="50" r="60" fill="none" stroke="black" stroke-width="0.1" />
      </svg>
    </div> -->

    <div class="relative z-10 max-w-4xl mx-auto px-6">
      <div class="inline-block bg-white px-4 py-1.5 rounded-lg shadow-sm mb-8">
        <span class="text-[12px] italic font-serif text-gray-800">Interessert?</span>
      </div>

      <h2 class="reveal-type text-3xl md:text-6xl font-serif text-gray-900 leading-tight mb-8">
        Se hvordan SPIDER kan forbedre planleggingen i din kommune
      </h2>

      <p class="reveal-type text-gray-700 text-sm max-w-2xl mx-auto leading-relaxed mb-12">
        Vi viser hvordan planene bygges, hvordan kompetanse styres og hvordan SPIDER leverer optimaliserte ruter på
        minutter - på verdensrekordnivå.
      </p>

      <button
        class="bg-[#0c111d] text-white px-10 py-5 rounded-full inline-flex items-center gap-3 hover:bg-black transition-all group">
        <span class="font-bold text-sm">Book gratis demo</span>
      </button>
    </div>
  </section>
  <!-- Call to action Section ends  -->


<?php
// get_sidebar();
get_footer();
