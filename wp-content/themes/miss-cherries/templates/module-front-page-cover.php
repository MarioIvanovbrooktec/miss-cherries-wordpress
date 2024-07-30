<?php

if (!defined('ABSPATH')) {
    die();
}

?>

<section class="module-cover">
    <div class="cover-image">
        <?php $image = get_sub_field('cover_image'); ?>
        <img class="img-fluid" src="<?php echo $image;?>" alt="Cover Image">
    </div>
</section>
