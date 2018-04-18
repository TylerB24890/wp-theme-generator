<?php

/**
 * Helper functions
 *
 * @author Elexicon, Inc.
 * @version 1.0.0
 */

namespace Elexicon;

if( !class_exists('Elexicon\Helper') ) :

	class Helper {

		public static $parts, $icons_url;

		public function __construct() {
			self::$parts = 'template-parts/';
			self::$icons_url = '//icongr.am/';
		}

		/**
		 * Return an image element with an icon from icongr.am
		 * @param  string  $lib   The icon library (clarity, entypo, feather, fontawesome, material, octicons, simple)
		 * @param  string  $icon  The icon name
		 * @param  integer $size  The size of the icon in pixels (default 24)
		 * @param  string  $color Color of the icon to render
		 * @return string         HTML image element
		 */
		public static function icongram_icon($lib, $icon, $size = 24, $color = 'FFFFFF', $echo = true) {
			if($echo) {
				echo '<img src="' . self::$icons_url . $lib . '/' . $icon . '.svg?size=' . $size . '&color=' . $color . '" />';
			} else {
				return '<img src="' . self::$icons_url . $lib . '/' . $icon . '.svg?size=' . $size . '&color=' . $color . '" />';
			}
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

		/**
		 * Make URL string a clickable link
		 * @param  string $text Link text to parse
		 * @return string       Clickable link markup
		 */
		public static function make_url_link($text) {
		  // The Regular Expression filter
		  $regex_url = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

		  // Check if there is a url in the text
		  if(preg_match($regex_url, $text, $url)) {
		    // make the urls hyper links
		    return preg_replace($regex_url, "<a target='_blank' href=" . $url[0] . ">" . $url[0] . "</a> ", $text);

		  } else {

		    // if no urls in the text just return the text
		    return $text;

		  }
		}

		/**
		 * Count the number of returned search results
		 * @return string Number of returned results
		 */
		public static function search_results_count() {
		  if( is_search() ) {

		    global $wp_query;

		    if( $wp_query->found_posts == 1 ) {
		      $result_count= '1 Result';
		    } else {
		      $result_count = $wp_query->found_posts.' Results';
		    }

		    return $result_count;

		  }
		}

		/**
		 * Get the Attachment ID for a given image URL.
		 *
		 * @link   http://wordpress.stackexchange.com/a/7094
		 * @param  string $url
		 * @return boolean|integer
		 */
		 public static function get_attachment_id_by_url( $url ) {
			 	$attachment_id = 0;
				$file = basename( $url );
				$query_args = array(
					'post_type'   => 'attachment',
					'post_status' => 'inherit',
					'fields'      => 'ids',
					'meta_query'  => array(
						array(
							'value'   => $file,
							'compare' => 'LIKE',
							'key'     => '_wp_attachment_metadata',
						),
					)
				);
				$query = new WP_Query( $query_args );
				if ( $query->have_posts() ) {
					foreach ( $query->posts as $post_id ) {
						$meta = wp_get_attachment_metadata( $post_id );
						$original_file       = basename( $meta['file'] );
						$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
						if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
							$attachment_id = $post_id;
							break;
						}
					}
				}
			 	return $attachment_id;
 		}

		/**
		 * Get the size of a file
		 * @param  string $file Directory to the file
		 * @return string       Size of the file
		 */
		public static function get_file_size($file){
		  $bytes = filesize($file);
		  $s = array('B', 'KB', 'MB', 'GB');
		  $e = floor(log($bytes)/log(1024));
		  return sprintf('%.2f '.$s[$e], ($bytes/pow(1024, floor($e))));
		}

		/**
		 * Convert an image to SVG code
		 * @param  string $url URL of image to convert
		 * @return string      SVG code of the converted image
		 */
		public static function get_svg_code($url) {
		  $svg_code = file_get_contents($url, FILE_USE_INCLUDE_PATH);
		  return $svg_code;
		}
	}
endif;
