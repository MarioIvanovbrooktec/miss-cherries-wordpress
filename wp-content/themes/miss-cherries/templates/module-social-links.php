<?php

if (!defined('ABSPATH')) {
    die();
}
?>
<section class="social-links">
    <div class="container">
        <div class="social-media">
            <?php if (get_theme_mod('twitter')) : ?>
                <a href="<?php echo get_theme_mod('twitter'); ?>">
                    <i class="fab fa-twitter"></i></i>
                </a>
            <?php endif; ?>
            <?php if (get_theme_mod('instagram')) : ?>
                <a href="<?php echo get_theme_mod('instagram'); ?>">
                    <i class="fab fa-instagram"></i></i>
                </a>
            <?php endif; ?>
            <?php if (get_theme_mod('facebook')) : ?>
                <a href="<?php echo get_theme_mod('facebook') ; ?>">
                    <i class="fab fa-facebook-f"></i></i>
                </a>
            <?php endif; ?>
            <?php if (get_theme_mod('pinterest')) : ?>
                <a href="<?php echo get_theme_mod('pinterest'); ?>">
                    <i class="fab fa-pinterest"></i></i>
                </a>
            <?php endif; ?>
            <?php if (get_theme_mod('youtube')) : ?>
                <a href="<?php echo get_theme_mod('youtube'); ?>">
                    <i class="fab fa-youtube"></i></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
