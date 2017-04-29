<?php

/**
 * WP Customizer Class
 *
 * @author Elexicon, Inc.
 * @version 1.0.0
 */

if( !class_exists('{%THEME_CAP_SLUG%}_Customizer') ) :

	class {%THEME_CAP_SLUG%}_Customizer {

		/**
		 * Initializes the theme customizer functions
		 */
		public function __construct() {
			add_action( 'customize_register', '{%THEME_NAME%}_Customizer::{%THEME_PREFIX%}_customize_register' );
			add_action( 'customize_preview_init', '{%THEME_NAME%}_Customizer::{%THEME_PREFIX%}_customize_preview_js' );
		}

		/**
		 * Registers the theme customizer settings
		 *
		 * @param object $wp_customize WP Customizer Object
		 * @return null
		 */
		public static function {%THEME_PREFIX%}_customize_register( $wp_customize ) {
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 *
		 * @return null
		 */
		public static function {%THEME_PREFIX%}_customize_preview_js() {
			wp_enqueue_script( '{%THEME_PREFIX%}_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), {%THEME_NAME%}::$theme_version, true );
		}
	}

	new {%THEME_CAP_SLUG%}_Customizer();
endif;
