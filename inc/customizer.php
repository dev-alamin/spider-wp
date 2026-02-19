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
 * 1. Main Panel
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

require_once get_template_directory() . '/inc/customizer/about/tech-integration.php';

require_once get_template_directory() . '/inc/customizer/about/cta.php';


/**
 * ===================
 * 3. Functionality Panel
 * ==================
 */

Kirki::add_panel( 'spider_functionlities_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Spider Functionality', 'spider-solutions' ),
    'description' => esc_html__( 'Manage all functionality sections here.', 'spider-solutions' ),
) );

require_once get_template_directory() . '/inc/customizer/functionalities/hero.php';

require_once get_template_directory() . '/inc/customizer/functionalities/slider.php';

require_once get_template_directory() . '/inc/customizer/functionalities/comparison.php';

require_once get_template_directory() . '/inc/customizer/functionalities/result.php';

require_once get_template_directory() . '/inc/customizer/functionalities/cta.php';

/**
 * ===================
 * 4. Benefit Panel
 * ==================
 */

Kirki::add_panel( 'spider_benefit_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Spider Benefit', 'spider-solutions' ),
    'description' => esc_html__( 'Manage all Benefit sections here.', 'spider-solutions' ),
) );

require_once get_template_directory() . '/inc/customizer/benefit/hero.php';

require_once get_template_directory() . '/inc/customizer/benefit/core-area.php';

require_once get_template_directory() . '/inc/customizer/benefit/optimization.php';

require_once get_template_directory() . '/inc/customizer/benefit/promo.php';

require_once get_template_directory() . '/inc/customizer/benefit/integration.php';

require_once get_template_directory() . '/inc/customizer/benefit/cta.php';

/**
 * ===================
 * 4. Record Panel
 * ==================
 */

Kirki::add_panel( 'spider_record_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Spider Record', 'spider-solutions' ),
    'description' => esc_html__( 'Manage all Record sections here.', 'spider-solutions' ),
) );

require_once get_template_directory() . '/inc/customizer/record/hero.php';

require_once get_template_directory() . '/inc/customizer/record/optimization.php';

require_once get_template_directory() . '/inc/customizer/record/cta.php';

/**
 * ===================
 * 5. Contact Panel
 * ==================
 */

Kirki::add_panel( 'spider_contact_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Spider Contact', 'spider-solutions' ),
    'description' => esc_html__( 'Manage Contact Page.', 'spider-solutions' ),
) );

require_once get_template_directory() . '/inc/customizer/contact/contact.php';