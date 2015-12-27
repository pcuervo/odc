<?php

/*------------------------------------*\
	CUSTOM POST TYPES
\*------------------------------------*/

add_action('add_meta_boxes', function(){
	global $post;

	switch ( $post->post_type ) {
		case 'resource':
			add_meta_box( 'open_contribution', 'Open for contribution', 'metabox_open_contribution', 'resource', 'side', 'high' );
		default:
			
	}
});

/**
* Display metabox in page or post type
* @param obj $post
**/
function metabox_open_contribution( $post ){

	$open_contribution = get_post_meta($post->ID, '_open_contribution_meta', true);

	wp_nonce_field(__FILE__, '_open_contribution_meta_nonce');
	
	$checked = $open_contribution == 'yes' ? 'checked' : '';
	echo "<input type='checkbox' class='[ widefat ]' name='_open_contribution_meta' value='yes' $checked />";
	echo "<label> yes</label>";

}// metabox_open_contribution


/*
 * Save metaboxes data
 */

add_action('save_post', function( $post_id ){

	if ( isset($_POST['_open_contribution_meta']) and check_admin_referer( __FILE__, '_open_contribution_meta_nonce') ){
		update_post_meta($post_id, '_open_contribution_meta', $_POST['_open_contribution_meta']);
	} else {
		update_post_meta($post_id, '_open_contribution_meta', 'no');
	}

});
