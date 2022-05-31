// https://sajib.me/how-to-add-browsersync-and-sass-with-wordpress-theme-using-gulp/

var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass')(require('sass'));
var concat = require('gulp-concat');
var cssbeautify = require('gulp-cssbeautify');
var prefix = require('gulp-autoprefixer');

// sass to css
gulp.task('sass', function () {
  return gulp
    .src('./assets/sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(prefix('last 2 versions'))
    .pipe(cssbeautify())
    .pipe(gulp.dest('./assets/css/'))
    .pipe(browserSync.reload({ stream: true }));
});

// browser-sync task for starting the server.
gulp.task('browser-sync', function () {
  //watch files
  var files = ['./assets/sass/**/*.scss', './**/*.php'];

  //initialize browsersync
  browserSync.init(files, {
    //browsersync with a php server
    watchTask: true,
    proxy: 'http://localhost/TDGCorporateWebsite/',
  });
});

// Start the livereload server and watch files for change
gulp.task('watch', function () {
  gulp.watch('./assets/sass/**/*.scss', gulp.parallel('sass'));
});

// Default task to be run with `gulp`
gulp.task('default', gulp.parallel('sass', 'browser-sync', 'watch'));
