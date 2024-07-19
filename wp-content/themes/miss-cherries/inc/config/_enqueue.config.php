<?php

if (!defined('ABSPATH')) {
    die();
}

add_action('wp_enqueue_scripts', function () {
    $theme_version = wp_get_theme()->get('Version');
    $stylesheet_directory_uri = get_stylesheet_directory_uri();
    $main_style_deps = array();
    if (file_exists(get_stylesheet_directory() . '/dist/css/vendor.css')) {
        wp_enqueue_style(
            MISS_CHERRIES_THEME_SLUG . '/css/vendor',
            "{$stylesheet_directory_uri}/dist/css/vendor.css",
            array(),
            $theme_version
        );
        $main_style_deps[] = MISS_CHERRIES_THEME_SLUG . '/css/vendor';
    }
    wp_enqueue_style(
        MISS_CHERRIES_THEME_SLUG . '/css/main',
        "{$stylesheet_directory_uri}/dist/css/main.css",
        $main_style_deps,
        $theme_version
    );
    wp_enqueue_script(
        MISS_CHERRIES_THEME_SLUG . '/js/main',
        "{$stylesheet_directory_uri}/dist/js/main.min.js",
        array('jquery'),
        $theme_version,
        true
    );
    wp_localize_script(
        MISS_CHERRIES_THEME_SLUG . '/js/main',
        'theme_data',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'site_url' => site_url(),
        )
    );
});

add_action('admin_enqueue_scripts', function () {
    $theme_version = wp_get_theme()->get('version');
    $stylesheet_directory_uri = get_stylesheet_directory_uri();
    if (file_exists(get_stylesheet_directory() . '/dist/js/admin.css')) {
        wp_enqueue_style(
            MISS_CHERRIES_THEME_SLUG . '/admin',
            $stylesheet_directory_uri . '/dist/css/admin.css',
            array()
        );
    }
    if (file_exists(get_stylesheet_directory() . '/dist/js/admin.min.js')) {
        wp_enqueue_script(
            MISS_CHERRIES_THEME_SLUG . '/admin-scripts',
            $stylesheet_directory_uri . '/dist/js/admin.min.js',
            array('jquery'),
            $theme_version,
            true
        );
        wp_localize_script(
            MISS_CHERRIES_THEME_SLUG . '/admin-scripts',
            'admin_theme_data',
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'site_url' => site_url(),
            )
        );
    }
});

add_action('login_enqueue_scripts', function () {
    $theme_version = wp_get_theme()->get('version');
    $stylesheet_directory_uri = get_stylesheet_directory_uri();
    if (file_exists(get_stylesheet_directory() . '/dist/js/login.css')) {
        wp_enqueue_style(
            MISS_CHERRIES_THEME_SLUG . '/login',
            $stylesheet_directory_uri . '/dist/css/login.css',
            array()
        );
    }
    if (file_exists(get_stylesheet_directory() . '/dist/js/login.min.js')) {
        wp_enqueue_script(
            MISS_CHERRIES_THEME_SLUG . '/login-scripts',
            $stylesheet_directory_uri . '/dist/js/login.min.js',
            array('jquery'),
            $theme_version,
            true
        );
        wp_localize_script(MISS_CHERRIES_THEME_SLUG . '/login-scripts', 'login_theme_data', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'site_url' => site_url(),
        ));
    }
});
