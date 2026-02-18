<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_about_interaction', array(
    'title'       => esc_html__( 'Human & Tech Interaction', 'spider-solutions' ),
    'panel'       => 'spider_about_panel',
    'preview_src' => home_url( '/about/' ),
) );

// Headline
Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'about_interact_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_about_interaction',
    'default'   => 'Resultater drevet av riktig samspill mellom mennesker og teknologi',
] );

// Top Paragraph
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'about_interact_desc_main',
    'label'     => esc_html__( 'Main Description', 'spider' ),
    'section'   => 'spider_about_interaction',
    'default'   => 'Resultatene skapes ikke av enkeltfunksjoner...',
] );

// Bottom Paragraph (Bold)
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'about_interact_desc_sub',
    'label'     => esc_html__( 'Secondary Description', 'spider' ),
    'section'   => 'spider_about_interaction',
    'default'   => 'Når alle hensyn optimaliseres samlet, oppstår målbare forbedringer – i praksis, hver dag.',
] );