<?php

function prestige_chauffeur_acf_blocks_init() {
    if( function_exists('acf_register_block_type') ) {
        // Hero block
        acf_register_block_type([
            'name'              => 'hero',
            'title'             => __('Hero Section'),
            'description'       => __('Hero section with title and CTA'),
            'render_template'   => 'template-parts/blocks/hero.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['hero', 'banner'],
            'mode'              => 'edit'
        ]);

        // Services Block
        acf_register_block_type([
            'name'              => 'services',
            'title'             => __('Services Section'),
            'description'       => __('Services section with heading, text, and service image'),
            'render_template'   => 'template-parts/blocks/services.php',
            'category'          => 'layout',
            'icon'              => 'editor-paragraph',
            'keywords'          => ['services', 'service'],
            'mode'              => 'edit',
            'supports'          => [
                'align' => false,
                'anchor' => true,
            ]
        ]);

        // Fleet Block
        acf_register_block_type([
            'name'              => 'fleet',
            'title'             => __('Fleet Section'),
            'description'       => __('Fleet section with heading, text, and fleet categories'),
            'render_template'   => 'template-parts/blocks/fleet.php',
            'category'          => 'layout',
            'icon'              => 'editor-paragraph',
            'keywords'          => ['fleet', 'fleets'],
            'mode'              => 'edit',
            'supports'          => [
                'align' => false,
                'anchor' => true,
            ]
        ]);

        // Testimonials Block
        acf_register_block_type([
            'name'              => 'testimonials',
            'title'             => __('Testimonials Section'),
            'description'       => __('Displays testimonials slider over a background Image'),
            'render_template'   => 'template-parts/blocks/testimonials.php',
            'category'          => 'layout',
            'icon'              => 'editor-paragraph',
            'keywords'          => ['testimonials', 'fleets'],
            'mode'              => 'edit',
            'supports'          => [
                'align' => false,
                'anchor' => true,
            ]
        ]);

        // CTA Block
        acf_register_block_type([
            'name' => 'cta',
            'title' => __('CTA Section'),
            'description' => __('A call-to-action section with form.'),
            'render_template' => 'template-parts/blocks/cta.php',
            'category' => 'layout',
            'icon' => 'email',
            'keywords' => ['cta', 'form', 'quote'],
            'supports' => [
                'align' => false,
                'anchor' => true,
            ],
        ]);
    }
}
add_action('acf/init', 'prestige_chauffeur_acf_blocks_init');