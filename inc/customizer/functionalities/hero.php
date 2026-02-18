<?php
if( ! defined( 'ABSPATH' ) ) exit;

// Register Section
Kirki::add_section( 'spider_functionality_hero', array(
    'title'       => esc_html__( 'Hero Section', 'spider-solutions' ),
    'panel'       => 'spider_functionlities_panel',
) );

// Show/Hide Toggle
Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'functionality_enable_hero',
    'label'    => esc_html__( 'Show/Hide Hero', 'spider-solutions' ),
    'section'  => 'spider_functionality_hero',
    'default'  => true,
] );

// Headline
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'functionality_hero_headline',
    'label'     => esc_html__( 'Headline', 'spider' ),
    'section'   => 'spider_functionality_hero',
    'default'   => 'Reell verdi i den daglige driften',
] );

// Description
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'functionality_hero_desc',
    'label'     => esc_html__( 'Description', 'spider' ),
    'section'   => 'spider_functionality_hero',
    'default'   => 'SPIDER er utviklet for å løse de faktiske utfordringene i hjemmetjenesten. Ved å håndtere kompleksitet automatisk, skaper systemet verdi for pleiere, planleggere, ledelse og pasienter – hver eneste dag.',
] );

// Image
Kirki::add_field( 'spider_config', [
    'type'      => 'image',
    'settings'  => SPIDER_PREFIX . 'functionality_hero_image',
    'label'     => esc_html__( 'Hero Image', 'spider' ),
    'section'   => 'spider_functionality_hero',
    'default'   => get_template_directory_uri() . '/images/healthcare-provider.png',
] );

// Button Text
Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'functionality_hero_cta_text',
    'label'     => esc_html__( 'Button Text', 'spider' ),
    'section'   => 'spider_functionality_hero',
    'default'   => 'Book gratis demo',
] );

// Button Link
Kirki::add_field( 'spider_config', [
    'type'     => 'link',
    'settings' => SPIDER_PREFIX . 'functionality_hero_btn_link',
    'label'    => esc_html__( 'Button Link', 'spider' ),
    'section'  => 'spider_functionality_hero',
    'default'  => '#',
] );