<?php

include 'inc/social_links.php';

if (!defined('ABSPATH')) {
    die();
}

$required_files = [
    'core/helpers.loader.php',
    'inc/config/definitions.php',
    'inc/config/theme-config.php',
];

function miss_cherries_custom_logo_setup()
{
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,);
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'miss_cherries_custom_logo_setup');

function miss_cherries_menu_header_register()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('after_setup_theme', 'miss_cherries_menu_header_register');

function miss_cherries_menu_footer_register()
{
    register_nav_menu('footer-menu', __('Footer Menu'));
}

add_action('after_setup_theme', 'miss_cherries_menu_footer_register');

foreach ($required_files as $required_file) {
    include_once trailingslashit(get_stylesheet_directory()) . $required_file;
}
