import dotenv from 'dotenv';
dotenv.config();

import gulp from 'gulp';
import gulpAutoprefixer from 'gulp-autoprefixer';
import gulpClean from 'gulp-clean';
import gulpConcat from 'gulp-concat';
import gulpNotify from 'gulp-notify';
import gulpPlumber from 'gulp-plumber';
import gulpRename from 'gulp-rename';
import gulpSass from 'gulp-sass';
import gulpSassLint from 'gulp-sass-lint';
import gulpTerser from 'gulp-terser';

import * as dartSass from 'sass';
import child_process from 'child_process';
import browserSyncModule from 'browser-sync';
import fs from 'fs';
import { parse } from 'smol-toml';

// Set configuration
const config = parse(fs.readFileSync('./config.toml', { encoding: 'utf8', flag: 'r' }));
config.environment = process.env.NODE_ENV || 'production';
config.devUrl = process.env.DEVELOPMENT_URL || "";
config.php = {
    composer: process.env.PHP_COMPOSER_EXECUTABLE || 'composer',
    exec: process.env.PHP_EXECUTABLE || 'php',
    memory_limit: process.env.PHP_MEMORY_LIMIT || '-1',
};

function checkEnabled(envValue, configValue, defaultValue) {
    if (envValue === 'false') {
        return false;
    }
    if (envValue === 'true') {
        return true;
    }
    return configValue ?? defaultValue;
}

config.phptests = {
    phpstan: checkEnabled(process.env.PHP_TEST_PHPSTAN, config.phptests?.phpstan, true),
    phpcs: checkEnabled(process.env.PHP_TEST_PHPCS, config.phptests?.phpcs, true),
    phpmd: checkEnabled(process.env.PHP_TEST_PHPMD, config.phptests?.phpmd, true),
};

const sources = config.sources;

function getSourcePath(source) {
    return `${config.paths.source}/${source}`;
}

const exec = child_process.exec;
const plugins = {
    autoprefixer: gulpAutoprefixer,
    clean: gulpClean,
    concat: gulpConcat,
    notify: gulpNotify,
    plumber: gulpPlumber,
    rename: gulpRename,
    sass: gulpSass,
    sassLint: gulpSassLint,
    terser: gulpTerser,
    sass: gulpSass(dartSass),
};
const browserSync  = browserSyncModule.create();

const sassLintHandler = function(err) {
    plugins.notify.onError({
        title: "SCSS Linter failed!",
        message: "<%= error.message %>",
    })(err);
    this.emit('end');
};

const buildSass =  env => {
    return gulp.src(getSourcePath(sources.sass) + '/**/*.scss')
        .pipe(plugins.sassLint({ config: '.sass-lint.yml' }))
        .pipe(plugins.sassLint.format())
        .pipe(plugins.plumber({errorHandler: sassLintHandler }))
        .pipe(plugins.sassLint.failOnError())
        .pipe(plugins.plumber.stop())
        .pipe(plugins.sass({
            outputStyle: env === 'production' ? 'compressed' : 'expanded',
            includePaths:[
                ...config.vendor.sass,
                getSourcePath(sources.sass)
            ],
            errLogToConsole: true
        }).on('error', plugins.notify.onError(error => {
            if (env === 'production') {
                process.exitCode = 1;
            }
            return "Error: " + error.message;
        })))
        .pipe(plugins.autoprefixer('last 10 version'))
        .pipe(gulp.dest( config.paths.dest + '/css' ))
        .pipe(browserSync.stream());
};

gulp.task('buildDev:sass', () => { return buildSass(config.environment); } );
gulp.task('build:sass', () => { return buildSass("production"); } );

gulp.task('build:css', (done) => {
    if (config.vendor.css.length === 0) {
        done();
        return;
    }
    return gulp.src([
        ...config.vendor.css
    ])
    .pipe(plugins.concat('vendor.css'))
    .pipe(gulp.dest(config.paths.dest + '/css'))
    .pipe(browserSync.stream());
});

