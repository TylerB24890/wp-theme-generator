<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package {%THEME_PREFIX%}
 */

get_header(); ?>

<div id="search">
	<div class="container">
		<h1>Search</h1>
		<h4>Results for: <?php echo get_search_query(); ?></h4>
        <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                <article>
                	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                	<?php the_content(); ?>
                </article>
                <?php endwhile; ?>
        <?php else: ?>
        	<p>No results found.</p>
        <?php endif; ?>
	</div><!-- .container -->
</div>

<?php
get_sidebar();
get_footer();
