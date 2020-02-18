## NOTE:
This project is not longer maintained. It is left active for historical reference and legacy use but is no longer updated.

# [Lexi Theme Generator](http://theme-generator.elexicon.com)

Building custom WordPress themes can be redundant and annoyingly repetitive. The [Lexi](http://elexicon.com) Theme Generator aims to eliminate the annoying stuff we repeat every time we develop a new theme. Follow the installation instructions to get started. For full documentation visit http://theme-generator.elexicon.com/docs/

#### Note: - This is NOT the theme. Please visit the [generator](http://theme-generator.elexicon.com) to get yourself a copy.

## What's New
* [Bootstrap v4.1.0](https://getbootstrap.com) integration
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

### [Full Documentation](http://theme-generator.elexicon.com/docs/)

### [Example Theme](https://github.com/TylerB24890/elexicon-base)
