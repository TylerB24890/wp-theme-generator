<?php

/**
 * Holds all custom post types for the {%THEME_PREFIX%} theme
 *
 * @package {%THEME_SLUG%}
 * @subpackage {%THEME_SLUG%}/inc
 */

 /**
  * Custom Post Type Generation
  *
  * Duplicate this function per post type
  */
 function {%THEME_PREFIX%}_custom_posttype() {
	 $labels = array(
      	'name'               => _x( 'Products', 'post type general name' ),
      	'singular_name'      => _x( 'Product', 'post type singular name' ),
      	'add_new'            => _x( 'Add New', 'product' ),
      	'add_new_item'       => __( 'Add New Product/Service' ),
      	'edit_item'          => __( 'Edit Product/Service' ),
      	'new_item'           => __( 'New Product/Service' ),
      	'all_items'          => __( 'All Products/Services' ),
      	'view_item'          => __( 'View Product/Service' ),
      	'search_items'       => __( 'Search Products/Services' ),
      	'not_found'          => __( 'No products or services found' ),
      	'not_found_in_trash' => __( 'No products or services found in the Trash' ),
      	'parent_item_colon'  => '',
      	'menu_name'          => 'Products & Services'
    	);
    	$args = array(
      	'labels'        => $labels,
      	'description'   => 'Holds our products and product specific data',
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
//add_action( 'init', '{%THEME_PREFIX%}_custom_posttype' );
