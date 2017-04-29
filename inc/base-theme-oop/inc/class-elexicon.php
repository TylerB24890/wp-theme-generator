<?php

/**
 * {%THEME_NAME%} Theme initialization class
 *
 * Initial theme setup and functions
 *
 * @author Elexicon, Inc.
 * @version 1.0.0
 */

if( !class_exists('{%THEME_CAP_SLUG%}') ) :

	class {%THEME_CAP_SLUG%} {

		/**
		 * Global theme slug
		 */
		public static $theme_slug;

		/**
		 * Global theme prefix
		 */
		public static $theme_prefix;

		/**
		 * Global theme version
		 */
		public static $theme_version;

		/**
		 * Constructs the class variables
		 */
		public function __construct() {
			self::$theme_slug = '{%THEME_SLUG%}';
			self::$theme_prefix = '{%THEME_PREFIX%}';
			self::$theme_version = '1.1.0';
		}

		/**
		 * Runs the WP action 'after_setup_theme' to configure theme
		 * @return null
		 */
		public function {%THEME_PREFIX%}_theme_init() {
			add_action( 'after_setup_theme', array($this, '{%THEME_PREFIX%}_theme_setup') );
		}

		/**
		 * Loads the theme text domain
		 *
		 * Runs the additional theme setup functions
		 *
		 * @return null
		 */
		public function {%THEME_PREFIX%}_theme_setup() {

			// Load theme Text Domain
			load_theme_textdomain( '{%THEME_PREFIX%}', get_template_directory() . '/languages' );

			// Add WP theme support
			self::{%THEME_PREFIX%}_add_theme_support();
			// Register theme nav menus
			self::{%THEME_PREFIX%}_register_menus();
			// Remove the WP meta data from the <head> element
			self::{%THEME_PREFIX%}_remove_wp_head();
			// Enqueue styles and scripts
			self::{%THEME_PREFIX%}_theme_enqueue();
		}

		/**
		 * Runs the WP add_theme_support() function to add native WP features to the theme
		 *
		 * @return null
		 */
		private static function {%THEME_PREFIX%}_add_theme_support() {
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Let WP handle the title tag
			add_theme_support( 'title-tag' );

			// Add support for post thumbnails
			add_theme_support( 'post-thumbnails' );

			// HTML5 markup
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Post Formats
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
		}

		/**
		 * Registers the theme menus to be used for navigation
		 *
		 * @return null
		 */
		private static function {%THEME_PREFIX%}_register_menus() {
			// Register the nav menu locations
			register_nav_menus( array(
				'primary' => esc_html__( 'Primary', 'tymestrap' ),
				'secondary' => esc_html__( 'Secondary', 'tymestrap' ),
				'footer' => esc_html__( 'Footer', 'tymestrap' )
			) );
		}

		/**
		 * Removes unnecessary meta information from the wp_head()
		 *
		 * @return null
		 */
		private static function {%THEME_PREFIX%}_remove_wp_head() {
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

		/**
		 * Loads in the {%THEME_CONST%}_Enqueue object and enqueues the theme scripts and stylesheets
		 *
		 * @return null
		 */
		public static function {%THEME_PREFIX%}_theme_enqueue() {
			include_once(get_template_directory() . '/inc/class-{%THEME_SLUG%}-enqueue.php');

			${%THEME_PREFIX%}_enqueue = new {%THEME_NAME%}_Enqueue();
			${%THEME_PREFIX%}_enqueue->{%THEME_PREFIX%}_enqueue_init();
		}

		/**
		 * Loads the required files for the {%THEME_NAME%} theme to function
		 *
		 * @return null
		 */
		public function {%THEME_PREFIX%}_theme_functions() {
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-custom-admin.php');
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-customizer.php');
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-post-types.php');
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-taxonomies.php');
			include_once(get_template_directory() . '/inc/bootstrap-nav-walker.php');
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-helper.php');
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-pagination.php');
		}
	}

endif;
