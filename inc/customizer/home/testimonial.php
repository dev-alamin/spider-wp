<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_home_testimonial', array(
    'title' => esc_html__( 'Testimonial', 'spider-solutions' ),
    'panel' => 'spider_home_panel',
) );

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_testimonial_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_home_testimonial',
    'default'  => true,
]);

// Headline
Kirki::add_field( 'spider_config', [
    'type'     => 'text',
    'settings' => SPIDER_PREFIX . 'home_tf_headline',
    'label'    => esc_html__( 'Section Headline', 'spider' ),
    'section'  => 'spider_home_testimonial',
    'default'  => 'Funksjonalitet uten grenser',
] );

// Slider Controls
Kirki::add_field( 'spider_config', [
    'type'     => 'slider',
    'settings' => SPIDER_PREFIX . 'home_test_speed',
    'label'    => esc_html__( 'Slider Speed (ms)', 'spider' ),
    'section'  => 'spider_home_testimonial',
    'default'  => 500,
    'choices'  => [ 'min' => 200, 'max' => 2000, 'step' => 100 ],
] );

Kirki::add_field( 'spider_config', [
    'type'     => 'checkbox',
    'settings' => SPIDER_PREFIX . 'home_test_autoplay',
    'label'    => esc_html__( 'Enable Autoplay', 'spider' ),
    'section'  => 'spider_home_testimonial',
    'default'  => true,
] );

// Repeater for Testimonials
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'settings'    => SPIDER_PREFIX . 'home_testimonials',
    'label'       => esc_html__( 'Testimonials', 'spider' ),
    'section'     => 'spider_home_testimonial',
    'row_label'   => [ 'type' => 'field', 'field' => 'name' ],

    'default' => [
        [
            'quote'  => 'SPIDER har redusert planleggingstiden vår dramatisk. Vi bruker nå tiden på pasientene, ikke på Excel.',
            'name'   => 'Oslo kommune',
            'role'   => 'Avdelingsleder hjemmetjenesten',
            'image'  => get_template_directory_uri() . '/images/testimonial-person.jpg',
            'rating' => '5',
        ],
        [
            'quote'  => 'Kontinuiteten for brukerne har blitt merkbart bedre. Vi får færre klager og mer fornøyde ansatte.',
            'name'   => 'Bergen kommune',
            'role'   => 'Teamleder omsorg',
            'image'  => get_template_directory_uri() . '/images/testimonial-person.jpg',
            'rating' => '5',
        ],
        [
            'quote'  => 'Systemet finner løsninger vi aldri ville klart manuelt. Det sparer oss både tid og kostnader.',
            'name'   => 'Trondheim kommune',
            'role'   => 'Driftskoordinator',
            'image'  => get_template_directory_uri() . '/images/testimonial-person.jpg',
            'rating' => '4',
        ],
    ],

    'fields' => [
        'quote' => [
            'type'  => 'textarea',
            'label' => esc_html__( 'Quote', 'spider' ),
            'default' => 'Hvis jeg ikke kan bruke SPIDER så slutter jeg i jobben'
        ],
        'name' => [
            'type'  => 'text',
            'label' => esc_html__( 'Name/Municipality', 'spider' ),
            'default' => 'Farsund Kommune'
        ],
        'role' => [
            'type'  => 'text',
            'label' => esc_html__( 'Role/Title', 'spider' ),
            'default' => 'CEO of Company'
        ],
        'image' => [
            'type'  => 'image',
            'label' => esc_html__( 'Avatar', 'spider' ),
            'default' => get_template_directory_uri() . '/images/testimonial-person.jpg'
        ],
        'rating' => [
            'type'    => 'radio',
            'label'   => esc_html__( 'Stars', 'spider' ),
            'default' => '5',
            'choices' => [
                '5' => '5 Stars',
                '4' => '4 Stars',
                '3' => '3 Stars'
            ],
        ],
    ],
] );
