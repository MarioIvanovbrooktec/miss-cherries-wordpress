<?php

if (!defined('ABSPATH')) {
    die();
}

?>
<section class="module-categories-desktop">
    <div class="background-div">
        <?php $image = get_sub_field('background_image'); ?>
        <img class="img-fluid" src="<?php echo $image;?>" alt="Background Image">
    </div>
    <?php
        $terms = get_terms(array(
        'taxonomy' => 'product_categories',
        'hide_empty' => false,
        ));
        ?>
    <div class="grid-container">
        <?php foreach ($terms as $current_term) :  ?>
            <?php $link = $current_term->slug;?>
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
        <?php endforeach; ?>
    </div>
</section>
