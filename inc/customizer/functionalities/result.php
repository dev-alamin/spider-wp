<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_funcitonality_result', array(
    'title'       => esc_html__( 'Result Section', 'spider-solutions' ),
    'panel'       => 'spider_functionlities_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'funcitonality_enable_result',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_funcitonality_result',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'funcitonality_result_badge',
    'label'     => esc_html__( 'Section Badge Text', 'spider' ),
    'section'   => 'spider_funcitonality_result',
    'default'   => 'Nøkkelfordeler',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'funcitonality_result_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_funcitonality_result',
    'default'   => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning',
] );