<?php
/**
 * Functions which enhance the theme by hooking into the Woocommerce
 *
 * @package UltraThreads
 */

 // Allows block editor for single products
function ultrathread_use_block_editor_for_post_type( $use_block_editor, $post_type) {
    if ( 'product' === $post_type ) {
        $use_block_editor = true;
    }
    return $use_block_editor;
}
 add_filter('use_block_editor_for_post_type','ultrathread_use_block_editor_for_post_type', 10, 2 );

 /**
 * Removes default styles in woocommerce add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

 */


 /**
 * Woocommerce product title and rating

 */

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 4 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5 );


