<?php
/**
 * Lifestyle Blog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lifestyle_Blog_lite
 */

if ( ! defined( 'lifestyle_blog_lite_version' ) ) {
	// Replace the version number of the theme on each release.
	define( 'lifestyle_blog_lite_version', '1.0.0' );
}

if ( ! function_exists( 'lifestyle_blog_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lifestyle_blog_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on underscores.me, use a find and replace
	 * to change 'lifestyle-blog-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lifestyle-blog-lite', get_template_directory() . '/languages' );

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

	add_image_size('lifestyle-blog-widget', 90, 80, true);
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'lifestyle-blog-lite' ),
		'footer' => esc_html__( 'Footer Menu', 'lifestyle-blog-lite' ),
		'social' => esc_html__( 'Social Menu', 'lifestyle-blog-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lifestyle_blog_lite_custom_background_args', array(
		'default-color' => '000',
	) ) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 300,
		'height'      => 50,
		'flex-width'  => true,
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', lifestyle_blog_lite_fonts_url() ) );	

	// for woocommerce support
	add_theme_support( 'woocommerce' );
	
}
endif;
add_action( 'after_setup_theme', 'lifestyle_blog_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lifestyle_blog_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lifestyle_blog_lite_content_width', 1150 );
}
add_action( 'after_setup_theme', 'lifestyle_blog_lite_content_width', 0 );


/**
 * Register Google fonts.
 * @return string Google fonts URL for the theme.
 */
if ( ! function_exists( 'lifestyle_blog_lite_fonts_url' ) ) :
function lifestyle_blog_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'cyrillic,cyrillic-ext';
		
	// Translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. 
	if ( 'off' !== esc_html_x( 'on', 'Raleway font: on or off', 'lifestyle-blog-lite' ) ) {
		$fonts[] = 'Raleway:400,500,700';
	}	

	// Translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. 
	if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'lifestyle-blog-lite' ) ) {
		$fonts[] = 'Open Sans:400,600,700';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Enqueue styles and scripts
 */
function lifestyle_blog_lite_scripts() {

	// Add Font Awesome Icons. Unminified version included.
	wp_enqueue_style('fontAwesome', get_template_directory_uri() . '/assets/lib/fontawesome/css/fontawesome-all.min.css', array(), '5.15.2' );
		
	// Load our responsive stylesheet based on bootstrap.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.css', array( ), '5.0.1' );
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'lifestyle-blog-fonts', lifestyle_blog_lite_fonts_url(), array(), null );
	
	//light slider
	wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/assets/lib/lightslider/css/lightslider.min.css', array(),'1.1.3');

	// Load aos animation.
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/lib/aos/aos.css', array(), lifestyle_blog_lite_version );
	
	// Load our primary stylesheet
	wp_enqueue_style( 'lifestyle-blog-style', get_stylesheet_uri() );

	// Load demo one css
	wp_enqueue_style( 'lifestyle-demo-one', get_template_directory_uri() . '/css/demo_one.css', array( ), '1.0.0' );

	wp_enqueue_style( 'lifestyle-widget-one', get_template_directory_uri() . '/css/widget.css', array( ), '1.0.0' );

	//navigation
	wp_enqueue_script('lifestyle-blog-navigation-js', get_template_directory_uri() . '/js/navigation.js',array('jquery'),'1.0.0', true);

	//light slider 
	wp_enqueue_script('lightslider-js', get_template_directory_uri() . '/assets/lib/lightslider/js/lightslider.min.js',array('jquery'),'1.1.6', true);

	//aos animation
	wp_enqueue_script('aos-js', get_template_directory_uri() . '/assets/lib/aos/aos.js',array('jquery'),lifestyle_blog_lite_version, true);
	
	// Load our theme scripts
	wp_enqueue_script( 'lifestyle-blog-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151204', true );

	wp_localize_script( 'lifestyle-blog-navigation-js', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'lifestyle-blog-lite' ),
		'collapse' => __( 'collapse child menu', 'lifestyle-blog-lite' ),
	) );
	
	wp_enqueue_script( 'lifestyle-blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'lifestyle_blog_lite_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load our sidebars.
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * custom Hooks
 */
require get_template_directory() . '/inc/bz-hooks/hook_linker.php';

/**
 * custom Hooks
 */
require get_template_directory() . '/inc/widgets/widget-functions.php';

/** Theme info page */
require get_template_directory() . '/inc/themeinfo.php';

/*Theme Upsell link*/
require get_template_directory() . '/inc/blaze-upsells/blaze-pro-btn/class-customize.php';