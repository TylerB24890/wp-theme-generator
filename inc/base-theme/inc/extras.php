<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package elexicon
 * @subpackage elexicon/inc
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function elexicon_body_classes( $classes ) {
	// Checks if the user is visiting the site from a mobile device and adds a class accordingly
	if ( wp_is_mobile() ) {
		$classes[] = 'mobile';
	}

	return $classes;
}
add_filter( 'body_class', 'elexicon_body_classes' );
