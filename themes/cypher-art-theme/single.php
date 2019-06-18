<?php get_header(); ?> 

<div id="main">

	<div id="cyphers">
	
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

	<div class="content">
		<?php the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
	
</div>

<?php get_footer(); ?>