var gulp      = require('gulp');
var sass      = require('gulp-sass');
var webserver = require('gulp-webserver');
var opn       = require('opn');
var uglify    = require('gulp-uglify');
var gutil     = require('gulp-util');
var filesize  = require('gulp-filesize');
var minifyHTML= require('gulp-minify-html');
var imagemin  = require('gulp-imagemin');
var pngquant  = require('imagemin-pngquant');

var paths = {
    css: {
        src: './sass',
        files: './src/sass/**/*.scss',
        dest: '.'
    },
    js: {
        src: './js',
        files: './src/js/**/*.js',
        dest: 'js'
    },
    fonts: {
	  	src: './src/fonts/**/*',
	  	dest: 'fonts'
    },
    images: {
        src: './src/images/**/*',
        dest: 'images'
    }
}

//Make pretty css from SASS files
gulp.task('css', function () {
    gulp.src(paths.css.files)
    .pipe(sass({
        outputStyle: 'compressed',
        includePaths : [paths.css.src],
        errLogToConsole: true
    }))
    .pipe(gulp.dest(paths.css.dest))
    .on('error', gutil.log)
});

gulp.task('fonts',function() {
	gulp.src(paths.fonts.src).pipe(gulp.dest(paths.fonts.dest));
});

//Throw JS together and minify
gulp.task('js', function() {
    gulp.src(paths.js.files)
    .pipe(uglify())
    .pipe(filesize())
    .pipe(gulp.dest(paths.js.dest))
    .on('error', gutil.log)
});

//Optimize images
gulp.task('images', function () {
     gulp.src(paths.images.src)
     .pipe(imagemin({
        progressive: true,
        svgoPlugins: [{removeViewBox: false}],
         use: [pngquant()]
     }))
     .pipe(gulp.dest(paths.images.dest));
});

//Look for changes
gulp.task('watch', function() {
  gulp.watch(paths.css.files, ['css']);
  gulp.watch(paths.js.files, ['js']);
});

//Serve up the fancy part
gulp.task('serve', ['css','js','fonts','images','watch']);
