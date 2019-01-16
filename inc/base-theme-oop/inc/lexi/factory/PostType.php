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

class PostType {

	private $post_type_name;
	private $post_type_args;
	private $post_type_labels;
	private $helper;

	/**
	 * Construct a custom post type
	 *
	 * @param string $name Name of the custom post type
	 * @param array  $args Custom post type arguments
	 * @param array  $labels Custom post type labels
	 */
	public function __construct($name, $args = array(), $labels = array()) {

		$this->helper = new Helper();

		// Set some important variables
		$this->post_type_name = $this->helper->uglify_title($name);
		$this->post_type_args = $args;
		$this->post_type_labels = $labels;

		// Add action to register the post type, if the post type does not already exist
		if(!post_type_exists($this->post_type_name)) {
			add_action('init', array(&$this, 'register_post_type'));
		}
	}

	/**
	 * Register custom post type with WordPress
	 */
	public function register_post_type() {
		//Capitilize the words and make it plural
		$name = $this->helper->beautify_title($this->post_type_name);
		$plural = $this->helper->pluralize($name);

		$default_labels = array(
			'name' => $plural,
			'singular_name' => $name,
			'add_new' => sprintf(__('Add New %s', 'lexi'), $name),
			'add_new_item' => sprintf(__('Add New %s', 'lexi'), $name),
			'edit_item' => sprintf(__('Edit %s', 'lexi'), $name),
			'new_item' => sprintf(__('New %s', 'lexi'), $name),
			'all_items' => sprintf(__('All %s', 'lexi'), $plural),
			'view_item' => sprintf(__('View %s', 'lexi'), $name),
			'search_items' => sprintf(__('Search %s', 'lexi'), $plural),
			'not_found' => sprintf(__('No %s found', 'lexi'), $plural),
			'not_found_in_trash' => sprintf(__('No %s found in Trash', 'lexi'), $plural),
			'parent_item_colon' => '',
			'menu_name' => $plural
		);

		// We set the default labels based on the post type name and plural. We overwrite them with the given labels.
		$labels = array_merge($default_labels, $this->post_type_labels);

		$default_args =	array(
			'label' => $plural,
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
			'show_in_nav_menus' => true,
			'_builtin' => false,
		);

		// Same principle as the labels. We set some defaults and overwrite them with the given arguments.
		$args = array_merge($default_args, $this->post_type_args);

		// Register the post type
		register_post_type( $this->post_type_name, $args );
	}
}
