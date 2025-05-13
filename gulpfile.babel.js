import gulp from "gulp";
import yargs from "yargs";
import dartSass from "sass";
import gulpSass from "gulp-sass";
import CleanCSS from "gulp-clean-css";
import gulpIf from "gulp-if";
import sourcemaps from "gulp-sourcemaps";
import imagemin from "gulp-imagemin";
import del from "del";
import webpack from "webpack-stream";
import uglify from "gulp-uglify";
import named from "vinyl-named";
import zip from "gulp-zip";
import replace from "gulp-replace";
import info from "./package.json";
import browserSync from "browser-sync";
import fs from "fs";

const server = browserSync.create();
const sass = gulpSass(dartSass);
const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    src: ["sass/style.scss"],
    dest: "dist/assets/css",
  },
  images: {
    src: "src/assets/images/**/*.{jpg,jpeg,png,svg,gif}",
    dest: "dist/assets/images",
  },
  scripts: {
    src: "js/main.js",
    dest: "dist/assets/js",
  },
  other: {
    src: ["src/assets/**/*", "!src/assets/{images,js,scss}", "!src/assets/{images,js,scss}/**/*"],
    dest: "dist/assets/",
  },
  acf: {
    src: "acf-json/**/*",
    dest: "dist/acf-json",
  },
  packaged: {
    src: [
      "**/*",
      "!.vscode",
      "!node_modules{,/**}",
      "!packaged{,/**}",
      "!src{,/**}",
      "!acf-json{,/**}", // exclude default pattern
      "acf-json/**/*", // include ACF explicitly
      "demo/**/*",
      "!.babelrc",
      "!.gitignore",
      "!gulpfile.babel.js",
      "!package-lock.json",
      "!package.json",
    ],
    dest: "packaged",
  },
};

// Server
export const serve = (done) => {
  server.init({
    proxy: "http://localhost:10109/",
    open: false,
  });
  done();
};

export const reload = (done) => {
  server.reload();
  done();
};

// Clean dist
export const clean = () => del(["css", "js/bundle.js", "images"]);

// SCSS to CSS
export const styles = () => {
  return gulp
    .src(paths.styles.src)
    .pipe(gulpIf(!PRODUCTION, sourcemaps.init()))
    .pipe(
      sass({
        quietDeps: true,
        silenceDeprecations: ["import", "legacy-js-api"],
      }).on("error", sass.logError)
    )
    .pipe(gulpIf(PRODUCTION, CleanCSS({ compatibility: "ie8" })))
    .pipe(gulpIf(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(server.stream());
};

// Optimize/copy images
export const images = () => {
  return gulp.src(paths.images.src).pipe(gulpIf(PRODUCTION, imagemin())).pipe(gulp.dest(paths.images.dest));
};

// Copy static assets (fonts, etc.)
export const copy = () => {
  return gulp.src(paths.other.src).pipe(gulp.dest(paths.other.dest));
};

// Copy ACF JSON
export const copyACF = () => {
  return gulp.src(paths.acf.src).pipe(gulp.dest(paths.acf.dest));
};

// JavaScript bundling
export const scripts = () => {
  return gulp
    .src(paths.scripts.src)
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: ["@babel/preset-env"],
                },
              },
            },
          ],
        },
        devtool: !PRODUCTION ? "inline-source-map" : false,
        output: {
          filename: "bundle.js",
        },
      })
    )
    .pipe(gulpIf(PRODUCTION, uglify()))
    .pipe(gulp.dest(paths.scripts.dest));
};

// Demo Files
export const checkDemoFiles = (done) => {
  const files = ["demo/demo-content.xml"];
  const missing = files.filter((file) => !fs.existsSync(file));

  if (missing.length) {
    throw new Error(`Missing demo files: ${missing.join(", ")}`);
  }

  done();
};

// Zip theme
export const compress = () => {
  return gulp
    .src(paths.packaged.src)
    .pipe(replace("afribeads", info.name))
    .pipe(zip(`${info.name}.zip`))
    .pipe(gulp.dest(paths.packaged.dest));
};

// Watch for changes
export const watch = () => {
  gulp.watch("sass/**/*.scss", gulp.series(styles, reload));
  gulp.watch("js/**/*.js", gulp.series(scripts, reload));
  gulp.watch(["**/*.php", "!node_modules/**"], reload);
  gulp.watch(paths.images.src, gulp.series(images, reload));
  gulp.watch(paths.other.src, gulp.series(copy, reload));
};

// Dev task
export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy, copyACF), serve, watch);

// Build task
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy, copyACF));

// Bundle task for zip export
export const bundle = gulp.series(checkDemoFiles, build, compress);

// Default task
export default dev;
