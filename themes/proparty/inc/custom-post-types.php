<?php

/*------------------------------------*\
	CUSTOM POST TYPES
\*------------------------------------*/

add_action('init', function(){

	// RESOURCES
	$resource_pt = register_cuztom_post_type( 'Resource' );
	// Add taxonomies
	$resource_pt->add_taxonomy( 'Language' );
	insert_language_taxonomy_terms();
	$resource_pt->add_taxonomy( 'Sector' );
	//insert_resource_type_taxonomy_terms();
	$resource_pt->add_taxonomy( 'Country' );	
	insert_country_taxonomy_terms();
	$resource_pt->add_taxonomy( 'Resource Type' );	
	insert_resource_type_taxonomy_terms();
	$resource_pt->add_taxonomy( 'Working Group' );	
	insert_working_group_taxonomy_terms();

});

/*
 * Insert region taxonomy terms
 */
function insert_language_taxonomy_terms(){
	$languages = array( 'English', 'Español' );
	foreach ( $languages as $language ) {
		$term = term_exists( $language, 'language' );
		if ( FALSE !== $term && NULL !== $term ) continue;

		wp_insert_term( $language, 'language' );
	}
}// insert_language_taxonomy_terms

/*
 * Insert region taxonomy terms
 */
function insert_implementing_partner_taxonomy_terms(){
	// $regions = array( 'Global Initiatives', 'Africa', 'Asia', 'Eastern Europe & Central Asia', 'Caribbean', 'Latin America' );
	// foreach ( $regions as $region ) {
	// 	$term = term_exists( $region, 'region' );
	// 	if ( FALSE !== $term && NULL !== $term ) continue;

	// 	wp_insert_term( $region, 'region' );
	// }
}// insert_implementing_partner_taxonomy_terms

/*
 * Insert region taxonomy terms
 */
function insert_country_taxonomy_terms(){
	$country = array( 'Mexico', 'Canada', 'USA' );
	foreach ( $country as $area ) {
		$term = term_exists( $area, 'country' );
		if ( FALSE !== $term && NULL !== $term ) continue;

		wp_insert_term( $area, 'country' );
	}
}// insert_country_taxonomy_terms

/*
 * Insert sector taxonomy terms
 */
function insert_resource_type_taxonomy_terms(){
	$resource_types = array( 'Datasets', 'Platforms' );
	foreach ( $resource_types as $resource_type ) {
		$term = term_exists( $resource_type, 'resource_type' );
		if ( FALSE !== $term && NULL !== $term ) continue;

		wp_insert_term( $resource_type, 'resource_type' );
	}
}// insert_resource_type_taxonomy_terms

/*
 * Insert sector taxonomy terms
 */
function insert_working_group_taxonomy_terms(){
	$groups = array( 'Implementation', 'Technical', 'Subnational Governments', 'Private Sector', 'Accountability', 'Incentive Mechanisms' );
	foreach ( $groups as $group ) {
		$term = term_exists( $group, 'working_group' );
		if ( FALSE !== $term && NULL !== $term ) continue;

		wp_insert_term( $group, 'working_group' );
	}
}// insert_working_group_taxonomy_terms







