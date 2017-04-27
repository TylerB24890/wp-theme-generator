<?php
/**
 * Includes the Advanced Custom Fields plugin in the theme by default
 */

// Customize ACF Path
add_filter('acf/settings/path', 'elexicon_acf_settings_path');
function elexicon_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/inc/acf/';

    // return
    return $path;

}


// Customize ACF Directory
add_filter('acf/settings/dir', 'elexicon_acf_settings_dir');
function elexicon_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/inc/acf/';

    // return
    return $dir;

}

// Hide ACF field group menu item (set __return_false to hide)
add_filter('acf/settings/show_admin', '__return_true');

// Include ACF main file
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );
