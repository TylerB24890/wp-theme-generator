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

						<?php \Lexi\Core\Helper::get_partial('post-list'); ?>

					<?php endwhile; ?>
				<?php else : ?>

					<h4><?php _e('No posts found!', \Lexi\Core\Helper::$theme_prefix); ?></h4>

				<?php endif; ?>

			</div>
		</div>
	</div><!-- .container -->
</div>
<?php
get_footer();
