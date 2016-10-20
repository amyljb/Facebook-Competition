module.exports = function (grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
        // Put all javascript files into one file
        concat: {
            css: {
                src: ['build/css/reset.css', 'build/css/*.css', '!build/css/ie-starter.css', '!build/css/main.css', '!build/css/responsive.css', 'build/css/main.css', 'build/css/responsive.css'],
                dest: 'assets/css/production.css'
            },
            js: {
                src: ['build/js/jquery.js', 'build/js/*.js', '!build/js/main.js', 'build/js/main.js'],
                dest: 'assets/js/production.js'
            }
        },
                
        // Minimize javascript files
        uglify: {
            options: {
                // the banner is inserted at the top of the output
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
            },
            dist: {
                files: {
                    'assets/js/production.min.js': ['assets/js/production.js']
                }
            }
        },
                
        // Minify all CSS files into 1 file
        cssmin: {
            target: {
                files: [{
                        expand: true,
                        cwd: 'assets/css',
                        src: 'production.css',
                        dest: 'assets/css',
                        ext: '.min.css'
                    }]
            }
        },
        
        // Optimize images
        imagemin: {
            dynamic: {
                files: [{
                        expand: true,
                        cwd: 'build/images/',
                        src: ['**/*.{png,jpg,gif}'],
                        dest: 'assets/images/'
                    }]
            }
        },
        
        // Dekstop notifications
        notify: {
            welcome: {
                options: {
                    title: "Grunt", // Note we are outputting the package.json name variable here
                    message: "Lets roll: <%= pkg.name %>"
                }
            },
            minify: {
                options: {
                    title: "Grunt", // Note we are outputting the package.json name variable here
                    message: "Minify: <%= pkg.name %>"
                }
            },
            watching: {
                options: {
                    title: "Grunt", // Note we are outputting the package.json name variable here
                    message: "Watching: <%= pkg.name %>"
                }
            },
            another: {
                options: {
                    title: "Grunt",
                    message: "All good! :)"
                }
            }
        },
        
        // Watch file changes, file deletions or file additions
        watch: {
            scripts: {
                files: ['build/js/*.js'],
                tasks: ['concat:js', 'uglify'],
                options: {
                    spawn: false
                }
            },
            css: {
                files: ['build/css/*.{css,scss}'],
                tasks: ['concat:css', 'cssmin'],
                options: {
                    spawn: false
                }
            },
            images: {
                files: ['build/images/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            },
            notify: {
                files: ['build/css/*.*', 'build/js/*.*', 'build/images/*.*'],
                tasks: ['notify:another']
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat'); // Merge JS files
    grunt.loadNpmTasks('grunt-contrib-uglify'); // Minify JS files
    grunt.loadNpmTasks('grunt-contrib-imagemin'); // Image optimization
    grunt.loadNpmTasks('grunt-contrib-cssmin'); // Minify CSS files into 1 file
    grunt.loadNpmTasks('grunt-contrib-watch'); // Watch changes
    grunt.loadNpmTasks('grunt-notify'); // Desktop notifications

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['notify:watching','watch']);
    grunt.registerTask('minify', ['notify:minify','concat', 'uglify', 'cssmin', 'imagemin']);

};