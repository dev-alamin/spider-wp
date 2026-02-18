<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_about_cta', array(
    'title'       => esc_html__( 'Call to Action', 'spider-solutions' ),
    'panel'       => 'spider_about_panel',
    'preview_src' => home_url( '/about/' ),
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'about_enable_cta_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_about_cta',
    'default'  => true,
]);

// Section Headline
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'about_cta_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_about_cta',
    'default'   => 'Resultater er én side av SPIDER. Neste steg er å forstå hvordan systemet leverer dem – og hvilke funksjoner som gjør det mulig.',
] );

// Background Image Control
Kirki::add_field( 'spider_config', [
    'type'        => 'image',
    'settings'    => SPIDER_PREFIX . 'about_cta_bg',
    'label'       => esc_html__( 'Background Image', 'spider' ),
    'description' => esc_html__( 'Upload a background image for the CTA section.', 'spider' ),
    'section'     => 'spider_about_cta',
    'default'     => get_template_directory_uri() . '/images/newsletter-bg.svg',
] );

// Button Text
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'about_impact_cta_text',
    'label'    => esc_html__( 'CTA Button Text', 'spider' ),
    'section'  => 'spider_about_cta',
    'default'  => 'Book gratis demo',
] );

// Button Link
Kirki::add_field( 'spider_config', [
    'type'     => 'link',
    'settings' => SPIDER_PREFIX . 'about_impact_cta_link',
    'label'    => esc_html__( 'CTA Button Link', 'spider' ),
    'section'  => 'spider_about_cta',
    'default'  => '#',
] );