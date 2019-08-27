<?php

function wen_resources() {
	wp_enqueue_style('wen_main_styles', get_stylesheet_uri());
	// wp_enqueue_script
}

function wen_register_menus() {
	register_nav_menu("header-menu", __("Меню заголовка"));
}

add_action('wp_enqueue_scripts', 'wen_resources');
add_action('init', 'wen_register_menus');