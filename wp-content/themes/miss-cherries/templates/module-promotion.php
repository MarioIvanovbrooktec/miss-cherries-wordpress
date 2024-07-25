<?php

if (!defined('ABSPATH')) {
    die();
}

?>
<section class="module-promotion">
    <div class="promotion-div">
        <div class="container">
            <div class=" col-md-10 offset-md-1 col-sm-12">
                <div class="d-flex justify-content-center py-5">
                    <div class="promotion-desc">
                        <?php the_sub_field('description_promotion'); ?>
                    </div>
                </div>
                <div class="slogans-div">
                    <?php if (have_rows('slogans_promotion')) : ?>
                        <?php while (have_rows('slogans_promotion')) :
                            the_row(); ?>
                            <div>
                                <?php the_sub_field('slogan_repeater'); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
