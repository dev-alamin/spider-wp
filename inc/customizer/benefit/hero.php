<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_benefit_hero', array(
    'title'       => esc_html__( 'Benefit Hero & Slider', 'spider-solutions' ),
    'panel'       => 'spider_benefit_panel',
) );

// Toggle & Text Fields
Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'benefit_enable_hero',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_benefit_hero',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'benefit_hero_headline',
    'label'     => esc_html__( 'Headline', 'spider' ),
    'section'   => 'spider_benefit_hero',
    'default'   => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'benefit_hero_desc',
    'label'     => esc_html__( 'Description', 'spider' ),
    'section'   => 'spider_benefit_hero',
    'default'   => 'SPIDER er ikke bare ruteoptimalisering. Det er et komplett planleggingssystem...',
] );

// Slider Controls
Kirki::add_field( 'spider_config', [
    'type'      => 'number',
    'settings'  => SPIDER_PREFIX . 'benefit_slider_speed',
    'label'     => esc_html__( 'Slider Speed (ms)', 'spider' ),
    'description' => esc_html__( 'Higher is slower (5000 is default)', 'spider' ),
    'section'   => 'spider_benefit_hero',
    'default'   => 5000,
] );

// Repeater for Slider Cards
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Benefit Slides', 'spider' ),
    'section'     => 'spider_benefit_hero',
    'settings'    => SPIDER_PREFIX . 'benefit_hero_slides',
    'fields' => [
        'title' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Slide Title', 'spider' ),
            'default' => 'Kompetansekrav',
        ],
        'description' => [
            'type'    => 'textarea',
            'label'   => esc_html__( 'Slide Description', 'spider' ),
            'default' => 'Riktig kompetanse matches automatisk mot hvert oppdrag.',
        ],
        'icon_bg' => [
            'type'    => 'color',
            'label'   => esc_html__( 'Icon Background Color', 'spider' ),
            'default' => '#d9f2d0',
        ],
    ]
] );