<?php


if (!defined('ABSPATH')) {
    die();
}

$required_files = [
    'core/helpers.loader.php',
    'inc/config/definitions.php',
    'inc/config/theme-config.php',
    'inc/post_type/loader.php'
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

function miss_cherries_custom_post_type_product()
{
    register_post_type(
        'misscherries_product',
        array(
            'labels'      => array(
                'name'          => __('Products', 'textdomain'),
                'singular_name' => __('Product', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'taxonomies' => ['product_categories'],
        )
    );
}
add_action('init', 'miss_cherries_custom_post_type_product');

function miss_cherries_register_taxonomy_product_categories()
{
    $labels = array(
        'name'              => _x('Categories', 'taxonomy general name'),
        'singular_name'     => _x('Category', 'taxonomy singular name'),
        'search_items'      => __('Search Category'),
        'all_items'         => __('All Category'),
        'parent_item'       => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item'         => __('Edit Category'),
        'update_item'       => __('Update Category'),
        'add_new_item'      => __('Add New Category'),
        'new_item_name'     => __('New Category Name'),
        'menu_name'         => __('Category'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'product_categories'],
    );
    register_taxonomy('product_categories', ['misscherries_product'], $args);
}
add_action('init', 'miss_cherries_register_taxonomy_product_categories');
