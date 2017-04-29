<?php
/**
 * {%THEME_SLUG%} Theme Customizer.
 *
 * @package {%THEME_SLUG%}
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function {%THEME_PREFIX%}_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', '{%THEME_PREFIX%}_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function {%THEME_PREFIX%}_customize_preview_js() {
	wp_enqueue_script( '{%THEME_PREFIX%}_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', '{%THEME_PREFIX%}_customize_preview_js' );
