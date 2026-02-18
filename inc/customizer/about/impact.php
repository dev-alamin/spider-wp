<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_about_impact', array(
    'title' => esc_html__( 'Impact Section', 'spider-solutions' ),
    'panel' => 'spider_about_panel',
    'preview_src' => home_url( '/about/' ),
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'about_enable_impact_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_about_impact',
    'default'  => true,
]);

// Headline
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'about_impact_headline',
    'label'    => esc_html__( 'Section Headline', 'spider' ),
    'section'  => 'spider_about_impact',
    'default'  => 'Funksjonalitet uten grenser',
] );

// Floating Card Text (The White Box)
Kirki::add_field( 'spider_config', [
    'type'     => 'textarea',
    'settings' => SPIDER_PREFIX . 'about_impact_floating_text',
    'label'    => esc_html__( 'Floating Box Text', 'spider' ),
    'section'  => 'spider_about_impact',
    'default'  => '<strong>SPIDER</strong> brukes daglig i norske kommuner...',
] );

// Lower Headline
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'about_impact_sub_headline',
    'label'    => esc_html__( 'Lower Section Headline', 'spider' ),
    'section'  => 'spider_about_impact',
    'default'  => 'Resultater som faktisk utgjør en forskjell',
] );

// Lower Description
Kirki::add_field( 'spider_config', [
    'type'     => 'textarea',
    'settings' => SPIDER_PREFIX . 'about_impact_desc',
    'label'    => esc_html__( 'Lower Description', 'spider' ),
    'section'  => 'spider_about_impact',
    'default'  => 'Når komplekse krav håndteres automatisk...',
] );

// CTA Logic
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'about_impact_cta_text',
    'label'    => esc_html__( 'CTA Button Text', 'spider' ),
    'section'  => 'spider_about_impact',
    'default'  => 'Book gratis demo',
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'link',
    'settings' => SPIDER_PREFIX . 'about_impact_cta_link',
    'label'    => esc_html__( 'CTA Button Link', 'spider' ),
    'section'  => 'spider_about_impact',
    'default'  => '#',
] );

// Grid Repeater
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'about_impact_cards',
    'label'       => esc_html__( 'Stats Cards', 'spider' ),
    'section'     => 'spider_about_impact',
    'fields' => [
        'value' => [ 'type' => 'text', 'label' => 'Value (e.g. -26.7%)' ],
        'label' => [ 'type' => 'text', 'label' => 'Label' ],
        'trend' => [
            'type'    => 'radio',
            'label'   => 'Trend Direction',
            'choices' => [
                'down' => 'Down (Orange)',
                'up'   => 'Up (Green)',
            ],
        ],
    ],
] );