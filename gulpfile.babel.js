import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';

const server = browserSync.create();

const PRODUCTION = yargs.argv.prod;

// Assets development and production paths
const paths = {
  styles: {
    src: 'src/assets/scss/bundle.scss',
    dest: 'dist/assets/css'
  },
  images: {
    src: 'src/assets/images/**/*.{jpg,jpeg,png,gif,svg}',
    dest: 'dist/assets/images'
  },
  scripts: {
    src: 'src/assets/js/bundle.js',
    dest: 'dist/assets/js'
  },
  plugins: {
    src: ['../../plugins/_themename-metaboxes/packaged/*'],
    dest: ['lib/plugins']
  },
  other: {
    src: ['src/assets/**/*', '!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
    dest: 'dist/assets'
  },
  package: {
    src: ['**/*', '!node_modules{,/**}', '!packaged{,/**}', '!src{,/**}', '!.babelrc','!gulpfile.babel.js','!package.json','!package-lock.json'],
    dest: 'packaged'
  }
}

// Automatically refresh the browser after changes
export const serve = (done) => {
  server.init({
    proxy:"http://localhost:8888/astera/"
  });
  done();
}

export const reload = (done) => {
  server.reload();
  done();
}

// Delete dist folder and recreate another one with updated contents
// Cleans the folder before running any tasks
// No need for curly braces as function only has one line of code ECMAScript 6
export const clean = () => del(['dist']);

// Compiles scss styles from src folder into css in the dist folder
export const styles = () => {
  return gulp.src(paths.styles.src)
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(server.stream());
}

// Minify images
export const images = () => {
  return gulp.src(paths.images.src)
  .pipe(gulpif(PRODUCTION, imagemin()))
  .pipe(gulp.dest(paths.images.dest));
}

// Watch for changes in the scss files and compile to the respective css files
export const watch = () => {
  gulp.watch('src/assets/scss/**/*.scss', styles);
  gulp.watch('src/assets/js/**/*.js', gulp.series(scripts, reload));
  gulp.watch('**/*.php', reload);
  gulp.watch(paths.images.src, gulp.series(images, reload));
  gulp.watch(paths.other.src, gulp.series(copy, reload));
}

// Copy any content from inside the src assets folder to dist assets
export const copy = () => {
  return gulp.src(paths.other.src)
  .pipe(gulp.dest(paths.other.dest));
}

// Copy any plugins from plugns folder into lib/plugins
export const copyPlugins = () => {
  return gulp.src(paths.plugins.src)
  .pipe(gulp.dest(paths.plugins.dest));
}

// Compiles scripts from src folder into js in the dist folder
export const scripts = () => {
  return gulp.src(paths.scripts.src)
  .pipe(named())
  .pipe(webpack({
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        }
      ]
    },
    output: {
      filename: '[name].js'
    },
    externals: {
      jquery: 'jQuery'
    },
    devtool: !PRODUCTION ? 'inline-source-map' : false
  }))
  .pipe(gulpif(PRODUCTION, uglify()))
  .pipe(gulp.dest(paths.scripts.dest));
}

// Compress theme folder ready to upload
export const compress = () => {
  return gulp.src(paths.package.src)
  .pipe(gulpif((file) => (file.relative.split('.').pop() !== 'zip'), replace('_themename', info.name)))
  .pipe(zip(`${info.name}.zip`))
  .pipe(gulp.dest(paths.package.dest));
}

// Clean dist folder, recreate all folders from src to dist and watch fro changes - dev environment
export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);

export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), copyPlugins);

export const bundle = gulp.series(build, compress);

// Default task
export default dev;
