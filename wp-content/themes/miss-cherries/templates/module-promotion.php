<?php

if (!defined('ABSPATH')) {
    die();
}

?>
<section class="module-promotion">
    <div class="promotion-div">
        <div class="container-fluid">
            <?php if (have_rows('footer', 'option')) : ?>
                <?php while (have_rows('footer', 'option')) :
                    the_row(); ?>
                    <?php if (get_row_layout() == 'promotion_section') : ?>
                        <div class="container col-10 offset-1">
                            <div class="container d-flex justify-content-center py-5 promotion-desc ">
                                <?php the_sub_field('description_promotion'); ?>
                            </div>
                            <div class="container d-flex justify-content-center pb-5">
                                <?php the_sub_field('slogans_promotion'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
