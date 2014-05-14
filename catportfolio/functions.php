<?php
//LOAD THEME CSS. 
//REPLACE CSS FILES WITH THEME SPECIFIC FILES
function theme_styles(){


	wp_enqueue_style( 'googlefonts', 'http://fonts.googleapis.com/css?family=Lato:400,300,700' );
	wp_enqueue_style( 'googlefonts1', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' );
	wp_enqueue_style( 'googlefonts2', 'http://fonts.googleapis.com/css?family=Oswald:400,300' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css' );
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

function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", false, null, true);
   wp_enqueue_script('jquery');
}

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

function theme_js() {
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '', false );
	wp_enqueue_script('foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'fittext', get_template_directory_uri() . '/js/jquery.fittext.js', array('jquery'), '', true );
    wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true );
    
}

function get_picturefill() {
    wp_enqueue_script('picturefill', plugins_url( '/js/picturefill.js', __FILE__));
}
add_action('wp_enqueue_scripts', 'get_picturefill');
add_image_size('large-img', 1000, 702);
add_image_size('medium-img', 700, 372);
add_image_size('small-img', 300, 200);


add_action('wp_enqueue_scripts', 'theme_js');

add_action('wp_enqueue_scripts', 'theme_styles');

add_filter( 'use_default_gallery_style', '__return_false' );

	//enable custom menus
add_theme_support( 'menus' );

add_theme_support('post-thumbnails');

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function theme_name_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }
    
    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );

/*
http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
*/

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menus( array(
		'top-bar-l' => 'Left Top Bar', // registers the menu in the WordPress admin menu editor
    	'top-bar-r' => 'Right Top Bar',
		'Footer-Menu' => 'Footer-Menu'
		));
}
 
// the left top bar
function foundation_top_bar_l() {
    wp_nav_menu(array( 
        'container' => false,                           // remove nav container
        'container_class' => 'menu',           		// class of container
        'menu' => '',                      	        // menu name
        'menu_class' => 'top-bar-menu left',         	// adding custom nav class
        'theme_location' => 'top-bar-l',                // where it's located in the theme
        'before' => '',                                 // before each link <a> 
        'after' => '',                                  // after each link </a>
        'link_before' => '',                            // before each link text
        'link_after' => '',                             // after each link text
        'depth' => 5,                                   // limit the depth of the nav
    	'fallback_cb' => false,                         // fallback function (see below)
        'walker' => new top_bar_walker()
	));
} // end left top bar
 
// the right top bar
function foundation_top_bar_r() {
    wp_nav_menu(array( 
        'container' => false,                           // remove nav container
        'container_class' => '',           		// class of container
        'menu' => '',                      	        // menu name
        'menu_class' => 'top-bar-menu right',         	// adding custom nav class
        'theme_location' => 'top-bar-r',                // where it's located in the theme
        'before' => '',                                 // before each link <a> 
        'after' => '',                                  // after each link </a>
        'link_before' => '',                            // before each link text
        'link_after' => '',                             // after each link text
        'depth' => 5,                                   // limit the depth of the nav
    	'fallback_cb' => false,                         // fallback function (see below)
        'walker' => new top_bar_walker()
	));
} // end right top bar

/*
Customize the output of menus for Foundation top bar classes and add descriptions
 
http://www.kriesi.at/archives/improve-your-wordpress-navigation-menu-output
http://code.hyperspatial.com/1514/twitter-bootstrap-walker-classes/
*/
class top_bar_walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
		
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
 
        $class_names = $value = '';
 
        $classes = empty($item->classes) ? array() : (array) $item->classes;
		
	$classes[] = ($item->current) ? 'active' : '';
        $classes[] = ($args->has_children) ? 'has-dropdown' : '';
		
	$args->link_before = (in_array('section', $classes)) ? '<label>' : '';
	$args->link_after = (in_array('section', $classes)) ? '</label>' : '';
	$output .= (in_array('section', $classes)) ? '<li class="divider"></li>' : '';
 
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args ) );
        $class_names = strlen(trim($class_names)) > 0 ? ' class="'.esc_attr($class_names).'"' : '';
		
	$output .= ($depth == 0) ? $indent.'<li class="divider"></li>' : '';
        $output .= $indent.'<li id="menu-item-'.$item->ID.'"'.$value.$class_names.'>';
 
        $attributes  = !empty($item->attr_title) ? ' title="' .esc_attr($item->attr_title).'"' : '';
        $attributes .= !empty($item->target)     ? ' target="'.esc_attr($item->target    ).'"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'   .esc_attr($item->xfn       ).'"' : '';
        $attributes .= !empty($item->url)        ? ' href="'  .esc_attr($item->url       ).'"' : '';
		
	$item_output  = $args->before;
	$item_output .= (!in_array('section', $classes)) ? '<a'.$attributes.'>' : '';
	$item_output .= $args->link_before.apply_filters('the_title', $item->title, $item->ID);
	$item_output .= $args->link_after;
	$item_output .= (!in_array('section', $classes)) ? '</a>' : '';
	$item_output .= $args->after;
 
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    function end_el(&$output, $item, $depth) {
        $output .= '</li>'."\n";
	}
    function start_lvl(&$output, $depth) {
        $indent  = str_repeat("\t", $depth);
        $output .= "\n".$indent.'<ul class="sub-menu dropdown">'."\n";
    }
    function end_lvl(&$output, $depth) {
        $indent  = str_repeat("\t", $depth);
        $output .= $indent.'</ul>'."\n";
    }		
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = ! empty($children_elements[$element->$id_field]);
        }
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }  	
} // end top bar walker

?>