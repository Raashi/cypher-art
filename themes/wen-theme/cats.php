<?php
function wen_write_cats($cat_ID, $cat_html_class) {
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'post',
		'category__in' => array($cat_ID)
	);
	$query = new WP_Query($args);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			?>
			<a class="<?php echo $cat_html_class ?>"
			   href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
			<hr class="<?php echo $cat_html_class ?>">
			<?php
		}
		wp_reset_postdata();
	}
}

function wen_write_cats_block($category) {
	?> <div id="wen-cats" class="wen-block"> <?php
	$root_category_id = $category->parent;
	if ($root_category_id == null)
		// поддержка постов внутри корневой рубрики
		$root_category_id = $category->cat_ID;
	$root_category = get_category($root_category_id);

	$args = array('parent' => $root_category_id);
	$children_categories = get_categories($args);

	// посты в корневой рубрике
	wen_write_cats($root_category_id, "wen-cats-root");
	// посты в подрубриках
	foreach ($children_categories as $cat) { ?>
		<div class="wen-cats-cat">
			<a class="wen-cats-root"
			   href="<?php echo get_category_link($cat->cat_ID) ?>">
				<b><?php echo $cat->cat_name; ?></b>
			</a>
			<br>
			<?php wen_write_cats($cat->cat_ID, "wen-cats-child"); ?>
		</div>
	<?php }
	?> </div> <?php
}
