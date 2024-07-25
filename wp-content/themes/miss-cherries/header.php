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
            <div class="container-fluid text-center top-nav shadow py-3">
                <div class="row">
                    <div class="col-8 offset-2 ">
                        <div class="container d-flex justify-content-center">
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
                        <div class="container d-flex flex-row align-items-center justify-content-around" >
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
                    <div class="col-2  d-block d-sm-none " >
                        <div class="container" >
                            <div class="dropdown">
                                <button class="btn   dropdown-btn-nav" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bars mobile-menu-icon"></i>
                                </button>
                                <ul class="dropdown-menu mobile-dropdown">
                                    <li><a title="Collares" class="dropdown-item" href="#">COLLARES </a></li>
                                    <li><a title="Anillos" class="dropdown-item" href="#">ANILLOS </a></li>
                                    <li><a title="Pulseras" class="dropdown-item" href="#">PULSERAS </a></li>
                                    <li><a title="Chokers" class="dropdown-item" href="#">CHOKERS </a></li>
                                    <li><a title="Pendientes" class="dropdown-item" href="#">PENDIENTES <a></li>
                                    <li><a title="Mix & Match" class="dropdown-item" href="#">MIX & MATCH </a></li>
                                    <li><a title="Tobilleras" class="dropdown-item" href="#">TOBILLERAS </a></li>
                                    <li><a title="Gift Cards" class="dropdown-item" href="#">GIFT CARDS </a></li>
                                    <li> <hr class="dropdown-divider"></li>
                                    <li><a title="Mi cuenta" class="dropdown-item" href="#">MI CUENTA</a></li>
                                    <li><a title="Mis favoritos" class="dropdown-item" href="#">MIS FAVORITOS</a></li>
                                    <li>
                                        <a title="Envio y Devoluciones" class="dropdown-item" href="#">
                                            ENVIO Y DEVOLUCIONES
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-8 offset-2 d-none d-md-block mt-3 mb-5">
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



