<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_record_optimization', array(
    'title'       => esc_html__( 'Optimization & Test Section', 'spider-solutions' ),
    'panel'       => 'spider_record_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'record_enable_optimization',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_record_optimization',
    'default'  => true,
] );

// --- Text Content (The "Why") ---
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_test_headline',
    'label'     => esc_html__( 'Upper Headline', 'spider' ),
    'section'   => 'spider_record_optimization',
    'default'   => 'Hvorfor disse testene er viktige',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_test_desc',
    'label'     => esc_html__( 'Upper Description', 'spider' ),
    'section'   => 'spider_record_optimization',
    'default'   => "Benchmark-testene representerer ekstrem planleggingskompleksitet.\n\nDette er den samme typen kompleksitet som finnes i virkeligheten.",
] );

// --- Grid Content (The "What") ---
Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'record_optimization_headline',
    'label'     => esc_html__( 'Grid Headline', 'spider' ),
    'section'   => 'spider_record_optimization',
    'default'   => 'Hva som faktisk optimaliseres',
] );

Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Optimization Features', 'spider' ),
    'section'     => 'spider_record_optimization',
    'settings'    => SPIDER_PREFIX . 'record_optimization_items',
    'fields' => [
        'title' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Title (use <br> for breaks)', 'spider' ),
            'default' => '',
        ],
        'icon' => [
            'type'        => 'select',
            'label'       => esc_html__( 'Icon', 'spider' ),
            'default'     => 'shield',
            'choices'     => [
                'shield'  => 'Shield (Gjennomførbare)',
                'bolt'    => 'Bolt (Effektiv)',
                'robust'  => 'Robust (Planer)',
                'complex' => 'Users (Komplekse)',
            ],
        ],
    ]
] );