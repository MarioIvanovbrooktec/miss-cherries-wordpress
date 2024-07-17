<?php

if (!defined('ABSPATH')) {
    die();
}

add_filter('comments_open', '__return_false', 20);
add_filter('pings_open', '__return_false', 20);
