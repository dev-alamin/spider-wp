<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_home_results', array(
    'title' => esc_html__( 'Results Section', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );


Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_result_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_home_results',
    'default'  => true,
]);

Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_res_divider_text',
    'label'    => __( 'Divider Text', 'spider' ),
    'section'  => 'spider_home_results',
    'default'  => 'Resultater',
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_res_heading_strike',
    'label'    => __( 'Top Heading (strikethrough)', 'spider' ),
    'section'  => 'spider_home_results',
    'default'  => 'Har du råd til å bruke SPIDER?',
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_res_heading_main',
    'label'    => __( 'Main Heading', 'spider' ),
    'section'  => 'spider_home_results',
    'default'  => 'Har du råd til å ikke bruke SPIDER?',
] );

Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'home_res_items',
    'label'       => __( 'Result Cards', 'spider' ),
    'section'     => 'spider_home_results',
    'row_label'   => [
        'type'  => 'text',
        'value' => __( 'Result', 'spider' ),
    ],
    'default' => [
        [
            'value' => '-26,7%',
            'label' => 'Kjørte kilometer redusert',
        ],
        [
            'value' => '-34,1%',
            'label' => 'Færre bytter av pleier hos samme pasient',
        ],
        [
            'value' => '+107,7%',
            'label' => 'Flere besøk utført av ansvarlig pleier',
        ],
        [
            'value' => '12-15%',
            'label' => 'Frigjort pleiertid hver dag – uten strukturelle endringer',
        ],
    ],

    'fields' => [
        'value' => [
            'type'        => 'text',
            'label'       => __( 'Percentage / Value', 'spider' ),
            'default'     => '',
        ],
        'label' => [
            'type'        => 'text',
            'label'       => __( 'Description', 'spider' ),
            'default'     => '',
        ],
    ],
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_res_cta_label',
    'label'    => __( 'CTA Label', 'spider' ),
    'section'  => 'spider_home_results',
    'default'  => 'Se flere resultater',
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'link',
    'settings' => SPIDER_PREFIX . 'home_res_cta_link',
    'label'    => __( 'CTA Link', 'spider' ),
    'section'  => 'spider_home_results',
    'default'  => '#',
] );

