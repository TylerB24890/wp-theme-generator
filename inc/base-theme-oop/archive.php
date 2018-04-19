<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package {%THEME_SLUG%}
 */

get_header(); ?>

<div class="container">
	<div class="col-md-12">
		<div class="row">

			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>

					<?php \Elexicon\Helper::get_partial('post-list'); ?>

				<?php endwhile; ?>
			<?php else : ?>

				<h4><?php _e('No posts found!', \Elexicon\Helper::$theme_prefix); ?></h4>

			<?php endif; ?>

		</div>
	</div>
</div><!-- .container -->

<?php
get_footer();
