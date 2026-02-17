<?php
if( ! defined( 'ABSPATH' ) ) exit;

// Section
Kirki::add_section( 'spider_home_benefits', array(
    'title' => esc_html__( 'Key Benefits', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_benefit_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_home_benefits',
    'default'  => true,
]);

Kirki::add_field( 'spider_config', array(
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'benefits_badge',
    'label'    => esc_html__( 'Section Badge', 'spider-solutions' ),
    'section'  => 'spider_home_benefits',
    'default'  => 'Nøkkelfordeler',
) );

// Section Title
Kirki::add_field( 'spider_config', [
    'type'     => 'textarea',
    'settings' => SPIDER_PREFIX . 'benefits_title',
    'label'    => esc_html__( 'Section Title', 'spider' ),
    'section'  => 'spider_home_benefits',
    'default'  => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning',
] );

// Section Description
Kirki::add_field( 'spider_config', [
    'type'     => 'textarea',
    'settings' => SPIDER_PREFIX . 'benefits_desc',
    'label'    => esc_html__( 'Section Description', 'spider' ),
    'section'  => 'spider_home_benefits',
    'default'  => 'Hjemmetjenesten er kompleks: kompetansekrav, tidsvinduer, pauser...',
] );

// The Repeater
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'home_key_benefits',
    'label'       => __( 'Key Benefits', 'spider' ),
    'section'     => 'spider_home_benefits',
    'row_label'   => [
        'type'  => 'text',
        'value' => __( 'Benefit', 'spider' ),
    ],
    'button_label' => __( 'Legg til ny fordel', 'spider' ),
    'default'      => [],
    'fields' => [
        'title' => [
            'type'  => 'text',
            'label' => __( 'Kort Tittel', 'spider' ),
        ],
        'desc' => [
            'type'  => 'textarea',
            'label' => __( 'Kort Beskrivelse', 'spider' ),
        ],
        'icon_type' => [
            'type'    => 'radio',
            'label'   => __( 'Ikon Type', 'spider' ),
            'choices' => [
                'location' => 'Kartnål',
                'bolt'     => 'Lyn (Tid)',
                'star'     => 'Stjerne (Kvalitet)',
                'target'   => 'Sikte (Kompetanse)',
                'chart'    => 'Graf (Resultat)',
            ],
        ],
        'image' => [
            'type'        => 'image',
            'label'       => __( 'Toppbilde', 'spider' ),
            'description' => __( 'Vises kun i det første (store) kortet', 'spider' ),
        ],
        'link_url' => [
            'type'        => 'link',
            'label'       => __( 'Knapp Link', 'spider' ),
            'description' => __( 'Lim inn URL (f.eks. /tjenester/ruteplanlegging)', 'spider' ),
            'default' => '#'
        ],
        'link_text' => [
            'type'    => 'text',
            'label'   => __( 'Knapp Tekst', 'spider' ),
            'default' => __( 'Les mer', 'spider' ),
        ],
    ],
] );