var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    csso = require('gulp-csso'),
    sass = require('gulp-sass'),
    image = require('gulp-image'),
    build_path = {
        "scss": './public/css/build',
        "js": './public/js/build',
        "images": './public/img/build',
        "fonts": './public/fonts/build'
    };

gulp.task('css:vendor', function () {
    return gulp.src([
        "./node_modules/bootstrap/dist/css/bootstrap.css",
        "./resources/assets/sass/layout.scss",
        "./node_modules/owl.carousel/dist/assets/owl.carousel.css",
        "./node_modules/owl.carousel/dist/assets/owl.theme.default.css"
    ])
        .pipe(concat('vendor.css'))
        .pipe(csso())
        .pipe(gulp.dest(build_path.scss));
});

gulp.task('js', function () {
    gulp.src([
        "./node_modules/jquery/dist/jquery.min.js",
        "./node_modules/jquery.maskedinput/src/jquery.maskedinput.js",
        "./node_modules/owl.carousel/dist/owl.carousel.min.js",
        "./resources/assets/js/run.jquery.js"
    ])
        .pipe(concat('vendor.js'))
        .pipe(uglify())
        .pipe(gulp.dest(build_path.js));
});

gulp.task('image', function () {
    gulp.src('./resources/assets/img/*/*')
        .pipe(image())
        .pipe(gulp.dest(build_path.images));
    gulp.src('./resources/assets/img/*')
        .pipe(image())
        .pipe(gulp.dest(build_path.images));
});

gulp.task('fonts', function () {
    return gulp.src([
        './resources/assets/fonts/*'
    ])
        .pipe(gulp.dest(build_path.fonts));
});

// AUTOPREFIX
gulp.task('prefixer', function () {
    "use strict";
    gulp.src(build_path.scss)
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('dist'))
});

// DEFAULT
gulp.task('default', [
    'js',
    "icons",
    "css:vendor",
    'watch',
    "sass"
]);

gulp.task('build', [
    "fonts",
    "image",
    "css:vendor",
    'prefixer',
    'js'
]);



