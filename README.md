# Elexicon WP Theme Generator

Do you build custom WordPress themes regularly? Are you sick of running a find/replace on your entire project to make it unique to your client? Then this application is for you. Simply fill out the required fields and generate a very basic WordPress theme built on top of the Twitter Bootstrap framework. The generated theme will include a robust package.json file with a preconfigured Gruntfile for preprocessing SCSS and other helpful functions, as well as a few useful PHP snippets. The theme will not include any prebuilt templates or pages, but rather give you the starting point to do so yourself.

## New in v2.0.0:
* [Bootstrap v4.1.0](https://getbootstrap.com) integration
* [Webpack.js](https://webpack.js.org/) and [Grunt.js](https://gruntjs.com/) integration
* Complete rewrite of core theme functionality

You can generate your own theme by visiting http://theme-generator.elexicon.com

## Installation:
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
      [themename].js
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
