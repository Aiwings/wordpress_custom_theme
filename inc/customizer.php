<?php
/**
 * portfolio Theme Customizer
 *
 * @package portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => '_portfolio_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => '_portfolio_customize_partial_blogdescription',
		) );
	}
	$wp_customize->add_setting( 'header_bg_color' , array(
		'default'   => '#2d3748cc',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_setting( 'header_text_color' , array(
		'default'   => '#dce0d9',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'header_bg_image' , array(
		'default'   => get_template_directory_uri() .'/inc/media/cover.jpg',
	) );

	$wp_customize->add_setting( 'header_portrait' , array(
		'default'   => content_url() .'/uploads/2019/09/photo-fb-150x150.jpg',
	) );

	$wp_customize->add_section( 'portfolio_homepage' , array(
		'title'      => __( 'Page d\'accueil', 'portfolio' ),
		'priority'   => 30,
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
		'label'      => __( "Couleur d'arrière plan", 'portfolio' ),
		'section'    => 'portfolio_homepage',
		'settings'   => 'header_bg_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
		'label'      => __( "Couleur du texte du header", 'portfolio' ),
		'section'    => 'portfolio_homepage',
		'settings'   => 'header_text_color',
	) ) );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'header_bg_image',
			array(
				'label'      => __( 'Image d\'arrière plan du header', 'portfolio' ),
				'section'    => 'portfolio_homepage',
				'settings'   => 'header_bg_image',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
			$wp_customize,
			'header_portrait',
			array(
				'label'      => __( 'Photo portrait', 'portfolio' ),
				'section'    => 'portfolio_homepage',
				'settings'   => 'header_portrait',
			)
		)
	);
}
add_action( 'customize_register', '_portfolio_customize_register' );


function _portfolio_customize_css() {
?>
<style>
	.home .entry-header {
		background-image: url(<?php echo get_theme_mod('header_bg_image'); ?>);
		color : <?php echo get_theme_mod('header_text_color'); ?>;
	}
	.home .entry-header>div {
		background-color : <?php echo get_theme_mod('header_bg_color') .'cc'; ?>;
	}

</style>
<?php
}
add_action( 'wp_head', '_portfolio_customize_css');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function _portfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function _portfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _portfolio_customize_preview_js() {
	wp_enqueue_script( 'portfolio-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', '_portfolio_customize_preview_js' );
