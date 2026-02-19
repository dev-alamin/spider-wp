<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_record_optimization', array(
    'title'       => esc_html__( 'Optimization Section', 'spider-solutions' ),
    'panel'       => 'spider_record_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'record_enable_optimization',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_record_optimization',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'record_optimization_badge',
    'label'     => esc_html__( 'Section Badge Text', 'spider' ),
    'section'   => 'spider_record_optimization',
    'default'   => 'Nøkkelfordeler',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_optimization_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_record_optimization',
    'default'   => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning',
] );