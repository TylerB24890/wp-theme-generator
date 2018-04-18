# [Elexicon Theme Generator](http://theme-generator.elexicon.com)

Building custom WordPress themes can be redundant and annoyingly repetitive. The [Elexicon](http://elexicon.com) Theme Generator aims to eliminate the annoying stuff we repeat every time we develop a new theme. Follow the installation instructions to get started.

## What's New
* [Bootstrap v4.1.0](https://getbootstrap.com) integration
* [Webpack.js](https://webpack.js.org/) and [Grunt.js](https://gruntjs.com/) integration
* Complete rewrite of core theme functionality

## Features
* SCSS compiling and Browser Reload through Grunt
* Webpack integration for modern JS and ES6 functionality
* PHP PSR-4 Autoloading with Composer

# Getting started
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
      -Variables
        index.js
        Url.js
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


- `::truncate($string, $length = 80, $etc = '&#133;', $break_words = false, $middle = false)`

  Truncate a string

  - `$string (string)` The string to truncate
  - `$length (int)` The number of characters to truncate the string down to
  - `$etc (string)` What to put at the end of the truncated string to indicate more text
  - `$break_words (bool)` Whether or not you want to cut a word off in the middle
  - `$middle (bool)` A fall back for `$break_words` (you must set both options to true if you want to break a word in the middle.)

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
