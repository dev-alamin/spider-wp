<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_benefit_integration', array(
    'title'       => esc_html__( 'Integration Section', 'spider-solutions' ),
    'panel'       => 'spider_benefit_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'benefit_enable_integration',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_benefit_integration',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'benefit_integration_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_benefit_integration',
    'default'   => 'Integrasjoner som passer inn',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'benefit_integration_desc',
    'label'     => esc_html__( 'Section Description', 'spider' ),
    'section'   => 'spider_benefit_integration',
    'default'   => "SPIDER er utviklet for å fungere sømløst sammen med eksisterende systemer...\n\nHvilke integrasjoner som benyttes tilpasses hver enkelt kommune.",
] );

// Inner Orbit Icons (Usually 4)
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Inner Orbit Icons (Small Circle)', 'spider' ),
    'section'     => 'spider_benefit_integration',
    'settings'    => SPIDER_PREFIX . 'integration_inner_icons',
    'fields' => [
        'icon_url' => [
            'type'    => 'image',
            'label'   => esc_html__( 'SVG/Logo Icon', 'spider' ),
            'default' => '',
        ],
    ],
    'default' => [ ['icon_url' => ''], ['icon_url' => ''], ['icon_url' => ''], ['icon_url' => ''] ]
] );

// Outer Orbit Icons (Usually 8)
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Outer Orbit Icons (Large Circle)', 'spider' ),
    'section'     => 'spider_benefit_integration',
    'settings'    => SPIDER_PREFIX . 'integration_outer_icons',
    'fields' => [
        'icon_url' => [
            'type'    => 'image',
            'label'   => esc_html__( 'SVG/Logo Icon', 'spider' ),
            'default' => '',
        ],
    ],
    'default' => array_fill(0, 8, ['icon_url' => ''])
] );