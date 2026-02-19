<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_benefit_promo', array(
    'title'       => esc_html__( 'Promo Section', 'spider-solutions' ),
    'panel'       => 'spider_benefit_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'promo_enable_promo',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_benefit_promo',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'promo_promo_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_benefit_promo',
    'default'   => 'Utviklet sammen med kommunene',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'promo_promo_desc',
    'label'     => esc_html__( 'Description', 'spider' ),
    'section'   => 'spider_benefit_promo',
    'default'   => 'SPIDER er utviklet i tett samarbeid med hjemmetjenester over hele landet...',
] );

// Image Upload
Kirki::add_field( 'spider_config', [
    'type'        => 'image',
    'settings'    => SPIDER_PREFIX . 'promo_promo_image',
    'label'       => esc_html__( 'Side Image', 'spider' ),
    'section'     => 'spider_benefit_promo',
    'default'     => get_template_directory_uri() . '/images/functionalities-consult.png',
] );

// Button
Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'promo_promo_btn_text',
    'label'     => esc_html__( 'Button Text', 'spider' ),
    'section'   => 'spider_benefit_promo',
    'default'   => 'Book gratis demo',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'link',
    'settings'  => SPIDER_PREFIX . 'promo_promo_btn_url',
    'label'     => esc_html__( 'Button URL', 'spider' ),
    'section'   => 'spider_benefit_promo',
    'default'   => '#',
] );