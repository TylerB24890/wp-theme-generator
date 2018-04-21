<?php

/**
 * Custom post types for the {%THEME_NAME%} theme
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Core;

if( !class_exists('Lexi\Core\PostTypes') ) :

	class PostTypes {

		public function __construct() {
			//add_action( 'init', 'Lexi\\Core\\PostTypes::post_type_example' );
		}

		public static function post_type_example() {
			$labels = array(
	         	'name'               => _x( 'Examples', 'post type general name', \Lexi\Core\Helper::$theme_prefix ),
	         	'singular_name'      => _x( 'Example', 'post type singular name', \Lexi\Core\Helper::$theme_prefix ),
	         	'add_new'            => _x( 'Add New', 'product', \Lexi\Core\Helper::$theme_prefix ),
	         	'add_new_item'       => __( 'Add New Example', \Lexi\Core\Helper::$theme_prefix ),
	         	'edit_item'          => __( 'Edit Example', \Lexi\Core\Helper::$theme_prefix ),
	         	'new_item'           => __( 'New Example', \Lexi\Core\Helper::$theme_prefix ),
	         	'all_items'          => __( 'All Examples', \Lexi\Core\Helper::$theme_prefix ),
	         	'view_item'          => __( 'View Example', \Lexi\Core\Helper::$theme_prefix ),
	         	'search_items'       => __( 'Search Examples', \Lexi\Core\Helper::$theme_prefix ),
	         	'not_found'          => __( 'No products or services found', \Lexi\Core\Helper::$theme_prefix ),
	         	'not_found_in_trash' => __( 'No products or services found in the Trash', \Lexi\Core\Helper::$theme_prefix ),
	         	'parent_item_colon'  => '',
	         	'menu_name'          => __('Examples', \Lexi\Core\Helper::$theme_prefix)
	       	);
	       	$args = array(
	         	'labels'        => $labels,
	         	'description'   => __('Holds our example specific data', \Lexi\Core\Helper::$theme_prefix),
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

			register_post_type( 'example', $args );

			flush_rewrite_rules();
		}
	}
endif;
