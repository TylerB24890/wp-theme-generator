<?php

/**
 * Helper functions
 *
 * @author Elexicon, Inc.
 * @version 1.0.0
 */

if( !class_exists('{%THEME_CLASS_NAMES%}_Helper') ) :

	class {%THEME_CLASS_NAMES%}_Helper {

		public static $parts;

		public function __construct() {
			self::$parts = 'template-parts/';
		}

		/**
		 * Truncates string to specified length.
		 *
		 * @param string $string string to truncate
		 * @param int $length length to cut string
		 * @param string $etc what to place after the string
		 * @param bool $break_words break words?
		 * @param bool $middle middle of sentence?
		 * @return string
		 */
		public static function truncate($string, $length = 80, $etc = '&#133;', $break_words = false, $middle = false) {
		    if ($length == 0)
		        return '';

		    if (strlen($string) > $length) {
		        $length -= min($length, strlen($etc));
		        if (!$break_words && !$middle) {
		            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
		        }
		        if(!$middle) {
		            return substr($string, 0, $length) . $etc;
		        } else {
		            return substr($string, 0, $length/2) . $etc . substr($string, -$length/2);
		        }
		    } else {
		        return $string;
		    }
		}

		/**
		* Determines if the current page is a child/subpage of another
		*
		* @param  string  $parent the parent page ID, Title or Slug
		* @return boolean  page is or is not a child page
		*/
		public static function is_child( $parent = '' ) {
		     global $post;

		     $parent_obj = get_page( $post->post_parent, ARRAY_A );
		     $parent = (string) $parent;
		     $parent_array = (array) $parent;

		     if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
		          return true;
		     } elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
		          return true;
		     } elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
		          return true;
		     } else {
		          return false;
		     }
		}

		/**
		* Find all subpages for page
		*
		* @param int $id
		* @return array
		*/
		public static function get_subpages($id) {

		     $args = array(
		          'post_type'         => 'page',
		          'orderby'           => 'menu_order',
		          'order'             => 'ASC',
		          'posts_per_page'    => -1,
		          'post_parent'       => (int) $id,
		     );

		     $query = new WP_Query($args);

		     $entries = array();

		     while($query->have_posts()) {
		          $query->the_post();

		          $entry = array(
		               'id' => get_the_ID(),
		               'title' => get_the_title(),
		               'link' => get_permalink(),
		               'content' => get_the_content(),
		          );
		          $entries[] = $entry;
		     }

		     wp_reset_query();
		     return $entries;
		}

		/**
		 * Strips all images from a post
		 *
		 * @param string $content
		 * @return string
		 */
		public static function remove_images($content = null) {
		    if (!$content) {
		        $content = get_the_content();
		    }
		    $content = trim(preg_replace('~(<a[^>]+>)?\s*(<img[^>]+>)\s*(</a>)?~sim', '', $content));
		    return $content;
		}
	}

	new {%THEME_CLASS_NAMES%}_Helper();
endif;
