<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_record_test', array(
    'title'       => esc_html__( 'Record Section', 'spider-solutions' ),
    'panel'       => 'spider_record_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'record_enable_test',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_record_test',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'record_test_badge',
    'label'     => esc_html__( 'Section Badge Text', 'spider' ),
    'section'   => 'spider_record_test',
    'default'   => 'Nøkkelfordeler',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_test_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_record_test',
    'default'   => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning',
] );