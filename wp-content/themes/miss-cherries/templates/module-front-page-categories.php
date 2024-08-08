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

        error_log(print_r($slides, true));
        ?>
    <div class="owl-carousel owl-theme ">
            <?php foreach ($terms as $current_term) : ?>
                <?php $link = $current_term->slug; ?>
                <div class="item">
                    <div class="category">
                        <a href="https://localhost:3000/<?php echo $link;?>">
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
                </div>
            <?php endforeach; ?>
    </div>
</section>
