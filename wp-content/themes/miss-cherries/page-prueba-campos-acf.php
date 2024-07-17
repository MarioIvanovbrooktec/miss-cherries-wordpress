<?php

if (!defined('ABSPATH')) {
    die();
}

get_header();

//phpcs:disable Generic.Files.LineLength
?>
<div id="primary">
    <div id="content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <h1><?php the_field('acf_text'); ?></h1>

            <img src="<?php the_field('acf_image'); ?>" alt="" />

            <p><?php the_content(); ?></p>

            <h1 style="color: <?php the_field('acf_color_picker'); ?>"> Texto con color</h1>

            <a href="<?php the_field('acf_url'); ?>"> Enlace a brooktec</a>

            <h1><?php the_field('acf_wysiwyg'); ?></h1>

            <?php if( have_rows('acf_repeater') ): ?>

                <ul>

                <?php while( have_rows('acf_repeater') ): the_row(); ?>

                    <li><?php the_sub_field('sub_repeater_text'); ?></li>


                <?php endwhile; ?>

                </ul>

            <?php endif; ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
</div><!-- #primary -->

<?php
get_footer();
