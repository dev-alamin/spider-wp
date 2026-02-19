<?php
if( ! defined( 'ABSPATH' ) ) exit;

Kirki::add_section( 'spider_record_hero', array(
    'title'       => esc_html__( 'Record Hero & Benchmarks', 'spider-solutions' ),
    'panel'       => 'spider_record_panel',
) );

Kirki::add_field( 'spider_config', [
    'type'     => 'toggle',
    'settings' => SPIDER_PREFIX . 'record_enable_hero',
    'label'    => esc_html__( 'Show/Hide Section', 'spider-solutions' ),
    'section'  => 'spider_record_hero',
    'default'  => true,
] );

// Main Headline & Subtext
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_hero_headline',
    'label'     => esc_html__( 'Main Headline', 'spider' ),
    'section'   => 'spider_record_hero',
    'default'   => 'Dokumentert optimeringskvalitet i verdensklasse',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_hero_desc',
    'label'     => esc_html__( 'Intro Paragraphs', 'spider' ),
    'description' => esc_html__( 'Use double line breaks for new paragraphs', 'spider' ),
    'section'   => 'spider_record_hero',
    'default'   => "SPIDER har oppnådd dokumenterte resultater på krevende, internasjonale optimeringstester.\n\nResultatene viser en optimeringskvalitet som overgår tidligere kjente beste løsninger.",
] );

// Benchmark Section Sub-header
Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_bench_title',
    'label'     => esc_html__( 'Benchmark Sub-headline', 'spider' ),
    'section'   => 'spider_record_hero',
    'default'   => 'Dokumentert ytelse på internasjonale benchmark-tester',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_benchmark_top_desc',
    'label'     => esc_html__( 'Benchmark top Paragraphs', 'spider' ),
    'section'   => 'spider_record_hero',
] );

Kirki::add_field( 'spider_config', [
    'type'      => 'textarea',
    'settings'  => SPIDER_PREFIX . 'record_benchmark_bottom_desc',
    'label'     => esc_html__( 'Benchmark bottom Paragraphs', 'spider' ),
    'section'   => 'spider_record_hero',
] );

// Repeater for the Stats Cards
Kirki::add_field( 'spider_config', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Benchmark Stats Cards', 'spider' ),
    'section'     => 'spider_record_hero',
    'settings'    => SPIDER_PREFIX . 'record_stats',
    'row_label'   => [ 'type' => 'text', 'value' => esc_html__('Stat Card', 'spider' ) ],
    'fields' => [
        'number' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Large Number', 'spider' ),
            'default' => '197',
        ],
        'label' => [
            'type'    => 'textarea',
            'label'   => esc_html__( 'Description Text', 'spider' ),
            'default' => 'Beste kjente resultat oppnådd på 197 testcaser',
        ],
    ]
] );