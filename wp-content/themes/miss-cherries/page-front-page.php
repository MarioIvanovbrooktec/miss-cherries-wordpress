<?php

if (!defined('ABSPATH')) {
    die();
}

get_header();

?>
<section class="content">
    <?php if (have_rows('front_page', 'option')) : ?>
        <?php while (have_rows('front_page', 'option')) :
            the_row(); ?>
            <?php if (get_row_layout() == 'cover_section') : ?>
                <?php get_template_part('templates/module', 'front-page-cover'); ?>
            <?php endif; ?>
            <?php if (get_row_layout() == 'categories_section') : ?>
                <?php get_template_part('templates/module', 'front-page-categories-desktop'); ?>
                <?php get_template_part('templates/module', 'front-page-categories-mobile'); ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php
get_footer();

