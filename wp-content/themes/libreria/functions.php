<?php
/**
 * Libreria functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Libreria
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! defined( 'LIBRERIA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'LIBRERIA_VERSION', '1.0.0' );
}

if ( ! function_exists( 'libreria_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since   1.0.0
	 */
	function libreria_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'libreria', get_template_directory() . '/languages' );

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

		// Register menus.
		register_nav_menus(
			array(
				'libreria-menu-primary' => esc_html__( 'Primary', 'libreria' ),
				'libreria-menu-social'  => esc_html__( 'Social', 'libreria' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @since   1.0.0
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 115,
				'height'      => 50,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'wp-block-styles' );

		// Add support for wide images.
		add_theme_support( 'align-wide' );

		// Editor Styles.
		add_theme_support( 'editor-styles' );
		add_editor_style( array( 'assets/css/editor-style.css', libreria_get_google_fonts() ) );
	}
endif;
add_action( 'after_setup_theme', 'libreria_setup' );

// Block Patterns.
include get_template_directory() . '/inc/libreria-block-patterns.php';

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @since   1.0.0
 */
function libreria_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Sidebar', 'libreria' ),
			'id'            => 'libreria-header-sidebar',
			'description'   => esc_html__( 'Widgets added here will appear in the header more sidebar', 'libreria' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	for ( $col = 1; $col <= 4; $col++ ) {
		register_sidebar(
			array(
				'name'          => sprintf(
					/* translators: 1: Footer column number. */
					__( 'Footer Column %1$d', 'libreria' ),
					$col
				),
				'id'            => sprintf( 'libreria-footer-%d', $col ),
				'description'   => sprintf(
					/* translators: 1: Footer column number. */
					__( 'Widgets added here will appear inside %1$d of footer', 'libreria' ),
					$col
				),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'libreria_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since   1.0.0
 * @global int $content_width
 */
function libreria_content_width() {

	/**
	 * Filter for content width.
	 *
	 * @since   1.0.0
	 */
	$GLOBALS['content_width'] = apply_filters( 'libreria_content_width', 640 );
}
add_action( 'after_setup_theme', 'libreria_content_width', 0 );

/**
 * Get Google fonts.
 *
 * Generate Google fonts source link.
 *
 * @since   1.0.0
 * @return string
 */
function libreria_get_google_fonts() {

	$fonts = array(
		'Ubuntu:400,500,700',
		'Libre Baskerville:400,500,700'
	);

	$gfonts = add_query_arg(
		array(
			'family'  => rawurlencode( implode( '|', $fonts ) ),
			'subset'  => 'latin',
			'display' => 'swap',
		),
		'https://fonts.googleapis.com/css'
	);

	return $gfonts;
}

/**
 * Enqueue scripts and styles.
 *
 * @since   1.0.0
 */
function libreria_scripts() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'libreria-style', get_stylesheet_uri(), array(), LIBRERIA_VERSION );
	wp_style_add_data( 'libreria-style', 'rtl', 'replace' );

	wp_enqueue_script( 'libreria-navigation', get_template_directory_uri() . "/assets/js/navigation{$suffix}.js", array(), LIBRERIA_VERSION, true );

	wp_enqueue_script( 'libreria-js', get_template_directory_uri() . "/assets/js/libreria{$suffix}.js", array(), LIBRERIA_VERSION, true );

	wp_register_script( 'libreria-infinite-load', get_template_directory_uri() . "/assets/js/infinite-load{$suffix}.js", array( 'jquery' ), LIBRERIA_VERSION, true );

	/**
	 * Filter for infinite load params.
	 *
	 * @since   1.0.0
	 */
	wp_localize_script( 'libreria-infinite-load', 'libreriaInfiniteLoadParams', apply_filters( 'libreria_infinite_load_params', array() ) );

	wp_enqueue_script( 'libreria-infinite-load' );

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_script( 'libreria-woocommerce-js', get_template_directory_uri() . "/assets/js/woocommerce{$suffix}.js", array(), LIBRERIA_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Google font.
	wp_enqueue_style( 'libreria-google-font', libreria_get_google_fonts(), array(), LIBRERIA_VERSION, 'all' );
}

add_action( 'wp_enqueue_scripts', 'libreria_scripts' );

/**
 * Utils methods.
 *
 * @since   1.0.0
 */
require get_template_directory() . '/inc/class-libreria-utils.php';

/**
 * Structure.
 *
 * @since   1.0.0
 */
require get_template_directory() . '/inc/hooks.php';
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/content.php';
require get_template_directory() . '/inc/structure/footer.php';

/**
 * Breadcrumb trail file.
 *
 * @since   1.0.0
 */
require get_template_directory() . '/inc/class-libreria-breadcrumb-trail.php';
require get_template_directory() . '/inc/class-libreria-svg-icons.php';

/**
 * Custom template tags for this theme.
 *
 * @since   1.0.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @since   1.0.0
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load WooCommerce compatibility file.
 *
 * @since   1.0.0
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/class-libreria-woocommerce.php';
}

/**
 * Customizer additions.
 *
 * @since   1.0.0
 */
require get_template_directory() . '/inc/customizer/class-libreria-customizer.php';
require get_template_directory() . '/inc/class-libreria-dynamic-css.php';
