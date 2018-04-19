# [Elexicon Theme Generator](http://theme-generator.elexicon.com)

Building custom WordPress themes can be redundant and annoyingly repetitive. The [Elexicon](http://elexicon.com) Theme Generator aims to eliminate the annoying stuff we repeat every time we develop a new theme. Follow the installation instructions to get started.

Want to see the generated theme code? [View the repo](https://github.com/TylerB24890/elexicon-base).

## What's New
* [Bootstrap v4.1.0](https://getbootstrap.com) integration
* [Webpack.js](https://webpack.js.org/) and [Grunt.js](https://gruntjs.com/) integration
* Complete rewrite of core theme functionality
* PSR-4 Autoloading for core functionality
* New Helper functions

## Features
* Bootstrap 4.x
* Bootstrap Nav Walker for easy management through the wp-admin dashboard
* SCSS compiling and Browser Reload through Grunt
* Webpack integration for modern JS and ES6 functionality
* PSR-4 Autoloading with Composer

# Getting started
## Requirements
* \>PHP 5.4
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
    -core
      Customizer.php
      Helper.php
      index.php
      NavWalker.php
      Pagination.php
      PostTypes.php
      Taxonomies.php
      ThemeInit.php
  -languages
    index.php
    readme.txt
  -src
    -js
      app.js
      customizer.js
      grunt-settings.js
      themename.js
      -variables
        index.js
        url.js
    -scss
      _animated-hamburger.scss
      _bootstrap-overrides.scss
      _elx-mixins.scss
      _footer.scss
      _global.scss
      _header.scss
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

  - `_animated-hamburger.scss` - The styles to animate the Bootstrap `.navbar-toggler` element.
  - `_bootstrap-overrides.scss` - Put all Bootstrap variable overrides here.
  - `_elx-mixins.scss` - A collection of useful mixins for use throughout the project.
  - `_global.scss` - Global styles for the theme (body, links, section, etc...)
  - `_header.scss` - Styles for the Bootstrap navbar and global site header go here.
  - `_footer.scss` - Styles for the global footer element go here.
  - `_style.scss` - All SCSS files should be imported in this file for rendering.

### Javascript

  The scripts for the site are located in the `/src/js/` directory. Webpack compiles all scripts into a `bundle.js` file that is included in your theme. The `bundle.js` file is compiled from the `app.js` file. You should `import` your main scripts into this file for compiling. If you are unfamiliar with [Modern Javascript](https://medium.com/the-node-js-collection/modern-javascript-explained-for-dinosaurs-f695e9747b70) I suggest you [practice it](https://javascript.info/) it a little bit.

  Within the `/src/js/` directory you will see a few files and directories. We're going to go through the files first, then move onto the directories and their contents.

  - `app.js` The main file for you application. Import your custom Javascript files into here for compiling.
  - `customizer.js` Used for the wp-admin dashboard Customizer. This file will **not** effect the frontend.
  - `[your-theme-name].js` You should use this as your "main" theme file. Put all one-off jQuery functions and other small/global items in here.
    - Be sure to `import $ from 'jquery'` to use jQuery in here.
  - `grunt-settings.js` This file controls your `Gruntfile.js` script and holds your variables in one place.
    - If you change your stylesheet directories you should make sure you change them here.
    - This file also contains the Browser Reload URL for your theme. By default it is `http://[your-theme-name].local:3000` but you are free to change that to whatever your Virtual Host is configured to. (Just make sure the `:3000` is at the end.)

  - `/variables/` - This directory contains a couple of files off the bat. The most important file here is the `index.js` file. To keep things clean, you should separate your global variables into individual files. For example, all variables dealing with the URL are located in the `url.js` file and imported into the `index.js` file for easy exporting.

## Core Classes
  All Core Theme classes are setup under the `Elexicon` namespace. Classes contained within the `/inc/core/` directory are autoloaded using the Composer `PSR-4` autoloader. This means you can access core classes and methods like `\Elexicon\NavWalker` which will give you access to the `NavWalker` class for the main navigation.

### `\Elexicon\Customizer`
  The Customizer class is an extension of the [WordPress Customizer API](https://developer.wordpress.org/themes/customize-api/). Put all of your custom theme "Customizer" code within this class. It is instantiated in the `__construct()` function of the `\Elexicon\ThemeInit` class.

### `\Elexicon\Helper`
  The Helper class is a collection of useful static PHP functions that can be accessed throughout the theme.

#### Variables

  All theme variables can be accessed in the following structure: `\Elexicon\Helper::$variable_name`

  - `::$theme_name` - Global Theme Name

  - `::$theme_slug` - The theme slug

  - `::$theme_prefix` - The theme prefix

  - `::$theme_version` - The theme version

  - `::$parts` - Quick access to the `/template-parts/` directory.

    **Usage:** `get_template_directory(\Elexicon\Helper::$parts . 'post', 'list');`

  - `::$icons_url` - The Icongr.am URL

  #### Methods
  - `::icongram_icon($lib, $icon, $size = 24, $color = 'FFFFFF', $echo = true)`

    [FontAwesome](https://fontawesome.com/) is pre-loaded into the theme, however if you have the need for an icon not found in the [FontAwesome Library](https://fontawesome.com/icons?from=io), you can pull the icon from the handy service [Icongr.am](https://icongr.am/).
    - `$lib (string)` The library you wish to pull from (Icongram has many to choose from)
    - `$icon (string)` The icon you wish to pull from Icongram
    - `$size (int)` The size of the icon
    - `$color (string)` The color of the icon
    - `$echo (bool)` Echo the icon markup into the page.

    **Usage:** `\Elexicon\Helper::icongram_icon('clarity', 'home', 24, '000000');`
  <br/>
  <br/>

  - `::get_partial($dir)`

    Get a template part within the theme. Works very similar to WordPress's built in `get_template_part()` function but with less parameters and easier management. In WordPress's `get_template_part()` function you cannot pass variables such as `$exclude`. `::get_partial()` will allow you to do so.

    - `$dir` - Can be the filename **with or without** the extension **or** the path to the file within the `/template-parts/` directory.

    **Usage:** `\Elexicon\Helper::get_partial('single/content')` Will pull the file `/template-parts/single/content.php`
  <br/>
  <br/>

  - `::truncate($string, $limit, $break=".", $pad="...")`

    Truncate a string

    - `$string (string)` The string to truncate
    - `$limit (int)` The number of words to break down to.
    - `$break (string)` What character to end the break at. (default is a period.)
    - `$pad (bool)` What to put at the end of the string

    **Usage:** `\Elexicon\Helper::truncate(get_the_excerpt(), 120)`
  <br/>
  <br/>


  - `::is_child( $parent = '' )`

    Check if the current page or post is a child of another page or post.

    - `$parent (int)` The ID of the post or page to check.

    **Usage:** `\Elexicon\Helper::is_child($post->ID);`
  <br/>
  <br/>

  - `::get_subpages($id)`

    Get children pages (useful for creating sidebar navigations)

    - `$id (int)` The ID of the page to retrieve the children for

    **Usage:** `\Elexicon\Helper::get_subpages($post->ID)`
  <br/>
  <br/>

  - `::remove_images($content = null)`

    Remove all images from a posts content

    - `$content (string)` The content to strip all `<img>` tags from. Will default to the current post content if `$content` is `null`

    **Usage:** `\Elexicon\Helper::remove_images(get_the_content())`
  <br/>
  <br/>

  - `::make_url_link($text)`

    Parse text and wrap all valid URLs in `<a href=""></a>` elements.

    - `$text (string)` The text to parse and "linkify"

    **Usage:** `\Elexicon\Helper::make_url_link(get_the_content())`
  <br/>
  <br/>

  - `::search_results_count()`

    Get the number of returned search results.
  <br/>
  <br/>

  - `::get_attachment_id_by_url( $url )`

    Get a post attachment ID from it's Media Library URL.

    - `$url (string)` The URL of the media attachment

    **Usage:** `\Elexicon\Helper::get_attachment_id_by_url(get_the_post_thumbnail_url());`
  <br/>
  <br/>

  - `::get_file_size($file)`

    Get the size in kb, mb, gb of a file.

    - `$file (string)` The path to the file

    **Usage:** `$file_size = \Elexicon\Helper::get_file_size(get_template_directory() . '/img/logo.png');`
  <br/>
  <br/>

  - `::get_svg_code($url)`

    Google Chrome (and other browsers) don't render `.svg` images very consistently. This function will get the SVG code of your .svg image to fix these little quirks.

    **Usage:** `echo \Elexicon\Helper::get_svg_code(get_template_directory_uri() . '/img/logo.svg');`


### `\Elexicon\NavWalker`

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
    'fallback_cb' => '\Elexicon\NavWalker::fallback',
    'walker' => new \Elexicon\NavWalker
  ));
  ```

### `\Elexicon\Pagination`

  The Bootstrap Pagination

  **Usage:** `\Elexicon\Pagination::render_pagination()`

### `\Elexicon\PostTypes`

  Register custom post types with WordPress. See the `/inc/core/PostTypes.php` file for an example.

### `\Elexicon\Taxonomies`

  Register custom post types with WordPress. See the `/inc/core/Taxonomies.php` file for an example.

### `\Elexicon\ThemeInit`

  Initiates the theme and configures it with WordPress. Standard `functions.php` functionality in here.


## Deploying

  When you are ready to deploy, run the command `npm run-script build` to compile your files for production then copy all of your theme files (**except the `/src/` & `/node_modules/` directories**) to your target server.

# Showcase

  Check out some of the great projects built on top of this base theme!

  * [Spectrum Health | Health Beat](https://healthbeat.spectrumhealth.org)
  * [Terryberry](https://terryberry.com)
  * [Progressive AE](http://www.progressiveae.com)
  * [GroundWork IT Solutions](https://www.gwos.com/)
  * [Blackbaud TideTurners](https://tideturners.blackbaud.com/)
