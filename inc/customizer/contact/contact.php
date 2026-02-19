<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_contact_page_section', array(
    'title'       => esc_html__( 'Contact Section', 'spider-solutions' ),
    'panel'       => 'spider_contact_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'contact_page_enable_contact',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_contact_page_section',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'contact_page_comparison_badge',
    'label'     => esc_html__( 'Section Badge Text', 'spider' ),
    'section'   => 'spider_contact_page_section',
    'default'   => 'Nøkkelfordeler',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'contact_page_comparison_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_contact_page_section',
    'default'   => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning',
] );