
"use strict";
import pkg from 'gulp';
const { src, dest, watch, series } = pkg;
import ftp from 'vinyl-ftp';
import imagemin from 'gulp-imagemin';
import plumber from 'gulp-plumber'
import sassGlob from 'gulp-sass-glob'
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import webp from 'gulp-webp';
import autoprefixer from 'gulp-autoprefixer';
import gulpBabel from 'gulp-babel';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';

const sass = gulpSass(dartSass);

const connect = ftp.create({
  host: 'sv1231.xserver.jp',
  user: 'dc@cardloan-navi.net',
  password: 'Dqw4t5r322~1_5!!',
  port: 21,
})
const ftpUploadFiles = [
  '*.php',
]
const ftpUploadFilesLink = [
  './link/**/*',
]
const ftpUploadFilesInc = [
  './inc/**/*.php',
]
const ftpUploadFilesTag = [
  './tag/*.php',
]

const ftpUploadFilesParts = [
  './parts/*.php',
]
const ftpUploadFilesJs = [
  './assets/js/*.js',
]
const ftpUploadFilesCss = [
  './assets/css/*.css',
]
const ftpUploadFilesNewCommon = [
  './assets/dist/_common/*.webp',
]
const ftpUploadFilesNewFront = [
  './assets/dist/front/*.webp',
]

const domain = 'cardloan-navi.net/public_html/'
const remoteDistDirLink = domain + 'link/'
const remoteDistDir = domain + 'wp-content/themes/cardloan/'
const remoteDistDirInc = remoteDistDir + '/inc/'
const remoteDistDirTag = remoteDistDir + '/tag/'
const remoteDistDirParts = remoteDistDir + '/parts/'
const remoteDistDirIncParts = remoteDistDirInc + '/parts/'
const remoteDistDirCss = remoteDistDir + '/assets/css/'
const remoteDistDirJs = remoteDistDir + '/assets/js/'
const remoteDistDirCommon = remoteDistDir + '/assets/dist/_common/'
const remoteDistDirFront = remoteDistDir + '/assets/dist/front/'

const vinylFtp = () => {
  return src(ftpUploadFiles)
    .pipe(connect.newerOrDifferentSize(remoteDistDir))
    .pipe(connect.dest(remoteDistDir))
}
const vinylFtpLink = () => {
  return src(ftpUploadFilesLink)
    .pipe(connect.newerOrDifferentSize(remoteDistDirLink))
    .pipe(connect.dest(remoteDistDirLink))
}
const vinylFtpInc = () => {
  return src(ftpUploadFilesInc)
    .pipe(connect.newerOrDifferentSize(remoteDistDirInc))
    .pipe(connect.dest(remoteDistDirInc))
}
const vinylFtpTag = () => {
  return src(ftpUploadFilesTag)
    .pipe(connect.newerOrDifferentSize(remoteDistDirTag))
    .pipe(connect.dest(remoteDistDirTag))
}
const vinylFtpParts = () => {
  return src(ftpUploadFilesParts)
    .pipe(connect.newerOrDifferentSize(remoteDistDirParts))
    .pipe(connect.dest(remoteDistDirParts))
}

const vinylFtpCss = () => {
  return src(ftpUploadFilesCss)
  .pipe(connect.newerOrDifferentSize(remoteDistDirCss))
  .pipe(connect.dest(remoteDistDirCss))
}
const vinylFtpJs = () => {
  return src(ftpUploadFilesJs)
  .pipe(connect.newerOrDifferentSize(remoteDistDirJs))
  .pipe(connect.dest(remoteDistDirJs))
}
const vinylFtpCommon = () => {
  return src(ftpUploadFilesNewCommon)
    .pipe(connect.newerOrDifferentSize(remoteDistDirCommon))
    .pipe(connect.dest(remoteDistDirCommon))
}
const vinylFtpFront = () => {
  return src(ftpUploadFilesNewFront)
    .pipe(connect.newerOrDifferentSize(remoteDistDirFront))
    .pipe(connect.dest(remoteDistDirFront))
}


const styles = () =>
  src("./assets/scss/*.scss")
    .pipe(plumber())
    .pipe(sassGlob())
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer())
    .pipe(dest("./assets/css"));


const stylesLink = () =>
  src("./link/style.scss")
    .pipe(plumber())
    .pipe(sassGlob())
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer())
    .pipe(dest("./link/"));


const imageNew = () =>
  src("./assets/img/**/*")
    .pipe(imagemin())
    .pipe(webp())
    .pipe(dest("./assets/dist"))


const jsMinify = () => {
  return src("assets/js/init.js")
    .pipe(gulpBabel({
      presets: ['@babel/preset-env']
    }))
    .pipe(plumber())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest("assets/js/"))
};


export { stylesLink };


const watchFile = () => {
  watch("./assets/scss/**/*.scss", styles)
  watch("./link/style.scss", stylesLink)
  watch("./assets/img/**/*", imageNew);
  watch("./assets/js/init.js", jsMinify);
  watch(ftpUploadFiles, vinylFtp);
  watch(ftpUploadFilesLink, vinylFtpLink);
  watch(ftpUploadFilesInc, vinylFtpInc);
  watch(ftpUploadFilesTag, vinylFtpTag);
  watch(ftpUploadFilesParts, vinylFtpParts);
  watch(ftpUploadFilesJs, vinylFtpJs);
  watch(ftpUploadFilesCss, vinylFtpCss);
  watch(ftpUploadFilesNewCommon, vinylFtpCommon);
  watch(ftpUploadFilesNewFront, vinylFtpFront);
}

export default series(watchFile)
