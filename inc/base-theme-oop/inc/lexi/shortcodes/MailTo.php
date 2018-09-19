<?php

/**
 * Lexi MailTo shortcode
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Shortcodes;

class MailTo {

	/**
	 * Encode Email For <a href="mailto:"></a> links
	 * @param  array $atts   Shortcode attributes
	 * @param  string $content Email link text
	 * @return string          Encoded mailto: link
	 *
	 * Usage: [mailto email="your-email@gmail.com"]Link text here[/mailto]
	 */
	public static function mailto_shortcode($atts, $content = null) {

		$atts = shortcode_atts(array(
			'email' => '',
		), $atts, 'mailto');

		if($atts['email'] === '' || !is_email($atts['email'])) {
			return;
		}

		$chars = preg_split("//", $atts['email'], -1, PREG_SPLIT_NO_EMPTY);
		$new_mail = "<a href=\"mailto:";

		foreach($chars as $val) {
			$new_mail .= "&#" . ord($val) . ";";
		}

		$new_mail .= "\">" . $content . "</a>";

		return $new_mail;
	}
}
