// Gulp and plugins
var gulp = require('gulp');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var pug = require('gulp-pug');
var notify = require("gulp-notify");
// var sftp = require('gulp-sftp');
var imagemin = require('gulp-imagemin');


// Paths to source files
var paths = {
	sass: ['../sass/**/*.sass'],
	pug: ['../pug/*.pug']
	// pug: ['../pug/home.pug', '../pug/_mixins.pug']
}


// Compile SASS, create Sourcemaps, reload BrowserSync
gulp.task('sass', function() {
	gulp.src(paths.sass)
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'expanded'
		}))
		.on('error', notify.onError(function (error) {
			return error.message;
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('../css/'))
		.pipe(browserSync.stream());
});


// Pug
gulp.task('pug', function () {
	return gulp.src(paths.pug)
		.pipe(pug({
			pretty: true
		}))
		.on('error', notify.onError(function (error) {
			return error.message;
		}))
		.pipe(gulp.dest('../'))
		.pipe(browserSync.stream());
});



// Imagemin
gulp.task('imagemin',  function() {
	gulp.src('../img/**/*')
		.pipe(imagemin({
			interlaced: true,
			progressive: true,
			optimizationLevel: 5,
			svgoPlugins: [{removeViewBox: true}]
		}))
		.pipe(gulp.dest('../img/minified/'))
});


// Server + watching files changes
gulp.task('serve', ['sass', 'pug'],  function() {

	browserSync.init({
		server: "../"
	});
	
	gulp.watch(paths.sass, ['sass']);
	gulp.watch(paths.pug, ['pug']);

	gulp.watch("../*.html").on('change', browserSync.reload);
	gulp.watch("../js/*.js").on('change', browserSync.reload);
});


// Default task
gulp.task('default', ['serve']);
