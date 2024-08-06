<?php

if (!defined('ABSPATH')) {
    die();
}


$required_files = [
    'product',
];

foreach ($required_files as $required_file) {
    include_once trailingslashit(__DIR__) . "_{$required_file}.type.php";
}
