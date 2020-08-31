<?php
add_action( 'wp_enqueue_scripts', 'kadence_child_enqueue_styles' );
/**
 * Enqueue child styles.
 */
function kadence_child_enqueue_styles() {
	wp_enqueue_style( 'kadence-child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
}

/**
 * Add custom functions here
 */
