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
    define('{%THEME_CONST%}_DEV', true);
} else {
	define('{%THEME_CONST%}_DEV', false);
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
		'primary' => esc_html__( 'Primary', '{%THEME_PREFIX%}'),
		'secondary' => esc_html__( 'Secondary', '{%THEME_PREFIX%}'),
		'footer' => esc_html__( 'Footer', '{%THEME_PREFIX%}')
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
	add_theme_support( 'custom-background', apply_filters( 'custom_background_args', array(
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

// Register the nav menu locations
register_nav_menus( array(
	'primary' => esc_html__( 'Primary', '{%THEME_PREFIX%}'),
	'secondary' => esc_html__( 'Secondary', '{%THEME_PREFIX%}'),
	'footer' => esc_html__( 'Footer', '{%THEME_PREFIX%}')
) );

// Enqueue scripts
include_once(get_template_directory() . '/inc/enqueue-scripts.php');

// Load the theme initialization class
require_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}.php');
${%THEME_PREFIX%} = new {%THEME_CLASS_NAMES%}();
// Load the theme functions
${%THEME_PREFIX%}->theme_functions();

// Load Pagination file
include_once(get_template_directory() . '/inc/pagination.php');

/**
 * Extend search to include custom fields
 * @param  string $join original search query
 * @return string New search query
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );
