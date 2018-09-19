<?php

/**
 * Custom Bootstrap Pagination for lexitheme theme
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Lexi\Core;
use \Lexi\Core\Helper;

class Pagination {

	public static function render_pagination($args = array()) {

		$defaults = array(
			'range' => 4,
			'custom_query' => FALSE,
			'previous_string' => __( '<i class="fa fa-angle-left"></i>', Helper::$theme_slug ),
			'next_string' => __( '<i class="fa fa-angle-right"></i>', Helper::$theme_slug ),
			'before_output' => '<div class="post-nav"><ul class="pagination justify-content-center">',
			'after_output' => '</ul></div>'
		);

		$args = wp_parse_args(
			$args,
			apply_filters('bootstrap_pagination_defaults', $defaults)
		);

		$args['range'] = (int) $args['range'] - 1;

		if (!$args['custom_query']) {
			$args['custom_query'] = @$GLOBALS['wp_query'];
		}

		$count = (int) $args['custom_query']->max_num_pages;
		$page = intval(get_query_var('paged'));
		$ceil = ceil($args['range'] / 2);

		if ($count <= 1) {
			return false;
		}

		if (!$page) {
			$page = 1;
		}

		if($count > $args['range']) {
			if($page <= $args['range']) {
				$min = 1;
				$max = $args['range'] + 1;
			} elseif($page >= ($count - $ceil)) {
				$min = $count - $args['range'];
				$max = $count;
			} elseif($page >= $args['range'] && $page < ($count - $ceil)) {
				$min = $page - $ceil;
				$max = $page + $ceil;
			}
		} else {
			$min = 1;
			$max = $count;
		}

		$echo = '';
		$previous = intval($page) - 1;
		$previous = esc_attr(get_pagenum_link($previous));

		$firstpage = esc_attr(get_pagenum_link(1));
		if($firstpage && (1 != $page)) {
			$echo .= '<li class="previous page-item"><a class="page-link" href="' . $firstpage . '">' . __('First', Helper::$theme_slug) . '</a></li>';
		}

		if($previous && (1 != $page)) {
			$echo .= '<li class="page-item"><a class="page-link" href="' . $previous . '" title="' . __('previous', Helper::$theme_slug) . '">' . $args['previous_string'] . '</a></li>';
		}

		if(!empty($min) && !empty($max)) {
			for($i = $min; $i <= $max; $i++) {
				if($page == $i) {
					$echo .= '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
				} else {
					$echo .= sprintf('<li class="page-item"><a class="page-link" href="%s">%2d</a></li>', esc_attr(get_pagenum_link($i)), $i);
				}
			}
		}

		// Next page link
		$next = intval($page) + 1;
		$next = esc_attr(get_pagenum_link($next));

		// Only display 'First' link if NOT on the first page
		if($next && ($count != $page)) {
			$echo .= '<li class="page-item"><a class="page-link" href="' . $next . '" title="' . __( 'next', Helper::$theme_slug) . '">' . $args['next_string'] . '</a></li>';
		}

		// Last page link
		$lastpage = esc_attr( get_pagenum_link($count) );

		// Only display 'Last' link if NOT on the last page
		if($lastpage) {
			if($count != $page) {
				$echo .= '<li class="next page-item"><a class="page-link" href="' . $lastpage . '">' . __('Last', Helper::$theme_slug) . '</a></li>';
			}
		}

		if(isset($echo)) {
			echo $args['before_output'] . $echo . $args['after_output'];
		}
	}
}
