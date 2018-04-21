<?php

/**
 * Elexicon shortcodes
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Core;

use \Lexi\ShareCount\Counts;

if( !class_exists('\Lexi\Core\Shortcodes') ) :

	class Shortcodes {

    public function register_shortcodes() {
      add_shortcode('mailto', array($this, 'encode_email'));
      add_shortcode('iframe', array($this, 'iframe_shortcode'));
			add_shortcode('sharecount', array($this, 'sharecount_shortcode'));
    }

    /**
     * Encode Email For <a href="mailto:"></a> links
     * @param  array $atts   Shortcode attributes
     * @param  string $content Email link text
     * @return string          Encoded mailto: link
     *
     * Usage: [mailto email="your-email@gmail.com"]Link text here[/mailto]
     */
    public function encode_email($atts, $content = null) {

      $atts = shortcode_atts(array(
        'email' => '',
      ), $atts, 'mailto');

      if($atts['email'] === '' || !is_email($atts['email']))
        return;

      $chars = preg_split("//", $atts['email'], -1, PREG_SPLIT_NO_EMPTY);
      $new_mail = "<a href=\"mailto:";

      foreach ($chars as $val) {
        $new_mail .= "&#" . ord($val) . ";";
      }

      $new_mail .= "\">" . $content . "</a>";

      return $new_mail;
    }

    /**
     * Render a responsive iframe from a link
     * @param  array $atts   Shortcode attributes
     * @return string        HTML Markup for iframe
     *
     * Usage: [iframe url="http://www.elexicon.com"]
     */
    public function iframe_shortcode($atts) {

      $atts = shortcode_atts(array(
        "url" => '',
      ), $atts, 'iframe');

      $html = '<div class="embed-responsive">';
      $html .= '<iframe class="embed-responsive-item" src="' . $atts['url'] . '"></iframe>';
      $html .= '</div>';

      return $html;
    }

		/**
     * Render a responsive iframe from a link
     * @param  array $atts   Shortcode attributes
     * @return string        HTML Markup for iframe
     *
     * Usage: [sharecount] || [sharecount url="https://theurlhere.com"]
     */
		public function sharecount_shortcode($atts) {
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
