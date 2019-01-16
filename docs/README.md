# [Lexi Framework](http://theme-generator.elexicon.com)

Building custom WordPress themes can be redundant and annoyingly repetitive. The Lexi Theme Generator aims to eliminate the annoying stuff we repeat every time we develop a new theme. Follow the installation instructions to get started.

Want to see the generated theme code? [View the repo](https://github.com/TylerB24890/elexicon-base).

## Changelog

### V2.3.2 - 1.15.2019
* Fixed bug where some helper functions were being called statically
* Fixed misc. i18n bugs
* Disabled Gutenberg by default

### V2.3.1 - 1.11.2019
* Updated the Font Awesome package to v.5.6.3

### V2.3 - No more GruntJS! - 12.28.2018
* The original configuration of Webpack and GruntJS has been depreciated as Lexi has adopted [LaravelMix](https://laravel-mix.com/)!
  * **Note:** This **does** come with initial setup changes. Please see the [Installation](/#installation) section for more info.
* NEW: EASIER INSTALLATION! ZERO CONFIG!
* Fixed a few bugs with naming conventions during theme creation.

### v2.2.5 - New Option Available - 11.30.2018
* You can now use Lexi on **any** theme! Download the external package [here](http://theme-generator.elexicon.com/lexi.zip)
* `include` the Lexi file (`/lexi/lexi.php`) in your `functions.php` file.

  EX: `include_once( get_template_directory() . /lexi/lexi.php );`
* That's it! All of your favorite Lexi features are now available to you in any theme you wish to use.

* **Please note this is the same Lexi (with minor changes for compatibility) that is included with the Lexi Theme Generator. The version number and functionality did not change and the documentation on this page applies to both the Lexi Theme Generator and the Lexi standalone Framework.**

### v2.2 - 11.6.2018
* No more need to run `composer install` -- the Autoloader is pre-packaged.
* Fixed misc. markup issues with the new Bootstrap 4 containers.
* Fixed WordPress i18n functions to use the generated theme slug rather than `lexi`
* Misc. style additions and fixes
* New `isUser` and `isDev` JavaScript variables [Read the docs!](/#javascript)

### v2.1 - 9.19.2018
* Removed Share Count functionality and shortcode (unused/inconsistent)
* Performance Enhancements
* **NEW** `theme-functions.php` file for easier helper functions

## Features
* [Bootstrap 4.x](https://getbootstrap.com) integration
* Bootstrap Nav Walker for easy management through the wp-admin dashboard
* SCSS compiling and Browser Reload through Grunt
* [Webpack.js](https://webpack.js.org/) and [Grunt.js](https://gruntjs.com/) integration
* PSR-4 Autoloading with Composer
* Developer Factory to create Custom Post Types, Taxonomies & Widget Areas (sidebars) [Read the docs!](/#factory)

# Getting started
## Requirements
* \>PHP 7.0
* Composer (Install it from https://getcomposer.org/)
* Node & NPM (Install it from https://nodejs.org/en/)
* WordPress \>4.5

## Installation
### Theme Generator
* Head over to http://theme-generator.elexicon.com and fill out the form provided.
* Unzip the downloaded file and copy it's contents over to your `/themes/` directory.
* `cd` to the theme directory in your terminal.
* `npm install`
* `npm run watch`
* Activate the theme from your wp-admin dashboard.
* Begin building!

### Other Themes
* You can now use Lexi on **any** theme! Download the external package [here](http://theme-generator.elexicon.com/lexi.zip)
* `include` the Lexi file (`/lexi/lexi.php`) in your `functions.php` file. EX: `include_once get_template_directory() . /lexi/lexi.php;`
* That's it! All of your favorite Lexi features are now available to you in any theme you wish to use.
* Please note that this is an experimental feature right now and is under active development.

# Guide
## Theming

  The Elexicon Theme uses [SCSS](https://sass-lang.com/) for styling. If you're unfamiliar with SCSS I suggest you you head over to their [docs](https://sass-lang.com/guide) to familiarize yourself. The Javascript within the Elexicon theme is compiled into a script (bundle.js) through [webpack](https://webpack.js.org/). Like SCSS, if you're unfamiliar with webpack they have very fantastic [documentation](https://webpack.js.org/concepts/).

  After you have ran the initial installation scripts such as `npm install`, `npm run watch` your theme will be setup and viewable after activation through wp-admin.

  - `npm install` Installs the necessary node packages
  - `npm run watch` Will compile the assets and begin the BrowserSync module for development


The BrowserSync module packaged with Lexi includes remote access to view your website on your mobile device. After starting BrowserSync, use the IP Address displayed in the terminal on your mobile device and you will see your local project update in real time as if it were on your computer.

### Styling

  All styles are located in the `/src/scss/` directory of the theme root. There are a few base SCSS files already in place, but you are encouraged to create your own and import them into the `_style.scss` stylesheet.

  In order to begin styling your theme, you have to begin the `watch` process.
  - Open your terminal and `cd` to your theme root.
  - Run `npm run watch`

  That's it. Begin writing your SCSS and Javascript as instructed below and your browser will automatically refresh on changes. **When you are complete and ready to go live, run the command `npm run prod` to minify and compile all of your assets for production.***

  **NOTE:** The compiled styles are located in the `/dist/styles/` directory. There is no need to upload the `/src/` directory in production. See the Deployment section for more information.

### Javascript

  The scripts for the site are located in the `/src/js/` directory. Webpack compiles all scripts into a `bundle.js` file that is included in your theme. The `bundle.js` file is compiled from the `app.js` file. You should `import` your main scripts into this file for compiling. If you are unfamiliar with [Modern Javascript](https://medium.com/the-node-js-collection/modern-javascript-explained-for-dinosaurs-f695e9747b70) I suggest you [practice it](https://javascript.info/) it a little bit.

  Within the `/src/js/` directory you will see a few files and directories. We're going to go through the files first, then move onto the directories and their contents.

  - `app.js` The main file for you application. Import your custom Javascript files into here for compiling.
  - `lexi.js` Miscelleneous JS functions to help with theme development are placed here.
  - `[your-theme-name].js` You should use this as your "main" theme file. Put all one-off jQuery functions and other small/global items in here.
    - jQuery is imported by default through WebPack.

  - `/variables/` - This directory contains a couple of files off the bat. The most important file here is the `index.js` file. To keep things clean, you should separate your global variables into individual files. For example, all variables dealing with the URL are located in the `url.js` file and imported into the `index.js` file for easy exporting.

  **All default variables are located under the `lexi` object. You must `import { lexi } from './variables'` to use them.**

      - `theme.js` - This file contains multiple variables regarding the theme being developed.

        - `lexi.ajaxurl (string)` - The wp-admin AJAX Url for the theme.<br/>`console.log(lexi.ajaxurl)`

        - `lexi.currentPage (string)` - The slug of the current page.<br/>`console.log(lexi.currentPage)`

        - `lexi.isSinglePost (bool)` - True/False if you are on a single post page.<br/>`console.log(lexi.isSinglePost)`

        - `lexi.ajaxnonce (string)` - WP Nonce for AJAX Security.<br/>`console.log(lexi.ajaxnonce)` (see the [codex](https://codex.wordpress.org/WordPress_Nonces))

        - `lexi.isUser (bool)` - Determines if the current user is logged into WordPress

        - `lexi.isDev (bool)` - Determines if we are working on a local development environment

      - `url.js` - This file contains a couple helpful variables dealing with the URL.

      **The Lexi URL variables live under the `lexi.url` object.**

        - `lexi.url.protocol (string)` - The URL protocol (http/https)<br/>`console.log(lexi.url.protocol)`

    		- `lexi.url.host (string)` - The site URL without the protocol<br/>`console.log(lexi.url.host)`

    		- `lexi.url.domain (string)` - The site domain (i.e. elexicon from "elexicon.com")<br/>`console.log(lexi.url.domain)`

    		- `lexi.url.extension (string)` - .com, .org, .net, etc...<br/>`console.log(lexi.url.extension)`

    		- `lexi.url.directory (string)` - The directory in the URL (i.e. elexicon.com/our-work/ would be "our-work")<br/>`console.log(lexi.url.directory)`

    		-  `lexi.url.fullUrl (string)` - The full site URL. Used in `lexi.js` to add `target="_blank"` to all external URL links.<br/>`console.log(lexi.url.fullUrl)`

  - `/functions/` Place all _shared_ JS functions here. Remember to export them from the `/src/js/functions/index.js` file.

      - `inlineScroll.js` - Simply add `.inline-link` to **any** `<a href=""></a>` element with a valid target ID (such as `#footer`) to create a smooth inline scrolling experience.

      - `parallax.js` - Wish to use parallax on a background image? `import` the parallax script into your theme scripts like `import { parallax } from './functions'` then you can call it on any element like `parallax(document.getElementById("banner"), 50%, .2)`

      - `isInView.js` - Pass a DOM object to the `isInView()` function to determine if the element is in the viewport

  ## Shortcodes

  ### `[mailto]`

    Encodes the an email address and spits out an `<a href="mailto:[encoded-email-here]">Text</a>`

    **Usage:** `[mailto email="awesometheme@gmail.com"]Email Us![/mailto]`

  ### `[iframe]`

    Renders a responsive iframe with Bootstrap 4's responsive embed feature

    **Usage:** `[iframe url="http://www.elexicon.com"]`

## Core Classes
  All Core Theme classes are setup under the `Lexi` namespace. Classes contained within the `/inc/lexi/` directory are autoloaded using the Composer `PSR-4` autoloader. This means you can access core classes and methods like `\Lexi\Core\NavWalker` which will give you access to the `NavWalker` class for the main navigation.

### `\Lexi\Core\Customizer`
  The Customizer class is an extension of the [WordPress Customizer API](https://developer.wordpress.org/themes/customize-api/). Put all of your custom theme "Customizer" code within this class. It is instantiated in the `__construct()` function of the `\Lexi\Core\ThemeInit` class.

### `\Lexi\Core\Helper`
  The Helper class is a collection of useful PHP functions that can be accessed throughout the theme. Most functions can be called through one of the functions in the `theme-functions.php` file.

#### Variables

  All theme variables can be accessed in the following structure: `\Lexi\Core\Helper::$variable_name`

  - `::$theme_name` - Global Theme Name

  - `::$theme_slug` - The theme slug

  - `::$theme_prefix` - The theme prefix

  - `::$theme_version` - The theme version

  - `::$parts` - Quick access to the `/template-parts/` directory.

    **Usage:** `get_template_directory(\Lexi\Core\Helper::$parts . 'post', 'list');`

### Theme Functions

  - `lexi_partial($dir, array $params = array(), $output = true)`

    Includes a template part and allows the passing of variables. Pass an array of variables to the `$params` parameter and you may use them within your template part. The **array key** will be the variable name, the **array value** will be the value of the variable.

    - `$dir (string)` Can be the filename with or without the extension or the path to the file within the `/template-parts/` directory.
    - `$params (array)` Array. An array of variables to pass to the partial. Array key is the variable name to be called.
    - `$output (bool)` Output the template part. Set to `false` to return the template part as a string.

  - `lexi_truncate($string, $limit, $break=".", $pad="...")`

    Truncate a string.

    - `$string (string)` The string of text to truncate.
    - `$limit (int)` The number of characters allowed in the truncated string.
    - `$break (string)` What character to end the break at. Default is a period. (prevents strings from cutting mid sentence.)
    - `$pad (string)` What to put at the end of the truncated string. Default is `...`

  - `lexi_is_child($parent = 0)`

    Determine if the current post or page is a child of another. Pass the current post ID as a variable. Will return the parent post ID if it is a child.

    - `$parent (int)` The ID of the current post or page.

  - `lexi_get_subpages($id = 0)`

    Get child pages if available. Useful for creating subpage navigations.

    - `$id (int)` The ID of the parent page.

  - `lexi_make_links($content = '')`

    Parse a string of text and convert all URLs into `<a>` elements for linking.

    - `$content (string)` String of content to parse

  - `lexi_count_search_results()`

    Count the number of items returned from the standard WP search results page

  - `lexi_attachment_id_from_url($url = '')`

    Get an attaachment ID by it's URL

    - `$url (string)` The URL of the attachment

  - `lexi_file_size($file)`

    Get the size of a file

    - `$file` The location & filename of the file

  - `lexi_svg($file)`

    Return the SVG code for an SVG image

    - `$file (string)` the URL/location of the SVG image

  - `lexi_make_plural($str)`

     Make a string plural.

     - `$str (string)` String of the word to pluralize

  - `lexi_beautify($str)`

    Beautify a title. Remove dashes, capitalize words, etc..

    - `$str (string)` String to beautify

  - `lexi_uglify($str)`

    Uglify a title. Replace spaces with dashes and lowercase words.

    - `$str (string)` String to uglify

### `\Lexi\Core\NavWalker`

  The Boostrap Nav Walker for WordPress Navigation.

  **Usage:**
  <br/>```
  wp_nav_menu(array(
    'menu' => 'Primary Menu',
    'theme_location' => 'primary',
    'depth' => 2,
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id' => 'main-nav',
    'menu_class' => 'navbar-nav mr-auto',
    'fallback_cb' => '\Lexi\Core\NavWalker::fallback',
    'walker' => new \Lexi\Core\NavWalker
  ));
  ```

### `\Lexi\Core\Pagination`

  The Bootstrap Pagination

  **Usage:** `\Lexi\Core\Pagination::render_pagination()`

### `\Lexi\Core\ThemeInit`

  Initiates the theme and configures it with WordPress. Standard `functions.php` functionality in here.

## Factory

  The Lexi Factory is a useful library for creating custom post types and taxonomies. All functionality lives under the `\Lexi\Factory` namespace.

### `\Lexi\Factory\PostType($name, $args = array(), $labels = array())`

  Used to register a custom post type with WordPress.

  - `$name (string)` **Required** The name of the custom post type. Spaces **are** allowed here.
  - `$args (array)` Can pass default WordPress `register_post_type()` arguments. [Codex](https://codex.wordpress.org/Function_Reference/register_post_type)
  - `$labels (array)` Can pass defualt WordPress `register_post_type()` labels. [Codex](https://codex.wordpress.org/Function_Reference/register_post_type)

  **Usage:** `new \Lexi\Factory\PostType('Product')` - Will register the 'Product' post type.

### `\Lexi\Factory\Taxonomy($name, $post_type = '', $column = false, $args = array(), $labels = array())`

  Used to register custom taxonomies with WP and assign taxonomies to post types.

  - `$name (string)` **Required** The name of the custom taxonomy. Spaces **are** allowed here.
  - `$post_type (string)` **Required** The name of the post type to register this taxonomy to. **If the post type is not created, this function will create it for you.** This parameter can also be an array of post types.
  - `$column (bool)` Create a filterable column on the post type table in wp-admin of this taxonomy
  - `$args (array)` Can pass default WordPress `register_taxonomy()` arguments. [Codex](https://codex.wordpress.org/Function_Reference/register_taxonomy)
  - `$labels (array)` Can pass defualt WordPress `register_taxonomy()` labels. [Codex](https://codex.wordpress.org/Function_Reference/register_taxonomy)

  **Usage:** `new \Lexi\Factory\Taxonomy('Product Category', array('post', 'product'), true)` - Will register the 'product_category' taxonomy to the 'post' and 'product' post types.

  **Note: If the post type passed to the Taxonomy factory does NOT exist, it will be created for you with the default arguments. This is useful if you do not need custom parameters passed to the post type generator.**

### `\Lexi\Factory\Sidebar($name)`

  Used to generate custom widget areas for your theme. **Note** you still have to render the sidebar using `dynamic_sidebar($id)`

  - `$name (string)` The name of the widget area. This **can** have spaces. The sidebar ID you will need to reference it will be your name lowercased with underscores. For example `\Lexi\Factory\Sidebar('Custom Sidebar');` will have the ID `custom_sidebar`

  **Usage:** `\Lexi\Factory\Sidebar('My Widget Area');` -- To register the widget area.<br/>
  **In Template:** `dynamic_sidebar('my_widget_area');` -- To display the widget in your template.

## Deploying

  When you are ready to deploy, run the command `npm run prod` to compile your files for production then copy all of your theme files (**except the `/src/` & `/node_modules/` directories**) to your target server.

# Showcase

  Check out some of the great projects built on top of this base theme!

  * [Amway Media Guide 2018](https://mediaguide.amwayglobal.com/)
  * [Funny Business Agency](https://funny-business.com)
  * [Elexicon](https://elexicon.com)
  * [Spectrum Health | Health Beat](https://healthbeat.spectrumhealth.org)
  * [Terryberry](https://terryberry.com)
  * [Progressive AE](http://www.progressiveae.com)
  * [GroundWork IT Solutions](https://www.gwos.com/)
  * [Blackbaud TideTurners](https://tideturners.blackbaud.com/)
