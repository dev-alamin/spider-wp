<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_home_ev_happy', array(
    'title' => esc_html__( 'Connection Section', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_connection__section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_home_ev_happy',
    'default'  => true,
]);

// Headline
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_connection_headline',
    'label'    => esc_html__( 'Section Headline', 'spider-solutions' ),
    'section'  => 'spider_home_ev_happy',
    'default'  => 'Funksjonalitet uten grenser',
] );

// Description
Kirki::add_field( 'spider_config', [
    'type'     => 'textarea',
    'settings' => SPIDER_PREFIX . 'home_connection_desc',
    'label'    => esc_html__( 'Section Description', 'spider-solutions' ),
    'section'  => 'spider_home_ev_happy',
    'default'  => 'SPIDER løser utfordringer for alle ledd i hjemmetjenesten...',
] );

// CTA Text
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_connection_cta_text',
    'label'    => esc_html__( 'CTA Button Text', 'spider-solutions' ),
    'section'  => 'spider_home_ev_happy',
    'default'  => 'Book gratis demo',
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'link',
    'settings' => SPIDER_PREFIX . 'home_connection_cta_link',
    'label'    => esc_html__( 'CTA Button Link', 'spider-solutions' ),
    'section'  => 'spider_home_ev_happy',
    'default'  => '#',
] );

// Nodes Repeater
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'home_connection_nodes',
    'label'       => esc_html__( 'Connection Nodes', 'spider-solutions' ),
    'section'     => 'spider_home_ev_happy',
    'row_label'   => [ 'type' => 'field', 'field' => 'label' ],
    'max_items'   => 4,
    'default'     => [
        ['label' => 'Ledelsen', 'desc' => 'Økonomi, oversikt & rapporter'],
        ['label' => 'Planleggerne', 'desc' => 'Mindre tidsbruk og færre frustrasjoner'],
        ['label' => 'Pleierne', 'desc' => 'Tette, men gode og lovlige planer'],
        ['label' => 'Brukerne', 'desc' => 'Kontinuitet, rett kompetanse til rett tid'],
    ],
    'fields' => [
        'label' => [
            'type'  => 'text',
            'label' => esc_html__( 'Node Label (e.g. Ledelsen)', 'spider-solutions' ),
        ],
        'desc'  => [
            'type'  => 'textarea',
            'label' => esc_html__( 'Node Description', 'spider-solutions' ),
        ],
    ],
] );