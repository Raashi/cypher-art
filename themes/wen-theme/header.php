<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<title><?php echo get_bloginfo(); ?></title>
</head>
<body>
<div id="wen-header">
    <h1 id="wen-header-site-name">
        <a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo(); ?></a>
    </h1>
    <div id="wen-header-menu">
        <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
    </div>
</div>