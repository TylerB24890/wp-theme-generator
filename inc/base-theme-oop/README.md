## Installation:
* Unzip the downloaded file and copy it's contents over to your `/themes/` directory.
* `cd` to the theme directory in your terminal.
* `npm install`
* `npm run-script build`
* `composer install`
* Activate the theme from your wp-admin dashboard.
* Begin building!

## Theme Structure
```
-{%THEME_SLUG%}
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
