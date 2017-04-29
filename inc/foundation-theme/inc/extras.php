<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package {%THEME_SLUG%}
 * @subpackage {%THEME_SLUG%}/inc
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function {%THEME_PREFIX%}_body_classes( $classes ) {
	// Checks if the user is visiting the site from a mobile device and adds a class accordingly
	if ( wp_is_mobile() ) {
		$classes[] = 'mobile';
	}

	// Adds the post slug to the body class on single posts
	if( is_single() ) {
		global $post;
		$classes[] = $post->post_name;
	}

	return $classes;
}
add_filter( 'body_class', '{%THEME_PREFIX%}_body_classes' );
