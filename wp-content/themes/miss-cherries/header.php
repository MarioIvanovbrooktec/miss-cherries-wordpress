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
        <header>
            <div class="header-logo-div">
                <div class="row">
                    <div class="col-8 offset-2 justify-content- ">
                        <div>
                            <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                            if (has_custom_logo()) {
                                echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-2 d-none d-md-block" >
                        <div class=" d-flex flex-row align-items-center justify-content-around" >
                            <div class="dropdown">
                                <button class="btn  dropdown-toggle dropdown-btn-nav" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ES
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a title="Ingles" class="dropdown-item active" href="#">EN</a></li>
                                    <li><a title="Español" class="dropdown-item" href="#">FR</a></li>
                                </ul>
                            </div>
                            <div>
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div>
                                MI CUENTA
                            </div>
                        </div>
                    </div>
                    <div class="col-2  d-block d-md-none">
                        <?php if (has_nav_menu('header-menu')) : ?>
                            <button class="btn   dropdown-btn-nav" type="button"
                            id="dropdown-header-menu-button">
                                <i class="fa-solid fa-bars mobile-menu-icon"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="header-nav-div" id="header-nav-div">
                <?php
                if (has_nav_menu('header-menu')) {
                    wp_nav_menu(
                        array(
                        'theme_location' => 'header-menu',
                        'menu_class' => 'header-nav',
                        'fallback_cb' => false)
                    );
                }
                ?>
            </div>
        </header>



