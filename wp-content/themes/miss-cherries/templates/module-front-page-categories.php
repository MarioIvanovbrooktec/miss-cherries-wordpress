<?php

if (!defined('ABSPATH')) {
    die();
}

?>

<section class="module-categories">
    <?php
        $terms = get_terms(array(
            'taxonomy' => 'product_categories',
            'hide_empty' => false,
            ));
        $slides = count($terms) / 4;
        $mod = count($terms) % 4;
        if ($mod != 0) {
            $slides++;
        }

        ?>
    <div class="background-div">
        <?php $image = get_sub_field('background_image'); ?>
        <img class="img-fluid" src="<?php echo $image;?>" alt="Background Image">
    </div>
    <div id="first-container">
        <?php foreach ($terms as $current_term) : ?>
            <?php $link = get_term_link($current_term->term_id); ?>
            <div class="category">
                <a href="<?php echo $link; ?>">
                    <div class="category-image">
                        <?php $image = get_field('category_image', $current_term); ?>
                        <img class="img-fluid" src="<?php echo $image;?>" alt="Cover Image">
                    </div>
                    <div class="category-name">
                        <?php $name = $current_term->name; ?>
                        <div class="black-box-div-category">
                            <?php echo $name; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
