<?php

/**
* Custom Sidebar(Widget Area) Generator
*
* @author Tyler Bailey <tylerb.media@gmail.com>
* @version 1.0.0
*
* USAGE: new \Lexi\Factory\Sidebar('Sidebar Name');
* RENDER: dynamic_sidebar('sidebar_name');
*/

namespace Lexi\Factory;

use \Lexi\Core\Helper;

if( !class_exists('Lexi\Factory\Sidebar') ) :

	class Sidebar {

    private $sidebar_name;
    private $sidebar_id;
    private $sidebar_args;

		/**
		 * Construct a custom post type
		 * @param string $name Name of the custom post type
		 * @param array  $args Custom post type arguments
		 */
		public function __construct($name, $args = array()) {

      $this->sidebar_name = Helper::beautify_title($name);
      $this->sidebar_id = Helper::uglify_title($this->sidebar_name);
      $this->sidebar_args = $args;

      add_action('widgets_init', array(&$this, 'create_sidebar'));
		}

    /**
     * Register sidebar(widget area) with WP.
     */
    public function create_sidebar() {
      $default_args = array(
        'name' => $this->sidebar_name,
        'id' => $this->sidebar_id,
        'before_widget' => '<div class="widget-area">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
      );

      $args = array_merge($default_args, $this->sidebar_args);

      register_sidebar($args);
    }
	}
endif;
