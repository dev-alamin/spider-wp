<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_home_functionality', array(
    'title' => esc_html__( 'Functionality Filter', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_functionlity_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_home_functionality',
    'default'  => true,
]);

// Headline
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'func_headline',
    'label'    => esc_html__( 'Section Headline', 'spider' ),
    'section'  => 'spider_home_functionality',
    'default'  => 'Funksjonalitet uten grenser',
] );

// Description
Kirki::add_field( 'spider_config', [
    'type'     => 'textarea',
    'settings' => SPIDER_PREFIX . 'func_desc',
    'label'    => esc_html__( 'Section Description', 'spider' ),
    'section'  => 'spider_home_functionality',
    'default'  => 'SPIDER er utviklet tett sammen med over 1000 brukere...',
] );

// Filter Data Repeater
Kirki::add_field( 'spider_config', [
	'type'        => 'repeater',
	'settings'    => SPIDER_PREFIX . 'func_filter_data',
	'label'       => esc_html__( 'Categories and Tags', 'spider' ),
	'section'     => 'spider_home_functionality',
	'row_label'   => [ 'type' => 'field', 'field' => 'cat_name' ],
	'default'     => [
		[
			'cat_name' => 'Basisfunksjonalitet',
			'tags_list' => 'Vaktliste, Brukerarkiv, Kompetansestyring, Besøksplan'
		],
		[
			'cat_name' => 'Optimering',
			'tags_list' => 'Ruteoptimalisering, Tidsvinduer, Pausehåndtering'
		],
	],
	'fields' => [
		'cat_name'  => [
			'type'  => 'text',
			'label' => esc_html__( 'Category Name', 'spider' ),
		],
		'tags_list' => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Tags', 'spider' ),
			'description' => esc_html__( 'Comma separated list of tags.', 'spider' ),
		],
	],
] );