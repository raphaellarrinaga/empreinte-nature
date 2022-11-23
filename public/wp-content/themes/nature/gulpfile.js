/**
 * @file
 */

(function () {
  // eslint-disable-next-line strict
  'use strict';

  const gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    // // autoprefixer = require('autoprefixer'),
    // combineMq = require('gulp-combine-mq'),
    livereload = require('gulp-livereload'),
    sassGlob = require('gulp-sass-glob'),
    // postcss = require('gulp-postcss'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber');

  // // const processors = [
  // //   autoprefixer(),
  // // ];

  const paths = {
    sass: './sass/**/*.scss',
  };

  // Error notifications with notify.
  const reportError = (error) => {
    notify.onError({
      title: 'Gulp error in ' + error.plugin,
      message: error.toString()
    })(error);
  };

  // @todo group compile&watch css.
  // Maybe see package.json npm scripts.
  function compileCSS() {
    return gulp
      .src(paths.sass)
      .pipe(sassGlob())
      .pipe(
        sass({
          outputStyle: 'compressed',
          sourceComments: false,
          precision: 3,
        })
      )
      // // .pipe(postcss(processors))
      .pipe(plumber(reportError))
      // .pipe(gulp.dest('./assets/css'));
      .pipe(gulp.dest('.'));
  }


  function watchCSS() {
    return gulp
      .src(paths.sass)
      .pipe(sassGlob())
      .pipe(
        sass({
          // outputStyle: 'nested',
          outputStyle: 'compressed',
          sourceComments: true,
          precision: 3,
          includePaths: [].concat(
            'node_modules/mappy-breakpoints'
          ),
        })
      )
      // .pipe(postcss(processors))
      // .pipe(plumber(reportError))
      // .pipe(gulp.dest('./assets/css'))
      .pipe(gulp.dest('.'))
      .pipe(livereload());
  }

  exports.watchCSS = watchCSS;

  function watchFiles() {
    livereload.listen();
    gulp.watch(paths.sass, watchCSS);
  }

  exports.watch = watchFiles;

  const build = gulp.series(compileCSS);
  exports.build = build;

}());
