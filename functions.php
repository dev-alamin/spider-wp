<?php

/**
 * Spider Solutions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spider_Solutions
 */

if (! defined('  ')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

define('SPIDER_PREFIX', 'spider_solutions_');

function spider_solutions_get_theme_option($name, $default = '')
{
	return get_theme_mod(SPIDER_PREFIX . $name, $default);
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spider_solutions_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Spider Solutions, use a find and replace
		* to change 'spider-solutions' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('spider-solutions', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'spider-solutions'),
			'footer-menu-1' => __('Footer Menu One', 'spider-solution'),
			'footer-menu-2' => __('Footer Menu Legal', 'spider-solution'),
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
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'spider_solutions_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spider_solutions_content_width()
{
	$GLOBALS['content_width'] = apply_filters('spider_solutions_content_width', 640);
}
add_action('after_setup_theme', 'spider_solutions_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spider_solutions_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'spider-solutions'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'spider-solutions'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'spider_solutions_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function spider_solutions_scripts()
{
	$version = WP_DEBUG ? time() : _S_VERSION;

	wp_enqueue_style('spider-solutions-style', get_stylesheet_uri(), array(), $version);
	wp_style_add_data('spider-solutions-style', 'rtl', 'replace');

	// Styles
	wp_enqueue_style(
		'spider-google-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400;1,700&family=Onest:wght@100..900&display=swap',
		[],
		null
	);
	wp_enqueue_style('spider-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), $version);
	wp_enqueue_style('spider-custom-logic', get_template_directory_uri() . '/assets/css/custom-logic.css', array(), $version);
	wp_enqueue_style('spider-theme-core', get_stylesheet_uri());

	// Scripts (Note: type="module" requires a filter, see below)
	wp_enqueue_script('spider-style-js', get_template_directory_uri() . '/assets/js/style.js', array(), $version, true);
	wp_enqueue_script('spider-vendor', get_template_directory_uri() . '/assets/js/vendor.js', array(), $version, true);
	wp_enqueue_script('spider-slider', get_template_directory_uri() . '/assets/js/slider-init.js', array(), $version, true);
	wp_enqueue_script('spider-custom-logic', get_template_directory_uri() . '/assets/js/custom-logic.js', array(), $version, true);

	wp_enqueue_script('spider-solutions-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $version, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'spider_solutions_scripts');

// Filter to allow type="module" for your JS files
add_filter('script_loader_tag', function ($tag, $handle, $src) {
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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

class Spider_Walker_Nav_Menu extends Walker_Nav_Menu
{
	// Start Element: Handles the links and dropdown wrappers
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
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
	function end_el(&$output, $item, $depth = 0, $args = null)
	{
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		if (in_array('menu-item-has-children', $classes) && $depth == 0) {
			$output .= '</div></div>';
		}
	}

	// Disable default <ul> wrappers
	function start_lvl(&$output, $depth = 0, $args = null) {}
	function end_lvl(&$output, $depth = 0, $args = null) {}
}

class Spider_Mobile_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
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

	function end_el(&$output, $item, $depth = 0, $args = null)
	{
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		if (in_array('menu-item-has-children', $classes) && $depth == 0) {
			$output .= '</div></div>';
		}
	}

	function start_lvl(&$output, $depth = 0, $args = null) {}
	function end_lvl(&$output, $depth = 0, $args = null) {}
}

if (! function_exists('spider_result_trend')) {
	function spider_result_trend($trend = 'up')
	{

		$map = [
			'up' => [
				'class' => 'is-positive',
				'icon'  => '↑',
			],
			'down' => [
				'class' => 'is-negative',
				'icon'  => '↓',
			],
		];

		return $map[$trend] ?? $map['up'];
	}
}

/**
 * Returns the SVG markup for benefit icons based on the selected type.
 */
function spider_solutions_get_benefit_icon($icon_type)
{
	$class = "w-5 h-5 text-gray-400";

	switch ($icon_type) {
		case 'bolt':
			return '<svg class="' . $class . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';
		case 'star':
			return '<svg class="' . $class . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>';
		case 'target':
			return '<svg  class="' . $class . '" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a.75.75 0 001.034-1.084A10 10 0 1021.5 12a10 10 0 00-10.75-9.932.75.75 0 00.084 1.5 8.5 8.5 0 11-7.5 8.5 8.5 8.5 0 017.5-8.5.75.75 0 00-.5-.303zM12 9a3 3 0 100 6 3 3 0 000-6z"></path>
</svg>';
		case 'chart':
			return '<svg  class="' . $class . '" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"></path>
</svg>';
		case 'location':
		default:
			return '<svg class="' . $class . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>';
	}
}

/**
 * Register Custom Post Type: Benefits
 */
function spider_register_benefits_cpt() {
    $labels = array(
        'name'                  => _x( 'Benefits', 'Post Type General Name', 'spider' ),
        'singular_name'         => _x( 'Benefit', 'Post Type Singular Name', 'spider' ),
        'menu_name'             => __( 'Benefits', 'spider' ),
        'name_admin_bar'        => __( 'Benefit', 'spider' ),
        'archives'              => __( 'Benefit Archives', 'spider' ),
        'attributes'            => __( 'Benefit Attributes', 'spider' ),
        'parent_item_colon'     => __( 'Parent Benefit:', 'spider' ),
        'all_items'             => __( 'All Benefits', 'spider' ),
        'add_new_item'          => __( 'Add New Benefit', 'spider' ),
        'add_new'               => __( 'Add New', 'spider' ),
        'new_item'              => __( 'New Benefit', 'spider' ),
        'edit_item'             => __( 'Edit Benefit', 'spider' ),
        'update_item'           => __( 'Update Benefit', 'spider' ),
        'view_item'             => __( 'View Benefit', 'spider' ),
        'view_items'            => __( 'View Benefits', 'spider' ),
        'search_items'          => __( 'Search Benefit', 'spider' ),
        'not_found'             => __( 'Not found', 'spider' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'spider' ),
        'featured_image'        => __( 'Featured Image', 'spider' ),
        'set_featured_image'    => __( 'Set featured image', 'spider' ),
        'remove_featured_image' => __( 'Remove featured image', 'spider' ),
        'use_featured_image'    => __( 'Use as featured image', 'spider' ),
        'insert_into_item'      => __( 'Insert into benefit', 'spider' ),
        'uploaded_to_this_item' => __( 'Uploaded to this benefit', 'spider' ),
        'items_list'            => __( 'Benefits list', 'spider' ),
        'items_list_navigation' => __( 'Benefits list navigation', 'spider' ),
        'filter_items_list'     => __( 'Filter benefits list', 'spider' ),
    );

    $args = array(
        'label'               => __( 'Benefit', 'spider' ),
        'description'         => __( 'Key benefits for Spider Solutions', 'spider' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-star-filled', // Star icon for benefits
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => true, // Required for Gutenberg
    );
    register_post_type( 'spider_benefit', $args );
}
add_action( 'init', 'spider_register_benefits_cpt', 0 );

/**
 * Add Meta Box for Benefit Details
 */
function spider_add_benefit_meta_boxes() {
    add_meta_box(
        'spider_benefit_details',
        __( 'Benefit Styling & List', 'spider' ),
        'spider_benefit_meta_box_callback',
        'spider_benefit', 
        'normal', 
        'high'
    );
}
add_action( 'add_meta_boxes', 'spider_add_benefit_meta_boxes' );

/**
 * Meta Box Callback HTML
 */
function spider_benefit_meta_box_callback( $post ) {
    wp_nonce_field( 'spider_save_benefit_meta', 'spider_benefit_meta_nonce' );

    // Retrieve values
    $is_key = get_post_meta( $post->ID, '_is_key_benefit', true );
    $selected_icon = get_post_meta( $post->ID, '_benefit_icon', true ) ?: 'location';
    $bullets = get_post_meta( $post->ID, '_benefit_bullets', true );

    $icons = [
        'bolt'     => 'Bolt/Flash',
        'star'     => 'Star',
        'target'   => 'Target',
        'chart'    => 'Chart',
        'location' => 'Location (Default)'
    ];
    ?>

    <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #eee;">
        <label style="font-weight:bold;">
            <input type="checkbox" name="is_key_benefit" value="yes" <?php checked( $is_key, 'yes' ); ?>>
            <?php _e( 'Show "Nøkkelfordeler" Badge', 'spider' ); ?>
        </label>
    </div>

    <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #eee;">
        <p style="font-weight:bold; margin-bottom: 10px;"><?php _e( 'Choose Card Icon', 'spider' ); ?></p>
        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <?php foreach ( $icons as $value => $label ) : ?>
                <label style="display: flex; align-items: center; gap: 5px; cursor: pointer;">
                    <input type="radio" name="benefit_icon" value="<?php echo $value; ?>" <?php checked( $selected_icon, $value ); ?>>
                    <?php echo $label; ?>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div>
        <label for="benefit_bullets" style="display:block; font-weight:bold; margin-bottom: 5px;">
            <?php _e( 'List Items (One per line)', 'spider' ); ?>
        </label>
        <textarea id="benefit_bullets" name="benefit_bullets" rows="5" class="widefat" placeholder="Færre pleierskift per pasient&#10;Bedre kontinuitet..."><?php echo esc_textarea( $bullets ); ?></textarea>
    </div>
    <?php
}

/**
 * Save Meta Box Data
 */
function spider_save_benefit_meta_data( $post_id ) {
    if ( ! isset( $_POST['spider_benefit_meta_nonce'] ) || ! wp_verify_nonce( $_POST['spider_benefit_meta_nonce'], 'spider_save_benefit_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // Save Checkbox
    update_post_meta( $post_id, '_is_key_benefit', ( isset( $_POST['is_key_benefit'] ) ? 'yes' : 'no' ) );
    
    // Save Icon
    if ( isset( $_POST['benefit_icon'] ) ) {
        update_post_meta( $post_id, '_benefit_icon', sanitize_text_field( $_POST['benefit_icon'] ) );
    }

    // Save Bullets
    if ( isset( $_POST['benefit_bullets'] ) ) {
        update_post_meta( $post_id, '_benefit_bullets', sanitize_textarea_field( $_POST['benefit_bullets'] ) );
    }
}
add_action( 'save_post', 'spider_save_benefit_meta_data' );