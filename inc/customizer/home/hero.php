<?php
if (! defined('ABSPATH')) exit;

Kirki::add_section(
    'spider_hero_section',
    array(
        'title' => esc_html__('Hero Section', 'spider-solutions'),
        'panel' => 'spider_home_panel',
        'priority' => 10,
    )
);

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_hero_section',
    'label'    => esc_html__('Show/Hide Section', 'spider-solutions'),
    'section'  => 'spider_hero_section',
    'default'  => true,
]);

/**
 * BADGE
 */
Kirki::add_field('spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'home_hero_badge',
    'label'     => esc_html__('Badge Text', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'Brukt av 30+ norske kommuner – hver dag',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-badge-ref', 'function' => 'text']
    ],
]);

/**
 * TITLE
 */
Kirki::add_field('spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'home_hero_title',
    'label'     => esc_html__('Hero Title', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'Verdensledende planlegging for hjemmetjenesten',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-title-ref', 'function' => 'text']
    ],
]);

/**
 * DESCRIPTION
 */
Kirki::add_field('spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'home_hero_desc',
    'label'     => esc_html__('Hero Description', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'SPIDER bygger optimale arbeidslister og ruter på minutter...',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-desc-ref', 'function' => 'text']
    ],
]);

/**
 * CTA LABEL
 */
Kirki::add_field('spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'home_hero_cta_label',
    'label'     => esc_html__('CTA Button Label', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'Book gratis demo',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-cta-ref', 'function' => 'text']
    ],
]);

/**
 * CTA LINK
 */
Kirki::add_field('spider_config', [
    'type'     => 'link',
    'settings' => SPIDER_PREFIX . 'home_hero_cta_link',
    'label'    => esc_html__('CTA Button Link', 'spider-solutions'),
    'section'  => 'spider_hero_section',
    'default'  => '#',
]);

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_enable_hero_right',
    'label'    => esc_html__('Show/Hide Hero Right', 'spider-solutions'),
    'section'  => 'spider_hero_section',
    'default'  => true,
]);

Kirki::add_field('spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'home_hero_card1_title',
    'label'     => esc_html__('Card 1 Title', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'UNIKE oppkoblingsmuligheter',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-card1-title-ref', 'function' => 'text']
    ],
]);

Kirki::add_field('spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'home_hero_card1_desc',
    'label'     => esc_html__('Card 1 Description', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'SPIDER kobles sømløst mot EPJ...',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-card1-desc-ref', 'function' => 'text']
    ],
]);

/**
 * CARD IMAGE
 */
Kirki::add_field('spider_config', [
    'type'     => 'image',
    'settings' => SPIDER_PREFIX . 'home_hero_card1_image',
    'label'    => esc_html__('Card 1 Image', 'spider-solutions'),
    'section'  => 'spider_hero_section',
]);

Kirki::add_field('spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'home_hero_card2_title',
    'label'     => esc_html__('Card 2 Title', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'UNIK fleksibilitet',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-card2-title-ref', 'function' => 'text']
    ],
]);

Kirki::add_field('spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'home_hero_card2_desc',
    'label'     => esc_html__('Card 2 Description', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'SPIDER tilpasses lokale regler...',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-card2-desc-ref', 'function' => 'text']
    ],
]);

for ($i = 1; $i <= 3; $i++) {

    Kirki::add_field('spider_config', [
        'type'      => 'text',
        'settings'  => SPIDER_PREFIX . "home_hero_feature_$i",
        'label'     => esc_html__("Feature Item $i", 'spider-solutions'),
        'section'   => 'spider_hero_section',
        'default'   => 'Step-in funksjoner',
        'transport' => 'postMessage',
        'js_vars'   => [
            ['element' => ".hero-feature-$i-ref", 'function' => 'text']
        ],
    ]);
}

Kirki::add_field('spider_config', [
    'type'      => 'text',
    'settings'  => SPIDER_PREFIX . 'home_hero_card4_title',
    'label'     => esc_html__('Optimization Card Title', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'UNIK optimeringskvalitet',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-card4-title-ref', 'function' => 'text']
    ],
]);

Kirki::add_field('spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'home_hero_card4_desc',
    'label'     => esc_html__('Optimization Card Description', 'spider-solutions'),
    'section'   => 'spider_hero_section',
    'default'   => 'SPIDER leverer dokumentert verdensledende optimering...',
    'transport' => 'postMessage',
    'js_vars'   => [
        ['element' => '.hero-card4-desc-ref', 'function' => 'text']
    ],
]);

Kirki::add_field('spider_config', [
    'type'     => 'image',
    'settings' => SPIDER_PREFIX . 'home_hero_center_logo',
    'label'    => esc_html__('Hero Center Logo', 'spider-solutions'),
    'section'  => 'spider_hero_section',
]);

Kirki::add_field('spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'home_hero_show_center_logo',
    'label'    => esc_html__('Show Center Floating Logo', 'spider-solutions'),
    'section'  => 'spider_hero_section',
    'default'  => true,
]);
