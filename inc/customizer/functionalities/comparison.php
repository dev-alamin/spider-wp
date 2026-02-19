<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_funcitonality_comparison', array(
    'title'       => esc_html__( 'Comparison Section', 'spider-solutions' ),
    'panel'       => 'spider_functionlities_panel',
) );

// Toggle Section
Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'funcitonality_enable_comparison',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_funcitonality_comparison',
    'default'  => true,
] );

// Headline
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'funcitonality_comparison_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_funcitonality_comparison',
    'default'   => 'Fra manuell kamp til operativ kontroll',
] );

// Repeater for Comparison Rows
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Comparison Rows', 'spider' ),
    'section'     => 'spider_funcitonality_comparison',
    'settings'    => SPIDER_PREFIX . 'comparison_rows',
    'row_label' => [
        'type'  => 'text',
        'value' => esc_html__('Feature Row', 'spider' ),
    ],
    'button_label' => esc_html__('Add New Feature', 'spider' ),
    'default'      => [
        [
            'feature_title' => 'Planer genereres automatisk',
            'before_status' => 'no', // options: yes, no, or custom text
            'after_status'  => 'yes',
        ],
    ],
    'fields' => [
        'feature_title' => [
            'type'        => 'text',
            'label'       => esc_html__( 'Feature Name', 'spider' ),
            'default'     => '',
        ],
        'before_status' => [
            'type'        => 'text',
            'label'       => esc_html__( 'Before (Type "yes", "no", or custom text)', 'spider' ),
            'default'     => 'no',
        ],
        'after_status' => [
            'type'        => 'text',
            'label'       => esc_html__( 'After (Type "yes", "no", or custom text)', 'spider' ),
            'default'     => 'yes',
        ],
    ]
] );