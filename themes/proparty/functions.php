<?php
/**
 * Theme sprecific functions and definitions
 */


/* Theme setup section
------------------------------------------------------------------- */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) $content_width = 1170; /* pixels */

// Add theme specific actions and filters
// Attention! Function were add theme specific actions and filters handlers must have priority 1
if ( !function_exists( 'axiom_theme_setup' ) ) {
	add_action( 'axiom_action_before_init_theme', 'axiom_theme_setup', 1 );
	function axiom_theme_setup() {

		// Register theme menus
		add_filter( 'axiom_filter_add_theme_menus',		'axiom_add_theme_menus' );

		// Register theme sidebars
		add_filter( 'axiom_filter_add_theme_sidebars',	'axiom_add_theme_sidebars' );

		// Set theme name and folder (for the update notifier)
		add_filter('axiom_filter_update_notifier', 		'axiom_set_theme_names_for_updater');
	}
}


// Add/Remove theme nav menus
if ( !function_exists( 'axiom_add_theme_menus' ) ) {
	//add_filter( 'axiom_action_add_theme_menus', 'axiom_add_theme_menus' );
	function axiom_add_theme_menus($menus) {

		//For example:
		//$menus['menu_footer'] = __('Footer Menu', 'axiom');
		//if (isset($menus['menu_panel'])) unset($menus['menu_panel']);

		if (isset($menus['menu_side'])) unset($menus['menu_side']);
		return $menus;
	}
}


// Add theme specific widgetized areas
if ( !function_exists( 'axiom_add_theme_sidebars' ) ) {
	//add_filter( 'axiom_filter_add_theme_sidebars',	'axiom_add_theme_sidebars' );
	function axiom_add_theme_sidebars($sidebars=array()) {
		if (is_array($sidebars)) {
			$theme_sidebars = array(
				'sidebar_main'		=> __( 'Main Sidebar', 'axiom' ),
				'sidebar_footer'	=> __( 'Footer Sidebar', 'axiom' )
			);
			if (axiom_exists_woocommerce()) {
				$theme_sidebars['sidebar_cart']  = __( 'WooCommerce Cart Sidebar', 'axiom' );
			}
			$sidebars = array_merge($theme_sidebars, $sidebars);
		}
		return $sidebars;
	}
}

// Set theme name and folder (for the update notifier)
if ( !function_exists( 'axiom_set_theme_names_for_updater' ) ) {
	//add_filter('axiom_filter_update_notifier', 'axiom_set_theme_names_for_updater');
	function axiom_set_theme_names_for_updater($opt) {
		$opt['theme_name']   = 'Progress Party';
		$opt['theme_folder'] = 'default';
		return $opt;
	}
}



/* Include framework core files
------------------------------------------------------------------- */

require_once( get_template_directory().'/fw/loader.php' );


/*
 * Cuervo functions start here bruh!
 */

/*------------------------------------*\
	#CONSTANTS
\*------------------------------------*/

/**
* Define paths to javascript, styles, theme and site.
**/
define( 'JSPATH', get_template_directory_uri() . '/js/' );
define( 'THEMEPATH', get_template_directory_uri() . '/' );
define( 'SITEURL', site_url('/') );

/*------------------------------------*\
	#INCLUDES
\*------------------------------------*/

include( 'inc/cuztom/cuztom.php' );
require_once( 'inc/custom-post-types.php' );
require_once( 'inc/metaboxes.php' );
require_once( 'inc/functions-js-footer.php' );



/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

add_theme_support('post-thumbnails');

/**
* Enqueue frontend scripts and styles
**/
add_action( 'wp_enqueue_scripts', function(){

	// scripts
	wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

});

/**
* Add javascript to the footer of pages and admin.
**/
add_action( 'wp_footer', 'footer_scripts', 21 );

/**
* Make excerpt shorter
**/
function wp_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wp_excerpt_length', 999 );



/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

