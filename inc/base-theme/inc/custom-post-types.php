<?php

/**
 * Holds all custom post types for the {%THEME_PREFIX%} theme
 *
 * @package {%THEME_SLUG%}
 * @subpackage {%THEME_SLUG%}/inc
 */

 /**
  * EXAMPLE CUSTOM POST TYPE
  */
 function custom_posttype() {
	 $labels = array(
      	'name'               => _x( 'Products', 'post type general name', '{%THEME_PREFIX%}' ),
      	'singular_name'      => _x( 'Product', 'post type singular name', '{%THEME_PREFIX%}' ),
      	'add_new'            => _x( 'Add New', 'product', '{%THEME_PREFIX%}' ),
      	'add_new_item'       => __( 'Add New Product/Service', '{%THEME_PREFIX%}' ),
      	'edit_item'          => __( 'Edit Product/Service', '{%THEME_PREFIX%}' ),
      	'new_item'           => __( 'New Product/Service', '{%THEME_PREFIX%}' ),
      	'all_items'          => __( 'All Products/Services', '{%THEME_PREFIX%}' ),
      	'view_item'          => __( 'View Product/Service', '{%THEME_PREFIX%}' ),
      	'search_items'       => __( 'Search Products/Services', '{%THEME_PREFIX%}' ),
      	'not_found'          => __( 'No products or services found', '{%THEME_PREFIX%}' ),
      	'not_found_in_trash' => __( 'No products or services found in the Trash', '{%THEME_PREFIX%}' ),
      	'parent_item_colon'  => '',
      	'menu_name'          => __('Products & Services', '{%THEME_PREFIX%}')
    	);
    	$args = array(
      	'labels'        => $labels,
      	'description'   => __('Holds our products and product specific data', '{%THEME_PREFIX%}'),
      	'public'        => true,
      	'menu_position' => 5,
      	'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'revisions'),
        'taxonomies'    => array(),
      	'has_archive'   => false,
         'rewrite'       => array(
             'slug'      => '',
             'with_front' => false
         )
	 );
    register_post_type( 'product', $args );

    flush_rewrite_rules();
}
//add_action( 'init', 'custom_posttype' );
