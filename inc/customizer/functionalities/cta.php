<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_funcitonality_cta', array(
    'title'       => esc_html__( 'Call to Action Section', 'spider-solutions' ),
    'panel'       => 'spider_functionlities_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'funcitonality_enable_cta',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_funcitonality_cta',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'funcitonality_cta_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_funcitonality_cta',
    'default'   => 'Hver kommune er forskjellig',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'funcitonality_cta_desc',
    'label'     => esc_html__( 'Section Description', 'spider' ),
    'section'   => 'spider_funcitonality_cta',
    'default'   => 'SPIDER tilpasses lokale regler, arbeidsflyt og prioriteringer – og leverer verdi der det betyr mest.',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'funcitonality_cta_btn_text',
    'label'     => esc_html__( 'Button Text', 'spider' ),
    'section'   => 'spider_funcitonality_cta',
    'default'   => 'Book gratis demo',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'link',
    'settings'  => SPIDER_PREFIX . 'funcitonality_cta_btn_url',
    'label'     => esc_html__( 'Button URL', 'spider' ),
    'section'   => 'spider_funcitonality_cta',
    'default'   => '#',
] );