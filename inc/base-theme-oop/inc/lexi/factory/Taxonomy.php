<?php

/**
* Custom taxonomies for the lexitheme theme
*
* @author Tyler Bailey <tylerb.media@gmail.com>
* @version 1.0.0
*/

namespace Lexi\Factory;

use \Lexi\Core\Helper;

if( !class_exists('Lexi\Factory\Taxonomy') ) :

	class Taxonomy {

		private $name;
		private $tax_name;
		private $post_type;
		private $args;
		private $labels;

		/**
		 * Create custom taxonomy
		 * @param string $name      Name of the taxonomy
		 * @param string $post_type Post type to attah the taxonomy to
		 * @param array  $args      Array of default WP taxonomy arguments
		 * @param array  $labels 		Array of WP taxonomy labels
		 *
		 * USAGE: new \Lexi\Factory\Taxonomy('Product Category', 'product')
		 *
		 * If the 'post_type' set is not registered with WP it will be created.
		 * $post_type CAN be an array of multiple post types.
		 *
		 * If taxonomy EXISTS it will be added to the specified post types
		 */
		public function __construct($name, $post_type = '', $args = array(), $labels = array()) {
			$this->name = $name;
			$this->post_type = $post_type;
			$this->args = $args;
			$this->labels = $labels;
			$this->tax_name = strtolower(str_replace(' ', '_', $this->name));

			if(empty($name) || empty($post_type))
				return;

			$this->create_missing_pt();

			if(!taxonomy_exists($this->tax_name)) {
				$this->create_taxonomy();
			} else {
				add_action('init', array(&$this, 'register_existing_tax'));
			}
		}

		/**
		 * Register an existing taxonomy with post type
		 */
		public function register_existing_tax() {
			if(is_array($this->post_type)) {
				foreach($this->post_type as $pt) {
					register_taxonomy_for_object_type($this->tax_name, $pt);
				}
			} else {
				register_taxonomy_for_object_type($this->tax_name, $this->post_type);
			}
		}

		/**
		 * If the post types supplied are not registered,
		 * we'll register them here
		 */
		private function create_missing_pt() {
			if(is_array($this->post_type)) {
				foreach($this->post_type as $pt) {
					if(!post_type_exists($pt)) {
						new PostType($pt);
					}
				}
			} elseif(!post_type_exists($this->post_type)) {
				new PostType($this->post_type);
			}

			return true;
		}

		/**
		 * Register the custom taxonomy with WP
		 */
		private function create_taxonomy() {
			//Capitilize the words and make it plural
			$name       = ucwords( str_replace( '_', ' ', $this->name ) );
			$plural     = $name . 's';

			$default_labels = array(
				'name'                  => _x( $plural, 'taxonomy general name', Helper::$theme_prefix),
				'singular_name'         => _x( $name, 'taxonomy singular name', Helper::$theme_prefix ),
				'search_items'          => __( 'Search ' . $plural, Helper::$theme_prefix ),
				'all_items'             => __( 'All ' . $plural, Helper::$theme_prefix ),
				'parent_item'           => __( 'Parent ' . $name, Helper::$theme_prefix ),
				'parent_item_colon'     => __( 'Parent ' . $name . ':', Helper::$theme_prefix ),
				'edit_item'             => __( 'Edit ' . $name, Helper::$theme_prefix ),
				'update_item'           => __( 'Update ' . $name, Helper::$theme_prefix ),
				'add_new_item'          => __( 'Add New ' . $name, Helper::$theme_prefix ),
				'new_item_name'         => __( 'New ' . $name . ' Name', Helper::$theme_prefix ),
				'menu_name'             => __( $name, Helper::$theme_prefix ),
			);

			// Default labels, overwrite them with the given labels.
			$labels = array_merge($default_labels, $this->labels);

			$default_args = array(
				'label'                 => $plural,
				'labels'                => $labels,
				'public'                => true,
				'show_ui'               => true,
				'show_in_nav_menus'     => true,
				'_builtin'              => false,
			);

			// Default arguments, overwritten with the given arguments
			$args = array_merge($default_args, $this->args);

			register_taxonomy( $this->tax_name, $this->post_type, $args );
		}
	}

endif;