gulp.task('build:javascript', () => {
    return gulp.src([
        ...config.vendor.js,
        getSourcePath(sources.js) + '/vendor/**/*.js',
        getSourcePath(sources.js) + '/**/_*.js',
        getSourcePath(sources.js) + '/**/*.js',
        getSourcePath(sources.js) + '/_*.js',
        getSourcePath(sources.js) + '/*.js',
    ])
    .pipe(plugins.concat('main.js'))
    .pipe(gulp.dest(config.paths.dest + '/js'))
    .pipe(plugins.rename('main.min.js'))
    .pipe(plugins.terser(config.uglify.front))
    .pipe(gulp.dest(config.paths.dest + '/js'));
});

gulp.task('build:javascriptadmin', () => {
    return gulp.src([
        getSourcePath(sources.jsAdmin) + '/**/_*.js',
        getSourcePath(sources.jsAdmin) + '/**/*.js',
        getSourcePath(sources.jsAdmin) + '/_*.js',
        getSourcePath(sources.jsAdmin) + '/*.js',
    ])
    .pipe(plugins.concat('admin.js'))
    .pipe(gulp.dest(config.paths.dest + '/js'))
    .pipe(plugins.rename('admin.min.js'))
    .pipe(plugins.terser(config.uglify.admin))
    .pipe(gulp.dest(config.paths.dest + '/js'));
});

gulp.task('build:javascriptlogin', () => {
    return gulp.src([
        getSourcePath(sources.jsLogin) + '/**/_*.js',
        getSourcePath(sources.jsLogin) + '/**/*.js',
        getSourcePath(sources.jsLogin) + '/_*.js',
        getSourcePath(sources.jsLogin) + '/*.js',
    ])
    .pipe(plugins.concat('login.js'))
    .pipe(gulp.dest(config.paths.dest + '/js'))
    .pipe(plugins.rename('login.min.js'))
    .pipe(plugins.terser(config.uglify.login))
    .pipe(gulp.dest(config.paths.dest + '/js'));
});

gulp.task('build:vendor', () => {
    return gulp.src([
        getSourcePath(sources.vendor) + '/**/*',
    ])
    .pipe(gulp.dest(config.paths.dest + '/vendor' ));
});

gulp.task('build:image', () => {
    return gulp.src([
        getSourcePath(sources.img) + '/**/*'
    ], { encoding: false })
    .pipe(gulp.dest(config.paths.dest + '/img'));
});

gulp.task('build:fonts', () => {
    return gulp.src([
        ...config.vendor.fonts,
        getSourcePath(sources.font) + '/**/*'
    ], { encoding: false })
    .pipe(gulp.dest(config.paths.dest + '/fonts'));
});

gulp.task('clean', function () {
    return gulp.src([
            config.paths.dest
        ], { read: false, allowEmpty: true })
    .pipe(plugins.clean());
});

gulp.task('clean:pro', function () {
    return gulp.src([
            config.paths.source,
            `./.editorconfig`,
            `./.env`,
            `./.env.sample`,
            `./.gitignore`,
            `./.nvmrc`,
            `./.sass-lint.yml`,
            `./CHANGELOG.md`,
            `./composer.json`,
            `./composer.lock`,
            `./config.toml`,
            `./package-lock.json`,
            `./package.json`,
            `./phpcs.ruleset.xml`,
            `./phpstan.neon`,
            `./README.md`,
            `./gulpfile.mjs`,
            `./node_modules`,
        ], { read: false, allowEmpty: true })
    .pipe(plugins.clean());
});

gulp.task('install:composer', (done) => {
    exec(`${config.php.composer} install`, (error) => {
        if(error) {
            done(error);
        } else {
            done();
        }
    });
});

gulp.task('install:composer:pro', (done) => {
    exec(`${config.php.composer} install --no-dev`, (error) => {
        if(error) {
            done(error);
        } else {
            done();
        }
    });
});

gulp.task('execute:phpstan', (done) => {
    if (config.phptests?.phpstan === false) {
        done();
        return;
    }
    const memory_limit = config.php.memory_limit ? ` --memory-limit=${config.php.memory_limit}` : '';
    exec(`${config.php.exec} ./vendor/bin/phpstan analyze -c phpstan.neon ${memory_limit}`, (error, stdout) => {
        if(error) {
            console.error(stdout);
            plugins.notify().write('PHP Code has some bugs', 'utf-8');
            done(new Error('PHP Code has some bugs'));
        } else {
            done();
        }
    });
});

