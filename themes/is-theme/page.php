<?php get_header(); ?>

<div id="ca-main">
    <div id="ca-page" class="ca-block">
        <?php the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>

</div>

<?php get_footer(); ?>