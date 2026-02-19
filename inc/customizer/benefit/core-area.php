<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_funcitonality_comparison', array(
    'title'       => esc_html__( 'Comparison Section', 'spider-solutions' ),
    'panel'       => 'spider_benefit_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'funcitonality_enable_comparison',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_funcitonality_comparison',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'funcitonality_comparison_badge',
    'label'     => esc_html__( 'Section Badge Text', 'spider' ),
    'section'   => 'spider_funcitonality_comparison',
    'default'   => 'Nøkkelfordeler',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'funcitonality_comparison_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_funcitonality_comparison',
    'default'   => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning',
] );