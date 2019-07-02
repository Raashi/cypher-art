<!DOCTYPE html>
<html lang="rus">
<head>
	<?php wp_head(); ?>
	<title><?php echo get_bloginfo(); ?></title>
</head>
<body>
<div id="ca-header">
    <h1 id="header-site-name"><?php echo get_bloginfo(); ?></h1>
    <div id="ca-header-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</div>