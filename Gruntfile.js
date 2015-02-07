module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        bootstrap: 'assets/vendor/bootstrap',
        vendor: 'assets/vendor',
        app: 'assets/coffee',

        coffee: {

            options: { sourceMap: true },

            app: {
                src: [
                    '<%= app %>/script.coffee'
                ],

                dest: 'public/js/script.js'
            }
        },

        uglify: {
            all: {
                options: { sourceMap: true },

                expand: true,
                cwd: 'public/js',
                src: ['*.js', '!*.min.js'],
                dest: 'public/js/',
                ext: '.min.js'
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-coffee');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('scripts', [ 'coffee', 'uglify' ]);

    // Default task
    grunt.registerTask('default', [ 'scripts' ]);

};