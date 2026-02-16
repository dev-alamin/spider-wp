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
function spider_solutions_customize_register( $wp_customize ) {
    // Standard Underscores selective refresh
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'spider_solutions_customize_partial_blogname',
        ) );
    }

    // --- PRO LEVEL GROUPING ---

    // 1. TOP-LEVEL PANEL
    $wp_customize->add_panel( 'spider_home_panel', array(
        'title'       => __( 'Home Page Settings', 'spider-solutions' ),
        'priority'    => 10,
    ) );

    // 2. HERO LEFT SECTION
    $wp_customize->add_section( 'spider_hero_left', array(
        'title' => __( 'Hero: Left Content', 'spider-solutions' ),
        'panel' => 'spider_home_panel',
    ) );

    // Badge Text
    $wp_customize->add_setting( 'hero_badge_text', array(
        'default'   => 'Brukt av 30+ norske kommuner – hver dag',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_badge_text', array(
        'label'   => 'Badge Text',
        'section' => 'spider_hero_left',
    ) );

    // Hero Title
    $wp_customize->add_setting( 'hero_main_title', array(
        'default'   => 'Verdensledende planlegging for hjemmetjenesten',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'hero_main_title', array(
        'label'   => 'Main Title',
        'section' => 'spider_hero_left',
        'type'    => 'textarea',
    ) );

    // Hero Description
    $wp_customize->add_setting( 'hero_desc', array(
        'default'   => 'SPIDER bygger optimale arbeidslister og ruter på minutter. Resultatet er kortere kjørevei, bedre flyt i avdelingen og mer tid hos brukerne – uten manuell finjustering.',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'hero_desc', array(
        'label'   => 'Description',
        'section' => 'spider_hero_left',
        'type'    => 'textarea',
    ) );

    // CTA Button Text
    $wp_customize->add_setting( 'hero_cta_text', array(
        'default'   => 'Book gratis demo',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_cta_text', array(
        'label'   => 'Button Text',
        'section' => 'spider_hero_left',
    ) );

    // 3. HERO RIGHT IMAGES & CARDS
    $wp_customize->add_section( 'spider_hero_right', array(
        'title' => __( 'Hero: Right Visuals', 'spider-solutions' ),
        'panel' => 'spider_home_panel',
    ) );

    // Card 1 Image (Top Left)
    $wp_customize->add_setting( 'hero_card_1_img' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_card_1_img', array(
        'label'    => 'Card 1 Visual (Top Left)',
        'section'  => 'spider_hero_right',
    ) ) );

	// CARD 2: UNIK fleksibilitet (The one with avatars)
    $wp_customize->add_setting( 'hero_card_2_title', array( 'default' => 'UNIK fleksibilitet', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'hero_card_2_title', array( 'label' => 'Card 2 Title', 'section' => 'spider_hero_right' ) );

    $wp_customize->add_setting( 'hero_card_2_desc', array( 'default' => 'SPIDER tilpasses lokale regler, praksis og behov – uten begrensninger.', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'hero_card_2_desc', array( 'label' => 'Card 2 Description', 'section' => 'spider_hero_right', 'type' => 'textarea' ) );

    // CARD 3: UNIK funksjonalitetsrikdom (The one with the list)
    $wp_customize->add_setting( 'hero_card_3_title', array( 'default' => 'funksjonalitetsrikdom', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'hero_card_3_title', array( 'label' => 'Card 3 Title', 'section' => 'spider_hero_right' ) );

    // List Items for Card 3
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "hero_card_3_list_$i", array( 'default' => 'Step-in funksjoner', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "hero_card_3_list_$i", array( 'label' => "List Item $i", 'section' => 'spider_hero_right' ) );
    }

    // CARD 4: UNIK optimeringskvalitet (The bottom gear card)
    $wp_customize->add_setting( 'hero_card_4_desc', array( 'default' => 'SPIDER leverer dokumentert verdensledende optimering...', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'hero_card_4_desc', array( 'label' => 'Card 4 Description', 'section' => 'spider_hero_right', 'type' => 'textarea' ) );

    // Card 4 Image (The Gear)
    $wp_customize->add_setting( 'hero_card_4_img' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_card_4_img', array(
        'label'    => 'Card 4 Gear Image',
        'section'  => 'spider_hero_right',
    ) ) );

    // Central Floating Logo
    $wp_customize->add_setting( 'hero_center_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_center_logo', array(
        'label'    => 'Floating Center Logo',
        'section'  => 'spider_hero_right',
    ) ) );

    // SELECTIVE REFRESH PARTIALS
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'hero_main_title', array(
            'selector'        => '.hero-title-ref',
            'render_callback' => function() { return get_theme_mod('hero_main_title'); },
        ) );
        $wp_customize->selective_refresh->add_partial( 'hero_desc', array(
            'selector'        => '.hero-desc-ref',
            'render_callback' => function() { return get_theme_mod('hero_desc'); },
        ) );
    }






	// 4. SECTION: RESULTS
	$wp_customize->add_section( 'spider_home_results', array(
		'title' => __( 'Results Section', 'spider-solutions' ),
		'panel' => 'spider_home_panel',
	) );

	// Divider Badge
	$wp_customize->add_setting( 'res_divider_text', array( 'default' => 'Resultater', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'res_divider_text', array( 'label' => 'Divider Label', 'section' => 'spider_home_results' ) );

	// Headline 1 (Strikethrough)
	$wp_customize->add_setting( 'res_headline_old', array( 'default' => 'Har du råd til å bruke SPIDER?', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'res_headline_old', array( 'label' => 'Strikethrough Headline', 'section' => 'spider_home_results' ) );

	// Headline 2 (Main)
	$wp_customize->add_setting( 'res_headline_new', array( 'default' => 'Har du råd til å ikke bruke SPIDER?', 'transport' => 'postMessage', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp_customize->add_control( 'res_headline_new', array( 'label' => 'Main Headline', 'section' => 'spider_home_results', 'type' => 'textarea' ) );

	// Metric Cards Loop
	$cards = array(
		1 => array('val' => '-26,7%', 'txt' => 'Kjørte kilometer redusert', 'type' => 'down'),
		2 => array('val' => '-34,1%', 'txt' => 'Færre bytter av pleier hos samme pasient', 'type' => 'down'),
		3 => array('val' => '+107,7%', 'txt' => 'Flere besøk utført av ansvarlig pleier', 'type' => 'up'),
		4 => array('val' => '12-15%', 'txt' => 'Frigjort pleiertid hver dag...', 'type' => 'up'),
	);

	foreach ($cards as $i => $data) {
		// Value Setting
		$wp_customize->add_setting( "res_card_{$i}_val", array( 'default' => $data['val'], 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "res_card_{$i}_val", array( 'label' => "Card $i: Percentage/Value", 'section' => 'spider_home_results' ) );

		// Text Setting
		$wp_customize->add_setting( "res_card_{$i}_txt", array( 'default' => $data['txt'], 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "res_card_{$i}_txt", array( 'label' => "Card $i: Description", 'section' => 'spider_home_results' ) );

		// Trend Direction (To switch icons)
		$wp_customize->add_setting( "res_card_{$i}_trend", array( 'default' => $data['type'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "res_card_{$i}_trend", array(
			'label' => "Card $i: Trend Icon",
			'section' => 'spider_home_results',
			'type' => 'select',
			'choices' => array( 'up' => 'Green (Up)', 'down' => 'Red (Down)' )
		) );
	}

	// CTA Button Text
	$wp_customize->add_setting( 'res_cta_text', array( 'default' => 'Se flere resultater', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'res_cta_text', array( 'label' => 'Bottom Button Text', 'section' => 'spider_home_results' ) );

	// 5. SECTION: KEY BENEFITS
	$wp_customize->add_section( 'spider_home_benefits', array(
		'title' => __( 'Key Benefits Section', 'spider-solutions' ),
		'panel' => 'spider_home_panel',
	) );

	// Divider Badge
	$wp_customize->add_setting( 'ben_divider_text', array( 'default' => 'Nøkkelfordeler', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'ben_divider_text', array( 'label' => 'Section Divider Label', 'section' => 'spider_home_benefits' ) );

	// Main Headline
	$wp_customize->add_setting( 'ben_main_title', array( 'default' => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'ben_main_title', array( 'label' => 'Main Title', 'section' => 'spider_home_benefits', 'type' => 'textarea' ) );

	// Description
	$wp_customize->add_setting( 'ben_desc', array( 'default' => 'Hjemmetjenesten er kompleks: kompetansekrav, tidsvinduer...', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'ben_desc', array( 'label' => 'Introduction Text', 'section' => 'spider_home_benefits', 'type' => 'textarea' ) );

	// Benefit Cards Loop (5 Cards total)
	$benefits = array(
		1 => array('title' => 'Mindre kjøring, mer tid hos pasientene', 'desc' => 'SPIDER finner optimal rekkefølge på besøkene...'),
		2 => array('title' => 'Planlegging på minutter, ikke timer', 'desc' => 'SPIDER regner gjennom enorme kombinasjoner...'),
		3 => array('title' => 'Bedre kontinuitet og kvalitet i tjenesten', 'desc' => 'SPIDER sikrer samme pleier når det er viktig...'),
		4 => array('title' => 'Riktig kompetanse på riktig oppdrag', 'desc' => 'Systemet matcher oppdrag mot kompetansekrav...'),
		5 => array('title' => 'Dokumenterbar toppoptimalisering', 'desc' => 'SPIDER leverer dokumentert svært høy optimaliseringskvalitet...'),
	);

	foreach ($benefits as $i => $data) {
		// Title
		$wp_customize->add_setting( "ben_card_{$i}_title", array( 'default' => $data['title'], 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "ben_card_{$i}_title", array( 'label' => "Card $i: Title", 'section' => 'spider_home_benefits' ) );

		// Description
		$wp_customize->add_setting( "ben_card_{$i}_desc", array( 'default' => $data['desc'], 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "ben_card_{$i}_desc", array( 'label' => "Card $i: Description", 'section' => 'spider_home_benefits', 'type' => 'textarea' ) );
	}

	// Special Case: Card 1 Image
	$wp_customize->add_setting( 'ben_card_1_img' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ben_card_1_img', array(
		'label'    => 'Card 1 Background Image (Map)',
		'section'  => 'spider_home_benefits',
	) ) );


	// 6. SECTION: FUNCTIONALITY FILTER
$wp_customize->add_section( 'spider_home_functionality', array(
    'title' => __( 'Functionality Filter', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );

// Badge & Title
$wp_customize->add_setting( 'func_badge', array( 'default' => 'Hvorfor SPIDER?', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'func_badge', array( 'label' => 'Section Badge', 'section' => 'spider_home_functionality' ) );

$wp_customize->add_setting( 'func_title', array( 'default' => 'Funksjonalitet uten grenser', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'func_title', array( 'label' => 'Main Title', 'section' => 'spider_home_functionality' ) );

$wp_customize->add_setting( 'func_desc', array( 
    'default' => 'SPIDER er utviklet tett sammen med over 1000 brukere...', 
    'transport' => 'postMessage', 
    'sanitize_callback' => 'sanitize_textarea_field' 
) );
$wp_customize->add_control( 'func_desc', array( 'label' => 'Description', 'section' => 'spider_home_functionality', 'type' => 'textarea' ) );

// Pro Feature: Categories and Tags (Simulated via textareas for ease of use)
$categories = array('Optimering', 'Fleksibilitet', 'Integrasjon', 'Brukervennlighet');
foreach ($categories as $cat) {
    $slug = strtolower($cat);
    $wp_customize->add_setting( "func_tags_$slug", array(
        'default' => "Funksjon A\nFunksjon B\nFunksjon C",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( "func_tags_$slug", array(
        'label' => "Tags for $cat (One per line)",
        'section' => 'spider_home_functionality',
        'type' => 'textarea',
    ) );
}

// Bottom Badge
$wp_customize->add_setting( 'func_bottom_badge', array( 'default' => 'SPIDER er unik på flere områder', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'func_bottom_badge', array( 'label' => 'Bottom Badge', 'section' => 'spider_home_functionality' ) );



}
add_action( 'customize_register', 'spider_solutions_customize_register' );
