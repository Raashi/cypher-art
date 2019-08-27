<?php get_header(); ?>

<div id="wen-main">
    <div id="wen-page" class="wen-block">
        <?php the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>

</div>

<?php get_footer(); ?>