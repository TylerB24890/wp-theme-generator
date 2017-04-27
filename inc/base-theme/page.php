<?php
/**
 * The template for displaying all pages.
 * Required by WP
 *
 * @package {%THEME_SLUG%}
 */

get_header(); ?>

<div id="<?php echo $post->post_name; ?>">
	<div class="container">

		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

			<?php endwhile; ?>
		<?php else : ?>

			<h4><?php _e('No posts found!', '{%THEME_PREFIX%}'); ?></h4>

		<?php endif; ?>

	</div><!-- .container -->
</div>

<?php
get_footer();
