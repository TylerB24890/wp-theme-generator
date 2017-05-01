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
		<div class="col-md-12">
			<div class="row">

				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>

						<?php get_template_part( Design_Helper::$parts . 'post', 'list' ); ?>

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
