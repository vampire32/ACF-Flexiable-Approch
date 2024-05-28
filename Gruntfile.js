module.exports = function(grunt) {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),


        sass: {
            dist: {
                options: {
                    implementation: require('sass'),
                    sourceMap: true,
                },
                files: {
                    '/assets/css/style.css': '/assets/scss/main.scss'
                }
            }
        },


        watch: {
            sass: {
                files: ['scss/**/*.scss'],
                tasks: ['sass']
            }
        }
    });

    // Load the plugins
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s).
    grunt.registerTask('default', ['sass', 'watch']);
};
