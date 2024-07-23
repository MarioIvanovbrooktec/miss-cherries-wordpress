<?php

if (!defined('ABSPATH')) {
    die();
}
?>
<section class="module-newsletter">
    <div class="container col-4 d-flex flex-column align-items-center">
        <?php if (have_rows('footer', 'option')) : ?>
            <?php while (have_rows('footer', 'option')) :
                the_row(); ?>
                <?php if (get_row_layout() == 'newsletter_section') : ?>
                    <div class="title-newsletter-main">
                        <?php the_sub_field('title_main'); ?>
                    </div>
                    <div class="description-newsletter-main">
                    <?php the_sub_field('description_main'); ?>
                    </div>
                    <div class=" container-fluid my-3">
                        <input type="email" class="form-control input-form" id="email-input-form" placeholder="">
                         <div class="invalid-feedback" id="empty-email">
                        Es necesario introducir el email
                        </div>
                        <div class="invalid-feedback" id="invalid-email">
                            El correo no es valido
                        </div>
                    </div>
                    <div>
                        <button type="button" class="black-box-div" id="sign-up-button">
                            <?php the_sub_field('button_text_main'); ?>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
