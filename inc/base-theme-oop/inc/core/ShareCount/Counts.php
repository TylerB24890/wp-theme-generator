<?php

/**
 * Get Social Share Counts
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Elexicon\ShareCount;

use \Elexicon\ShareCount\LinkedIn;
use \Elexicon\ShareCount\Facebook;
use \Elexicon\ShareCount\Pinterest;

if( !class_exists('\Elexicon\ShareCount\Counts') ) :

	class Counts {

		/**
		 * Retrieve total share count
		 * @param string $url 	URL to get count of
		 * @param bool $echo	Whether or not to echo the count or return it.
		 */
		public static function total_shares($url, $echo = false) {
			$fb = new Facebook($url);
			$li = new LinkedIn($url);
			$pin = new Pinterest($url);

			$fbc = $fb->get_count($url);
			$lic = $li->get_count($url);
			$pinc = $pin->get_count($url);

			$count = ($fbc + $lic + $pinc);

			if($echo) {
				echo $count;
			}

			return $count;
		}


		/**
		 * Retrieve facebook count
		 * @param string $url 	URL to get count of
		 * @param bool $echo	Whether or not to echo the count or return it.
		 */
		public static function facebook_shares($url, $echo = false) {

      $facebook = new Facebook($url);
      $count = $facebook->get_count();

      if($echo) {
        echo $count;
      }

      return $count;

		}


		/**
		 * Retrieve linkedin count
		 * @param string $url 	URL to get count of
		 * @param bool $echo	Whether or not to echo the count or return it.
		 */
		public static function linkedin_shares($url, $echo = false) {

      $linkedin = new LinkedIn($url);
      $count = $linkedin->get_count();

      if($echo) {
        echo $count;
      }

      return $count;
		}


		/**
		 * Retrieve Pinterest count
		 * @param string $url 	URL to get count of
		 * @param bool $echo	Whether or not to echo the count or return it.
		 */
		public static function pinterest_shares($url, $echo = false) {

      $pinterest = new Pinterest($url);
      $count = $pinterest->get_count();

      if($echo) {
        echo $count;
      }

      return $count;
		}
	}

  new \Elexicon\ShareCount\Counts;

endif;
