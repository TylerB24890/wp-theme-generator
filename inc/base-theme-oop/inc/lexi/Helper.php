<?php

/**
 * Helper functions
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Core;

if( !class_exists('Lexi\Core\Helper') ) :

	class Helper {

		/**
		 * The Global Theme Name
		 * @var string
		 */
		public static $theme_name;

		/**
		 * Global theme slug
		 * @var string
		 */
		public static $theme_slug;

		/**
		 * Global theme prefix
		 * @var string
		 */
		public static $theme_prefix;

		/**
		 * Global theme version
		 * @var string
		 */
		public static $theme_version;

		/**
		 * The Theme "template-parts" directory
		 * @var string
		 */
		public static $parts;

		/**
		 * Icongr.am URL
		 * @var string
		 */
		public static $icons_url;

		public function __construct() {
			self::$theme_name = 'lexitheme';
			self::$theme_slug = 'lexi';
			self::$theme_prefix = 'lexi';
			self::$theme_version = '1.1.0';
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
		 * Truncate a string of text
		 * @param  string $string The string to truncate
		 * @param  int $limit	How many words are allowed in the string?
		 * @param  string $break  Character to break the string at
		 * @param  string $pad    Characters to place at the end of the string after chopped
		 * @return string        	The truncated string
		 */
		public static function truncate($string, $limit, $break=".", $pad="...") {
		  	// return with no change if string is shorter than $limit
		  	if(strlen($string) <= $limit) return $string;

		  	// is $break present between $limit and the end of the string?
		  	if(false !== ($breakpoint = strpos($string, $break, $limit))) {
		    	if($breakpoint < strlen($string) - 1) {
					$string = substr($string, 0, $breakpoint) . $pad;
				}
			}

			return $string;
		}

		/**
		 * Get a Template Part
		 * @param  string $dir File name or path to file
		 * @param  bool		$once Include once?
		 * @return null
		 */
		public static function get_partial($dir, $once = true) {
			if(strpos('.php', $dir) !== false) {
				$dir = preg_replace("/(.+)\.php$/", "$1", $dir);
			}

			if($once) {
				include_once(locate_template(self::$parts . $dir . '.php', true, false));
			} else {
				include(locate_template(self::$parts . $dir . '.php', true, false));
			}

			return;
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
		public static function make_url_link($message) {
			//Convert all urls to links
	    $message = preg_replace('#([\s|^])(www)#i', '$1http://$2', $message);
	    $pattern = '#((http|https|ftp|telnet|news|gopher|file|wais):\/\/[^\s]+)#i';
	    $replacement = '<a href="$1" target="_blank">$1</a>';
	    $message = preg_replace($pattern, $replacement, $message);

	    /* Convert all E-mail matches to appropriate HTML links */
	    $pattern = '#([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.';
	    $pattern .= '[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)#i';
	    $replacement = '<a href="mailto:\\1">\\1</a>';
	    $message = preg_replace($pattern, $replacement, $message);
	    return $message;
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
		public static function get_file_size($file) {
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

		/**
		 * Pluralize a string
		 * @param  string $string String to make plural
		 * @return string         Pluralized string
		 */
		public static function pluralize($string) {
			$last = $string[strlen($string) - 1];

			if($last == 'y') {
				$cut = substr($string, 0, -1);
				//convert y to ies
				$plural = $cut . 'ies';
			} else {
				// just attach an s
				$plural = $string . 's';
			}

			return $plural;
		}

		/**
		 * Format string for title display`
		 * @param  string $string String to format
		 * @return string         Formatted/Beautified string
		 */
		public static function beautify_title($string) {
			return ucwords(str_replace("_", " ", $string));
		}

		/**
		 * Format string for database saving
		 * @param  string $string String to format
		 * @return string         Database safe formatted string
		 */
		public static function uglify_title($string) {
			return strtolower(str_replace(' ', '_', $string));
		}

		/**
		 * General cURL request
		 * @param string $url		URL to send to the cURL request to
		 */
		public static function curl_request($url) {

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
			curl_setopt($ch, CURLOPT_FAILONERROR, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 15);
			if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4'))
				curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

			$cont = curl_exec($ch);

			if(curl_errno($ch)) {
				//die(curl_error($ch));
				$c_err['curl_message'] = curl_error($ch);
				$c_err['error'] = "0";
				return $c_err;
			}

			curl_close($ch);
			return $cont;
		}
	}

	new \Lexi\Core\Helper;
endif;
