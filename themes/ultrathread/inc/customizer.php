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

	// Remove title
	$wp_customize->add_setting(
		'ultrathread_settings[hide_title]',
		array(
			'default' => $defaults['hide_title'],
			'type' => 'option',
			'sanitize_callback' => 'ultrathread_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'ultrathread_settings[hide_title]',
		array(
			'type' => 'checkbox',
			'label' => __( 'Hide site title', 'ultrathread' ),
			'section' => 'title_tagline',
			'priority' => 9
		)
	);

	// Remove tagline
	$wp_customize->add_setting(
		'ultrathread_settings[hide_tagline]',
		array(
			'default' => $defaults['hide_tagline'],
			'type' => 'option',
			'sanitize_callback' => 'ultrathread_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'ultrathread_settings[hide_tagline]',
		array(
			'type' => 'checkbox',
			'label' => __( 'Hide site tagline', 'matangi' ),
			'section' => 'title_tagline',
			'priority' => 12
		)
	);
	// Add New Section: Colors
    $wp_customize->add_section( 'ultrathread_color_section', array(
		'title' => 'Colors',
		'description' => 'Set Colors For Background , Headers & Footers',
		'priority' => '40'                  
));

// Add Settings: Color 
// Add Settings: Theme Background Color 
$wp_customize->add_setting( 'ultrathread_theme_bgcolor', array(
'default' => '#ffe4c4',    
));
// Add Settings: Header Background Color 
$wp_customize->add_setting( 'ultrathread_header_bgcolor', array(
'default' => '#003e1f',                        
));
// Add Settings: Footer Background Color 
$wp_customize->add_setting( 'ultrathread_footer_bgcolor', array(
'default' => '#003e1f',                        
));
// Add Settings: Footer Widget Background Color 
$wp_customize->add_setting( 'ultrathread_footer_widget_bgcolor', array(
'default' => '#2a752a',                        
));
// Add Settings: Site Description Color 
$wp_customize->add_setting( 'ultrathread_site_description_color', array(
'default' => '#f79824',                        
));
// Add Settings: Header Menu Color 
$wp_customize->add_setting( 'ultrathread_header_menu_color', array(
'default' => '#f79824',                        
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

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultrathread_footer_widget_bgcolor', array(
'label' => 'Footer Widget Background',
'section' => 'ultrathread_color_section',
'settings' => 'ultrathread_footer_widget_bgcolor'
)));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultrathread_site_description_color', array(
'label' => 'Site Description Color',
'section' => 'ultrathread_color_section',
'settings' => 'ultrathread_site_description_color'
)));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ultrathread_header_menu_color', array(
'label' => 'Header Menu Color',
'section' => 'ultrathread_color_section',
'settings' => 'ultrathread_header_menu_color'
)));
// close controls

// THEME OPTIONS PANEL

$wp_customize->add_panel(
	'ultrathread_theme_options',
	array(
		'title'    => esc_html__( 'Post Options', 'ultrathread' ),
		'priority' => 130,
	)
);
$wp_customize->add_section(
	'ultrathread_posts_styles',
	array(
		'panel' => 'ultrathread_theme_options',
		'title' => esc_html__( 'Post Styles', 'ultrathread' ),
		'description' => 'Add images to posts here.',
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ultrathread_post_font_color',
	array(
		'default'           => '#003e1f',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'ultrathread_post_font_color',
	array(
		'label' => 'Post Title Color',
'section' => 'ultrathread_posts_styles',
'settings' => 'ultrathread_post_font_color'
	)));

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ultrathread_post_bg_color',
	array(
		'default'           => '#fff',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'ultrathread_post_bg_color',
	array(
		'label' => 'Post Background Color',
'section' => 'ultrathread_posts_styles',
'settings' => 'ultrathread_post_bg_color'
	)));

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ultrathread_post_media' );

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'ultrathread_post_media',
	array(
	'label' => 'Media',
    'section' => 'ultrathread_posts_styles',

	)));

// Add Section: Footer Control
$wp_customize->add_section(
	'ultrathread_footer_options',
	array(
		'title' => esc_html__( 'Footer Options', 'ultrathread' ),
	)
);
// Add Settings: Footer Control	
// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'shopup' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'ultrathread_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

// Add Controls: Footer Control	
$wp_customize->add_control(
	'ultrathread_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'ultrathread' ),
		'section'  => 'ultrathread_footer_options',
		'settings' => 'ultrathread_footer_copyright_text',
		'type'     => 'textarea',
	)
);

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
