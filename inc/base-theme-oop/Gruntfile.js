module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);

	// Load in the configuration file
	var PathConfig = require('./src/js/grunt-settings.js');
	var webpackConfig = require('./webpack.config');
	var webpackDev = require('./webpack.dev');

	// tasks
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		config: PathConfig,

		// SASS compiling configuration
		sass: {
			options: PathConfig.hasBower,
			dev: {
				options: {
					sourceMap: true,
					style: 'nested'
				},
				files: [
					{
						expand: true,
						cwd: '<%= config.sassDir %>',
						src: ['**/*.scss', '!<%= config.sassMainFileName %>.scss'],
						dest: '<%= config.cssDir %>',
						ext: '.css'
					},
					{src: '<%= config.sassDir %><%= config.sassMainFileName %>.scss', dest: '<%= config.cssMainFileDir %><%= config.cssMainFileName %>.css'}
				]
			},
			dist: {
				options: {
					sourceMap: false,
					style: 'nested'
				},
				files: [
					{
						expand: true,
						cwd: '<%= config.sassDir %>',
						src: ['**/*.scss', '!<%= config.sassMainFileName %>.scss'],
						dest: '<%= config.cssDir %>',
						ext: '.css'
					},
					{src: '<%= config.sassDir %><%= config.sassMainFileName %>.scss', dest: '<%= config.cssMainFileDir %><%= config.cssMainFileName %>.css'}
				]
			},
			min: {
				options: {
					sourceMap: false,
					outputStyle: 'compressed'
				},
				files: [
					{
						expand: true,
						cwd: '<%= config.sassDir %>',
						src: ['**/*.scss', '!<%= config.sassMainFileName %>.scss'],
						dest: '<%= config.cssDir %>',
						ext: '.min.css'
					},
					{src: '<%= config.sassDir %><%= config.sassMainFileName %>.scss', dest: '<%= config.cssMainFileDir %><%= config.cssMainFileName %>.min.css'}
				]
			}
		},

		// Configure Watcher
		watch: {
			options: {
				debounceDelay: 1,
				// livereload: true,
			},
			tasks: ['grunt-webpack'],

			// Compress SCSS Files with Watcher
			css: {
				files: ['<%= config.sassDir %>**/*.scss'],
				tasks: ['sass:dev'],
				options: {
					spawn: false,
				}
			},

			js: {
				files: ['./src/js/*.js', './src/js/**/*.js'],
				tasks: ['webpack:dev'],
				options: {
					spawn: false
				}
			}
		},

		// Keep multiple browsers & devices in sync when building websites.
		browserSync: {
			dev: {
				bsFiles: {
					src : ['*.html', '*.php', '<%= config.cssDir %>*.css', '*.css', '<%= config.jsDir %>*.js']
				},
				options: {
					proxy: 'http://<%= config.siteUrl %>',
					host: '<%= config.siteUrl %>',
					open: 'external',
					watchTask: true
				}
			}
		},

		webpack: {
			prod: webpackConfig,
			dev: webpackDev
		},
	});

	// Init BrowserSync with Watch
	grunt.registerTask('dev', ['browserSync', 'watch']);

	// Set Default Environment as 'dev'
	grunt.registerTask('default', ['dev']);

	// Before pushing to production, run 'grunt dist' via terminal
	grunt.registerTask('dist', ['sass:min', 'webpack:prod']);
};
