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
	<div class="row">
		<div class="col">

			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>

					<?php lexi_partial('components/post-list'); ?>

				<?php endwhile; ?>
			<?php else : ?>

				<h4><?php _e('No posts found!', '{%THEME_SLUG%}'); ?></h4>

			<?php endif; ?>

		</div>
	</div>
</div><!-- .container -->

<?php
get_footer();
