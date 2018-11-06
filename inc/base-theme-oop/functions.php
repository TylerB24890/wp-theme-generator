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
  define('LEXI_DEV', true);
}

define('LEXI_DIR', __DIR__ . '/inc/lexi/');
define('{%THEME_CONST%}_DIR', __DIR__);
define('{%THEME_CONST%}_URL', get_template_directory_uri());

// Load the theme initialization class
require_once({%THEME_CONST%}_DIR . '/vendor/autoload.php');
${%THEME_PREFIX%} = new \Lexi\Core\ThemeInit;
