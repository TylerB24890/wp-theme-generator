<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package {%THEME_SLUG%}
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>

				<h1><?php the_title(); ?></h1>

			<?php endwhile; // End of the loop. ?>
		</div><!-- .container -->
	</div><!-- #primary -->

<?php
get_footer();
