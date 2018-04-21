<?php

/**
 * Pinterest Shares
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\ShareCount;

use \Lexi\Core\Helper;

if( !class_exists('\Lexi\ShareCount\Pinterest') ) :

	class Pinterest {

    private $url;

    public function __construct($url) {
      $this->url = $url;
    }

    public function get_count() {
      return $this->get_pinterest_counts();
    }

    /**
		 * Get number of shares on pinterest
		 */
		private function get_pinterest_counts() {
      $return_data = Helper::curl_request('http://api.pinterest.com/v1/urls/count.json?url='.$this->url);

			if($return_data === false || isset($return_data['error'])) return 0;

			$json_string = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $return_data);
			$json = json_decode($json_string, true);

			return isset($json['count']) ? intval($json['count']) : 0;
		}
	}

endif;
