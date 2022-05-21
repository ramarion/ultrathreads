<?php
/**
 * UltraThreads Theme Customizer
 *
 * @package UltraThreads
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ultrathread_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'ultrathread_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'ultrathread_customize_partial_blogdescription',
			)
		);
	}
	// Add New Section: Colors
    $wp_customize->add_section( 'ultrathread_color_section', array(
		'title' => 'Colors',
		'description' => 'Set Colors For Background , Headers & Footers',
		'priority' => '40'                  
));

// Add Settings: Color 
$wp_customize->add_setting( 'ultrathread_theme_bgcolor', array(
'default' => '#ffe4c4',    
));

$wp_customize->add_setting( 'ultrathread_header_bgcolor', array(
'default' => '#003e1f',                        
));

$wp_customize->add_setting( 'ultrathread_footer_bgcolor', array(
'default' => '#003e1f',                        
));


// Add Controls
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultrathread_theme_bgcolor', array(
'label' => 'Theme Background',
'section' => 'ultrathread_color_section',
'settings' => 'ultrathread_theme_bgcolor'

)));


$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultrathread_header_bgcolor', array(
'label' => 'Header Background',
'section' => 'ultrathread_color_section',
'settings' => 'ultrathread_header_bgcolor'
)));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultrathread_footer_bgcolor', array(
'label' => 'Footer Background',
'section' => 'ultrathread_color_section',
'settings' => 'ultrathread_footer_bgcolor'
)));


}
add_action( 'customize_register', 'ultrathread_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ultrathread_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ultrathread_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ultrathread_customize_preview_js() {
	wp_enqueue_script( 'ultrathread-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), ULTRATHREAD_VERSION, true );
}
add_action( 'customize_preview_init', 'ultrathread_customize_preview_js' );
