<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package {%THEME_SLUG%}
 */

get_header(); ?>

<div id="search">
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<h1>Search</h1>
				<h4>Results for: <?php echo get_search_query(); ?></h4>

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
get_sidebar();
get_footer();
