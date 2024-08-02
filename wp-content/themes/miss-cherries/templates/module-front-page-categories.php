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
    <div class="owl-carousel owl-theme" id="mobile-grid">
        <?php for ($i = 0; $i < $slides; $i++) : ?>
            <div class="item" id="carousel-item">
                <div class="grid-container" id="desktop-grid">
                    <?php for ($j = 0; $j < 4; $j++) : ?>
                        <?php if (($j + 4 * $i) < count($terms)) : ?>
                            <?php $current_term = $terms[($j + 4 * $i)]; ?>
                            <?php $link = $current_term->slug; ?>
                            <div class="category">
                                <a href="https://localhost:3000/<?php echo $link;?>">
                                    <div class="category-image">
                                        <?php $image = get_field('category_image', $current_term); ?>
                                        <img class="img-fluid" src="<?php echo $image;?>" alt="Cover Image">
                                    </div>
                                    <div class="category-name">
                                        <?php $name = $current_term->name; ?>
                                        <div class="black-box-div">
                                            <?php echo $name; ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endfor; ?>
        <div class="item">
            <div class="carousel-div">
                <?php $image = get_sub_field('mobile_cover_image'); ?>
                <img class="img-fluid" src="<?php echo $image;?>" alt="Carousel Cover Image">
            </div>
        </div>
    </div>
</section>
