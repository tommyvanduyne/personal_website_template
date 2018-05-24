<?php
//get parent styles
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
	  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//include custom styles
add_action('wp_enqueue_scripts','tom_custom_styles');
function tom_custom_styles() {
	//register custom stylesheet
	wp_register_style('tom_custom_styles', get_stylesheet_directory_uri().'/assets/css/custom.css');
	wp_enqueue_style('tom_custom_styles');
}
?>
