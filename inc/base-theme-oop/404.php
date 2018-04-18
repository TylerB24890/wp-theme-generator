<?php
/**
 * The template for displaying the 404 Error Page
 *
 * @package {%THEME_SLUG%}
 */

get_header(); ?>

<div id="error-404">
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<h4><?php _e('404 Page Not Found', \Elexicon\Helper::$theme_prefix); ?></h4>
			</div>
		</div>
	</div><!-- .container -->
</div>

<?php
get_footer();
