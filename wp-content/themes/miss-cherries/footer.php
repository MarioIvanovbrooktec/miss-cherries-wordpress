<?php

if (!defined('ABSPATH')) {
    die();
}

?>
        <footer>
            <?php get_template_part('templates/module', 'newsletter'); ?>
            <?php get_template_part('templates/module', 'social-links'); ?>
            <div id="wp-scripts">
                <?php wp_footer(); ?>
            </div>
        </footer>
    </body>
</html>
