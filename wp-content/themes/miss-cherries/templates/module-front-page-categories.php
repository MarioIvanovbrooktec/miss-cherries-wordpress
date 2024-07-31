<?php

if (!defined('ABSPATH')) {
    die();
}

?>
<section class="module-categories">
    <?php
        $terms = get_terms( array(
        'taxonomy'=> 'product_categories',
        'hide_empty' => false,
        ) );
        $mod = (count($terms) % 3) + 1;
    ?>
    <?php for ($i = 0; $i < $mod; $i++) : ?>
        <div class="category-rows">
            <?php for ($j = 0; $j < 3; $j++) : ?>
                <?php if (($j + $mod * $i) < count($terms)) : ?>
                    <?php $current_term = $terms[($j + $mod * $i)]; ?>
                    <div class="category">
                        <a href="https://localhost:3000/front-page/">
                            <div class="category-image">
                                <?php $image = get_field('category_image', $current_term); ?>
                                <img class="img-fluid" src="<?php echo $image;?>" alt="Cover Image">
                            </div>
                            <div class="category-name">
                                <?php $name = $current_term -> name; ?>
                                <div class="black-box-div">
                                    <?php echo $name; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    <?php endfor; ?>

</section>
