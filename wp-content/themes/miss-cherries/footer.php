<?php

if (!defined('ABSPATH')) {
    die();
}

?>
        <footer>
            <div class="container-fluid mt-5 social-media-div">
                <div class="container col-2 offset-5 py-5">
                    <div class="social-media">
                        <?php if (get_theme_mod('twitter')) : ?>
                            <a class="light-text" href="<?php echo get_theme_mod('twitter'); ?>" target="_blank">
                                <i class="fab fa-twitter"></i></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('instagram')) : ?>
                            <a class="light-text" href="<?php echo get_theme_mod('instagram'); ?>" target="_blank">
                                <i class="fab fa-instagram"></i></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('facebook')) : ?>
                            <a class="light-text" href="<?php echo get_theme_mod('facebook') ; ?>" target="_blank">
                                <i class="fab fa-facebook-f"></i></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('pinterest')) : ?>
                            <a class="light-text" href="<?php echo get_theme_mod('pinterest'); ?>" target="_blank">
                                <i class="fab fa-pinterest"></i></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('youtube')) : ?>
                            <a class="light-text" href="<?php echo get_theme_mod('youtube'); ?>" target="_blank">
                                <i class="fab fa-youtube"></i></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="wp-scripts">
                <?php wp_footer(); ?>
            </div>
        </footer>
    </body>
</html>
