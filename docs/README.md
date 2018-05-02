# [Lexi Theme Generator](http://theme-generator.elexicon.com)

Building custom WordPress themes can be redundant and annoyingly repetitive. The [Elexicon](http://elexicon.com) Theme Generator **(Lexi)** aims to eliminate the annoying stuff we repeat every time we develop a new theme. Follow the installation instructions to get started.

Want to see the generated theme code? [View the repo](https://github.com/TylerB24890/elexicon-base).

## What's New
* [Bootstrap v4.1.0](https://getbootstrap.com) integration
* [Webpack.js](https://webpack.js.org/) and [Grunt.js](https://gruntjs.com/) integration
* Complete rewrite of core theme functionality
* PSR-4 Autoloading for core functionality
* New Helper functions
* Useful Shortcodes!
* Developer Factory to create Custom Post Types, Taxonomies & Widget Areas (sidebars)

## Features
* Bootstrap 4.x
* Bootstrap Nav Walker for easy management through the wp-admin dashboard
* SCSS compiling and Browser Reload through Grunt
* Webpack integration for modern JS and ES6 functionality
* PSR-4 Autoloading with Composer
* WordPress Entity Generators

# Getting started
## Requirements
* \>PHP 7.0
* Composer (Install it from https://getcomposer.org/)
* Node & NPM (Install it from https://nodejs.org/en/)
* WordPress \>4.5

## Installation
* Head over to http://theme-generator.elexicon.com and fill out the form provided.
* Unzip the downloaded file and copy it's contents over to your `/themes/` directory.
* `cd` to the theme directory in your terminal.
* `npm install`
* `npm run-script build`
* `composer install`
* Activate the theme from your wp-admin dashboard.
* Begin building!
  * Note you will have to `cd` to your theme directory and run the `grunt` command to enable Live Reloading and File Watching.

## Theme Structure
```
-themename
  -dist
    index.php
    -js
      index.php
    -styles
      index.php      
  -img
    index.php    
  -inc
    index.php
    -lexi
      Customizer.php
      Helper.php
      index.php
      NavWalker.php
      Pagination.php
      PostTypes.php
      Taxonomies.php
      ThemeInit.php
      -factory
        PostType.php
        Taxonomy.php
      -sharecounts
        -Counts.php
        -Facebook.php
        -LinkedIn.php
        -Pinterest.php
      -shortcodes
        Iframe.php
        MailTo.php
        Register.php
        Shares.php
  -languages
    index.php
    readme.txt
  -src
    -js
      app.js
      customizer.js
      grunt-settings.js
      lexi.js
      themename.js
      -variables
        index.js
        theme.js
        url.js
      -functions
        index.js
        parallax.js
        inlineScroll.js
    -scss
      -components
        _animated-hamburger.scss
        _components.scss
        _footer.scss
        _header.scss
      -functions
        _functions.scss
        _str-replace.scss
        _val.scss
      -mixins
        _animate.scss
        _font-smoothing.scss
        _gradient.scss
        _keyframes.scss
        _mixins.scss
        _placeholder.scss
        _vendor.scss
      -variables
        _bootstrap-overrides.scss
        _colors.scss
        _variables.scss
      _global.scss
      style.scss
  -template-parts
    index.php
    post-list.php
  404.php
  archive.php
  comments.php
  composer.json
  footer.php
  functions.php
  Gruntfile.js
  header.php
  index.php
  package.json
  page.php
  README.md
  readme.txt
  rtl.css
  screenshot.png
  search.php
  searchform.php
  sidebar.php
  single.php
  style.css
  webpack.config.js
```

# Guide
## Theming

  The Elexicon Theme uses [SCSS](https://sass-lang.com/) for styling and [GruntJS](https://gruntjs.org) for compiling it into CSS. If you're unfamiliar with SCSS I suggest you you head over to their [docs](https://sass-lang.com/guide) to familiarize yourself. The Javascript within the Elexicon theme is compiled into a script (bundle.js) through [webpack](https://webpack.js.org/). Like SCSS, if you're unfamiliar with webpack they have very fantastic [documentation](https://webpack.js.org/concepts/).

  After you have ran the initial installation scripts such as `npm install`, `npm run-script build`, `composer install` your theme will be setup and viewable after activation through wp-admin.

  - `npm install` Installs the necessary node packages
  - `npm run-script build` Builds the initial stylesheet and bundle.js file. This will bring Bootstrap into your theme.
  - `composer install` Configures the PSR-4 Autoloader.

### Styling

  All styles are located in the `/src/scss/` directory of the theme root. There are a few base SCSS files already in place, but you are encouraged to create your own and import them into the `_style.scss` stylesheet.

  In order to begin styling your theme, you have to begin the `grunt` process. If you have a local development server setup (MAMP, Vagrant, Docker, etc..) and your `grunt-settings.js` file is updated (see the [Javascript section](/?id=javascript)) this should be a piece of cake.
  - Open your terminal and `cd` to your theme root.
  - Run `grunt`

  That's it. Begin writing your SCSS and Javascript as instructed below and your browser will automatically refresh on changes. (JS changes take a couple of seconds due to their need to compile)

  **NOTE:** The compiled styles are located in the `/dist/styles/` directory. There is no need to upload the `/src/` directory in production. See the Deployment section for more information.

### Javascript

  The scripts for the site are located in the `/src/js/` directory. Webpack compiles all scripts into a `bundle.js` file that is included in your theme. The `bundle.js` file is compiled from the `app.js` file. You should `import` your main scripts into this file for compiling. If you are unfamiliar with [Modern Javascript](https://medium.com/the-node-js-collection/modern-javascript-explained-for-dinosaurs-f695e9747b70) I suggest you [practice it](https://javascript.info/) it a little bit.

  Within the `/src/js/` directory you will see a few files and directories. We're going to go through the files first, then move onto the directories and their contents.

  - `app.js` The main file for you application. Import your custom Javascript files into here for compiling.
  - `lexi.js` Miscelleneous JS functions to help with theme development are placed here.
  - `[your-theme-name].js` You should use this as your "main" theme file. Put all one-off jQuery functions and other small/global items in here.
    - Be sure to `import $ from 'jquery'` to use jQuery in here.
  - `grunt-settings.js` This file controls your `Gruntfile.js` script and holds your variables in one place.
    - If you change your stylesheet directories you should make sure you change them here.
    - This file also contains the Browser Reload URL for your theme. By default it is `http://[your-theme-name].local:3000` but you are free to change that to whatever your Virtual Host is configured to. (Just make sure the `:3000` is at the end.)

  - `/variables/` - This directory contains a couple of files off the bat. The most important file here is the `index.js` file. To keep things clean, you should separate your global variables into individual files. For example, all variables dealing with the URL are located in the `url.js` file and imported into the `index.js` file for easy exporting.

  **All default variables are located under the `lexi` object. You must `import { lexi } from './variables'` to use them.**

      - `theme.js` - This file contains multiple variables regarding the theme being developed.

        - `lexi.ajaxurl (string)` - The wp-admin AJAX Url for the theme.<br/>`console.log(lexi.ajaxurl)`

        - `lexi.isMobile (bool)` - Detects mobile agents on page load.<br/>`console.log(lexi.isMobile)`

        - `lexi.currentPage (string)` - The slug of the current page.<br/>`console.log(lexi.currentPage)`

        - `lexi.isSinglePost (bool)` - True/False if you are on a single post page.<br/>`console.log(lexi.isSinglePost)`

        - `lexi.ajaxnonce (string)` - WP Nonce for AJAX Security.<br/>`console.log(lexi.ajaxnonce)` (see the [codex](https://codex.wordpress.org/WordPress_Nonces))

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

  ## Shortcodes

  ### `[mailto]`

    Encodes the an email address and spits out an `<a href="mailto:[encoded-email-here]">Text</a>`

    **Usage:** `[mailto email="awesometheme@gmail.com"]Email Us![/mailto]`

  ### `[iframe]`

    Renders a responsive iframe with Bootstrap 4's responsive embed feature

    **Usage:** `[iframe url="http://www.elexicon.com"]`

  ### `[sharecount]`

    Queries Facebook, LinkedIn & Pinterest and gets the share count for the supplied URL (or current post/page)

    **Usage:**
    <br />`[sharecount echo]` - Will echo the current post share counts
    <br />`[sharecount url="https://theurlhere.com"]` - Will return the share count for ANY url provided

## Core Classes
  All Core Theme classes are setup under the `Lexi` namespace. Classes contained within the `/inc/lexi/` directory are autoloaded using the Composer `PSR-4` autoloader. This means you can access core classes and methods like `\Lexi\Core\NavWalker` which will give you access to the `NavWalker` class for the main navigation.

### `\Lexi\Core\Customizer`
  The Customizer class is an extension of the [WordPress Customizer API](https://developer.wordpress.org/themes/customize-api/). Put all of your custom theme "Customizer" code within this class. It is instantiated in the `__construct()` function of the `\Lexi\Core\ThemeInit` class.

### `\Lexi\Core\Helper`
  The Helper class is a collection of useful static PHP functions that can be accessed throughout the theme.

#### Variables

  All theme variables can be accessed in the following structure: `\Lexi\Core\Helper::$variable_name`

  - `::$theme_name` - Global Theme Name

  - `::$theme_slug` - The theme slug

  - `::$theme_prefix` - The theme prefix

  - `::$theme_version` - The theme version

  - `::$parts` - Quick access to the `/template-parts/` directory.

    **Usage:** `get_template_directory(\Lexi\Core\Helper::$parts . 'post', 'list');`

  - `::$icons_url` - The Icongr.am URL

#### Methods
  - `::icongram_icon($lib, $icon, $size = 24, $color = 'FFFFFF', $echo = true)`

    [FontAwesome](https://fontawesome.com/) is pre-loaded into the theme, however if you have the need for an icon not found in the [FontAwesome Library](https://fontawesome.com/icons?from=io), you can pull the icon from the handy service [Icongr.am](https://icongr.am/).
    - `$lib (string)` The library you wish to pull from (Icongram has many to choose from)
    - `$icon (string)` The icon you wish to pull from Icongram
    - `$size (int)` The size of the icon
    - `$color (string)` The color of the icon
    - `$echo (bool)` Echo the icon markup into the page.

    **Usage:** `\Lexi\Core\Helper::icongram_icon('clarity', 'home', 24, '000000');`
  <br/>
  <br/>

  - `::get_partial($dir)`

    Get a template part within the theme. Works very similar to WordPress's built in `get_template_part()` function but with less parameters and easier management. In WordPress's `get_template_part()` function you cannot pass variables such as `$exclude`. `::get_partial()` will allow you to do so.

    - `$dir` - Can be the filename **with or without** the extension **or** the path to the file within the `/template-parts/` directory.

    **Usage:** `\Lexi\Core\Helper::get_partial('single/content')` Will pull the file `/template-parts/single/content.php`
  <br/>
  <br/>

  - `::truncate($string, $limit, $break=".", $pad="...")`

    Truncate a string

    - `$string (string)` The string to truncate
    - `$limit (int)` The number of words to break down to.
    - `$break (string)` What character to end the break at. (default is a period.)
    - `$pad (bool)` What to put at the end of the string

    **Usage:** `\Lexi\Core\Helper::truncate(get_the_excerpt(), 120)`
  <br/>
  <br/>


  - `::is_child( $parent = '' )`

    Check if the current page or post is a child of another page or post.

    - `$parent (int)` The ID of the post or page to check.

    **Usage:** `\Lexi\Core\Helper::is_child($post->ID);`
  <br/>
  <br/>

  - `::get_subpages($id)`

    Get children pages (useful for creating sidebar navigations)

    - `$id (int)` The ID of the page to retrieve the children for

    **Usage:** `\Lexi\Core\Helper::get_subpages($post->ID)`
  <br/>
  <br/>

  - `::remove_images($content = null)`

    Remove all images from a posts content

    - `$content (string)` The content to strip all `<img>` tags from. Will default to the current post content if `$content` is `null`

    **Usage:** `\Lexi\Core\Helper::remove_images(get_the_content())`
  <br/>
  <br/>

  - `::make_url_link($text)`

    Parse text and wrap all valid URLs in `<a href=""></a>` elements.

    - `$text (string)` The text to parse and "linkify"

    **Usage:** `\Lexi\Core\Helper::make_url_link(get_the_content())`
  <br/>
  <br/>

  - `::search_results_count()`

    Get the number of returned search results.
  <br/>
  <br/>

  - `::get_attachment_id_by_url( $url )`

    Get a post attachment ID from it's Media Library URL.

    - `$url (string)` The URL of the media attachment

    **Usage:** `\Lexi\Core\Helper::get_attachment_id_by_url(get_the_post_thumbnail_url());`
  <br/>
  <br/>

  - `::get_file_size($file)`

    Get the size in kb, mb, gb of a file.

    - `$file (string)` The path to the file

    **Usage:** `$file_size = \Lexi\Core\Helper::get_file_size(get_template_directory() . '/img/logo.png');`
  <br/>
  <br/>

  - `::get_svg_code($url)`

    Google Chrome (and other browsers) don't render `.svg` images very consistently. This function will get the SVG code of your .svg image to fix these little quirks.

    **Usage:** `echo \Lexi\Core\Helper::get_svg_code(get_template_directory_uri() . '/img/logo.svg');`
  <br/>
  <br/>
  - `::curl_request($url)`

    Your standard cURL request

    **Usage:** `$res = \Lexi\Core\Helper::curl_request($api_url);`

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

  When you are ready to deploy, run the command `npm run-script build` to compile your files for production then copy all of your theme files (**except the `/src/` & `/node_modules/` directories**) to your target server.

# Showcase

  Check out some of the great projects built on top of this base theme!

  * [Elexicon](https://elexicon.com)
  * [Spectrum Health | Health Beat](https://healthbeat.spectrumhealth.org)
  * [Terryberry](https://terryberry.com)
  * [Progressive AE](http://www.progressiveae.com)
  * [GroundWork IT Solutions](https://www.gwos.com/)
  * [Blackbaud TideTurners](https://tideturners.blackbaud.com/)
