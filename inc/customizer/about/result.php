<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_about_result', array(
    'title'       => esc_html__( 'What Result Mean', 'spider-solutions' ),
    'panel'       => 'spider_about_panel',
    'preview_src' => home_url( '/about/' ), // Adjust to your slug
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'about_enable_result_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_about_result',
    'default'  => true,
]);

// Define our icon options
$spider_result_icons = [
    'patient'    => esc_html__( 'Patient', 'spider' ),
    'caregiver'  => esc_html__( 'Caregiver', 'spider' ),
    'planner'    => esc_html__( 'Planner', 'spider' ),
    'economy'    => esc_html__( 'Economy', 'spider' ),
];

// Headline
Kirki::add_field( 'spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'about_result_headline',
    'label'     => esc_html__( 'Section Headline', 'spider' ),
    'section'   => 'spider_about_result',
    'default'   => 'Hva resultatene betyr i hverdagen',
] );


// Result Accordion Repeater
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'about_result_tabs',
    'label'       => esc_html__( 'Result Tabs', 'spider' ),
    'section'     => 'spider_about_result',
    'row_label'   => [
        'type'  => 'field',
        'field' => 'title',
    ],
    'fields' => [
        'title' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Tab Title', 'spider' ),
        ],
        'content' => [
            'type'    => 'textarea',
            'label'   => esc_html__( 'Tab Content', 'spider' ),
        ],
        'icon_choice' => [
            'type'     => 'radio', // Using radio as requested
            'label'    => esc_html__( 'Choose Icon', 'spider' ),
            'default'  => 'patient',
            'choices'  => $spider_result_icons,
        ],
    ],
] );