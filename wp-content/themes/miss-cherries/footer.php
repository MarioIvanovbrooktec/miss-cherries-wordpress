<?php

if (!defined('ABSPATH')) {
    die();
}

?>
        <footer>
            <?php if (have_rows('footer', 'option')) : ?>
                <?php while (have_rows('footer', 'option')) :
                    the_row(); ?>
                    <?php if (get_row_layout() == 'newsletter_section') : ?>
                        <?php get_template_part('templates/module', 'newsletter'); ?>
                    <?php endif; ?>
                    <?php if (get_row_layout() == 'promotion_section') : ?>
                        <?php get_template_part('templates/module', 'promotion'); ?>
                    <?php endif; ?>
                    <?php if (get_row_layout() == 'social_section') : ?>
                        <?php get_template_part('templates/module', 'instagram'); ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php get_template_part('templates/module', 'social-links'); ?>
            <div id="wp-scripts">
                <?php wp_footer(); ?>
            </div>
        </footer>
    </body>
</html>
