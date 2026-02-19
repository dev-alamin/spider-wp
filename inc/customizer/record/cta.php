<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_record_cta', array(
    'title'       => esc_html__( 'Call to Action Section', 'spider-solutions' ),
    'panel'       => 'spider_record_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'record_enable_cta',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_record_cta',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_cta_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_record_cta',
    'default'   => 'Fra verdensrekorder til verdi i hverdagen',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_cta_desc',
    'label'     => esc_html__( 'Section Description', 'spider' ),
    'section'   => 'spider_record_cta',
    'default'   => 'Dokumentert optimaliseringskvalitet i verdensklasse gir ikke bare sterke testresultater – den gir bedre planer i praksis.',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'record_cta_btn_text',
    'label'     => esc_html__( 'Button Text', 'spider' ),
    'section'   => 'spider_record_cta',
    'default'   => 'Book gratis demo',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'link',
    'settings'  => SPIDER_PREFIX . 'record_cta_btn_url',
    'label'     => esc_html__( 'Button URL', 'spider' ),
    'section'   => 'spider_record_cta',
    'default'   => '#',
] );