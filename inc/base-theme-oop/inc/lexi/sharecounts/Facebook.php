<?php

/**
 * Facebook Shares
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\ShareCount;

use \Lexi\Core\Helper;

if( !class_exists('\Lexi\ShareCount\Facebook') ) :

	class Facebook {

    private $url;

    public function __construct($url) {
      $this->url = $url;
    }

    public function get_count() {
      return $this->get_facebook_counts();
    }

    /**
		 * Get number of shares on facebook
		 */
		private function get_facebook_counts() {

			$json_request = Helper::curl_request('http://graph.facebook.com/?id=' . $this->url);

      $json_string = json_decode($json_request, true);

			return isset($json_string['share']['share_count']) ? intval($json_string['share']['share_count']) : 0;
		}
	}

endif;
