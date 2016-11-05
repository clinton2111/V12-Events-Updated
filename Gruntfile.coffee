module.exports = (grunt) ->
  sassLoc = './resources/assets/sass'
  coffeeLoc = './resources/assets/coffee'
#  cssLoc = './resources/assets/css'
  jsLoc = './resources/assets/js'
  jsFinal = './public/js'
  cssFinal = './public/css'
  sass_require = ['bourbon']
  # ===========================================================================
  # CONFIGURE GRUNT ===========================================================
  # ===========================================================================

  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')

    watch:
      coffee:
        files: [coffeeLoc + '/**/*.coffee']
        tasks: ['coffee']

      concat:
        files: [
          jsLoc + '/**/*.js'
        ]
        tasks: ['concat']

      compass:
        files: [sassLoc + '/**/*.scss']
        tasks: ['compass']


    concat:
      options:
        stripBanners: true
        banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */'
      target:
        files: [{
          src: [
            jsLoc + '/frontend/**/*.js'
          ]
          dest: jsFinal + '/frontend.js'
        },{
          src: [
            jsLoc + '/admin/**/*.js'
          ]
          dest: jsFinal + '/admin.js'
        }]
    coffee:
      compile:
        files: [{
          expand: true
          cwd: coffeeLoc
          src: ['**/*.coffee']
          dest: jsLoc
          ext: '.js'
        }]
    compass:
      compile:
        options:
          sassDir: sassLoc
          cssDir: cssFinal
          imagesDir: './assets'
          environment: 'development'
          outputStyle: 'expanded'
          require: sass_require
    uglify:
      options:
        mangle: true
      build:
        files: [{
          expand: true
          cwd: jsFinal
          src: ['frontend.js']
          dest: jsFinal
          ext: '.min.js'
        }, {
          expand: true
          cwd: jsFinal
          src: ['admin.js']
          dest: jsFinal
          ext: '.min.js'
        }]
    cssmin:
      build:
        files: [{
          expand: true,
          cwd: cssFinal,
          src: ['frontend.css'],
          dest: cssFinal,
          ext: '.min.css'
        }, {
          expand: true,
          cwd: cssFinal,
          src: ['admin.css'],
          dest: cssFinal,
          ext: '.min.css'
        }]


  # ===========================================================================
  # LOAD GRUNT PLUGINS ========================================================
  # ===========================================================================
  # we can only load these if they are in our package.json
  # make sure you have run npm install so our app can find these
  grunt.loadNpmTasks 'grunt-contrib-uglify'
  grunt.loadNpmTasks 'grunt-contrib-cssmin'
  grunt.loadNpmTasks 'grunt-contrib-coffee'
  grunt.loadNpmTasks 'grunt-contrib-concat'
  grunt.loadNpmTasks 'grunt-contrib-compass'
  grunt.loadNpmTasks 'grunt-contrib-watch'
  grunt.registerTask 'default', ['watch']
  grunt.registerTask 'wrap', ['uglify', 'cssmin']