<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package {%THEME_SLUG%}
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shotcut icon" href="<?php echo get_template_directory_uri() . '/favicon.ico'; ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
		<nav class="navbar navbar-default">
			<section class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false" aria-controls="navbar">
		            	<span class="sr-only">Toggle Navigation</span>
		            	<span class="icon-bar top-bar"></span>
		            	<span class="icon-bar middle-bar"></span>
		            	<span class="icon-bar bottom-bar"></span>
		          	</button>
		          	<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/img/logo-name.png'; ?>"></a>
				</div>

				<?php
					// {%THEME_NAME%} Theme Navigation
					wp_nav_menu(array(
						'menu' => 'primary',
						'theme_location' => 'primary',
						'depth' => 2,
						'container' => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id' => 'main-nav',
						'menu_class' => 'nav navbar-nav pull-right',
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
						'walker' => new wp_bootstrap_navwalker()
					));
				?>
			</section>
		</nav>
	</header>

	<div id="content" class="site-content">
