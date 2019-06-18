<?php

function cypher_art_resources() {
	wp_enqueue_style('cypher_art_main_styles', get_stylesheet_uri());
	// wp_enqueue_script
}

add_action('wp_enqueue_scripts', 'cypher_art_resources');