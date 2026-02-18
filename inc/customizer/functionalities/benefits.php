<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_funcitonality_benefits', array(
    'title'       => esc_html__( 'Key Benefits (CPT)', 'spider-solutions' ),
    'panel'       => 'spider_functionlities_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'funcitonality_enable_benefits',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_funcitonality_benefits',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'funcitonality_benefits_badge',
    'label'     => esc_html__( 'Section Badge Text', 'spider' ),
    'section'   => 'spider_funcitonality_benefits',
    'default'   => 'Nøkkelfordeler',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'funcitonality_benefits_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_funcitonality_benefits',
    'default'   => 'Planlegging som gir mer tid, bedre kvalitet og lavere belastning',
] );