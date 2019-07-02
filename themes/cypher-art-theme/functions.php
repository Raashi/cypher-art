<?php

function cypher_art_resources() {
	wp_enqueue_style('cypher_art_main_styles', get_stylesheet_uri());
	// wp_enqueue_script
}

function cypher_art_register_menus() {
	register_nav_menu("header-menu", __("Меню заголовка"));
}

add_action('wp_enqueue_scripts', 'cypher_art_resources');
add_action('init', 'cypher_art_register_menus');