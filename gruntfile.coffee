module.exports = (grunt) ->

  # Project configuration.
  grunt.initConfig
    pkg: grunt.file.readJSON("package.json")
    uglify:
      options:
        banner: "/*! <%= pkg.name %> <%= pkg.version %> version: <%= grunt.template.today(\"yyyy-mm-dd\") %> */\n"

      build:
        src:  "public/js/*.js"
        dest: "public/js/x.min.js"

    cssmin:
      minify:
        options:
          banner: "/*! <%= pkg.name %> <%= pkg.version %> version: <%= grunt.template.today(\"yyyy-mm-dd\") %> */\n"
          keepSpecialComments: 0

        files:
          "public/css/x.min.css" : ["public/css/*.css"]

    coffee:
      compile:
        files: [
          expand: true
          cwd: 'public/js/coffee'
          src: '*.coffee'
          dest: 'public/js/'
          ext: '.js'
        ]

    stylus:
      compile:
        options:
          banner: "/*! <%= pkg.name %> <%= pkg.version %> version: <%= grunt.template.today(\"yyyy-mm-dd\") %> */\n"
          compress: false
          linenos: false #Specifies if the generated CSS file should contain comments indicating the corresponding stylus line.
          firebug: false #Specifies if the generated CSS file should contain debug info that can be used by the FireStylus Firebug plugin
          import: ['nib/*'] #Import all nib packages

        files: [
          expand: true
          cwd: 'public/css/stylus'
          src: '*.styl'
          dest: 'public/css/'
          ext: '.css'
        ]

    jade:
      compile:
        options:
          pretty: true #Output indented HTML. #(may be turned off for production)
        files: [
          expand: true
          cwd: 'app/views'
          src: '**/*.jade'
          dest: '**/'
          ext: '.html'
        ]

    watch:
      stylesheets:
        files: 'public/css/stylus/*.styl'
        tasks: ['stylesheets']

      coffeescript:
        files: 'public/js/coffee/*.coffee'
        tasks: ['coffee']

  # Load newer plugin https://github.com/tschaub/grunt-newer
  grunt.loadNpmTasks 'grunt-newer'

  # Load watcher plugin https://www.npmjs.org/package/grunt-contrib-watch
  grunt.loadNpmTasks 'grunt-contrib-watch'

  # Load the plugin that provides the "uglify" task https://www.npmjs.org/package/grunt-contrib-uglify
  grunt.loadNpmTasks "grunt-contrib-uglify"

  # Load css minifier https://www.npmjs.org/package/grunt-contrib-cssmin
  grunt.loadNpmTasks "grunt-contrib-cssmin"

  # Load stylus https://www.npmjs.org/package/grunt-contrib-stylus
  grunt.loadNpmTasks "grunt-contrib-stylus"

  # Load imagemin https://www.npmjs.org/package/grunt-contrib-imagemin
  grunt.loadNpmTasks "grunt-contrib-imagemin"

  # Load coffee script compiler https://www.npmjs.org/package/grunt-contrib-coffee
  grunt.loadNpmTasks "grunt-contrib-coffee"

  # Load jade compiler https://www.npmjs.org/package/grunt-contrib-jade
  grunt.loadNpmTasks "grunt-contrib-jade"

  # Tasks
  grunt.registerTask "minify", ["newer:uglify", "newer:cssmin"]

  grunt.registerTask "default", ["stylus"]

  grunt.registerTask "stylesheets", ["stylus:compile"]
