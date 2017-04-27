<?php
/**
 * {%THEME_SLUG%} functions and definitions.
 *
 * @package {%THEME_SLUG%}
 */

 $whitelist = array(
     '127.0.0.1',
     '::1'
 );

if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    define('{%THEME_PREFIX%}_DEV', true);
} else {
	define('{%THEME_PREFIX%}_DEV', false);
}


if ( ! function_exists( '{%THEME_PREFIX%}_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function {%THEME_PREFIX%}_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on {%THEME_PREFIX%}, use a find and replace
	 * to change '{%THEME_PREFIX%}' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( '{%THEME_PREFIX%}', get_template_directory() . '/languages' );

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
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'tymestrap' ),
		'secondary' => esc_html__( 'Secondary', 'tymestrap' ),
		'footer' => esc_html__( 'Footer', 'tymestrap' )
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

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '{%THEME_PREFIX%}_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Remove unnecessary elements from header
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
}
endif;
add_action( 'after_setup_theme', '{%THEME_PREFIX%}_setup' );

/**
 * Script/Stylesheet Enqueue
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Custom Taxonomies
 */
require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * ACF Include
 */
require get_template_directory() . '/inc/acf-include.php';

/**
 * Nav Walker
 */
require get_template_directory() . '/inc/bootstrap-nav-walker.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Misc. helper functions
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
