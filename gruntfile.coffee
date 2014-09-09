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
      add_banner:
        options:
          banner: "/*! <%= pkg.name %> <%= pkg.version %> version: <%= grunt.template.today(\"yyyy-mm-dd\") %> */\n"
          keepSpecialComments: 0

        files:
          "public/css/x.min.css" : ["public/css/*.css"]
    coffee:
      compile:
        files:
          "public/js/x.js" : ["public/coffee/*.coffee"]
    
    stylus:
      compile:
        options:
          banner: "/*! <%= pkg.name %> <%= pkg.version %> version: <%= grunt.template.today(\"yyyy-mm-dd\") %> */\n"
          compress: false
          linenos: false #Specifies if the generated CSS file should contain comments indicating the corresponding stylus line.
          firebug: false #Specifies if the generated CSS file should contain debug info that can be used by the FireStylus Firebug plugin
          import: ['nib/*'] #Import all nib packages
           
        files:
          'public/css/result.css': ['public/css/stylus/test.styl']
  
  # Load newer plugin https://github.com/tschaub/grunt-newer
  grunt.loadNpmTasks 'grunt-newer' 

  # Load watcher plugin https://www.npmjs.org/package/grunt-contrib-watch

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

  # Tasks
  grunt.registerTask "minify", ["newer:uglify", "newer:cssmin"]
  
  grunt.registerTask "default", ["stylus"]
