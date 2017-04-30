<?php

/**
 * Customize the WP Admin panel for the theme
 *
 * @author Elexicon, Inc.
 * @version 1.0.0
 */

if( !class_exists('{%THEME_CLASS_NAMES%}_Custom_Admin') ) :

	class {%THEME_CLASS_NAMES%}_Custom_Admin {

		/**
		 * Runs the custom admin panel functions
		 *
		 * @return null
		 */
		public function __construct() {
			self::excerpt_count();
		}

		/**
		 * Returns a live character count above the post excerpt in wp-admin
		 *
		 * @return string - HTML/JS to return a live character count
		 */
		private static function excerpt_count() {

			if ('page' != get_post_type()) {
		?>
		      	<script>
					(function($) {
						$('#postexcerpt .handlediv').after('<div id="excerpt-counter" style="position:absolute;top:12px;right:34px;color:#666;"><small style="font-weight:bold; padding-right:7px;">Excerpt length: </small><span id="excerpt_counter"></span><span> / 140 </span><small><span style="font-weight:bold;">character(s).</span></small></div>');
		     			$("span#excerpt_counter").text($("#excerpt").val().length);
		     			$("#excerpt").keyup( function() {
		         			if($(this).val().length > 140){
								// Limit excerpt length to 140 characters
								//jQuery(this).val(jQuery(this).val().substr(0, 140));
								$('div#excerpt-counter').css('color', 'red');
		        			}
		     				$("span#excerpt_counter").text($("#excerpt").val().length);
		   				});
					})(jQuery);
				</script>
		<?php
			}
		}
	}

	new {%THEME_CLASS_NAMES%}_Custom_Admin();

endif;
