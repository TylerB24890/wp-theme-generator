<?php

/**
 * Custom taxonomies for the {%THEME_NAME%} theme
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Core;

if( !class_exists('Lexi\Core\Taxonomies') ) :

	class Taxonomies {

		/**
		 * Initializes the custom taxonomies
		 */
		public function __construct() {
			//add_action( 'init', 'Lexi\\Core\\Taxonomies::taxonomies', 0 );
		}

		/**
		 * Custom taxonomy registration
		 *
		 * Duplicate the 'register_taxonomy()' function and replace with your own parameters
		 *
		 * @return null
		 */
		public static function taxonomies() {
			// Add new "Types" taxonomy to Posts
		    register_taxonomy('custom-taxonomy-name', 'post', array(
		        // Hierarchical taxonomy (like categories)
		        'hierarchical' => true,
		        // This array of options controls the labels displayed in the WordPress Admin UI
		        'labels' => array(
		            'name' => _x( 'Taxonomy Name', 'taxonomy general name', \Lexi\Core\Helper::$theme_prefix),
		            'singular_name' => _x( 'Taxonomy Name', 'taxonomy singular name', \Lexi\Core\Helper::$theme_prefix),
		            'search_items' =>  __( 'Search Product & Services Categories', \Lexi\Core\Helper::$theme_prefix ),
		            'all_items' => __( 'All Product & Services Categories', \Lexi\Core\Helper::$theme_prefix ),
		            'parent_item' => __( 'Parent Taxonomy Name', \Lexi\Core\Helper::$theme_prefix ),
		            'parent_item_colon' => __( 'Parent Taxonomy Name:', \Lexi\Core\Helper::$theme_prefix ),
		            'edit_item' => __( 'Edit Taxonomy Name', \Lexi\Core\Helper::$theme_prefix ),
		            'update_item' => __( 'Update Taxonomy Name', \Lexi\Core\Helper::$theme_prefix ),
		            'add_new_item' => __( 'Add New Taxonomy Name', \Lexi\Core\Helper::$theme_prefix ),
		            'new_item_name' => __( 'New Taxonomy Name Name', \Lexi\Core\Helper::$theme_prefix ),
		            'menu_name' => __( 'Product & Service Categories', \Lexi\Core\Helper::$theme_prefix ),
		        ),
		        // Control the slugs used for this taxonomy
		        'rewrite' => array(
		            'slug' => 'taxonomy-slug', // This controls the base slug that will display before each term
		            'with_front' => false, // Don't display the Taxonomy Name base before "/Types/"
		            'hierarchical' => true // This will allow URL's like "/Types/boston/cambridge/"
		        ),
		    ));

			flush_rewrite_rules();
		}
	}
endif;
