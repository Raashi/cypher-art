<?php
get_header();
include "cats.php";
?>

<div id="wen-main">
	<?php
    $post = get_queried_object();
    $category = get_the_category()[0];
    wen_write_cats_block($category, $post);
    ?>

	<div id="wen-content" class="wen-block">
		<?php the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
	
</div>

<?php get_footer(); ?>