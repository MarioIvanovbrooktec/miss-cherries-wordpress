<?php

if (!defined('ABSPATH')) {
    die();
}

$required_files = [
    'core/helpers.loader.php',
    'inc/config/definitions.php',
    'inc/config/theme-config.php',
];

foreach ($required_files as $required_file) {
    require_once(trailingslashit(get_stylesheet_directory()) . $required_file);
}
