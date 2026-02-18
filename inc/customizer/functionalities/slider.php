<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_func_slider', array(
    'title'    => esc_html__( 'Value Slider', 'spider-solutions' ),
    'panel'    => 'spider_functionlities_panel',
) );

// Section Headline
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'func_slider_title',
    'label'    => esc_html__( 'Section Title', 'spider' ),
    'section'  => 'spider_func_slider',
    'default'  => 'Verdien merkes i hele tjenesten',
] );

// Background Color
Kirki::add_field( 'spider_config', [
    'type'        => 'color',
    'settings'    => SPIDER_PREFIX . 'func_slider_bg',
    'label'       => esc_html__( 'Background Color', 'spider' ),
    'section'     => 'spider_func_slider',
    'default'     => '#F1ECEA',
    'choices'     => [ 'alpha' => true ],
] );

// Autoplay Speed
Kirki::add_field( 'spider_config', [
    'type'        => 'number',
    'settings'    => SPIDER_PREFIX . 'func_slider_speed',
    'label'       => esc_html__( 'Autoplay Delay (ms)', 'spider' ),
    'description' => esc_html__( '3000 = 3 seconds', 'spider' ),
    'section'     => 'spider_func_slider',
    'default'     => 3000,
] );

// Slides Repeater
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Slider Items', 'spider' ),
    'section'     => 'spider_func_slider',
    'settings'    => SPIDER_PREFIX . 'func_slider_items',
    'row_label' => [
        'type'  => 'field',
        'value' => esc_html__( 'Slide', 'spider' ),
        'field' => 'text',
    ],
    'button_label' => esc_html__('Add New Slide', 'spider' ),
    'default'      => [
        [
            'image' => get_template_directory_uri() . '/images/value-slider-1.jpg',
            'text'  => 'Bedre kontinuitet gir økt trygghet, tillit og mer forutsigbare tjenester.',
        ],
    ],
    'fields' => [
        'image' => [
            'type'        => 'image',
            'label'       => esc_html__( 'Slide Image', 'spider' ),
            'description' => esc_html__( 'Use 4:3 aspect ratio', 'spider' ),
        ],
        'text' => [
            'type'        => 'textarea',
            'label'       => esc_html__( 'Slide Text', 'spider' ),
        ],
    ]
] );