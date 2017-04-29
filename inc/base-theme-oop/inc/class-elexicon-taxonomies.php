<?php

/**
 * Custom taxonomies for the {%THEME_NAME%} theme
 *
 * @author Elexicon, Inc.
 * @version 1.0.0
 */

if( !class_exists('{%THEME_CAP_SLUG%}_Taxonomies') ) :

	class {%THEME_CAP_SLUG%}_Taxonomies {

		/**
		 * Initializes the custom taxonomies
		 */
		public function __construct() {
			add_action( 'init', '{%THEME_NAME%}_Taxonomies::{%THEME_PREFIX%}_taxonomies', 0 );
		}

		/**
		 * Custom taxonomy registration
		 *
		 * Duplicate the 'register_taxonomy()' function and replace with your own parameters
		 *
		 * @return null
		 */
		public static function {%THEME_PREFIX%}_taxonomies() {
			// Add new "Types" taxonomy to Posts
		    register_taxonomy('custom-taxonomy-name', 'post', array(
		        // Hierarchical taxonomy (like categories)
		        'hierarchical' => true,
		        // This array of options controls the labels displayed in the WordPress Admin UI
		        'labels' => array(
		            'name' => _x( 'Taxonomy Name', 'taxonomy general name', '{%THEME_PREFIX%}'),
		            'singular_name' => _x( 'Taxonomy Name', 'taxonomy singular name', '{%THEME_PREFIX%}'),
		            'search_items' =>  __( 'Search Product & Services Categories', '{%THEME_PREFIX%}' ),
		            'all_items' => __( 'All Product & Services Categories', '{%THEME_PREFIX%}' ),
		            'parent_item' => __( 'Parent Taxonomy Name', '{%THEME_PREFIX%}' ),
		            'parent_item_colon' => __( 'Parent Taxonomy Name:', '{%THEME_PREFIX%}' ),
		            'edit_item' => __( 'Edit Taxonomy Name', '{%THEME_PREFIX%}' ),
		            'update_item' => __( 'Update Taxonomy Name', '{%THEME_PREFIX%}' ),
		            'add_new_item' => __( 'Add New Taxonomy Name', '{%THEME_PREFIX%}' ),
		            'new_item_name' => __( 'New Taxonomy Name Name', '{%THEME_PREFIX%}' ),
		            'menu_name' => __( 'Product & Service Categories', '{%THEME_PREFIX%}' ),
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

	new {%THEME_CAP_SLUG%}_Taxonomies();
endif;
