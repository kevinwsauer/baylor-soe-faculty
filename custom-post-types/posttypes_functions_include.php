<?php
// Function to display custom post types in blog roll
function display_custom_post_type( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ($query->is_home() || $query->is_archive() ||$query->is_search() ) {
        	$query->set( 
				'post_type', array( 
					'post',
					'research',
					'expertise',
					'publications',
					'presentations',   
					'awards',
					'grants',
					'leadership' ));
			$query->set(
				'meta_key', 'faculty_featured_response');
			$query->set(
				'orderby', array(
					'faculty_featured_response' => 'DESC',
					'date' => 'DESC'));
        }
    }
}

add_action( 'pre_get_posts', 'display_custom_post_type' );

// Function to add custom post types to category, tags, author, day, month, year taxonomies
function add_custom_types_to_tax( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if( is_category() || is_tag() || is_author() || is_day() || is_month() || is_year() && empty( $query->query_vars['suppress_filters'] ) ) {
			$query->set( 
				'post_type', array( 
					'post',
					'research',
					'expertise',
					'publications',
					'presentations',   
					'awards',
					'grants',
					'leadership' ));
			$query->set(
				'meta_key', 'faculty_featured_response');
			$query->set(
				'orderby', array(
					'faculty_featured_response' => 'DESC',
					'date' => 'DESC'));
		}
	}
}

add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

// Function to add custom post types to RSS feed
function myfeed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array( 
			'post',
			'research',
			'expertise',
			'publications', 
			'presentations',  
			'awards',
			'grants',
			'leadership' );
	return $qv;
}

add_filter('request', 'myfeed_request');

// Function adds research interest category by default.
function add_research_category_automatically($post_ID) {
	global $wpdb;
	
	$cat = 'Research Interests';
	wp_set_object_terms($post_ID, $cat, 'category', true);

}

add_action('publish_research', 'add_research_category_automatically');

// Function adds expertise category by default.
function add_expertise_category_automatically($post_ID) {
	global $wpdb;
	
	$cat = 'Expertise';
	wp_set_object_terms($post_ID, $cat, 'category', true);

}

add_action('publish_expertise', 'add_expertise_category_automatically');

// Function adds publications category by default.
function add_publications_category_automatically($post_ID) {
	global $wpdb;
	
	$cat = 'Publications';
	wp_set_object_terms($post_ID, $cat, 'category', true);

}

add_action('publish_publications', 'add_publications_category_automatically');

// Function adds presentations category by default.
function add_presentations_category_automatically($post_ID) {
	global $wpdb;
	
	$cat = 'Presentations';
	wp_set_object_terms($post_ID, $cat, 'category', true);
	
}

add_action('publish_presentations', 'add_presentations_category_automatically');

// Function adds awards category by default.
function add_awards_category_automatically($post_ID) {
	global $wpdb;
	
	$cat = 'Awards';
	wp_set_object_terms($post_ID, $cat, 'category', true);
	
}

add_action('publish_awards', 'add_awards_category_automatically');

// Function adds grants category by default.
function add_grants_category_automatically($post_ID) {
	global $wpdb;
	
	$cat = 'Grants';
	wp_set_object_terms($post_ID, $cat, 'category', true);

}

add_action('publish_grants', 'add_grants_category_automatically');

// Function adds proessional leadership category by default.
function add_leadership_category_automatically($post_ID) {
	global $wpdb;
	
	$cat = 'Professional Leadership';
	wp_set_object_terms($post_ID, $cat, 'category', true);
		
}

add_action('publish_leadership', 'add_leadership_category_automatically');

?>