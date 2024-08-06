<?php

if (!defined('ABSPATH')) {
    die();
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
