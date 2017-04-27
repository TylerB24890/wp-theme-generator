<?php

/**
 * This file holds a collection of miscellaneous functions for the Elexicon Base Theme
 */


 /**
  * Get URL to First Embedded Image
  */
if( ! function_exists('get_first_image') ) {
	function get_first_image() {
	   	global $post, $posts;
	   	$first_img = '';
	   	ob_start();
	   	ob_end_clean();
	   	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

		$first_img = $matches[1][0];

	   	return $first_img;
	}
}


/**
 * Get the Attachment ID for a given image URL.
 *
 * @param  string $url URL to retrieve the ID for
 * @return boolean|integer ID of supplied URL or False
 */
if ( ! function_exists( 'get_attachment_id_by_url' ) ) {
    function get_attachment_id_by_url( $url ) {
        global $wpdb;
		$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url ));
        return $attachment[0];
    }
}


/**
 * Truncate Text
 *
 * @param  string $string String to truncate
 * @param  int $limit  Max number of words in the return string
 * @param  string $break  The character of where to stop the return string
 * @param  string $pad  What to add to the end of the returned string
 * @return  string  Truncated string
 */
if( ! function_exists('elexicon_truncate') ) {
	function elexicon_truncate($string, $limit, $break=".", $pad="...") {
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
}
