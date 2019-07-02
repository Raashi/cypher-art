<?php get_header(); ?> 

<div id="ca-main">

	<div id="ca-cyphers" class="ca-block">
	<?php
    function ca_write_posts($query) {
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

    $category = get_the_category()[0];
    $root_category_id = $category->parent;
    if ($root_category_id == null)
        // поддержка постов внутри корневой рубрики
        $root_category_id = $category->cat_ID;
    $root_category = get_category($root_category_id);

    $args = array('parent' => $root_category_id);
    $children_categories = get_categories($args);

    // посты в корневой рубрике

    // посты в подрубриках
    foreach ($children_categories as $cat) {
        ?>
        <div class="ca-cyphers-cat">
            <a href="<?php echo get_category_link($cat->cat_ID) ?>"><b><?php echo $cat->cat_name; ?></b></a>
            <br>
        <?php
	    $args = array(
		    'posts_per_page' => -1,
		    'post_type' => 'post',
		    'cat' => $cat->cat_ID
	    );
	    $the_query = new WP_Query($args);
	    ca_write_posts($the_query);
	    ?>
        </div>
        <?php
    }
	?>
	</div>

	<div id="ca-content" class="ca-block">
		<?php the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
	
</div>

<?php get_footer(); ?>