<?php

if ( ! function_exists( 'gcowp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function gcowp_setup() {

	/**
	 * Add default posts and comments RSS feed links to <head>.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for post thumbnails and featured images.
	 */
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/**
	 * Add support for two custom navigation menus.
	 */
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu' ),
		'secondary' => __('Secondary Menu' )
	) );

}
endif; // gcowp_setup
add_action( 'after_setup_theme', 'gcowp_setup' );


function gcowp_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

}
// Uncomment the lines below to enable/create widgets
// gcowp_widget( 'sidebar', 'sidebar-1', 'Use this function to create new widget areas' );
// add_action( 'widgets_init', 'gcowp_widget' );

/**
 * Enqueue scripts and styles.
 */
fucntion gcowp_scripts() {
	wp_enqueue_style( 'gcowp-style', get_template_directory_uri().'/css/style.css' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '4.0.0-beta.2', true);
	wp_enqueue_script( 'main-js', get_template_directory_uri().'/js/main.js', array('jquery'), '1.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gcowp_scripts' );
