<?php

/**
 * Customizations and additions to the WordPress admin panel
 *
 * @package {%THEME_SLUG%}
 * @subpackage {%THEME_SLUG%}/inc
 */

/**
 * Add a character count above the post excerpt field
 */
function excerpt_count_js() {

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
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');
