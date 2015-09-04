<?php 
/*
Plugin Name: Portfolio Custom Post Type
Description: Adds Portfolio Gallery
Author: Baron Watts
Version: 0.1
LicenseL GPLv3
*/




/*******************************************************************************
 * Custom Post Type
 ******************************************************************************/
add_action('init', 'folio_portfolio' );
function folio_portfolio(){
	/*no capital letters, spaces or special characters in the CPT name*/
	register_post_type('portfolio', array(
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-cart',
		'supports' => array('title','editor','thumbnail','custom-fields','revisions','excerpt'),
		'labels' => array(
			//These will show up in the admin panel
			'name' => 'Portfolio',
			'singular_name' => 'Portfolio',
			'add_new_item' => 'Add New Portfolio',
			'not_found' => 'No Portfolio Found',
		),
	));


	//photo type taxonomy
	register_taxonomy('photo_type', 'portfolio', array(
		'hierarchical'=>true,
		'label'=>'Photo Type', 'query_var'=>true,
		'rewrite'=>true
	));

}//end function





/*******************************************************************************
 * Flush The Taxonomies
 ******************************************************************************/
function folio_rewrite_flush(){
	//setup the custom post and taxonomy first
	folio_portfolio();
	//then fix htaccess file
	flush_rewrite_rules();
}

//hook the function __FILE__ means 'this'
register_activation_hook(__FILE__, 'rad_rewrite_flush' );