/**
 * Show filters
 * @param $taxonomy
*/
function show_filters( $taxonomy ){

	if( 'working-group' == $taxonomy){
		show_filters_working_groups();
		return;
	}

	$args = array(
	    'orderby'                => 'name',
	    'hide_empty'             => true,
	);
	$filters = get_terms( $taxonomy, $args );
	if( empty( $filters ) ) return;

	echo '<div class="option-set" data-group="' . $taxonomy . '">';
	echo '<input type="checkbox" value="" id="' . $taxonomy . '-all" class="all" checked /><label for="' . $taxonomy . '-all">all</label><br />';
	foreach ( $filters as $filter ) {
		echo '<input type="checkbox" value=".' . $filter->slug . '" id="' . $filter->slug . '" /><label for="' . $filter->slug . '">' . $filter->name . '</label><br />';
	}
	echo '</div>';
}

/**
 * Show filters
 * @param $taxonomy
*/
function show_filters_working_groups(){

	$args = array(
	    'orderby'                => 'name',
	    'hide_empty'             => true,
	);
	$filters = get_terms( 'working_group', $args );
	if( empty( $filters ) ) return;

	echo '<div class="[ button-group ]" data-filter-group="working_group">';

	echo '<a href="#" class="[ sc_button sc_button_size_medium ][ color-light ][ sc_button_bordered ]" data-filter="">All</a>';
	foreach ( $filters as $filter ) 
		echo '<a href="#" class="[ sc_button sc_button_size_medium ][ color-light ][ sc_button_bordered ]" data-filter=".' . $filter->slug . '">' . $filter->name . '</a>';

	echo '</div>';
}



/*------------------------------------*\
	#SET/GET FUNCTIONS
\*------------------------------------*/

/**
 * Get resource info for filters.
 * @param integer $post_id
 * @return mixed $resource_info
 */
function get_resource_info( $post_id ){

	$resource_info = array(
		'language'				=> get_resource_meta_slug( $post_id, 'language' ),
		'country'				=> get_resource_meta_slug( $post_id, 'country' ),
		'sector'				=> get_resource_meta_slug( $post_id, 'sector' ),
		'working_group'			=> get_resource_meta_slug( $post_id, 'working_group' ),
		);
	return $resource_info;
}// get_resource_info

/**
 * Get region slug for a given result.
 * @param integer $post_id
 * @param string $taxonomy
 * @return string $slug
 */
function get_resource_meta_slug( $post_id, $taxonomy ){
	$term = wp_get_post_terms( $post_id, $taxonomy );
	$slug = empty( $term ) ? '' : $term[0]->slug;
	return $slug;
}// get_resource_meta_slug

/**
 * Get Working Group of given Resource
 * @param integer $post_id
 * @return string $working_group
 */
function get_working_group( $post_id ){

	$terms = wp_get_post_terms( $post_id, 'working_group' );

	if( empty( $terms ) ) return '';

	return $terms[0]->name;

}// get_working_group

/**
 * Get Sector of given Resource
 * @param integer $post_id
 * @return string $sector
 */
function get_sector( $post_id ){

	$terms = wp_get_post_terms( $post_id, 'sector' );

	if( empty( $terms ) ) return '';

	return $terms[0]->name;

}// get_sector

/**
 * Get Country of given Resource
 * @param integer $post_id
 * @return string $country
 */
function get_country( $post_id ){

	$terms = wp_get_post_terms( $post_id, 'country' );

	if( empty( $terms ) ) return '';

	return $terms[0]->name;

}// get_country

/**
 * Get Language of given Resource
 * @param integer $post_id
 * @return string $language
 */
function get_language( $post_id ){

	$terms = wp_get_post_terms( $post_id, 'language' );

	if( empty( $terms ) ) return '';

	return $terms[0]->name;

}// get_language

/**
 * Get Language of given Resource
 * @param integer $post_id
 * @return string $res_type
 */
function get_res_type( $post_id ){

	$terms = wp_get_post_terms( $post_id, 'resource_type' );

	if( empty( $terms ) ) return '';

	return $terms[0]->name;

}// get_res_type

