<?php

/**
 * Lexi Shares shortcode
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Shortcodes;

use \Lexi\ShareCount\Counts;

if( !class_exists('\Lexi\Shortcodes\Shares') ) :

	class Shares {

    /**
     * Render a responsive iframe from a link
     * @param  array $atts   Shortcode attributes
     * @return string        HTML Markup for iframe
     *
     * Usage: [sharecount] || [sharecount url="https://theurlhere.com"]
     */
		public static function sharecount_shortcode($atts) {
			$atts = shortcode_atts(array(
				"url" => get_the_permalink(),
				"echo" => false
			), $atts, 'sharecount');

			$counts = new Counts();

			if($atts['echo']) {
				echo $counts->total_shares($atts['url']);
			}

			return $counts->total_shares($atts['url']);
		}
	}
endif;
