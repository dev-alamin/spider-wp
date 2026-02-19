<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_funcitonality_benefits', array(
    'title'       => esc_html__( 'Result Section', 'spider-solutions' ),
    'panel'       => 'spider_functionlities_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'funcitonality_enable_benefits',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_funcitonality_benefits',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'funcitonality_benefits_badge',
    'label'     => esc_html__( 'Tag Line', 'spider' ),
    'section'   => 'spider_funcitonality_benefits',
    'default'   => 'Teknologi som forsterker mennesket.',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'funcitonality_benefits_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_funcitonality_benefits',
    'default'   => 'Verdien av SPIDER ligger i samspillet mellom teknologi og mennesker.',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'funcitonality_benefits_desc',
    'label'     => esc_html__( 'Description', 'spider' ),
    'section'   => 'spider_funcitonality_benefits',
    'default'   => 'Ved å kombinere avansert optimalisering med forståelse for hverdagen i hjemmetjenesten...',
] );

// Repeater for Benefit Cards
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Result Cards', 'spider' ),
    'section'     => 'spider_funcitonality_benefits',
    'settings'    => SPIDER_PREFIX . 'benefit_cards',
    'row_label'   => [ 'type' => 'text', 'value' => esc_html__('Benefit Card', 'spider' ) ],
    'fields' => [
        'icon' => [
            'type'        => 'select',
            'label'       => esc_html__( 'Icon Type', 'spider' ),
            'default'     => 'tech',
            'choices'     => [
                'tech'   => esc_html__( 'Technology (User+Plus)', 'spider' ),
                'effect' => esc_html__( 'Effect (Users Group)', 'spider' ),
            ],
        ],
        'title' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Card Title', 'spider' ),
            'default' => '',
        ],
        'text' => [
            'type'    => 'textarea',
            'label'   => esc_html__( 'Card Description', 'spider' ),
            'default' => '',
        ],
        'btn_text' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Button Text', 'spider' ),
            'default' => 'Les mer',
        ],
        'btn_url' => [
            'type'    => 'link',
            'label'   => esc_html__( 'Button URL', 'spider' ),
            'default' => '#',
        ],
    ]
] );