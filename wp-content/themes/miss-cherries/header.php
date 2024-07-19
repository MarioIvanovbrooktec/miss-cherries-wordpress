<?php

if (!defined('ABSPATH')) {
    die();
}

?><!doctype html>
<html <?php language_attributes(); ?>>
    <head >
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <div class="container-fluid text-center top-nav shadow">
        <div class="row">
            <div class="col-8 offset-2 ">
                <div class="container d-flex justify-content-center">
                    <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else {
                            echo '<h1>' . get_bloginfo('name') . '</h1>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        wp_nav_menu( array(
            'menu' => 'Project Nav'
        ) );




