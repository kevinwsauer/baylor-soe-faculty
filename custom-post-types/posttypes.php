<?php 
function my_custom_posttypes() {
    
	// Profile post type
	$labels = array(
        'name'               => 'Profiles',
        'singular_name'      => 'Profile',
        'menu_name'          => 'Profiles',
        'name_admin_bar'     => 'Profile',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Profile',
        'new_item'           => 'New Profile',
        'edit_item'          => 'Edit Profile',
        'view_item'          => 'View Profile',
        'all_items'          => 'All Profiles',
        'search_items'       => 'Search Profiles',
        'parent_item_colon'  => 'Parent Profiles:',
        'not_found'          => 'No profiles found.',
        'not_found_in_trash' => 'No profiles found in Trash.'
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-businessman',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'profiles' ),
        'capability_type'    => 'page',
        'has_archive'        => false,
        'hierarchical'       => true,
        'supports'           => array( 'title', 'author', 'thumbnail' )
    );
    register_post_type( 'profiles', $args );
	
	// Degrees post type
	$labels = array(
        'name'               => 'Degrees',
        'singular_name'      => 'Degree',
        'menu_name'          => 'Degrees',
        'name_admin_bar'     => 'Degree',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Degree',
        'new_item'           => 'New Degree',
        'edit_item'          => 'Edit Degree',
        'view_item'          => 'View Degree',
        'all_items'          => 'All Degrees',
        'search_items'       => 'Search Degrees',
        'parent_item_colon'  => 'Parent Degrees:',
        'not_found'          => 'No degrees found.',
        'not_found_in_trash' => 'No degrees found in Trash.'
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'degrees' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array( 'title', 'author' )
    );
    register_post_type( 'degrees', $args );
	
	// Certifications post type
	$labels = array(
        'name'               => 'Certifications',
        'singular_name'      => 'Certification',
        'menu_name'          => 'Certifications',
        'name_admin_bar'     => 'Certification',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Certifcation',
        'new_item'           => 'New Certification',
        'edit_item'          => 'Edit Certification',
        'view_item'          => 'View Certification',
        'all_items'          => 'All Certifications',
        'search_items'       => 'Search Certifications',
        'parent_item_colon'  => 'Parent Certifications:',
        'not_found'          => 'No certifications found.',
        'not_found_in_trash' => 'No certifications found in Trash.'
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-star-filled',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'certifications' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array( 'title', 'author' )
    );
    register_post_type( 'certifications', $args );
	
	// Research Interests post type
	$labels = array(
        'name'               => 'Research Interests',
        'singular_name'      => 'Research Interest',
        'menu_name'          => 'Research Interests',
        'name_admin_bar'     => 'Research Interest',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Research Interest',
        'new_item'           => 'New Research Interest',
        'edit_item'          => 'Edit Research Interest',
        'view_item'          => 'View Research Interest',
        'all_items'          => 'All Research Interests',
        'search_items'       => 'Search Research Interests',
        'parent_item_colon'  => 'Parent Research Interest:',
        'not_found'          => 'No research interests found.',
        'not_found_in_trash' => 'No research interests found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-chart-bar',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'research-interests' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'editor', 'author', 'thumbnail' ),
		'taxonomies'           => array( 'category', 'post_tag' )
    );
    register_post_type( 'research', $args );
	
	// Expertise post type
	$labels = array(
        'name'               => 'Expertise',
        'singular_name'      => 'Expertise',
        'menu_name'          => 'Expertise',
        'name_admin_bar'     => 'Expertise',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Expertise',
        'new_item'           => 'New Expertise',
        'edit_item'          => 'Edit Expertise',
        'view_item'          => 'View Expertise',
        'all_items'          => 'All Expertise',
        'search_items'       => 'Search Expertise',
        'parent_item_colon'  => 'Parent Expertise:',
        'not_found'          => 'No expertise posts found.',
        'not_found_in_trash' => 'No expertise posts found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-lightbulb',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'expertise' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'author', 'thumbnail' ),
		'taxonomies'           => array( 'category' )
    );
    register_post_type( 'expertise', $args );
	
	// Publications post type
	$labels = array(
        'name'               => 'Select Publications',
        'singular_name'      => 'Select Publication',
        'menu_name'          => 'Select Publications',
        'name_admin_bar'     => 'Select Publication',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Select Publication',
        'new_item'           => 'New Select Publication',
        'edit_item'          => 'Edit Select Publication',
        'view_item'          => 'View Select Publication',
        'all_items'          => 'All Select Publications',
        'search_items'       => 'Search Select Publications',
        'parent_item_colon'  => 'Parent Select Publications:',
        'not_found'          => 'No select publications found.',
        'not_found_in_trash' => 'No select publications found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-book-alt',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'publications' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'author', 'thumbnail' ),
		'taxonomies'           => array( 'category', 'post_tag' ),
    );
    register_post_type( 'publications', $args );
	
	// Presentations post type
	$labels = array(
        'name'               => 'Select Presentations',
        'singular_name'      => 'Select Presentation',
        'menu_name'          => 'Select Presentations',
        'name_admin_bar'     => 'Select Presentation',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Select Presentation',
        'new_item'           => 'New Select Presentation',
        'edit_item'          => 'Edit Select Presentation',
        'view_item'          => 'View Select Presentation',
        'all_items'          => 'All Select Presentations',
        'search_items'       => 'Search Select Presentations',
        'parent_item_colon'  => 'Parent Select Presentations:',
        'not_found'          => 'No select presentations found.',
        'not_found_in_trash' => 'No select presentations found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-video-alt2',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'presentations' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'author', 'thumbnail' ),
		'taxonomies'           => array( 'category', 'post_tag' ),
    );
    register_post_type( 'presentations', $args );
	
	// Awards post type
	$labels = array(
        'name'               => 'Awards',
        'singular_name'      => 'Award',
        'menu_name'          => 'Awards',
        'name_admin_bar'     => 'Award',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Award',
        'new_item'           => 'New Award',
        'edit_item'          => 'Edit Award',
        'view_item'          => 'View Award',
        'all_items'          => 'All Awards',
        'search_items'       => 'Search Awards',
        'parent_item_colon'  => 'Parent Awards:',
        'not_found'          => 'No awards found.',
        'not_found_in_trash' => 'No awards found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-awards',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'awards' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'author', 'thumbnail' ),
		'taxonomies'           => array( 'category', 'post_tag' ),
    );
    register_post_type( 'awards', $args );
	
	// Grants post type
	$labels = array(
        'name'               => 'Grants',
        'singular_name'      => 'Grant',
        'menu_name'          => 'Grants',
        'name_admin_bar'     => 'Grant',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Grant',
        'new_item'           => 'New Grant',
        'edit_item'          => 'Edit Grant',
        'view_item'          => 'View Grant',
        'all_items'          => 'All Grants',
        'search_items'       => 'Search Grants',
        'parent_item_colon'  => 'Parent Grants:',
        'not_found'          => 'No grants found.',
        'not_found_in_trash' => 'No grants found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-plus',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'grants' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'author', 'thumbnail' ),
		'taxonomies'           => array( 'category', 'post_tag' ),
    );
    register_post_type( 'grants', $args );
	
	// Professional Leadership post type
	$labels = array(
        'name'               => 'Professional Leadership',
        'singular_name'      => 'Professional Leadership',
        'menu_name'          => 'Professional Leadership',
        'name_admin_bar'     => 'Professional Leadership',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Professional Leadership',
        'new_item'           => 'New Professional Leadership',
        'edit_item'          => 'Edit Professional Leadership',
        'view_item'          => 'View Professional Leadership',
        'all_items'          => 'All Professional Leadership',
        'search_items'       => 'Search Professional Leadership',
        'parent_item_colon'  => 'Parent Professional Leadership:',
        'not_found'          => 'No professional leadership found.',
        'not_found_in_trash' => 'No professional leadership found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-groups',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'professional-leadership' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'author', 'thumbnail' ),
		'taxonomies'           => array( 'category', 'post_tag' )
    );
    register_post_type( 'leadership', $args );
	
	// Affiliations post type
	$labels = array(
        'name'               => 'Affiliations',
        'singular_name'      => 'Affiliation',
        'menu_name'          => 'Affiliations',
        'name_admin_bar'     => 'Affiliation',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Affiliation',
        'new_item'           => 'New Affiliation',
        'edit_item'          => 'Edit Affiliation',
        'view_item'          => 'View Affiliation',
        'all_items'          => 'All Affiliations',
        'search_items'       => 'Search Affiliations',
        'parent_item_colon'  => 'Parent Affiliations:',
        'not_found'          => 'No affiliations found.',
        'not_found_in_trash' => 'No affiliations found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-networking',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'affiliations' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'author', 'thumbnail' )
    );
    register_post_type( 'affiliations', $args );
	
	// Teaching Philosophies post type
	$labels = array(
        'name'               => 'Teaching Philosophies',
        'singular_name'      => 'Teaching Philosophy',
        'menu_name'          => 'Teaching Philosophies',
        'name_admin_bar'     => 'Teaching Philosophy',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Teaching Philosophy',
        'new_item'           => 'New Teaching Philosophy',
        'edit_item'          => 'Edit Teaching Philosophy',
        'view_item'          => 'View Teaching Philosophy',
        'all_items'          => 'All Teaching Philosophies',
        'search_items'       => 'Search Teaching Philosophies',
        'parent_item_colon'  => 'Parent Teaching Philosophies:',
        'not_found'          => 'No teaching philosophies found.',
        'not_found_in_trash' => 'No teaching philosophies found in Trash.'
    );
    
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_icon'            => 'dashicons-admin-generic',
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'teaching-philosophies' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'supports'             => array( 'title', 'author', 'thumbnail' )
    );
    register_post_type( 'philosophy', $args );
	
	// Courses post type
	$labels = array(
        'name'               => 'Courses',
        'singular_name'      => 'Course',
        'menu_name'          => 'Courses',
        'name_admin_bar'     => 'Course',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Course',
        'new_item'           => 'New Course',
        'edit_item'          => 'Edit Course',
        'view_item'          => 'View Course',
        'all_items'          => 'All Courses',
        'search_items'       => 'Search Courses',
        'parent_item_colon'  => 'Parent Courses:',
        'not_found'          => 'No courses found.',
        'not_found_in_trash' => 'No courses found in Trash.'
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-format-aside',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'courses' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array( 'title', 'author' )
    );
    register_post_type( 'courses', $args );
}
add_action( 'init', 'my_custom_posttypes' );

