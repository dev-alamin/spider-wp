<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_home_cta', array(
    'title' => esc_html__( 'CTA Section', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_cta__section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_home_cta',
    'default'  => true,
]);

Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_cta_badge',
    'label'    => esc_html__( 'Section Badge', 'spider-solutions' ),
    'section'  => 'spider_home_cta',
    'default'  => 'Interessert?',
] );

// Headline
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_cta_headline',
    'label'    => esc_html__( 'Section Headline', 'spider-solutions' ),
    'section'  => 'spider_home_cta',
    'default'  => 'Se hvordan SPIDER kan forbedre planleggingen i din kommune',
] );

// Description
Kirki::add_field( 'spider_config', [
    'type'     => 'textarea',
    'settings' => SPIDER_PREFIX . 'home_cta_desc',
    'label'    => esc_html__( 'Section Description', 'spider-solutions' ),
    'section'  => 'spider_home_cta',
    'default'  => 'SPIDER løser utfordringer for alle ledd i hjemmetjenesten...',
] );

// CTA Text
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_cta_button_text',
    'label'    => esc_html__( 'CTA Button Text', 'spider-solutions' ),
    'section'  => 'spider_home_cta',
    'default'  => 'Book gratis demo',
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'link',
    'settings' => SPIDER_PREFIX . 'home_cta_button_link',
    'label'    => esc_html__( 'CTA Button Link', 'spider-solutions' ),
    'section'  => 'spider_home_cta',
    'default'  => '#',
] );