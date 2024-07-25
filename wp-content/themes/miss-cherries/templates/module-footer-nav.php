<?php

if (!defined('ABSPATH')) {
    die();
}

?>
<section class="module--footer-nav">
    <div>
        <?php
        if (has_nav_menu('footer-menu')) {
            wp_nav_menu(
                array(
                'theme_location' => 'footer-menu',
                'menu_class' => 'footer-nav',
                'fallback_cb' => false)
            );
        }
        ?>
    </div>
</section>
