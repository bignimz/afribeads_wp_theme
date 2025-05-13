<?php

function afribeads_acf_blocks_init() {
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
            'mode'              => 'preview'
        ]);

        // Content With Image block
        acf_register_block_type([
            'name'              => 'content_with_image',
            'title'             => __('Content With Image Section'),
            'description'       => __('Content with image section'),
            'render_template'   => 'template-parts/blocks/content-with-image.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['content', 'image section'],
            'mode'              => 'preview'
        ]);

        // Featured Products block
        acf_register_block_type([
            'name'              => 'featured_products',
            'title'             => __('Featured Products Section'),
            'description'       => __('Displays Featured products section'),
            'render_template'   => 'template-parts/blocks/featured-products.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['products', 'featured'],
            'mode'              => 'preview'
        ]);

        // CTA Banner block
        acf_register_block_type([
            'name'              => 'cta_banner',
            'title'             => __('CTA Banner Section'),
            'description'       => __('Displays a CTA with a background banner image'),
            'render_template'   => 'template-parts/blocks/cta-banner.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['cta', 'banner'],
            'mode'              => 'preview'
        ]);

        // Upcoming Workshops block
        acf_register_block_type([
            'name'              => 'upcoming_workshops',
            'title'             => __('Upcoming Workshops Section'),
            'description'       => __('Displays a list of upcoming workshops in a grid layout'),
            'render_template'   => 'template-parts/blocks/upcoming-workshops.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['workshops', 'upcoming'],
            'mode'              => 'preview'
        ]);

        // Testimonials block
        acf_register_block_type([
            'name'              => 'testimonials',
            'title'             => __('Testimonials Section'),
            'description'       => __('Displays a list of testimonials'),
            'render_template'   => 'template-parts/blocks/testimonials.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['testimonials', 'reviews'],
            'mode'              => 'preview'
        ]);

        // Missions block
        acf_register_block_type([
            'name'              => 'missions',
            'title'             => __('Missions Section'),
            'description'       => __('Displays mission title and its pillars'),
            'render_template'   => 'template-parts/blocks/missions.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['missions'],
            'mode'              => 'preview'
        ]);

        // Team block
        acf_register_block_type([
            'name'              => 'team',
            'title'             => __('Team Members Section'),
            'description'       => __('Displays team members'),
            'render_template'   => 'template-parts/blocks/team.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['team', 'members'],
            'mode'              => 'preview'
        ]);

        // Process block
        acf_register_block_type([
            'name'              => 'process',
            'title'             => __('Process Section'),
            'description'       => __('Displays images with content in a stack'),
            'render_template'   => 'template-parts/blocks/process.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['process'],
            'mode'              => 'preview'
        ]);

        // Contact Information Block
        acf_register_block_type([
            'name'              => 'contact_information',
            'title'             => __('Contact Information Section'),
            'description'       => __('Displays contact information'),
            'render_template'   => 'template-parts/blocks/contact-information.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['contact'],
            'mode'              => 'preview'
        ]);

        // Steps and Highlights block
        acf_register_block_type([
            'name'              => 'steps_and_highlights',
            'title'             => __('Steps and Highlights Section'),
            'description'       => __('Displays section for process or highlights'),
            'render_template'   => 'template-parts/blocks/steps-and-highlights.php',
            'category'          => 'layout',
            'icon'              => 'format-image',
            'keywords'          => ['steps', 'process', 'highlights'],
            'mode'              => 'preview'
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
add_action('acf/init', 'afribeads_acf_blocks_init');