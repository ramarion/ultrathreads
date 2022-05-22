<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package UltraThreads
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ultrathread_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ultrathread_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ultrathread_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ultrathread_pingback_header' );

//lets the color changes show in the theme from customizer
function ultrathread_generate_theme_option_css(){
 
    $themeColor = get_theme_mod('ultrathread_theme_bgcolor');
    $header_bgcolor = get_theme_mod('ultrathread_header_bgcolor');
    $footer_bgcolor = get_theme_mod('ultrathread_footer_bgcolor');
    $footer_widget_bgcolor = get_theme_mod('ultrathread_footer_widget_bgcolor');
 
    if(!empty($themeColor)):
     
    ?>
    <style type="text/css" id="ultrathread-theme-option-css">
         
        .site-header{
            background:<?php echo $header_bgcolor; ?>;
        } 
        
		body{
            background-color: <?php echo $themeColor; ?>
        }

        .site-footer-bottom {
            background-color: <?php echo $footer_bgcolor; ?>;
        }
        .site-footer-top {
            background-color: <?php echo $footer_widget_bgcolor; ?>;
        }
     
    </style>    
 
    <?php
 
    endif;    
}
 
add_action( 'wp_head', 'ultrathread_generate_theme_option_css' );
