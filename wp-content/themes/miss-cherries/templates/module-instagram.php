<?php

if (!defined('ABSPATH')) {
    die();
}
?>
<section class="module-instagram">
    <div class="promotion-overlap">
        <div class="black-box-div ">
            <?php the_sub_field('button_text_social'); ?>
        </div>
    </div>
    <div class="img-overlap">
        <?php $image = get_sub_field('image_social'); ?>
        <img class="img-fluid" src="<?php echo $image;?>">
    </div>
    <div class="container d-flex flex-column align-items-center">
        <div class="insta-handle">
            <?php if (get_sub_field('instagram_handle_social')) : ?>
                <div style="font-size:1rem" class="mt-3 mb-2 text-center">SÍGUENOS</div>
                <i class="fab fa-instagram"></i>
                <?php the_sub_field('instagram_handle_social'); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
