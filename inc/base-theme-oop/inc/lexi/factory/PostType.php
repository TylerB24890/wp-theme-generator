<?php

/**
* Custom Post Type Generator
*
* @author Tyler Bailey <tylerb.media@gmail.com>
* @version 1.0.0
*
* USAGE:
* $cpt = new \Lexi\Factory\PostTypes('Post Type Name');
*/

namespace Lexi\Factory;

use \Lexi\Core\Helper;

if( !class_exists('Lexi\Factory\PostType') ) :

	class PostType {

		private $post_type_name;
		private $post_type_args;
		private $post_type_labels;

		/**
		 * Construct a custom post type
		 * @param string $name Name of the custom post type
		 * @param array  $args Custom post type arguments
		 * @param array  $labels Custom post type labels
		 */
		public function __construct($name, $args = array(), $labels = array()) {

			// Set some important variables
			$this->post_type_name = strtolower(str_replace( ' ', '_', $name ));
			$this->post_type_args = $args;
			$this->post_type_labels = $labels;

			// Add action to register the post type, if the post type does not already exist
			if(!post_type_exists( $this->post_type_name)) {
				add_action( 'init', array( &$this, 'register_post_type' ) );
			}
		}

		/**
		 * Register custom post type with WordPress
		 */
		public function register_post_type() {
			//Capitilize the words and make it plural
			$name = ucwords( str_replace( '_', ' ', $this->post_type_name ) );
			$plural  = $name . 's';

			$default_labels = array(
				'name'                  => _x( $plural, 'post type general name', Helper::$theme_prefix ),
				'singular_name'         => _x( $name, 'post type singular name', Helper::$theme_prefix ),
				'add_new'               => _x( 'Add New', strtolower( $name ), Helper::$theme_prefix ),
				'add_new_item'          => __( 'Add New ' . $name, Helper::$theme_prefix ),
				'edit_item'             => __( 'Edit ' . $name, Helper::$theme_prefix ),
				'new_item'              => __( 'New ' . $name, Helper::$theme_prefix ),
				'all_items'             => __( 'All ' . $plural, Helper::$theme_prefix ),
				'view_item'             => __( 'View ' . $name, Helper::$theme_prefix ),
				'search_items'          => __( 'Search ' . $plural, Helper::$theme_prefix ),
				'not_found'             => __( 'No ' . strtolower( $plural ) . ' found', Helper::$theme_prefix),
				'not_found_in_trash'    => __( 'No ' . strtolower( $plural ) . ' found in Trash', Helper::$theme_prefix),
				'parent_item_colon'     => '',
				'menu_name'             => $plural
			);

			// We set the default labels based on the post type name and plural. We overwrite them with the given labels.
			$labels = array_merge($default_labels, $this->post_type_labels);

			$default_args =	array(
				'label'                 => $plural,
				'labels'                => $labels,
				'public'                => true,
				'show_ui'               => true,
				'supports'              => array( 'title', 'editor' ),
				'show_in_nav_menus'     => true,
				'_builtin'              => false,
			);

			// Same principle as the labels. We set some defaults and overwrite them with the given arguments.
			$args = array_merge($default_args, $this->post_type_args);

			// Register the post type
			register_post_type( $this->post_type_name, $args );
		}
	}
endif;