// Adds Custom Post Types Sub Menus
function soe_faculty_custom_posttype_submenus() {
	
	if ( is_admin() ) { 
		
		// Research Interests
		add_submenu_page( 
			'edit.php?post_type=research', 
			'Settings', 
			'Settings', 
			'manage_options', 
			'soe_faculty_research_interests_settings', 
			'soe_faculty_research_interests_settings' 
		);
		
		// Expertise
		add_submenu_page( 
			'edit.php?post_type=expertise', 
			'Settings', 
			'Settings', 
			'manage_options', 
			'soe_faculty_expertise_settings', 
			'soe_faculty_expertise_settings' 
		);
		
		// Select Publications
		add_submenu_page( 
			'edit.php?post_type=publications', 
			'Settings', 
			'Settings', 
			'manage_options', 
			'soe_faculty_publications_settings', 
			'soe_faculty_publications_settings' 
		);
		
		// Select Presentations
		add_submenu_page( 
			'edit.php?post_type=presentations', 
			'Settings', 
			'Settings', 
			'manage_options', 
			'soe_faculty_presentations_settings', 
			'soe_faculty_presentations_settings' 
		);
		
		// Awards
		add_submenu_page( 
			'edit.php?post_type=awards', 
			'Settings', 
			'Settings', 
			'manage_options', 
			'soe_faculty_awards_settings', 
			'soe_faculty_awards_settings' 
		);
		
		// Grants
		add_submenu_page( 
			'edit.php?post_type=grants', 
			'Settings', 
			'Settings', 
			'manage_options', 
			'soe_faculty_grants_settings', 
			'soe_faculty_grants_settings' 
		);
		
		// Professional Leadership
		add_submenu_page( 
			'edit.php?post_type=leadership', 
			'Settings', 
			'Settings', 
			'manage_options', 
			'soe_faculty_professional_leadership_settings', 
			'soe_faculty_professional_leadership_settings' 
		);
		
		add_action( 'admin_init', 'soe_faculty_custom_posttype_register_settings' );	
	}
	
}

