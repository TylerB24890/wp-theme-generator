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

// Load the theme initialization class
require_once(get_template_directory() . '/inc/class-{%THEME_FILE_NAME%}.php');

${%THEME_PREFIX%} = new {%THEME_CAP_SLUG%}();

// Init the theme setup
${%THEME_PREFIX%}->{%THEME_PREFIX%}_theme_init();

// Load the theme functions
${%THEME_PREFIX%}->{%THEME_PREFIX%}_theme_functions();
