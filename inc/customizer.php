<?php
/**
 * Spider Solutions Theme Customizer
 *
 * @package Spider_Solutions
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

// Exit if Kirki is not installed
if ( ! class_exists( 'Kirki' ) ) {
    return;
}

// 1. Configuration
Kirki::add_config( 'spider_config', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );

/**
 * ===================
 * 2. Main Panel
 * ==================
 */

Kirki::add_panel( 'spider_home_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Spider Home', 'spider-solutions' ),
    'description' => esc_html__( 'Manage all homepage sections here.', 'spider-solutions' ),
) );

require_once get_template_directory() . '/inc/customizer/home/hero.php';

require_once get_template_directory() . '/inc/customizer/home/results.php';

require_once get_template_directory() . '/inc/customizer/home/benefit.php';

require_once get_template_directory() . '/inc/customizer/home/functionality.php';

require_once get_template_directory() . '/inc/customizer/home/technology-faq.php';

require_once get_template_directory() . '/inc/customizer/home/testimonial.php';

require_once get_template_directory() . '/inc/customizer/home/everyone-happy.php';

require_once get_template_directory() . '/inc/customizer/home/cta.php';

/**
 * ===================
 * 2. About Panel
 * ==================
 */

Kirki::add_panel( 'spider_about_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Spider About', 'spider-solutions' ),
    'description' => esc_html__( 'Manage all about us sections here.', 'spider-solutions' ),
) );

require_once get_template_directory() . '/inc/customizer/about/impact.php';

require_once get_template_directory() . '/inc/customizer/about/result.php';

require_once get_template_directory() . '/inc/customizer/about/transformation.php';