add_action( 'admin_menu', 'soe_faculty_custom_posttype_submenus' );

// Register settings
function soe_faculty_custom_posttype_register_settings() { // whitelist options

  register_setting( 'soe_faculty_research_interests_options_group', 'num_posts_research_interests' );	
  
  register_setting( 'soe_faculty_expertise_options_group', 'num_posts_expertise' );

  register_setting( 'soe_faculty_publications_options_group', 'num_posts_publications' );
  
  register_setting( 'soe_faculty_presentations_options_group', 'num_posts_presentations' );
  
  register_setting( 'soe_faculty_awards_options_group', 'num_posts_awards' ); 
  
  register_setting( 'soe_faculty_grants_options_group', 'num_posts_grants' );
  
  register_setting( 'soe_faculty_professional_leadership_options_group', 'num_posts_professional_leadership' );

}

// Options Form 
function soe_faculty_custom_posttype_options($posttype, $options_group , $num_posts_posttype) {
	
	// Checks user permissions
	if ( !current_user_can( 'manage_options' ) )  {
	
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	
	}	

?>		
	
    <div class="wrap">
	
    <h2><?php echo $posttype; ?> - Settings</h2>
    
    <?php settings_errors(); ?>
	
    <form method="post" action="options.php">
    
	<?php settings_fields( $options_group ); ?>
    
	<?php do_settings_sections( $options_group ); ?>
    
    <?php $default = 5; ?>
    
    <table class="form-table">
    
    	<tr valign="top">
    
        <th scope="row"># of <? echo $posttype; ?>:</th>
    
        <td><input type="number" name="<?php echo $num_posts_posttype; ?>" value="<?php echo esc_attr( get_option( $num_posts_posttype, $default ) ); ?>" /></td>
    
        </tr>
    
    </table>
    
    <?php submit_button(); ?>


</form>

</div>

<?php

}

