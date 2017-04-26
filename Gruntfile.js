module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

    // Load in the configuration file
    var PathConfig = require('./js/grunt-settings.js');

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

            // Compress Images On The Fly
            images: {
                files: ['<%= config.imgSourceDir %>**/*.*'],
                tasks: ['newer:imagemin:dynamic'],
                options: {
                    spawn: false
                }
            },
            svgSprites: {
                files: ['<%= config.imgSourceDir %>svg-icons/*.*'],
                tasks: ['svgstore', 'svg2string'],
                options: {
                    spawn: false
                }
            },
            // Compress SCSS Files with Watcher
            css: {
                files: ['<%= config.sassDir %>**/*.scss'],
                tasks: ['sass:dev'],
                options: {
                    spawn: false,
                }
            }
        },

        // Compress Images
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: '<%= config.imgSourceDir %>',
                    src: ['**/*.{jpg,gif,png}'],
                    dest: '<%= config.imgDir %>'
                }]
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

        // Minify Javascript Files
        uglify: {
            dist: {
                files: {
                    '<%= config.jsDir %><%= config.siteName %>.min.js': ['<%= config.jsDir %><%= config.siteName %>.js']
                }
            }
        }
    });

    // Register Watch Task
    grunt.registerTask('w', ['watch']);

    // Register BrowserSync
    grunt.registerTask('bs', ['browserSync']);

    // Init BrowserSync with Watch
    grunt.registerTask('dev', ['browserSync', 'watch']);

    // Set Default Environment as 'dev'
    grunt.registerTask('default', ['dev']);

    // Before pushing to production, run 'grunt dist' via terminal
    grunt.registerTask('dist', ['imagemin', 'uglify']);

};
