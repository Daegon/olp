var gulp = require('gulp'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    streamify = require('gulp-streamify'),
    autoprefixer = require('gulp-autoprefixer'),
    babelify = require('babelify'),
    browserify = require('browserify'),
    watchify = require('gulp-watchify'),
    cssmin = require('gulp-cssmin'),
    rename = require("gulp-rename");

var baseDirs = {
    src: 'src/AppBundle/Resources/assets/',
    assets: 'web/assets/'
};

var paths = {
    styles: {
        scss: baseDirs.src + 'styles/*.scss',
        out: baseDirs.assets + 'css/'
    },
    scripts: {
        js: baseDirs.src + 'scripts/entries/*.jsx',
        out: baseDirs.assets + 'js/'
    }
};

gulp.task('styles', function () {
    return gulp.src([paths.styles.scss, 'node_modules/bootstrap/dist/css/bootstrap.min.css'])
        .pipe(sass())
        .pipe(autoprefixer('last 3 versions'))
        .pipe(cssmin())
        .pipe(gulp.dest(paths.styles.out));
});

// A way to enable configurable watchify watching
var watching = false;
gulp.task('enable-watch-mode', function () {
    watching = true;
});

gulp.task('browserify', watchify(function (watchify) {
    return gulp.src(paths.scripts.js)
        .pipe(watchify({
            watch: watching,
            cache: {},
            packageCache: {},
            setup: function (bundle) {
                bundle
                    .transform(babelify, {
                        presets: ['es2015', 'react'],
                        plugins: ['transform-class-properties']
                    })
                    .on('error', function (err) {
                        console.log(err.message);
                        this.emit('end');
                    });
            }
        }))
        .pipe(streamify(uglify()))
        .pipe(rename({
            extname: '.js'
        }))
        .pipe(gulp.dest(paths.scripts.out))
}));

gulp.task('watchify', ['enable-watch-mode', 'browserify']);

gulp.task('watch', ['watchify'], function () {
    gulp.watch([paths.styles.scss], ['styles']);
});

gulp.task('build', ['styles', 'browserify']);

gulp.task('default', ['watch']);
