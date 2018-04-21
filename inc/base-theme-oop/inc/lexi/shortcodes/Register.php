<?php

/**
 * Register Lexi shortcodes
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Shortcodes;

if( !class_exists('\Lexi\Shortcodes\Register') ) :

	class Register {

    public function __construct() {
      $this->register_shortcodes();
    }

    private function register_shortcodes() {
      add_shortcode('mailto', '\Lexi\Shortcodes\MailTo::mailto_shortcode');
      add_shortcode('iframe', '\Lexi\Shortcodes\Iframe::iframe_shortcode');
			add_shortcode('sharecount', '\Lexi\Shortcodes\Shares::sharecount_shortcode');
    }
	}
endif;
