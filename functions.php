<?php
/**
 * prestige Chauffeur functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package afribeads
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function afribeads_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on BAT Bistro, use a find and replace
		* to change 'afribeads' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'afribeads', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'afribeads' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'afribeads_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'afribeads_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function afribeads_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'afribeads_content_width', 640 );
}
add_action( 'after_setup_theme', 'afribeads_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function afribeads_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'afribeads' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'afribeads' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'afribeads_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
/**
 * Enqueue scripts and styles.
 */
function afribeads_scripts() {
	// OwlCarousel (CSS + JS)
	wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], '2.3.4');
	wp_enqueue_style('owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], '2.3.4');
	wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', ['jquery'], '2.3.4', true);

	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter&family=Montserrat&display=swap');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

	wp_enqueue_style( 'afri-beads-style', get_template_directory_uri() . '/dist/assets/css/style.css', array(), _S_VERSION );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'afri-beads-script', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery', 'customize-preview'), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script('afri-navigation', 'afriScreenReaderText', array(
        'expand' => __('Expand child menu', 'afribeads'),
        'collapse' => __('Collapse child menu', 'afribeads'),
    ));
}
add_action( 'wp_enqueue_scripts', 'afribeads_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register Block components
 */
require get_template_directory() . '/inc/blocks_init.php';

/**
 * TGM Plugin activation class.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Include the custom navigation walker
 */
require_once get_template_directory() . '/inc/class-afri-custom-nav-walker.php';

/**
 * Include One click demo
 */
require_once get_template_directory() . '/inc/one-click-demo.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_action('tgmpa_register', 'afribeads_register_required_plugins');

// Export required plugins
function afribeads_register_required_plugins() {
    $plugins = [
        [
            'name'     => 'Advanced Custom Fields PRO',
            'slug'     => 'advanced-custom-fields-pro',
            'source'   => get_template_directory() . '/inc/plugins/advanced-custom-fields-pro.zip',
            'required' => true,
            'version'  => '6.2.1',
        ],
        [
            'name'     => 'WPForms',
            'slug'     => 'wpforms-lite',
            'source'   => get_template_directory() . '/inc/plugins/wpforms-lite.zip', 
            'required' => true,
            'version'  => '1.9.5.2',
        ],
        [
            'name'     => 'WooCommerce',
            'slug'     => 'woocommerce',
            'source'   => get_template_directory() . '/inc/plugins/woocommerce.zip', 
            'required' => true,
            'version'  => '9.8.5',
        ],
        [
            'name'     => 'Google for WooCommerce',
            'slug'     => 'google-listings-and-ads',
            'source'   => get_template_directory() . '/inc/plugins/google-listings-and-ads.zip', 
            'required' => true,
            'version'  => '2.9.13',
        ],
        [
            'name'     => 'WooCommerce PayPal Payments',
            'slug'     => 'woocommerce-paypal-payments',
            'source'   => get_template_directory() . '/inc/plugins/woocommerce-paypal-payments.zip', 
            'required' => true,
            'version'  => '3.0.5',
        ],
        [
            'name'     => 'One Click Demo Import',
            'slug'     => 'one-click-demo-import',
            'source'   => get_template_directory() . '/inc/plugins/one-click-demo-import.zip', 
            'required' => true,
            'version'  => '3.3.0',
        ],
        // Add other plugins here
    ];

    $config = [
        'id'           => 'afribeads-theme',
        'menu'         => 'install-required-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'is_automatic' => true,
    ];

    tgmpa($plugins, $config);
}


// Contact Form 7
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<p[^>]*>/', '', $content);
    $content = str_replace('</p>', '', $content);
    return $content;
});

// ACF Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title'  => 'Footer Settings',
        'menu_title'  => 'Footer Settings',
        'menu_slug'   => 'footer-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ]);
}
