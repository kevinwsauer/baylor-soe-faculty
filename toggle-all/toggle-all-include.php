<?php
// Toggle all activity types on front page 
function soe_faculty_toggle_all() {
	if (!is_admin()) {
		// Register the script
		wp_register_script( 'toggle_all', get_template_directory_uri() . '/toggle-all/js/toggle-all.js' );
		
		// Enqueued script with localized data.
		wp_enqueue_script( 'toggle_all' );
	}
}

add_action('init', 'soe_faculty_toggle_all');
?>