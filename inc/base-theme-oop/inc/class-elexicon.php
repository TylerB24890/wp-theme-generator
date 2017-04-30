<?php

/**
 * {%THEME_NAME%} Theme initialization class
 *
 * Initial theme setup and functions
 *
 * @author Elexicon, Inc.
 * @version 1.0.0
 */

if( !class_exists('{%THEME_CLASS_NAMES%}') ) :

	class {%THEME_CLASS_NAMES%} {

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
		 * Loads the required files for the {%THEME_NAME%} theme to function
		 *
		 * @return null
		 */
		public function theme_functions() {
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-customizer.php');
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-post-types.php');
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-taxonomies.php');
			include_once(get_template_directory() . '/inc/bootstrap-nav-walker.php');
			include_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}-helper.php');
		}
	}

endif;
