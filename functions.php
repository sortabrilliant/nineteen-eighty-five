<?php
/**
 * Enqueues parent and child stylesheets.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sbnef_enqueue_styles() {
	$parent_style = 'twentynineteen';

	// Enqueue parent theme's stylesheet.
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

	// Enqueue child theme's stylesheet.
	wp_enqueue_style( 'nineteen-eighty-five', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
}
add_action( 'wp_enqueue_scripts', 'sbnef_enqueue_styles' );
