<?php

/**
 * Custom Bootstrap Pagination for {%THEME_NAME%} theme
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Elexicon;

if( !class_exists('Elexicon\Pagination') ) :

	class Pagination {

		public static function render_pagination( $args = array() ) {

        $defaults = array(
            'range'           => 4,
            'custom_query'    => FALSE,
            'previous_string' => __( '<i class="fa fa-angle-left"></i>', \Elexicon\Helper::$theme_prefix ),
            'next_string'     => __( '<i class="fa fa-angle-right"></i>', \Elexicon\Helper::$theme_prefix ),
            'before_output'   => '<div class="post-nav"><ul class="pager">',
            'after_output'    => '</ul></div>'
        );

        $args = wp_parse_args(
            $args,
            apply_filters( 'theme_pagination_defaults', $defaults )
        );

        $args['range'] = (int) $args['range'] - 1;
        if ( !$args['custom_query'] )
            $args['custom_query'] = @$GLOBALS['wp_query'];
        $count = (int) $args['custom_query']->max_num_pages;
        $page  = intval( get_query_var( 'paged' ) );
        $ceil  = ceil( $args['range'] / 2 );

        if ( $count <= 1 )
            return FALSE;

        if ( !$page )
            $page = 1;

        if ( $count > $args['range'] ) {
            if ( $page <= $args['range'] ) {
                $min = 1;
                $max = $args['range'] + 1;
            } elseif ( $page >= ($count - $ceil) ) {
                $min = $count - $args['range'];
                $max = $count;
            } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
                $min = $page - $ceil;
                $max = $page + $ceil;
            }
        } else {
            $min = 1;
            $max = $count;
        }

        $echo = '';
        $previous = intval($page) - 1;
        $previous = esc_attr( get_pagenum_link($previous) );

        $firstpage = esc_attr( get_pagenum_link(1) );
        if ( $firstpage && (1 != $page) )
            $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( 'First', \Elexicon\Helper::$theme_prefix ) . '</a></li>';

        if ( $previous && (1 != $page) )
            $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', \Elexicon\Helper::$theme_prefix) . '">' . $args['previous_string'] . '</a></li>';

        if ( !empty($min) && !empty($max) ) {
            for( $i = $min; $i <= $max; $i++ ) {
                if ($page == $i) {
                    $echo .= '<li class="active"><span class="active">' . $i . '</span></li>';
                } else {
                    $echo .= sprintf( '<li><a href="%s">%2d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
                }
            }
        }

    	// Next page link
        $next = intval($page) + 1;
        $next = esc_attr( get_pagenum_link($next) );

    	// Only display 'First' link if NOT on the first page
        if ($next && ($count != $page) )
            $echo .= '<li><a href="' . $next . '" title="' . __( 'next', \Elexicon\Helper::$theme_prefix) . '">' . $args['next_string'] . '</a></li>';

    	// Last page link
        $lastpage = esc_attr( get_pagenum_link($count) );

    	// Only display 'Last' link if NOT on the last page
        if ( $lastpage ) {
        	if($count != $page) {
        		$echo .= '<li class="next"><a href="' . $lastpage . '">' . __( 'Last', \Elexicon\Helper::$theme_prefix ) . '</a></li>';
        	}
        }

        if ( isset($echo) )
            echo $args['before_output'] . $echo . $args['after_output'];
    }
	}
endif;
