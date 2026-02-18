<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_about_transformation', array(
    'title'       => esc_html__( 'Transformation', 'spider-solutions' ),
    'panel'       => 'spider_about_panel',
    'preview_src' => home_url( '/about/' ),
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'about_enable_transf_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_about_transformation',
    'default'  => true,
]);

// Headline
Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'about_transf_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_about_transformation',
    'default'   => 'Fra manuelt strev til reell kontroll',
] );

// "Before" List Repeater
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'about_transf_before_list',
    'label'       => esc_html__( 'Before SPIDER (Left Column)', 'spider' ),
    'section'     => 'spider_about_transformation',
    'fields' => [
        'text' => [
            'type'    => 'text',
            'label'   => esc_html__( 'List Item', 'spider' ),
            'default' => '',
        ],
    ],
] );

// "After" List Repeater
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'about_transf_after_list',
    'label'       => esc_html__( 'After SPIDER (Right Column)', 'spider' ),
    'section'     => 'spider_about_transformation',
    'fields' => [
        'text' => [
            'type'    => 'text',
            'label'   => esc_html__( 'List Item', 'spider' ),
            'default' => '',
        ],
    ],
] );