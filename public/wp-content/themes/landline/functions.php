<?php 

if ( ! isset( $content_width ) ){
  $content_width = 620;
}

add_action('after_setup_theme', 'landline_init_theme');
 
function landline_init_theme() {

	register_nav_menus( array(
			'main' => 'Main Menu',
	) );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(1366, 768);
	$args = array(
		'default-image' => get_template_directory_uri() . '/img/default-background.jpg',
	);
	add_theme_support( 'custom-background', $args);
	add_theme_support('automatic-feed-links');
}

function landline_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'color_scheme' , array(
		'default'     => 'mango',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control(
		'color_scheme_control', 
		array(
			'label'    => 'Color Scheme',
			'section'  => 'colors',
			'settings' => 'color_scheme',
			'type'     => 'select',
			'choices'  => array(
				'mango' => 'Mango',
				'strawberry' => 'Strawberry',
				'lime' => 'Lime'
			),
		)
	);

	$wp_customize->remove_control('background_color');

	$wp_customize->add_section('fonts', array(
		'title' => 'Font',
		'priority' => 40
		));

	$wp_customize->add_setting( 'google_webfont' , array(
		'default'     => 'Arvo',
		'transport'   => 'refresh',
	) );

	require_once('inc/google-font-dropdown-custom-control.php');

	$wp_customize->add_control( new Google_Font_Dropdown_Custom_Control( $wp_customize, 'google_font_setting', array(
        'label'   => 'Title Font',
        'section' => 'fonts',
        'settings'   => 'google_webfont'
    ) ) );

	
}
add_action( 'customize_register', 'landline_customize_register' );

function landline_scripts() {
	if (get_theme_mod('google_webfont') == 'Arvo') {
		wp_enqueue_style( 'landline_wf', '//fonts.googleapis.com/css?family=Arvo:700' );
	}
	else{
		wp_enqueue_style( 'landline_wf', '//fonts.googleapis.com/css?family='.get_theme_mod('google_webfont') );
	}
	wp_enqueue_style( 'landline_css', get_stylesheet_uri() );
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}

add_action( 'wp_enqueue_scripts', 'landline_scripts' );

function landline_webfont_style() {
	if (get_theme_mod('google_webfont') != 'Arvo'){
echo '<style>
	.header .title, h1, h2, h3, h4, h5, h6, .wf{
		font-family: ' . get_theme_mod('google_webfont') .', Helvetica, Arial, sans-serif !important;
	}
</style>';
	}
}

add_action( 'wp_head', 'landline_webfont_style' );

add_filter('wp_title', 'landline_wp_title');
function landline_wp_title($input){
	$output = $input . get_bloginfo( 'name' );

	return $output;
}

function landline_excerpt_more($more) {
			 global $post;
	return '... </p><p><a class="moretag" href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'landline_excerpt_more');

function landline_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, 'Read more', $more_link );
}
add_filter( 'the_content_more_link', 'landline_more_link', 10, 2 );

?>