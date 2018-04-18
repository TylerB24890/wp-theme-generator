# [Elexicon Theme Generator](http://theme-generator.elexicon.com)

Building custom WordPress themes can be redundant and annoyingly repetitive. The [Elexicon](http://elexicon.com) Theme Generator aims to eliminate the annoying stuff we repeat every time we develop a new theme. Follow the installation instructions to get started.

## What's New
* [Bootstrap v4.1.0](https://getbootstrap.com) integration
* [Webpack.js](https://webpack.js.org/) and [Grunt.js](https://gruntjs.com/) integration
* Complete rewrite of core theme functionality

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
All Core Theme classes are setup under the `Elexicon` namespace. Classes contained within the `/inc/core/` directory are autoloaded using the Composer `PSR-4` autoloader. This means you can access core classes and methods like `Elexicon\NavWalker` which will give you access to the `NavWalker` class for the main navigation.

The following are the available classes and methods available in the Theme Core.
* `Elexicon\Customizer` - Core WP Customizer functionality
* `Elexicon\Helper` - Helper functions for theme development
  - `Elexicon\Helper::icongram_icon($lib, $icon, $size = 24, $color = 'FFFFFF', $echo = true)`

  - `Elexicon\Helper::truncate($string, $length = 80, $etc = '&#133;', $break_words = false, $middle = false)`

  - `Elexicon\Helper::is_child( $parent = '' )`

  - `Elexicon\Helper::get_subpages($id)`

  - `Elexicon\Helper::remove_images($content = null)`

  - `Elexicon\Helper::make_url_link($text)`

  - `Elexicon\Helper::search_results_count()`

  - `Elexicon\Helper::get_attachment_id_by_url( $url )`

  - `Elexicon\Helper::get_file_size($file)`

  - `Elexicon\Helper::get_svg_code($url)`

* `Elexicon\NavWalker` - The WP Nav Walker extension to generate a Bootstrap 4.x navigation
* `Elexicon\Pagination` - The pagination class to render Bootstrap 4.x pagination.
* `Elexicon\PostTypes` - Theme post type registration (example provided in file)
* `Elexicon\Taxonomies` - Theme taxonomy registration (example provided in file)
* `Elexicon\ThemeInit` - Theme setup and configuration

    - `Elexicon\ThemeInit::$theme_slug`
    - `Elexicon\ThemeInit::$theme_version`
    - `Elexicon\ThemeInit::$theme_prefix`
