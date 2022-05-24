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
    $post_title_color = get_theme_mod('ultrathread_post_font_color');
    $post_bgcolor = get_theme_mod('ultrathread_post_bg_color');
    $menu_color = get_theme_mod('ultrathread_header_menu_color');
    $desc_color = get_theme_mod('ultrathread_site_description_color');

	
	$header_font           = get_theme_mod( 'ultrathread_header_font');
	$menu_font             = get_theme_mod( 'ultrathread_menu_font', 'Montserrat' );
	$site_title_font       = get_theme_mod( 'ultrathread_site_title_font', 'DM Serif Display' );
	$site_description_font = get_theme_mod( 'ultrathread_site_description_font', 'Bebas Neue' );

	$fonts = array('DM Serif Display', 'Gillsans,sans-serif','Montserrat','Bebas Neue','Oswald');

        if(!empty($themeColor)):
	
		if ( ! empty( get_theme_mod( 'ultrathread_site_title_font', 'DM Serif Display' ) ) ) {
			$fonts[] = get_theme_mod( 'ultrathreadp_site_title_font', 'DM Serif Display' );
		}

		if ( ! empty( get_theme_mod( 'ultrathread_site_description_font', 'Bebas Neue' ) ) ) {
			$fonts[] = get_theme_mod( 'ultrathreadp_site_description_font', 'Bebas Neue' );
		}

		if ( ! empty( get_theme_mod( 'ultrathread_header_font', 'DM Serif Display' ) ) ) {
			$fonts[] = get_theme_mod( 'ultrathreadp_header_font', 'DM Serif Display' );
		}

		if (  empty( get_theme_mod( 'ultrathread_menu_font', 'Montserrat' ) ) ) {
			$fonts[] = get_theme_mod( 'ultrathreadp_menu_font', 'Montserrat' );
		}	
     
    ?>
    <style type="text/css" id="ultrathread-theme-option-css">
    
        .site-header{
            background:<?php echo $header_bgcolor; ?>;
        } 
        .site-description{
            color:<?php echo $desc_color; ?>;
        } 
        .menu-item a{
            color:<?php echo $menu_color ; ?>;
        } 

		.wp-block-media-text__content,.wp-container-2.wp-block-group, .has-white-background-color .wp-container-2, .wp-block-group {
			background-color: <?php echo $post_bgcolor ?>
		}

		h2.has-background, p.has-text-color{
			color: <?php echo $post_title_color ?>
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

		

		.entry-title{
			font-family: <?php echo $header_font;?>;
		}
		.menu-item a{
			font-family: <?php echo $menu_font;?>;
		}
		.site-title{
			font-family: <?php echo $site_title_font;?>;
		}
		.site-description{
			font-family: <?php echo $site_description_font;?>;
		}
    
    </style>    
	
 
    <?php
 
    endif;    
}
 
add_action( 'wp_head', 'ultrathread_generate_theme_option_css' );


