<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_contact_page_section', array(
    'title'       => esc_html__( 'Contact Page', 'spider-solutions' ),
    'panel'       => 'spider_contact_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'contact_page_enable',
    'label'    => esc_html__( 'Show Section', 'spider-solutions' ),
    'section'  => 'spider_contact_page_section',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'contact_main_headline',
    'label'     => esc_html__( 'Main Headline', 'spider' ),
    'section'   => 'spider_contact_page_section',
    'default'   => 'Kontakt oss',
] );

Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Contact Persons / Depts', 'spider' ),
    'section'     => 'spider_contact_page_section',
    'settings'    => SPIDER_PREFIX . 'contact_list',
    'row_label'   => [ 'type' => 'text', 'value' => esc_html__('Contact Item', 'spider' ) ],
    'fields' => [
        'role' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Role/Title', 'spider' ),
            'default' => '',
        ],
        'details' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Email / Phone Link Text', 'spider' ),
            'default' => '',
        ],
        'email' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Email Address (for mailto)', 'spider' ),
            'default' => '',
        ],
    ]
] );