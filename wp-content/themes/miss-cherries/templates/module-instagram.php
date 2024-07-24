<?php

if (!defined('ABSPATH')) {
    die();
}
?>
<section class="module-instagram">
    <?php if (have_rows('footer', 'option')) : ?>
        <?php while (have_rows('footer', 'option')) :
            the_row(); ?>
            <?php if (get_row_layout() == 'social_section') : ?>
                <div class="promotion-overlap">
                    <div class="container col-1 d-flex justify-content-center">
                        <div class="black-box-div ">
                            <?php the_sub_field('button_text_social'); ?>
                        </div>
                    </div>
                </div>
                <div class="img-overlap">
                    <div class="container d-flex justify-content-center">
                        <?php $image = get_sub_field('image_social'); ?>
                        <img class="img-fluid" src="<?php echo $image;?>">
                    </div>
                </div>
                <div class="container d-flex flex-column align-items-center">
                    <?php if (get_sub_field('instagram_handle_social')) : ?>
                        <div class="mt-3 mb-2">SÍGUENOS</div>
                        <div class="insta-handle">
                        <i style="font-size: 1.2rem" class="fab fa-instagram"></i>  <?php the_sub_field('instagram_handle_social'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</section>
