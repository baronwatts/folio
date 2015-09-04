<?php 
//Defines the content width of the theme
if ( ! isset( $content_width ) ) $content_width = 1170;

//WordPress hack to add the description/tagline at the wp_title place on homepage
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}


/*******************************************************************************
 * Folio Stylesheets and Scripts
 ******************************************************************************/

add_action('wp_enqueue_scripts', 'folio_stylesheet');
function folio_stylesheet(){
	wp_enqueue_script( 'jquery' );
	wp_enqueue_style( 'bootstrap-css','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js','','',true);
	wp_enqueue_script( 'search-toggle', get_template_directory_uri() . '/js/search-toggle.js');
}//folio_stylesheet()



/*******************************************************************************
 * Images
 ******************************************************************************/

//activates feature image
add_theme_support('post-thumbnails');

//set thumbnail size for the post
add_image_size( 'custom-size', 634, 421, true);

//for theme check validation
add_theme_support( 'automatic-feed-links' );



/*******************************************************************************
 * Excerpts
 ******************************************************************************/

//change excerpt length
function folio_excerpt_length() {
	return 50;
}
add_filter( 'excerpt_length', 'folio_excerpt_length');


//change the excerpt [....] to Read more
function folio_readmore( $more ) {
	return ' <a class="readmore" href=" ' . get_permalink() . ' ">Read&nbsp;more</a>';
}
add_filter('excerpt_more', 'folio_readmore');


/*******************************************************************************
 * Html5 Search Form
 ******************************************************************************/

add_theme_support( 'html5', array( 'search-form' ) );

//change the placeholder text
add_filter('get_search_form', 'change_search_placeholder');
function change_search_placeholder($text) {
	return str_replace('placeholder="Search &hellip;"', 'placeholder="type and hit enter"', $text);
}



/*******************************************************************************
 * Register Widgets
 ******************************************************************************/

add_action('widgets_init', folio_sidebars);
function folio_sidebars(){
	register_sidebar(array(
		'name'=> 'Footer Widget Area',
		'description'=> 'Appears at the bottom of every page',
		'before_widget'=>'<div id="%1$s" class="col-sm-4 %2$s">',//generates a dynamic class and ID for your widget
		'after_widget'=>'</div>',
		'before_title'=>'<h4 class="widget-title">',
		'after_title'=>'</h4>',

	));
}//end folio_sidebars()


/******************************************************************************
 * Register Menu
 ******************************************************************************/

add_action('init', folio_menu);
function folio_menu(){
	register_nav_menus(array(
		'main_menu' => 'Main Menu',
	) );

}//end folio_menu()




/*******************************************************************************
 * Theme Customization API example - add custom logo
 ******************************************************************************/

add_action('customize_register', 'folio_theme_customizer');
function folio_theme_customizer($wp_customize){
	//logo
	$wp_customize->add_section('folio_logo_section', array(
		'title'=> __('Logo', 'folio'),
		'priority'=> 30,
		'description'=> 'Upload a logo to replace the default site name in the header',
	));
	//register the logo setting
	$wp_customize->add_setting('folio_logo');

	//Tell customizer to let us use an image uploader for the logo
	$wp_customize->add_control(new Wp_Customize_Image_control($wp_customize, 'folio_logo', array(
		'label'=> __('Logo', 'folio'),
		'section'=> 'folio_logo_section',
		'settings'=> 'folio_logo',
	)));

}//end folio_theme_customizer()


