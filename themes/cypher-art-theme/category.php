<?php get_header() ?>
<?php
function ca_write_posts($cat_ID) {
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
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><hr>
			<?php
		}
		wp_reset_postdata();
	}
}
?>
<div id="ca-main">
    <div id="ca-cyphers" class="ca-block">
        <?php
        $category = get_queried_object();
        $root_category_id = $category->parent;
        if ($root_category_id == null)
	        // поддержка постов внутри корневой рубрики
	        $root_category_id = $category->cat_ID;
        $root_category = get_category($root_category_id);

        $args = array('parent' => $root_category_id);
        $children_categories = get_categories($args);

        // посты в корневой рубрике
        ca_write_posts($root_category_id);
        // посты в подрубриках
        foreach ($children_categories as $cat) { ?>
            <div class="ca-cyphers-cat">
                <a href="<?php echo get_category_link($cat->cat_ID) ?>"><b><?php echo $cat->cat_name; ?></b></a>
                <br>
		        <?php ca_write_posts($cat->cat_ID); ?>
            </div>
        <?php } ?>
    </div>

    <div id="ca-content" class="ca-block">
        <h2><?php single_cat_title(); ?></h2>
	    <?php echo category_description(); ?>
    </div>
</div>
<?php get_footer() ?>
