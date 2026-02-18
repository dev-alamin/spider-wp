<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_home_technology_faq', array(
    'title' => esc_html__( 'Technology FAQ', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_technology_faq_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_home_technology_faq',
    'default'  => true,
]);

// Headline
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_tf_headline',
    'label'    => esc_html__( 'Section Headline', 'spider' ),
    'section'  => 'spider_home_technology_faq',
    'default'  => 'Funksjonalitet uten grenser',
] );

// Description
Kirki::add_field( 'spider_config', [
    'type'     => 'textarea',
    'settings' => SPIDER_PREFIX . 'home_tf_desc',
    'label'    => esc_html__( 'Section Description', 'spider' ),
    'section'  => 'spider_home_technology_faq',
    'default'  => 'SPIDER er utviklet tett sammen med over 1000 brukere...',
] );

// CTA Button Text
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_tf_cta_text',
    'label'    => esc_html__( 'CTA Button Text', 'spider' ),
    'section'  => 'spider_home_technology_faq',
    'default'  => 'Utforsk alle funksjoner',
] );

// CTA Button Link
Kirki::add_field( 'spider_config', [
    'type'     => 'link',
    'settings' => SPIDER_PREFIX . 'home_tf_cta_link',
    'label'    => esc_html__( 'CTA Button Link', 'spider' ),
    'section'  => 'spider_home_technology_faq',
    'default'  => '#',
] );

// FAQ Repeater
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'home_tf_faq_items',
    'label'       => esc_html__( 'FAQ Accordion Items', 'spider' ),
    'section'     => 'spider_home_technology_faq',
    'row_label'   => [ 'type' => 'field', 'field' => 'title' ],
	'button_label' => esc_html__('Legg til nytt spørsmål', 'spider'),
    'default'     => [
        [
            'title'   => 'Riktig kompetanse på riktig oppdrag',
            'content' => 'Systemet matcher automatisk oppdrag mot ansattes kompetansekrav...',
            'image'   => get_template_directory_uri() . '/images/technology-section-main.png',
        ],
    ],
    'fields' => [
        'title' => [
            'type'  => 'text',
            'label' => esc_html__( 'Tittel', 'spider' ),
        ],
        'content' => [
            'type'  => 'textarea',
            'label' => esc_html__( 'Svar/Innhold', 'spider' ),
        ],
        'image' => [
            'type'  => 'image',
            'label' => esc_html__( 'Sidebilde', 'spider' ),
            'description' => esc_html__('Dette bildet vises til venstre når dette punktet er aktivt.', 'spider'),
        ],
    ],
] );