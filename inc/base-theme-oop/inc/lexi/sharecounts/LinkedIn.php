<?php

/**
 * LinkedIn Shares
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\ShareCount;

use \Lexi\Core\Helper;

if( !class_exists('\Lexi\ShareCount\LinkedIn') ) :

	class LinkedIn {

    private $url;

    public function __construct($url) {
      $this->url = $url;
    }

    public function get_count() {
      return $this->get_linkedin_counts();
    }

    /**
		 * Get number of shares on linkedin
		 */
		private function get_linkedin_counts() {

			$json_string = Helper::curl_request('http://www.linkedin.com/countserv/count/share?url=' . $this->url . '&format=json');

			if($json_string === false || isset($json_string['error'])) return 0;

			$json = json_decode($json_string, true);

			return isset($json['count']) ? intval($json['count']) : 0;
		}
	}

endif;
