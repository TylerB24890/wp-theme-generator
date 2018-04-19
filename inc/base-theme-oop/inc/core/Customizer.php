<?php

/**
 * WP Customizer Class
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Elexicon;

if( !class_exists('Elexicon\Customizer') ) :

	class Customizer {

		/**
		 * Registers the theme customizer settings
		 *
		 * @param object $wp_customize WP Customizer Object
		 * @return null
		 */
		public static function customize_register( $wp_customize ) {
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 *
		 * @return null
		 */
		public static function customize_preview_js() {
			wp_enqueue_script( 'customizer', get_template_directory_uri() . '/dist/js/customizer.js', array( 'customize-preview' ), \Elexicon\Helper::$theme_version, true );
		}
	}
endif;
