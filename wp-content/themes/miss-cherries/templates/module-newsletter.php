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
                        <button type="button" class="black-box-div mb-5" id="sign-up-button">
                            <?php the_sub_field('button_text_main'); ?>
                        </button>
                    </div>
                    <div
                        class="modal fade"
                        id="myModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    <?php the_sub_field('title_modal'); ?>
                                </h1>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close">
                                </button>
                                </div>
                                <div class="modal-body">
                                <?php the_sub_field('description_modal'); ?>
                                </div>
                                <div class="modal-footer">
                                <button
                                type="button"
                                class="btn btn-primary modal-close-button"
                                data-bs-dismiss="modal">
                                    <?php the_sub_field('button_text_modal'); ?>
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
