<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_home_functionality', array(
    'title' => esc_html__( 'Functionality Filter', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );

Kirki::add_field( 'spider_config', array(
    'type'        => 'repeater',
    'settings'    => 'filter_data',
    'label'       => esc_html__( 'Filter Categories & Tags', 'spider-solutions' ),
    'section'     => 'spider_home_functionality',
    'row_label'   => array( 'type' => 'field', 'field' => 'cat_name' ),
    'fields'      => array(
        'cat_name' => array(
            'type'  => 'text',
            'label' => esc_html__( 'Category Name', 'spider-solutions' ),
        ),
        'tags' => array(
            'type'        => 'textarea',
            'label'       => esc_html__( 'Tags', 'spider-solutions' ),
            'description' => esc_html__( 'One per line', 'spider-solutions' ),
        ),
    ),
) );