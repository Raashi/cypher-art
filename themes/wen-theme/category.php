<?php
get_header();
include "cats.php";
?>

<div id="wen-main">
    <?php
    $category = get_queried_object();
    wen_write_cats_block($category, null);
    ?>

    <div id="wen-content" class="wen-block">
        <h2><?php single_cat_title(); ?></h2>
	    <?php echo category_description(); ?>
    </div>

</div>

<?php get_footer() ?>
