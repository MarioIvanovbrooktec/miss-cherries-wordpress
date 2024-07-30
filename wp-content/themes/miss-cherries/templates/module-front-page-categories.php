<?php

if (!defined('ABSPATH')) {
    die();
}

?>
<section class="module-categories">
    <?php
        $rows = get_sub_field("categories");
        $mod = (count($rows) % 3) + 1;
    ?>
    <?php for ($i = 0; $i < $mod; $i++) : ?>
        <div class="category-rows">
            <?php for ($j = 0; $j < 3; $j++) : ?>
                <?php if (($j + $mod * $i) < count($rows)) : ?>
                    <?php $current_row = $rows[($j + $mod * $i)]; ?>
                    <div class="category">
                        <a href="https://localhost:3000/front-page/">
                            <div class="category-image">
                                <?php $image = $current_row['category_image']; ?>
                                <img class="img-fluid" src="<?php echo $image;?>" alt="Cover Image">
                            </div>
                            <div class="category-name">
                                <?php $name = $current_row['category_name']; ?>
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
