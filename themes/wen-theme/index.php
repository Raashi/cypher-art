<?php get_header(); ?> 

<div id="wen-main">

	<div id="wen-cyphers" class="wen-block">
	
	<?php
	$args = array(
	    'posts_per_page' => -1,
	    'post_type' => 'post',
	);
	$the_query = new WP_Query($args);

	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) {
			$the_query->the_post();
			?>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><hr>
			<?php
		}
		wp_reset_postdata(); 
	}
	?>

	</div>

	<div id="wen-content" class="wen-block">
		<h2>Это сайт о шифрах. Хаю-хай.</h2>
	</div>
	
</div>

<?php get_footer(); ?>