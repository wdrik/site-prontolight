var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    babel = require('gulp-babel'),
    minCSS = require('gulp-clean-css'),
    autoPrefixer = require('gulp-autoprefixer'),
    wpPot = require('gulp-wp-pot');
// Configuration Default
gulp.task('default',['sass', 'watch']);

// Configuration SASS
gulp.task('sass', () => {
    return gulp.src('assets/src/sass/**/*.scss')
        .pipe(concat('custom.min.css')) // Concat
        .pipe(sass()
            .on('error', sass.logError))

        .pipe(autoPrefixer({
            browsers: ['last 2 versions']
        }))
        //  .pipe(minCSS())
        .pipe(gulp.dest('assets/css'));
});

// Configuration watch for auto-run
gulp.task('watch', () => {
    gulp.watch('assets/src/sass/**/*.scss', ['sass']);
    gulp.watch('assets/src/js/**/*.js', ['js']);
});

/**
 * Create .pot file
 */
gulp.task('lang', function () {
	return gulp.src('**/*.php')
		.pipe(wpPot({
			domain: 'prontolight'
		}))
		.pipe(gulp.dest('languages/prontolight.pot'));
});