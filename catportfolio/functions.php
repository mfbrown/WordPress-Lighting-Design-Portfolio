<?php
//LOAD THEME CSS. 
//REPLACE CSS FILES WITH THEME SPECIFIC FILES
function theme_styles(){


	wp_enqueue_style( 'googlefonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );
	wp_enqueue_style( 'googlefonts1', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' );
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
	

	wp_register_style( 'subpagestyle', get_template_directory_uri() . '/css/subpagestyle.css' );
	if(!is_page('home')){
		wp_enqueue_style( 'subpagestyle' );
	}



	

}
//LOAD THEME JS
//REPLACE JS FILES WITH YOUR THEME SPECIFIC JS FILES
//jQuery Insert From Google
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


function theme_js() {
	wp_enqueue_script( 'fittext', get_template_directory_uri() . '/js/jquery.fittext.js', array('jquery'), '', true );
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true );
}


add_action('wp_enqueue_scripts', 'theme_js');

add_action('wp_enqueue_scripts', 'theme_styles');

add_filter( 'use_default_gallery_style', '__return_false' );


	//enable custom menus
add_theme_support( 'menus' );


?>