<?php
/**
 * Spider Solutions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spider_Solutions
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spider_solutions_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Spider Solutions, use a find and replace
		* to change 'spider-solutions' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'spider-solutions', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'spider-solutions' ),
			        'footer-menu-1' => __( 'Footer Menu One', 'spider-solution' ),
        'footer-menu-2' => __( 'Footer Menu Legal', 'spider-solution' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'spider_solutions_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'spider_solutions_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spider_solutions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spider_solutions_content_width', 640 );
}
add_action( 'after_setup_theme', 'spider_solutions_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spider_solutions_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'spider-solutions' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'spider-solutions' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'spider_solutions_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spider_solutions_scripts() {
	wp_enqueue_style( 'spider-solutions-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'spider-solutions-style', 'rtl', 'replace' );

	    // Styles
    wp_enqueue_style('spider-google-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap', array(), null);
    wp_enqueue_style('spider-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), time());
    wp_enqueue_style('spider-custom-logic', get_template_directory_uri() . '/assets/css/custom-logic.css', array(), time());
    wp_enqueue_style('spider-theme-core', get_stylesheet_uri());

    // Scripts (Note: type="module" requires a filter, see below)
    wp_enqueue_script('spider-style-js', get_template_directory_uri() . '/assets/js/style.js', array(), time(), true);
    wp_enqueue_script('spider-vendor', get_template_directory_uri() . '/assets/js/vendor.js', array(), time(), true);
    wp_enqueue_script('spider-slider', get_template_directory_uri() . '/assets/js/slider-init.js', array(), time(), true);
    wp_enqueue_script('spider-custom-logic', get_template_directory_uri() . '/assets/js/custom-logic.js', array(), time(), true);

	wp_enqueue_script( 'spider-solutions-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spider_solutions_scripts' );

// Filter to allow type="module" for your JS files
add_filter('script_loader_tag', function($tag, $handle, $src) {
    if (in_array($handle, ['spider-style-js', 'spider-vendor', 'spider-slider', 'spider-custom-logic'])) {
        return '<script type="module" src="' . esc_url($src) . '"></script>' . "\n";
    }
    return $tag;
}, 10, 3);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

class Spider_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start Element: Handles the links and dropdown wrappers
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        // Standard link classes
        $link_class = 'nav-link px-6 py-3 rounded-full text-sm text-[#413934] font-medium hover:bg-[#F1ECEA] transition-colors';
        
        // If it's a dropdown parent
        if ($has_children && $depth == 0) {
            $output .= '<div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">';
            $output .= '<button class="nav-link flex items-center gap-1 px-5 py-2.5 rounded-full text-sm text-[#413934] font-medium hover:bg-[#F1ECEA] transition-colors">';
            $output .= '<span>' . esc_html($item->title) . '</span>';
            $output .= '<svg :class="open ? \'rotate-180\' : \'\'" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>';
            $output .= '</button>';
            $output .= '<div x-show="open" 
                            x-transition:enter="transition ease-out duration-200" 
                            x-transition:enter-start="opacity-0 scale-95 translate-y-2" 
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0" 
                            x-transition:leave="transition ease-in duration-150" 
                            x-transition:leave-start="opacity-100 scale-100" 
                            x-transition:leave-end="opacity-0 scale-95" 
                            class="absolute top-full left-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 p-2 z-50" style="display: none;">';
        } else {
            // Check if this is a child link
            if ($depth > 0) {
                $child_class = 'block px-4 py-3 text-sm rounded-xl hover:bg-[#F1ECEA] text-[#413934]';
                $output .= '<a href="' . esc_url($item->url) . '" class="' . $child_class . '">' . esc_html($item->title) . '</a>';
            } else {
                // Regular top-level link
                $output .= '<a href="' . esc_url($item->url) . '" class="' . $link_class . '">' . esc_html($item->title) . '</a>';
            }
        }
    }

    // End Element: Close dropdown wrappers
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        if (in_array('menu-item-has-children', $classes) && $depth == 0) {
            $output .= '</div></div>';
        }
    }

    // Disable default <ul> wrappers
    function start_lvl(&$output, $depth = 0, $args = null) {}
    function end_lvl(&$output, $depth = 0, $args = null) {}
}

class Spider_Mobile_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        if ($has_children && $depth == 0) {
            // Parent with Submenu logic
            $output .= '<div x-data="{ subOpen: false }">';
            $output .= '<button @click="subOpen = !subOpen" class="flex items-center justify-between w-full hover:text-blue-600 transition-colors">';
            $output .= '<span>' . esc_html($item->title) . '</span>';
            $output .= '<svg :class="subOpen ? \'rotate-180\' : \'\'" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>';
            $output .= '</button>';
            $output .= '<div x-show="subOpen" x-collapse class="pl-4 mt-4 flex flex-col gap-4 text-lg text-gray-500">';
        } else {
            // Regular Link (Top level or Child level)
            $class = ($depth > 0) ? 'hover:text-blue-600' : 'hover:text-blue-600 transition-colors';
            $output .= '<a href="' . esc_url($item->url) . '" @click="mobileMenuOpen = false" class="' . $class . '">' . esc_html($item->title) . '</a>';
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        if (in_array('menu-item-has-children', $classes) && $depth == 0) {
            $output .= '</div></div>';
        }
    }

    function start_lvl(&$output, $depth = 0, $args = null) {}
    function end_lvl(&$output, $depth = 0, $args = null) {}
}