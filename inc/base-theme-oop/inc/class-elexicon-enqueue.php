<?php

/**
 * {%THEME_NAME%} Theme style and script enqueue
 *
 * Loads in the required theme styles and scripts
 *
 * @author Elexicon, Inc.
 * @version 1.0.0
 */

if( !class_exists('{%THEME_CAP_SLUG%}_Enqueue')) :

	class {%THEME_CAP_SLUG%}_Enqueue {

		/**
		 * Run the WP action wp_enqueue_scripts to load in the necessary scripts and styles
		 *
		 * @return null
		 */
		public function {%THEME_PREFIX%}_enqueue_init() {
			add_action( 'wp_enqueue_scripts', array( $this, '{%THEME_PREFIX%}_enqueue_styles' ) );

			if (!is_admin()) {
				add_action("wp_enqueue_scripts", array($this, '{%THEME_PREFIX%}_enqueue_jquery'), 11);
				add_filter('script_loader_tag', array($this, '{%THEME_PREFIX%}_add_jquery_integrity'), 10, 2);
			}

			add_action( 'wp_enqueue_scripts', array( $this, '{%THEME_PREFIX%}_enqueue_scripts' ) );
		}

		/**
		 * Run the native WP function wp_enqueue_style() to enqueue theme styles
		 *
		 * @return null
		 */
		public function {%THEME_PREFIX%}_enqueue_styles() {
			// Enqueue stylesheets
			wp_enqueue_style( 'wp-styles', get_stylesheet_uri() );
			wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
			wp_enqueue_style( '{%THEME_PREFIX%}-style', get_template_directory_uri() . '/styles/style.css', array(), {%THEME_NAME%}::$theme_version );
		}

		/**
		 * Run the native WP function wp_enqueue_script() to enqueue theme scripts
		 *
		 * Also enqueues conditional IE scripts and localizes the {%THEME_PREFIX%} JS variables
		 *
		 * @return null
		 */
		public function {%THEME_PREFIX%}_enqueue_scripts() {
			// Bootstrap JS
			wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('jquery'), '3.3.7', true );

			// Custom theme script (use minified on production)
			$theme_script = ({%THEME_CONST%}_DEV ? '{%THEME_SLUG%}.js' : '{%THEME_SLUG%}.min.js');
			wp_enqueue_script( '{%THEME_PREFIX%}-js', get_template_directory_uri() . '/js/' . $theme_script, array('jquery'), {%THEME_NAME%}::$theme_version, true );

			// IE conditional scripts array
			$conditional_scripts = array(
				'html5shiv' => '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js',
				'respond' => '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js'
			);

			self::{%THEME_PREFIX%}_enqueue_conditional_scripts($conditional_scripts);
			self::{%THEME_PREFIX%}_localize_script();
		}

		/**
		 * Deregister jQuery and register new version
		 *
		 * @return null
		 */
		public function {%THEME_PREFIX%}_enqueue_jquery() {
			wp_deregister_script('jquery'); // Deregister WP default jQuery
			wp_register_script('jquery', '//code.jquery.com/jquery-2.2.4.min.js', false, null);
			wp_enqueue_script('jquery'); // Register jQuery
		}

		/**
		 * Add the jQuery 'integrity' attribute to the external CDN reference
		 *
		 * @return string - script inclusion modified
		 */
		public function {%THEME_PREFIX%}_add_jquery_integrity($tag, $handle) {
		    if ($handle != 'jquery')
		    return $tag;

		    return str_replace(' src', ' integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous" src', $tag);
		}

		/**
		 * Loops through the conditional scripts and places them between IE conditionals
		 *
		 * @param array $scripts Conditional scripts to be loaded with IE
		 * @return string $tag Markup containing IE conditionals
		 */
		private static function {%THEME_PREFIX%}_enqueue_conditional_scripts($scripts) {
			// Enqueue conditional scripts
			foreach($scripts as $handle => $src) {
				wp_enqueue_script($handle, $src, array('jquery'), '', false );
			}

			// Apply IE conditional tags to conditional scripts
			add_filter('script_loader_tag', function($tag, $handle) use ($scripts) {
				if(array_key_exists($handle, $scripts)) {
					$tag = "<!--[if lt IE 9]>$tag<![endif]-->";
				}
				return $tag;
			}, 10, 2);
		}

		/**
		 * Localize {%THEME_PREFIX%} JS variables
		 *
		 * @return null
		 */
		private static function {%THEME_PREFIX%}_localize_script() {
			// Localize the global admin-ajax URL
			// usage: {%THEME_PREFIX%}.ajaxurl;
			wp_localize_script(
				'{%THEME_PREFIX%}-js',
				'{%THEME_PREFIX%}',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' )
				)
			);
		}
	}

endif;
