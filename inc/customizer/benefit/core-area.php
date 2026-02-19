<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_benefit_core_area', array(
    'title'       => esc_html__( 'Core Areas', 'spider-solutions' ),
    'panel'       => 'spider_benefit_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'benefit_enable_core_area',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_benefit_core_area',
    'default'  => true,
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'benefit_core_area_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_benefit_core_area',
    'default'   => 'Fire kjerneområder som dekker hele hverdagen i hjemmetjenesten',
] );

// Repeater for Core Area Cards
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Core Area Cards', 'spider' ),
    'section'     => 'spider_benefit_core_area',
    'settings'    => SPIDER_PREFIX . 'benefit_core_area_items',
    'row_label'   => [ 'type'  => 'text', 'value' => esc_html__('Core Area', 'spider' ) ],
    'fields' => [
        'title' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Area Title', 'spider' ),
            'default' => '',
        ],
        'description' => [
            'type'    => 'textarea',
            'label'   => esc_html__( 'Description', 'spider' ),
            'default' => '',
        ],
        'icon' => [
            'type'        => 'select',
            'label'       => esc_html__( 'Icon Type', 'spider' ),
            'default'     => 'plan',
            'choices'     => [
                'plan'    => esc_html__( 'Planning (User/Plus)', 'spider' ),
                'quality' => esc_html__( 'Quality (Shield/Star)', 'spider' ),
                'rules'   => esc_html__( 'Rules (Document/Clock)', 'spider' ),
                'flex'    => esc_html__( 'Flexibility (Refresh/Sync)', 'spider' ),
            ],
        ],
    ]
] );