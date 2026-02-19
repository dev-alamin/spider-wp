<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_general_settings', array(
    'title'       => esc_html__( 'Header, Footer, Others', 'spider-solutions' ),
    'panel'       => 'spider_general_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'header_enable_section',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_general_settings',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'footer_enable_section',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_general_settings',
    'default'  => true,
] );

/**
 * HEADER FIELDS
 */
Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'header_btn_text',
    'label'     => esc_html__( 'Header Button Text', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => 'Kontakt oss',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'link',
    'settings'  => SPIDER_PREFIX . 'header_btn_link',
    'label'     => esc_html__( 'Header Button Link', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => '#',
] );

/**
 * FOOTER FIELDS
 */
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'footer_description',
    'label'     => esc_html__( 'Footer Description', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => 'Hjemmetjenesten er kompleks: kompetansekrav, tidsvinduer, pauser, kontinuitet og store variasjoner gjennom dagen.',
] );

// Contact Details
Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'footer_phone',
    'label'     => esc_html__( 'Footer Phone', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => '+47 41.21.44.57',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'footer_email',
    'label'     => esc_html__( 'Footer Email', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => 'info@spidersolutions.no',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'footer_address',
    'label'     => esc_html__( 'Footer Address', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => 'Gaustadalléen 21, 0349 Oslo',
] );

// Social Links
Kirki::add_field( 'spider_config', [
    'type'      => 'link',
    'settings'  => SPIDER_PREFIX . 'footer_linkedin',
    'label'     => esc_html__( 'LinkedIn URL', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => '#',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'link',
    'settings'  => SPIDER_PREFIX . 'footer_instagram',
    'label'     => esc_html__( 'Instagram URL', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => '#',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'link',
    'settings'  => SPIDER_PREFIX . 'footer_twitter',
    'label'     => esc_html__( 'X (Twitter) URL', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => '#',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'link',
    'settings'  => SPIDER_PREFIX . 'footer_facebook',
    'label'     => esc_html__( 'Facebook URL', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => '#',
] );

$current_year = date('Y');

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'footer_copyright_text',
    'label'     => esc_html__( 'Header Button Text', 'spider' ),
    'section'   => 'spider_general_settings',
    'default'   => "© $current_year SpiderSolutions. Alle rettigheter reservert.",
] );