gulp.task('execute:phpcs', (done) => {
    if (config.phptests?.phpcs === false) {
        done();
        return;
    }
    const memory_limit = config.php.memory_limit ? ` -d memory_limit=${config.php.memory_limit}` : '';
    exec(`${config.php.exec}${memory_limit} ./vendor/bin/phpcs --ignore=./vendor,./node_modules --standard=./phpcs.ruleset.xml --extensions=php .`, (error, stdout) => {
        if(error) {
            console.error(stdout);
            plugins.notify().write('PHP Code does not follow Recommended Standards', 'utf-8');
            done(new Error('PHP Code does not follow Recommended Standards'));
        } else {
            done();
        }
    });
});

gulp.task('execute:phpmd', (done) => {
    if (config.phptests?.phpmd === false) {
        done();
        return;
    }
    const memory_limit = config.php.memory_limit ? ` -d memory_limit=${config.php.memory_limit}` : '';
    exec(`${config.php.exec}${memory_limit} ./vendor/phpmd/phpmd/src/bin/phpmd ./* ansi ./phpmd.ruleset.xml --exclude *vendor*`, (error, stdout) => {
        if(error) {
            console.error(stdout);
            plugins.notify().write('PHP Code have some potential issues', 'utf-8');
            done(new Error('PHP Code have some potential issues'));
        } else {
            done();
        }
    });
});

gulp.task('execute:php', gulp.series('execute:phpstan', 'execute:phpcs', 'execute:phpmd'));

gulp.task('php:test', gulp.series('install:composer', 'execute:php' ));
gulp.task('php:pro', gulp.series('install:composer:pro'));

gulp.task('watch', function(){
    browserSync.init({
      files: [
          '{inc,lib,templates}/**/*.php',
          '*.php',
          config.paths.dest + '**/*'
        ],
      proxy: config.devUrl,
      snippetOptions: {
        whitelist: ['/wp-admin/admin-ajax.php'],
        blacklist: ['/wp-admin/**']
      },
    });
    gulp.watch([
        '{inc,lib,templates}/**/*.php',
        '*.php',
      ], gulp.series('execute:php'));
    gulp.watch(getSourcePath(sources.sass) + '/**/*.scss', gulp.series('buildDev:sass'));
    gulp.watch(getSourcePath(sources.js) + '/**/*.js', gulp.series('build:javascript'));
    gulp.watch(getSourcePath(sources.jsAdmin) + '/**/*.js', gulp.series('build:javascriptadmin'));
    gulp.watch(getSourcePath(sources.jsLogin) + '/**/*.js', gulp.series('build:javascriptlogin'));
    gulp.watch(getSourcePath(sources.img) + '/**/*', gulp.series('build:image'));
    gulp.watch(getSourcePath(sources.font) + '/**/*', gulp.series('build:fonts'));
    gulp.watch(getSourcePath(sources.vendor) + '/**/*', gulp.series('build:vendor'));
    gulp.watch(config.paths.dest + "/**/{*.css,*.js}").on('change', browserSync.reload);
});

gulp.task('build:watch', gulp.series('php:test', 'build:javascriptadmin', 'build:javascriptlogin', 'buildDev:sass', 'build:css', 'build:fonts', 'build:javascript', 'build:image', 'build:vendor', 'watch'));

gulp.task('build:dev',  gulp.series('clean', 'php:test', 'buildDev:sass', gulp.parallel('build:javascriptadmin', 'build:javascriptlogin', 'build:css', 'build:fonts', 'build:javascript', 'build:image', 'build:vendor')));

gulp.task('build:pro',  gulp.series('clean', 'php:pro', 'build:sass', gulp.parallel('build:javascriptadmin', 'build:javascriptlogin', 'build:css', 'build:fonts', 'build:javascript', 'build:image', 'build:vendor')));



gulp.task('test', gulp.series('php:test'));
gulp.task('default', gulp.series('build:pro'));
