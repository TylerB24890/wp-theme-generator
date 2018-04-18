<?php

/**
 * Custom post types for the {%THEME_NAME%} theme
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Elexicon;

if( !class_exists('Elexicon\PostTypes') ) :

	class PostTypes {

		public function __construct() {
			//add_action( 'init', 'Elexicon\\PostTypes::post_type_example' );
		}

		public static function post_type_example() {
			$labels = array(
	         	'name'               => _x( 'Examples', 'post type general name', '{%THEME_PREFIX%}' ),
	         	'singular_name'      => _x( 'Example', 'post type singular name', '{%THEME_PREFIX%}' ),
	         	'add_new'            => _x( 'Add New', 'product', '{%THEME_PREFIX%}' ),
	         	'add_new_item'       => __( 'Add New Example', '{%THEME_PREFIX%}' ),
	         	'edit_item'          => __( 'Edit Example', '{%THEME_PREFIX%}' ),
	         	'new_item'           => __( 'New Example', '{%THEME_PREFIX%}' ),
	         	'all_items'          => __( 'All Examples', '{%THEME_PREFIX%}' ),
	         	'view_item'          => __( 'View Example', '{%THEME_PREFIX%}' ),
	         	'search_items'       => __( 'Search Examples', '{%THEME_PREFIX%}' ),
	         	'not_found'          => __( 'No products or services found', '{%THEME_PREFIX%}' ),
	         	'not_found_in_trash' => __( 'No products or services found in the Trash', '{%THEME_PREFIX%}' ),
	         	'parent_item_colon'  => '',
	         	'menu_name'          => __('Examples', '{%THEME_PREFIX%}')
	       	);
	       	$args = array(
	         	'labels'        => $labels,
	         	'description'   => __('Holds our example specific data', '{%THEME_PREFIX%}'),
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
