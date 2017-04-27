<?php
/**
 * Post index page template
 * @package elexicon
 */

get_header(); ?>

<div id="index">
	<div class="container">

		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

			<?php endwhile; ?>
		<?php else : ?>

			<h4><?php _e('No posts found!', 'elexicon'); ?></h4>

		<?php endif; ?>

	</div><!-- .container -->
</div>

<?php
get_footer();
