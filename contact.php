<?php
/**
 * Template Name: Contact Us
 */

get_header(); ?>


    <!-- First Two section e.g hero and result -->
     
        <!-- Hero section  -->
<?php 
$show_contact = get_theme_mod(SPIDER_PREFIX . 'contact_page_enable', true);
$headline     = get_theme_mod(SPIDER_PREFIX . 'contact_main_headline', 'Kontakt oss');
$contacts     = get_theme_mod(SPIDER_PREFIX . 'contact_list', []);

if ( $show_contact ) : 
?>

<div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-start py-16 px-6">

    <div class="space-y-12">
        <div>
            <h2 class="reveal-type text-5xl font-serif text-[#1a1a1a] mb-6">Kontakt oss</h2>
            <p class="reveal-type text-gray-600 text-lg">Ring oss på +47 41 21 44 57 eller bruk kontaktskjemaet.</p>
        </div>

        <div class="reveal-grid space-y-8">
            <?php foreach($contacts as $item) : ?>
            <div class="reveal-card border-t border-gray-200 pt-6">
                <p class="text-sm text-gray-500 mb-1"><?php echo esc_html($item['role']); ?></p>
                <a href="mailto:<?php echo esc_attr($item['email']); ?>"
                    class="text-lg text-[#1a1a1a] underline underline-offset-4 hover:opacity-70 transition-opacity">
                    <?php echo esc_html($item['details']); ?>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="bg-white rounded-[1rem] p-8 md:p-12 shadow-[0_40px_80px_-15px_rgba(0,0,0,0.08)]">

        <h3 class="text-2xl font-serif mb-8 text-[#1a1a1a]">Kontaktskjema</h3>

        <div class="fluentform ff-inherit-theme-style fluentform_wrapper_1">
            <?php echo do_shortcode('[fluentform id="1"]'); ?>
        </div>

    </div>
</div>

<?php endif; ?>
        <!-- Hero section ends  -->
    </div>
    <!-- First Two section e.g hero and result -->




<?php get_footer(); ?>