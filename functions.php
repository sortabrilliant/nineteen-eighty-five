<?php
/**
 * Enqueues parent and child stylesheets.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add our editor style.
 *
 * @return void
 */
function nineteeneightyfive_setup() {
	add_editor_style( 'style-editor.css' );
}
add_action( 'after_setup_theme', 'nineteeneightyfive_setup' );

/**
 * Override the parent theme's Comment's Walker class.
 *
 * @param array $arguments
 *
 * @return array
 */
function nineteeneightyfive_wp_list_comments_args( $arguments ) {
	require get_stylesheet_directory() . '/classes/class-nineteeneightyfive-walker-comment.php';
	$arguments['walker'] = new NineteenEightyFive_Walker_Comment();
	return $arguments;
}
add_filter( 'wp_list_comments_args', 'nineteeneightyfive_wp_list_comments_args' );

/**
 * Enqueue our styles.
 *
 * @return void
 */
function nineteeneightyfive_enqueue_styles() {
	wp_enqueue_style( 'nineteeneightyfive', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'nineteeneightyfive_enqueue_styles' );

/**
 * Override our comment form submit button so we can apply NES.css styles properly.
 *
 * @param array $defaults
 *
 * @return array
 */
function nineteeneightyfive_comment_form_defaults( $defaults ) {
	$defaults['submit_button'] = '<button name="%1$s" type="submit" id="%2$s" class="%3$s btn is-primary">%4$s</button>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'nineteeneightyfive_comment_form_defaults' );
