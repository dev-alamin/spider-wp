<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_benefit_optimization', array(
    'title'       => esc_html__( 'Optimization Section', 'spider-solutions' ),
    'panel'       => 'spider_benefit_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'benefit_enable_optimization',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_benefit_optimization',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'benefit_optimization_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_benefit_optimization',
    'default'   => 'Optimalisering der det faktisk betyr noe',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'benefit_optimization_desc',
    'label'     => esc_html__( 'Section Description', 'spider' ),
    'section'   => 'spider_benefit_optimization',
    'default'   => 'Avansert planleggingslogikk som er utviklet for de reelle og komplekse rammene i hjemmetjenesten.',
] );

// Repeater for Optimization Cards
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Optimization Cards', 'spider' ),
    'section'     => 'spider_benefit_optimization',
    'settings'    => SPIDER_PREFIX . 'benefit_optimization_cards',
    'row_label'   => [ 'type' => 'text', 'value' => esc_html__('Card', 'spider' ) ],
    'fields' => [
        'icon' => [
            'type'    => 'select',
            'label'   => esc_html__( 'Icon', 'spider' ),
            'default' => 'comp',
            'choices' => [
                'comp' => 'Competence (User/Plus)',
                'cont' => 'Continuity (Users Group)',
                'reopt' => 'Re-optimization (Refresh)',
            ],
        ],
        'title' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Card Title', 'spider' ),
            'default' => '',
        ],
        'description' => [
            'type'    => 'textarea',
            'label'   => esc_html__( 'Card Description', 'spider' ),
            'default' => '',
        ],
        'bullets' => [
            'type'        => 'textarea',
            'label'       => esc_html__( 'Bullet Points (One per line)', 'spider' ),
            'description' => esc_html__( 'Enter each feature on a new line.', 'spider' ),
            'default'     => '',
        ],
    ]
] );