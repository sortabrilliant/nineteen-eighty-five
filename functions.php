<?php
/**
 * Enqueues parent and child stylesheets.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nineteeneightyfive_setup() {
	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );
}
add_action( 'after_setup_theme', 'nineteeneightyfive_setup' );

function sbnef_enqueue_styles() {
	$parent_style = 'twentynineteen';

	// Enqueue parent theme's stylesheet.
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

	// Enqueue child theme's stylesheet.
	wp_enqueue_style( 'nineteen-eighty-five', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
}
add_action( 'wp_enqueue_scripts', 'sbnef_enqueue_styles' );

function sbnef_comment_form_defaults( $defaults ) {
	$defaults['submit_button'] = '<button name="%1$s" type="submit" id="%2$s" class="%3$s btn is-primary">%4$s</button>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'sbnef_comment_form_defaults' );
