<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_about_benefits', array(
    'title' => esc_html__( 'Key Benefits', 'spider-solutions' ),
    'panel' => 'spider_about_panel',
) );

Kirki::add_field( 'spider_config', array(
    'type'        => 'repeater',
    'settings'    => 'benefit_cards',
    'label'       => esc_html__( 'Benefit Cards', 'spider-solutions' ),
    'section'     => 'spider_about_benefits',
    'row_label'   => array( 'type' => 'field', 'field' => 'title' ),
    'fields' => array(
        'title' => array(
            'type'  => 'text',
            'label' => esc_html__( 'Card Title', 'spider-solutions' ),
        ),
        'desc' => array(
            'type'  => 'textarea',
            'label' => esc_html__( 'Description', 'spider-solutions' ),
        ),
        'icon_type' => array(
            'type'    => 'select',
            'label'   => esc_html__( 'Icon Style', 'spider-solutions' ),
            'choices' => array(
                'map'   => 'Map/Location',
                'bolt'  => 'Energy/Minutes',
                'star'  => 'Quality/Star',
                'shield'=> 'Security/Shield',
                'custom'=> 'Asterisk (*)',
            ),
        ),
    ),
) );