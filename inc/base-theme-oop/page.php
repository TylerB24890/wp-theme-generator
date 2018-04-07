<?php
/**
 * The template for displaying all pages.
 * Required by WP
 *
 * @package {%THEME_SLUG%}
 */

get_header(); ?>

<div id="<?php echo $post->post_name; ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>

						<?php get_template_part( {%THEME_CLASS_NAMES%}_Helper::$parts . 'post', 'list' ); ?>

					<?php endwhile; ?>
				<?php else : ?>

					<h4><?php _e('No posts found!', '{%THEME_PREFIX%}'); ?></h4>

				<?php endif; ?>

			</div>
		</div>
	</div><!-- .container -->
</div>
<?php
get_footer();