// Research Interests
function soe_faculty_research_interests_settings() {
	
	soe_faculty_custom_posttype_options('Research Interests', 'soe_faculty_research_interests_options_group', 'num_posts_research_interests');
		
}

// Expertise
function soe_faculty_expertise_settings() {
	
	soe_faculty_custom_posttype_options('Expertise', 'soe_faculty_expertise_options_group', 'num_posts_expertise');
		
}

// Select Publications
function soe_faculty_publications_settings() {
	
	soe_faculty_custom_posttype_options('Select Publications', 'soe_faculty_publications_options_group', 'num_posts_publications');
		
}

// Select Presentations
function soe_faculty_presentations_settings() {
	
	soe_faculty_custom_posttype_options('Select Presentations', 'soe_faculty_presentations_options_group', 'num_posts_presentations');
		
}

// Awards
function soe_faculty_awards_settings() {
	
	soe_faculty_custom_posttype_options('Awards', 'soe_faculty_awards_options_group', 'num_posts_awards');
		
}

// Grants
function soe_faculty_grants_settings() {
	
	soe_faculty_custom_posttype_options('Grants', 'soe_faculty_grants_options_group', 'num_posts_grants');
		
}

// Professional Leadership
function soe_faculty_professional_leadership_settings() {
	
	soe_faculty_custom_posttype_options('Professional Leadership', 'soe_faculty_professional_leadership_options_group', 'num_posts_professional_leadership');
		
}
 ?>