<?php
/**
 * Functions which enhance the theme by hooking into the block editor
 *
 * @package UltraThreads
 */

function ultrathread_enqueue_block_assets() {
    wp_enqueue_style(
        'block-editor-style', 
        get_template_directory_uri() . '/assets/css/block-editor.css' 
    );
}
add_action( 'enqueue_block_assets', 'ultrathread_enqueue_block_assets' );



