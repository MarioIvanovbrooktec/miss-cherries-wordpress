<?php

if (!defined('ABSPATH')) {
    die();
}

?>
<section class="module-promotion">
    <div class="promotion-div">
        <div class="container">
            <?php if (have_rows('footer', 'option')) : ?>
                <?php while (have_rows('footer', 'option')) :
                    the_row(); ?>
                    <?php if (get_row_layout() == 'promotion_section') : ?>
                        <div class=" col-md-10 offset-md-1 col-sm-12">
                            <div class="d-flex justify-content-center py-5">
                                <div class="promotion-desc">
                                    <?php the_sub_field('description_promotion'); ?>
                                </div>
                            </div>
                            <div class="pb-5">
                                <div class=" d-none d-md-block text-center">
                                    <?php if (have_rows('slogans_promotion')) : ?>
                                        <?php while (have_rows('slogans_promotion')) :
                                            the_row(); ?>
                                            <?php the_sub_field('slogan_repeater'); ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <?php if (have_rows('slogans_promotion')) : ?>
                                    <?php while (have_rows('slogans_promotion')) :
                                        the_row(); ?>
                                        <div class="d-flex d-block d-md-none flex-column align-items-center">
                                            <?php the_sub_field('slogan_repeater'); ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
