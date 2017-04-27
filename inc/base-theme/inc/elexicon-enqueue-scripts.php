<?php

/**
 * Enqueue all styles and scripts for the elexicon theme
 *
 * @package	elexicon
 * @subpackage elexicon/inc
 */

// Enqueue jQuery
if (!is_admin()) add_action("wp_enqueue_scripts", "elexicon_jquery_enqueue", 11);
function elexicon_jquery_enqueue() {
   	wp_deregister_script('jquery'); // Deregister WP default jQuery
   	wp_register_script('jquery', '//code.jquery.com/jquery-3.2.1.min.js', false, null);
   	wp_enqueue_script('jquery'); // Register jQuery
}

// Conditionally load jQuery locally if not able to pull from CDN
add_action( 'wp_head', 'elexicon_jquery_load' );
function elexicon_jquery_load() {
?>
	<script>if (!window.jQuery) { document.write('<script src="<?php echo get_template_directory_uri() . '/js/vendor/jquery-3.2.1.min.js'; ?>" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"><\/script>'); }</script>
<?php
}

add_filter('script_loader_tag', 'elexicon_add_jquery_integrity', 10, 2);
function elexicon_add_jquery_integrity($tag, $handle) {
    if ($handle != 'jquery')
    return $tag;

    return str_replace(' src', ' integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous" src', $tag);
}


// The main style/script enqueue
function elexicon_scripts() {

	// Stylesheets
	wp_enqueue_style( 'wp-styles', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'elexicon-style', get_template_directory_uri() . '/styles/style.css' );

	// Scripts
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('jquery'), '3.3.5', true );

	$elexicon_script = (TED_DEV ? 'elexicon.js' : 'elexicon.min.js');
	wp_enqueue_script( 'elexicon-js', get_template_directory_uri() . '/js/' . $elexicon_script, array('jquery'), '1.0.0', true );

	// IE conditional scripts array
	$conditional_scripts = array(
		'html5shiv' => '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js',
		'respond' => '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js'
	);

	// Enqueue conditional scripts
	enqueue_additional_scripts($conditional_scripts);

	// Localize scripts
	elexicon_localize_script();
}
add_action( 'wp_enqueue_scripts', 'elexicon_scripts' );

/**
 * Enqueue additional HTML5 scripts
 * @author Tyler Bailey - 2015
 * @param  array $conditional_scripts
 * @return string HTML markup to load the html5 shiv and respond.js files
 */
function enqueue_additional_scripts($conditional_scripts) {
	// Enqueue conditional scripts
	foreach($conditional_scripts as $handle => $src) {
		wp_enqueue_script($handle, $src, array('jquery'), '', false );
	}

	// Apply IE conditional tags to conditional scripts
	add_filter('script_loader_tag', function($tag, $handle) use ($conditional_scripts) {
		if(array_key_exists($handle, $conditional_scripts)) {
			$tag = "<!--[if lt IE 9]>$tag<![endif]-->";
		}
		return $tag;
	}, 10, 2);
}

/**
 * Localize Javascript variables
 * @link https://codex.wordpress.org/Function_Reference/wp_localize_script
 */
function elexicon_localize_script() {
    // Localize the global admin-ajax URL
    // usage: elexicon.ajaxurl;
    wp_localize_script(
        'elexicon-js',
        'elexicon',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        )
    );
}
?>
