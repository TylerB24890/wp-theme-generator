<?php
/**
 * Bootstrap Pagination
 */

if( !class_exists('{%THEME_CAP_SLUG%}_Pagination')) :

    class {%THEME_CAP_SLUG%}_Pagination {

        /**
         * Default pagination arguments
         */
        public static $defaults;

        /**
         * Global pagination arguments
         */
        public static $args;

        /**
         * Construct the global pagination arguments
         *
         * @param array $args user defined pagination args
         */
        public function __construct( $args = array() ) {

            self::$defaults = array(
                'range'           => 4,
                'custom_query'    => FALSE,
                'previous_string' => __( '<i class="fa fa-angle-left"></i>', '{%THEME_PREFIX%}' ),
                'next_string'     => __( '<i class="fa fa-angle-right"></i>', '{%THEME_PREFIX%}' ),
                'before_output'   => '<div class="post-nav"><ul class="pager">',
                'after_output'    => '</ul></div>'
            );

            self::$args = wp_parse_args(
                self::$args,
                apply_filters( '{%THEME_PREFIX%}_bootstrap_pagination_defaults', self::$defaults )
            );
        }

        /**
         * Construct the pagination links
         *
         * @return string The pagination links in bootstrap markup
         */
        public static function {%THEME_PREFIX%}_pagination() {
            self::$args['range'] = (int) self::$args['range'] - 1;

            if ( !self::$args['custom_query'] )
            self::$args['custom_query'] = @$GLOBALS['wp_query'];

            $count = (int) self::$args['custom_query']->max_num_pages;
            $page  = intval( get_query_var( 'paged' ) );
            $ceil  = ceil( self::$args['range'] / 2 );

            if ( $count <= 1 )
            return FALSE;

            if ( !$page )
            $page = 1;

            if ( $count > self::$args['range'] ) {
                if ( $page <= self::$args['range'] ) {
                    $min = 1;
                    $max = self::$args['range'] + 1;
                } elseif ( $page >= ($count - $ceil) ) {
                    $min = $count - self::$args['range'];
                    $max = $count;
                } elseif ( $page >= self::$args['range'] && $page < ($count - $ceil) ) {
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
            $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( 'First', '{%THEME_PREFIX%}' ) . '</a></li>';

            if ( $previous && (1 != $page) )
            $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', '{%THEME_PREFIX%}') . '">' . self::$args['previous_string'] . '</a></li>';

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
            $echo .= '<li><a href="' . $next . '" title="' . __( 'next', '{%THEME_PREFIX%}') . '">' . self::$args['next_string'] . '</a></li>';

        	// Last page link
            $lastpage = esc_attr( get_pagenum_link($count) );

        	// Only display 'Last' link if NOT on the last page
            if ( $lastpage ) {
            	if($count != $page) {
            		$echo .= '<li class="next"><a href="' . $lastpage . '">' . __( 'Last', '{%THEME_PREFIX%}' ) . '</a></li>';
            	}
            }

            if ( isset($echo) )
            echo self::$args['before_output'] . $echo . self::$args['after_output'];
        }
    }

    new {%THEME_NAME%}_Pagination();

endif;
