<?php

function extend_register_enqueue_assets() {

	require_once get_template_directory() . '/extend-block-assets/class-extent-block-assets.php';

	/***
	 * The class simply takes two path parameters as string values,
	 *
	 * First one for the Theme's CSS styles directory
	 * Second one for the Theme's JS directory
	 * There is no need to provide the Theme's absolute directory path,
	 * only the individual paths within the Theme's directory are needed
	 * for example, '/assets/css/blocks/' or '/assets/css/core-blocks/' or '/assets/css/' etc
	 *
	 * As long as there is a file in the theme's directory the CLASS will look after everything else
	 *
	 * NOTE: the name of the file should reflect the name of the block and not preceed with the key 'core'
	 * for example, for a core heading CSS of JS file, the file name should be 'heading.css' or 'heading.js'
	 * do not use 'core-heading.css' or 'core-heading.js'
	 *
	 * If you only want to include JS file's simply pass an empty string for the first parameter, and vice versa
	 * its a assumed that you'll likely only need to include styles but it's possible to pass empty parameters
	 *
	 * example usage
	 * new Extend_Block_Assets('/assets/css/blocks/'); // for only style files
	 * new Extend_Block_Assets('', '/assets/js/blocks/'); // for only javascript files
	 */

	// Instantiate the class with the block assets array
	new Extend_Block_Assets( '/assets/css/blocks', '/assets/js/blocks', );
}
add_action( 'init', 'extend_register_enqueue_assets' );

/**
 * Enqueue script variations
 *
 * @return void
 */
function satoh_dojo_block_variations() {
	wp_enqueue_script(
		'satoh-dojo-block-variations',
		get_template_directory_uri() . '/assets/js/block-variations.js',
		array( 'wp-blocks', 'wp-dom-ready' ),
		wp_get_theme()->get( 'Version' ),
	);
}
add_action( 'enqueue_block_editor_assets', 'satoh_dojo_block_variations' );

/**
 * Style loader for the editor
 *
 * @return void
 */
function satoh_dojo_editor_styles() {
	// Enqueue the editor styles for the block editor and site editor
	wp_enqueue_style(
		'satoh-dojo-editor-styles',
		get_parent_theme_file_uri( '/assets/css/editor-style.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'enqueue_block_editor_assets', 'satoh_dojo_editor_styles' );

/**
 * Register block style
 *
 * @return void
 */
function satoh_dojo_register_block_styles() {
	register_block_style(
		'core/heading',
		array(
			'name'  => 'append-icon',
			'label' => __( 'Append Icon', 'temp' ),
		)
	);
}
add_action( 'init', 'satoh_dojo_register_block_styles' );

// Adds theme support for various...
if ( ! function_exists( 'satoh_dojo_post_format_setup' ) ) :

	function satoh_dojo_post_format_setup() {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'cards-crop', 420, 240, true );
		add_image_size( 'cards', 420, 240 );
	}

endif;
add_action( 'after_setup_theme', 'satoh_dojo_post_format_setup' );
