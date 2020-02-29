<?php
function wen_write_posts_titles($cat_ID, $cat_html_class, $current_post_id) {
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
			<a class="wen-cats-el wen-cats-post <?php echo $cat_html_class ?>"
				<?php if (get_the_ID() == $current_post_id) echo "id=\"wen-cats-post-current\""?>
			   href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a><br>
<!--			<hr class="--><?php //echo $cat_html_class ?><!--">-->
			<?php
		}
		wp_reset_postdata();
	}
}

function wen_write_cats_block($category, $post) {
	?> <div id="wen-cats" class="wen-block"> <?php
	$root_category_id = $category->parent;
	if ($root_category_id == null)
		// поддержка постов внутри корневой рубрики
		$root_category_id = $category->cat_ID;

	$args = array('parent' => $root_category_id);
	$children_categories = get_categories($args);

	$current_category_id = null;
	if ($category != null)
		$current_category_id = $category->cat_ID;

	$post_id = null;
	if ($post != null)
		$post_id = $post->ID;

	// посты в корневой рубрике
    ?> <div class="wen-cats-subcat"> <?php
	wen_write_posts_titles($root_category_id, "wen-cats-root", $post_id);
    ?> </div> <?php
	// посты в подрубриках
	foreach ($children_categories as $cat) { ?>
		<div class="wen-cats-subcat"<?php if ($cat->cat_ID == $current_category_id) echo ' id="wen-cats-current"' ?>>
			<a class="wen-cats-el wen-cats-cat wen-cats-root"
			   href="<?php echo get_category_link($cat->cat_ID) ?>">
				<b><?php echo $cat->cat_name; ?></b>
			</a>
			<br>
			<?php wen_write_posts_titles($cat->cat_ID, "wen-cats-child", $post_id); ?>
		</div>
	<?php }
	?> </div> <?php
}
