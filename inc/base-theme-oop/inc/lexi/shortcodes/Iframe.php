<?php

/**
 * Lexi Iframe shortcode
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Shortcodes;

class Iframe {

	/**
	 * Render a responsive iframe from a link
	 * @param  array $atts   Shortcode attributes
	 * @return string        HTML Markup for iframe
	 *
	 * Usage: [iframe url="http://www.elexicon.com"]
	 */
	public static function iframe_shortcode($atts) {

		$atts = shortcode_atts(array(
			"url" => '',
		), $atts, 'iframe');

		$html = '<div class="embed-responsive">';
		$html .= '<iframe class="embed-responsive-item" src="' . $atts['url'] . '"></iframe>';
		$html .= '</div>';

		return $html;
	}
}
