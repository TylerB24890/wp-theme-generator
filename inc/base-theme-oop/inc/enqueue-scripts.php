<?php

/**
* Enqueue all styles and scripts for the {%THEME_PREFIX%} theme
*
* @package	{%THEME_PREFIX%}
* @subpackage {%THEME_SLUG%}/inc
*/


// The main style/script enqueue
function {%THEME_PREFIX%}_scripts() {

  // Stylesheets
  wp_enqueue_style( 'wp-styles', get_stylesheet_uri() );
  wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

  $theme_style = ({%THEME_CONST%}_DEV ? 'style.css' : 'style.min.css');
  wp_enqueue_style( '{%THEME_SLUG%}-style', get_template_directory_uri() . '/dist/styles/' . $theme_style );

  if ( !is_admin() ) wp_deregister_script('jquery');

  wp_enqueue_script( '{%THEME_SLUG%}-js', get_template_directory_uri() . '/dist/js/bundle.js', array(), '1.0.0', true );

  // Localize scripts
  {%THEME_PREFIX%}_localize_script();
}
add_action( 'wp_enqueue_scripts', '{%THEME_PREFIX%}_scripts' );


/**
* Localize Javascript variables
* @link https://codex.wordpress.org/Function_Reference/wp_localize_script
*/
function {%THEME_PREFIX%}_localize_script() {

  global $post;

  $cur_page = $post->post_name;

  if(is_archive()) {
    $cur_page = get_post_type();
  }
  // Localize the global admin-ajax URL
  // usage: {%THEME_PREFIX%}.ajaxurl;
  wp_localize_script(
    '{%THEME_SLUG%}-js',
    '{%THEME_PREFIX%}',
    array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'isMobile' => (wp_is_mobile() ? true : false),
      'curPage' => $cur_page,
      'isHome' => (is_home() || is_front_page() ? true : false),
      'isSingle' => (is_single() ? true : false),
    )
  );
}
?>
