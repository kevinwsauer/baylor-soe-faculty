<?php
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_init', 'soe_faculty_metaboxes' );

/**
 * Hook in and add the soe_faculty_metaboxes. Can only happen on the 'cmb2_init' hook.
 */
function soe_faculty_metaboxes( ) {	
	
	// Faculty Profile Metabox
	$soe_faculty_profile_box = new_cmb2_box( array(
		'id' => 'faculty_profile_box',
		'title' => __('Faculty Profile Instructions', 'cmb2' ),
		'object_types' => array('profiles'), // post type
		'context' => 'side',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$soe_faculty_profile_box->add_field( array (
		'id' => 'faculty_profile_title',
		'name' => __('Faculty Profile Title', 'cmb2'),
		'desc' => __('Please enter your name in the TITLE field. The title entered in the field will be used to identify the profile in administrative menus. The title will NOT be displayed.', 'cmb2'),
		'type' => 'title',
	) );	
	$soe_faculty_profile_box->add_field( array (
		'id' => 'faculty_profile_information',
		'name' => __('Faculty Profile Information', 'cmb2'),
		'desc' => __('Please enter the following fields regarding your profile information. The information will display on your profile page. OPTIONAL FIELDS: middle name, title, room number, position(s), phone number, fax number, and website(s).', 'cmb2'),
		'type' => 'title',
	) );	
	$soe_faculty_profile_box2 = new_cmb2_box( array(
		'id' => 'faculty_profile_box2',
		'title' => __('Faculty Profile Information', 'cmb2' ),
		'object_types' => array('profiles'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter your first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('First Name', 'cmb2'),
			'required'    => 'required',
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter your middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name (Optional)', 'cmb2'),
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter your last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
			'required'    => 'required',
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'title',
		'name' => __('Title', 'cmb2'),
		'desc' => __('Enter your title. Ex. Ph.D., etc.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Title', 'cmb2'),
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'department',
		'name' => __('Department', 'cmb2'),
		'desc' => __('Select your department name.', 'cmb2'),
		'type' => 'radio', 
		'options' => array(
			'Curriculum and Instruction' => __( 'Curriculum & Instruction', 'cmb2' ),
			'Educational Administration' => __( 'Educational Administration', 'cmb2' ),
			'Educational Psychology' => __( 'Educational Psychology', 'cmb2' ),
			'' => __( 'N/A' , 'cmb2' ),
		),
		'default' => '',
		'attributes'  => array(
			'required'    => 'required',
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'room_number',
		'name' => __('Room Number', 'cmb2'),
		'desc' => __('Enter your office room number.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Room Number', 'cmb2'),
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'positions',
		'name' => __('Position(s)', 'cmb2'),
		'desc' => __('Enter the position(s) of the faculty member.', 'cmb2'),
		'type' => 'textarea_small',
		'attributes'  => array(
			'placeholder' => __('Position(s)', 'cmb2'),
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'email',
		'name' => __('Email Address', 'cmb2'),
		'desc' => __('Enter your email address.', 'cmb2'),
		'type' => 'text_email',
		'attributes'  => array(
			'placeholder' => __('Email Address', 'cmb2'),
			'required'    => 'required',
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'phone_number',
		'name' => __('Phone Number', 'cmb2'),
		'desc' => __('Enter your phone number.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Phone Number', 'cmb2'),
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'fax_number',
		'name' => __('Fax Number', 'cmb2'),
		'desc' => __('Enter your fax number.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Fax Number', 'cmb2'),
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'website',
		'name' => __('Additional Website(s)', 'cmb2'),
		'desc' => __('Enter any additional website addresses.', 'cmb2'),
		'type' => 'text_url',
		'protocols' => array( 'http', 'https' ),
		'attributes'  => array(
			'placeholder' => __('Website URL', 'cmb2'),
		),
		'repeatable' => true,
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'faculty_bio_information',
		'name' => __('Faculty Bio Information', 'cmb2'),
		'desc' => __('OPTIONAL: Please enter any information about yourself that you want to appear on your profile page\'s bio section.', 'cmb2'),
		'type' => 'title',
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'about_me',
		'name' => __('Bio', 'cmb2'),
		'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true, // use wpautop?
		),
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'faculty_curriculum_vitae_information',
		'name' => __('Faculty Curriculum Vitae Information', 'cmb2'),
		'desc' => __('OPTIONAL: Please upload your most current curriculum vitae. The attachment will display on your profile page.', 'cmb2'),
		'type' => 'title',
	) );	
	$soe_faculty_profile_box2->add_field( array (
		'id' => 'curriculum_vitae',
		'name' => __('Curriculum Vitae', 'cmb2'),
		'desc' => __('Please upload .pdf files only.', 'cmb2'),
		'type' => 'file',
		'allow' => array( 'attachment' ) // limit to just attachments with array( 'attachment' )
	) );		

	// Faculty Degree Metabox
	$soe_faculty_degree_box = new_cmb2_box( array(
		'id' => 'faculty_degree_box',
		'title' => __('Faculty Degree Instructions', 'cmb2' ),
		'object_types' => array('degrees'), // post type
		'context' => 'side',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$soe_faculty_degree_box->add_field( array (
		'id' => 'faculty_degree_title',
		'name' => __('Faculty Degree Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the degree earned in the TITLE field. The title entered in the field will be used to identify the degree in administrative menus. The title will NOT be displayed.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_degree_box->add_field( array (
		'id' => 'faculty_degree_information',
		'name' => __('Faculty Degree Information', 'cmb2'),
		'desc' => __('Please enter the following fields regarding your individual degree information including the degree earned, year, institution, city, and state in the fields BELOW. The information entered in the fields BELOW will appear on your profile page. OPTIONAL FIELDS: city, and state.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_degree_box2 = new_cmb2_box( array(
		'id' => 'faculty_degree_box2',
		'title' => __('Faculty Degree Information', 'cmb2' ),
		'object_types' => array('degrees'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$soe_faculty_degree_box2->add_field( array (
		'id' => 'degree',
		'name' => __('Degree', 'cmb2'),
		'desc' => __('Enter a degree earned.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Degree Earned', 'cmb2'),
			'required'    => 'required',
		),
	) );
	$soe_faculty_degree_box2->add_field( array (
		'id' => 'year',
		'name' => __('Year', 'cmb2'),
		'desc' => __('Enter the year the degree was earned.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Year Earned', 'cmb2'),
			'required'    => 'required',
		),
	) );
	$soe_faculty_degree_box2->add_field( array (
		'id' => 'institution',
		'name' => __('Institution', 'cmb2'),
		'desc' => __('Enter the name of the institution.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Institution Name', 'cmb2'),
			'required'    => 'required',
		),
	) );
	$soe_faculty_degree_box2->add_field( array (
		'id' => 'city',
		'name' => __('City', 'cmb2'),
		'desc' => __('Enter the city the institution is located.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('City', 'cmb2'),
		),
	) );
	$soe_faculty_degree_box2->add_field( array (
		'id' => 'state',
		'name' => __('State', 'cmb2'),
		'desc' => __('Enter the state the institution is located.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('State', 'cmb2'),
		),
	) );
	
	// Faculty Certification Metabox
	$soe_faculty_certification_box = new_cmb2_box( array(
		'id' => 'faculty_certification_box',
		'title' => __('Faculty Certification Instructions', 'cmb2' ),
		'object_types' => array('certifications'), // post type
		'context' => 'side',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$soe_faculty_certification_box->add_field( array (
		'id' => 'faculty_certification_title',
		'name' => __('Faculty Certification Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the certification earned in the TITLE field. The title entered in the field will be used to identify the certification in administrative menus, and will be displayed on the profile page.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_certification_box->add_field( array (
		'id' => 'faculty_certification_information',
		'name' => __('Faculty Certification Information', 'cmb2'),
		'desc' => __('Please enter the following fields regarding your individual certification information including the certification earned and year in the fields BELOW. The information entered in the fields BELOW will appear on your profile page. OPTIONAL FIELDS: year.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_certification_box2 = new_cmb2_box( array(
		'id' => 'faculty_certification_box2',
		'title' => __('Faculty Certification Information', 'cmb2' ),
		'object_types' => array('certifications'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$soe_faculty_certification_box2->add_field( array (
		'id' => 'certification',
		'name' => __('Certification', 'cmb2'),
		'desc' => __('Enter a certification earned.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Certification Earned', 'cmb2'),
			'required'    => 'required',
		),
	) );
	$soe_faculty_certification_box2->add_field( array (
		'id' => 'year',
		'name' => __('Year', 'cmb2'),
		'desc' => __('Enter the year the certification was earned.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Year Earned', 'cmb2')
		),
	) );
	
	// Faculty Research Interest Metabox
	$soe_faculty_research_interest_box = new_cmb2_box( array(
		'id' => 'faculty_research_interest_box',
		'title' => __('Faculty Research Interest Instructions', 'cmb2' ),
		'object_types' => array('research'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );
	$soe_faculty_research_interest_box->add_field( array (
		'id' => 'faculty_research_interest_title',
		'name' => __('Faculty Research Interest Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the research interest in the TITLE field. The title entered in the field will be used to identify the research interests in administrative menus, and will be displayed on the profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_research_interest_box->add_field( array (
		'id' => 'faculty_research_interest_information',
		'name' => __('Faculty Research Interest Information', 'cmb2'),
		'desc' => __('Please enter any information about the research interest in the EDITOR. The information entered in the field will appear on your profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );

	// Faculty Expertise Metabox
	$soe_faculty_expertise_box = new_cmb2_box( array(
		'id' => 'faculty_expertise_box',
		'title' => __('Faculty Expertise Instructions', 'cmb2' ),
		'object_types' => array('expertise'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );
	$soe_faculty_expertise_box->add_field( array ( 
		'id' => 'faculty_expertise_title',
		'name' => __('Faculty Expertise Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the expertise in the TITLE field. The title entered in the field will be used to identify the expertise in administrative menus.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_expertise_box->add_field( array ( 
		'id' => 'faculty_expertise_information',
		'name' => __('Faculty Expertise Information', 'cmb2'),
		'desc' => __('Please select the expertise from the list. The information selected will appear on your profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_expertise_box2 = new_cmb2_box( array(
		'id' => 'faculty_expertise_box2',
		'title' => __('Faculty Expertise Information', 'cmb2' ),
		'object_types' => array('expertise'), // post type
		'context' => 'normal',
		'priority' => 'high',
	) );
	$soe_faculty_expertise_box2->add_field( array(
		'id'               => 'expertise',
		'name'             => 'Expertise',
		'desc'             => 'Select an expertise',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'None',
		'options'          => array(
			'Applied Behavior Analysis' => __( 'Applied Behavior Analysis', 'cmb2' ),
			'Assessment (Testing) in Education' => __( 'Assessment (Testing) in Education', 'cmb2' ),
			'At-Risk Learners' => __( 'At-Risk Learners', 'cmb2' ),
			'Autism Spectrum Disorders' => __( 'Autism Spectrum Disorders', 'cmb2' ),
			'Behavior Management' => __( 'Behavior Management', 'cmb2' ),
			'Child Development' => __( 'Child Development', 'cmb2' ),
			'Christian Education' => __( 'Christian Education', 'cmb2' ),
			'Church-State Issues in Education' => __( 'Church-State Issues in Education', 'cmb2' ),
			'Civics Education and Citizenship' => __( 'Civics Education and Citizenship', 'cmb2' ),
			'Cognitive Abilities' => __( 'Cognitive Abilities', 'cmb2' ),
			'Cognitive Learning Theory' => __( 'Cognitive Learning Theory', 'cmb2' ),
			'College Student Retention' => __( 'College Student Retention', 'cmb2' ),
			'Curriculum and Instruction' => __( 'Curriculum and Instruction', 'cmb2' ),
			'Curriculum Development' => __( 'Curriculum Development', 'cmb2' ),
			'Developmental Disabilities' => __( 'Developmental Disabilities', 'cmb2' ),
			'Differentiation in Education' => __( 'Differentiation in Education', 'cmb2' ),
			'Early Childhood Growth and Development' => __( 'Early Childhood Growth and Development', 'cmb2' ),
			'Early Literacy' => __( 'Early Literacy', 'cmb2' ),
			'Early Mathematics' => __( 'Early Mathematics', 'cmb2' ),
			'Education Law' => __( 'Education Law', 'cmb2' ),
			'Education Policy' => __( 'Education Policy', 'cmb2' ),
			'Educational Administration' => __( 'Educational Administration', 'cmb2' ),
			'Educational Facility Design' => __( 'Educational Facility Design', 'cmb2' ),
			'Educational Technology' => __( 'Educational Technology', 'cmb2' ),
			'Elementary Education' => __( 'Elementary Education', 'cmb2' ),
			'English Language Arts Education' => __( 'English Language Arts Education', 'cmb2' ),
			'Ethnographic Research' => __( 'Ethnographic Research', 'cmb2' ),
			'Faith and Moral Development' => __( 'Faith and Moral Development', 'cmb2' ),
			'Gifted and Talented Education' => __( 'Gifted and Talented Education', 'cmb2' ),
			'Graphic Novels' => __( 'Graphic Novels', 'cmb2' ),
			'High School-to-College Transition' => __( 'High School-to-College Transition', 'cmb2' ),
			'Higher Education Administration' => __( 'Higher Education Administration', 'cmb2' ),
			'Higher Education Administration (Student Affairs)' => __( 'Higher Education Administration (Student Affairs)', 'cmb2' ),
			'Higher Education Finance' => __( 'Higher Education Finance', 'cmb2' ),
			'Higher Education Governance' => __( 'Higher Education Governance', 'cmb2' ),
			'Higher Education Law' => __( 'Higher Education Law', 'cmb2' ),
			'Historically Black Colleges and Universities (HBCUs)' => __( 'Historically Black Colleges and Universities (HBCUs)', 'cmb2' ),
			'History of Education' => __( 'History of Education', 'cmb2' ),
			'Human Resource Management in Education' => __( 'Human Resource Management in Education', 'cmb2' ),
			'Informal Educational Settings' => __( 'Informal Educational Settings', 'cmb2' ),
			'Integration of Content Areas' => __( 'Integration of Content Areas', 'cmb2' ),
			'IQ Measurement and Intellectual Assessment' => __( 'IQ Measurement and Intellectual Assessment', 'cmb2' ),
			'K-12 Administration (Principal)' => __( 'K-12 Administration (Principal)', 'cmb2' ),
			'K-12 Administration (Superintendent)' => __( 'K-12 Administration (Superintendent)', 'cmb2' ),
			'Latent Variable Modeling' => __( 'Latent Variable Modeling', 'cmb2' ),
			'Leadership' => __( 'Leadership', 'cmb2' ),
			'Learning Disorders' => __( 'Learning Disorders', 'cmb2' ),
			'Literacy' => __( 'Literacy', 'cmb2' ),
			'Measurement of Human Cognitive Abilities' => __( 'Measurement of Human Cognitive Abilities', 'cmb2' ),
			'Media Literacy' => __( 'Media Literacy', 'cmb2' ),
			'Mentoring of Teachers' => __( 'Mentoring of Teachers', 'cmb2' ),
			'Middle Grades Education' => __( 'Middle Grades Education', 'cmb2' ),
			'Mathematics Education' => __( 'Mathematics Education', 'cmb2' ),
			'Montessori Education' => __( 'Montessori Education', 'cmb2' ),
			'Multicultural Issues in Education' => __( 'Multicultural Issues in Education', 'cmb2' ),
			'Online Gaming in Education' => __( 'Online Gaming in Education', 'cmb2' ),
			'Organizational Politics' => __( 'Organizational Politics', 'cmb2' ),
			'Other' => __( 'Other', 'cmb2' ),
			'Philosophy of Education' => __( 'Philosophy of Education', 'cmb2' ),
			'Psychological Assessment' => __( 'Psychological Assessment', 'cmb2' ),
			'Psychometrics' => __( 'Psychometrics', 'cmb2' ),
			'Puppetry in Education' => __( 'Puppetry in Education', 'cmb2' ),
			'Qualitative Research Methods' => __( 'Qualitative Research Methods', 'cmb2' ),
			'Reading' => __( 'Reading', 'cmb2' ),
			'Regression Models' => __( 'Regression Models', 'cmb2' ),
			'School Counseling' => __( 'School Counseling', 'cmb2' ),
			'School Psychology' => __( 'School Psychology', 'cmb2' ),
			'Science Education' => __( 'Science Education', 'cmb2' ),
			'Secondary Education' => __( 'Secondary Education', 'cmb2' ),
			'Social Studies Education' => __( 'Social Studies Education', 'cmb2' ),
			'Special Education' => __( 'Special Education', 'cmb2' ),
			'Sport Consumer Behaviors' => __( 'Sport Consumer Behaviors', 'cmb2' ),
			'Sport Management' => __( 'Sport Management', 'cmb2' ),
			'Structural Equation Modeling' => __( 'Structural Equation Modeling', 'cmb2' ),
			'Study and Memory Strategies' => __( 'Study and Memory Strategies', 'cmb2' ),
			'Teacher Education' => __( 'Teacher Education', 'cmb2' ),
			'Teaching Methodology' => __( 'Teaching Methodology', 'cmb2' ),
			'Temperament' => __( 'Temperament', 'cmb2' ),
			'Urban Education' => __( 'Urban Education', 'cmb2' ),
			'Veteran’s Education' => __( 'Veteran’s Education', 'cmb2' ),
			'Women in Education' => __( 'Women in Education', 'cmb2' ),
			'Young Adult Literature' => __( 'Young Adult Literature', 'cmb2' ),
			'Youth Sports' => __( 'Youth Sports', 'cmb2' )
		),
	) );
	$soe_faculty_expertise_box2->add_field( array (
		'id' => 'other_expertise',
		'name' => __('If "Other" selected', 'cmb2'),
		'desc' => __('If "Other" was selected please enter the name that best describes the other expertise.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Other Expertise', 'cmb2')
		),
	) );
	
		
	// Faculty Publication Metabox
	$soe_faculty_publication_box = new_cmb2_box( array(
		'id' => 'faculty_publication_box',
		'title' => __('Faculty Publication Instructions', 'cmb2' ),
		'object_types' => array('publications'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );	
	$soe_faculty_publication_box->add_field( array (
		'id' => 'faculty_publication_title',
		'name' => __('Faculty Publication Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the publication in the TITLE field. The title entered in the field will be used to identify the publication in administrative menus, and will be displayed on the profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );	
	$soe_faculty_publication_box->add_field( array (
		'id' => 'faculty_publication_information',
		'name' => __('Faculty Publication Information', 'cmb2'),
		'desc' => __('Please complete the following form before publishing the publication. The information entered in the form will appear on your profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );	
	$soe_faculty_publication_box2 = new_cmb2_box( array(
		'id' => 'faculty_publication_box2',
		'title' => __('Faculty Publication Information', 'cmb2' ),
		'object_types' => array('publications'), // post type
		'context' => 'normal',
		'priority' => 'high',
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'faculty_publication_professional_information',
		'name' => __('Professional Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'doctorate',
		'name' => __('Doctorate', 'cmb2'),
		'desc' => __('Do you have a doctorate?', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'Yes' => __('Yes', 'cmb2'),
			'No'  => __('No', 'cmb2'),
		),
		'default' => 'No',
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter your first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('First Name', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter your middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter your last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'baylor_title',
		'name' => __('Baylor Title', 'cmb2'),
		'desc' => __('Enter your Baylor title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Baylor Title', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'faculty_publication_co_author_information',
		'name' => __('Co-Author Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_publication_co_authors_group = $soe_faculty_publication_box2->add_field( array (
		'id'          => 'co_authors',
		'type'        => 'group',
		'description' => __( 'Enter Co-Author(s)', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Co-Author ({#})', 'cmb2' ),
			'add_button'    => __( 'Add Another Co-Author', 'cmb2' ),
			'remove_button' => __( 'Remove Co-Author', 'cmb2' ),
			'sortable'      => true,
		),
	) );
	$soe_faculty_publication_box2->add_group_field( $soe_faculty_publication_co_authors_group, array(
		'id' => 'co_author_has_doctorate',
		'name' => __('Doctorate', 'cmb2'),
		'desc' => __('Co-Author has a doctorate?', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'Yes' => __('Yes', 'cmb2'),
			'No'  => __('No', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_group_field( $soe_faculty_publication_co_authors_group, array(
		'id' => 'co_author_first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Co-Author\'s First Name', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_group_field( $soe_faculty_publication_co_authors_group, array(
		'id' => 'co_author_middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_group_field( $soe_faculty_publication_co_authors_group, array(
		'id' => 'co_author_last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_group_field( $soe_faculty_publication_co_authors_group, array(
		'id' => 'co_author_affiliated_with_baylor',
		'name' => __('Co-Author Affiliated with Baylor', 'cmb2'),
		'desc' => __('If Co-Author is affiliated with Baylor enter the Co-Author\'s Baylor title.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_publication_box2->add_group_field( $soe_faculty_publication_co_authors_group, array(
		'id' => 'co_author_baylor_title',
		'name' => __('Baylor Title', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s Baylor title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Baylor Title', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_group_field( $soe_faculty_publication_co_authors_group, array(
		'id' => 'co_author_not_affiliated_with_baylor',
		'name' => __('Co-Author Not Affiliated with Baylor', 'cmb2'),
		'desc' => __('If Co-Author is not affiliated with Baylor enter the Co-Author\'s university.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_publication_box2->add_group_field( $soe_faculty_publication_co_authors_group, array(
		'id' => 'co_author_university',
		'name' => __('Co-Author University', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s university.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('University', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'faculty_publication_publication_information',
		'name' => __('Publication Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'publication_title',
		'name' => __('Publication Title', 'cmb2'),
		'desc' => __('Enter the publication title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Publication Title', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'publication_date',
		'name' => __('Publication Date', 'cmb2'),
		'desc' => __('Enter the publication date.', 'cmb2'),
		'type' => 'text_date',
		'date_format' => __( 'F j, Y', 'cmb2' ),
		'attributes'  => array(
			'placeholder' => __('Date', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'publication_type',
		'name' => __('Publication Type', 'cmb2'),
		'desc' => __('Select the publication type.', 'cmb2'),
		'type' => 'select',
		'options' => array(
			'Book' => __( 'Book', 'cmb2' ),
			'Article' => __( 'Article', 'cmb2' ),
			'Chapter' => __( 'Chapter', 'cmb2' ),
			'Other' => __( 'Other', 'cmb2' ),
		),
		'default' => 'Book',
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'publication_type_other_information',
		'name' => __('Publication Type Other', 'cmb2'),
		'desc' => __('If publication type is OTHER enter the publication type.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'other_publication_type',
		'name' => __('Other Publication Type', 'cmb2'),
		'desc' => __('Enter the OTHER publication type.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Other Publication Type', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'not_published_in_book_information',
		'name' => __('Publication Type is ARTICLE, CHAPTER, or OTHER', 'cmb2'),
		'desc' => __('If publication type is ARTICLE, CHAPTER, or OTHER select what the publication was published in and enter the title.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'published_in',
		'name' => __('Published In', 'cmb2'),
		'desc' => __('Select what the publication was published in.', 'cmb2'),
		'type' => 'select',
		'options' => array(
			'' => __( '', 'cmb2' ),
			'Book' => __( 'Book', 'cmb2' ),
			'Magazine' => __( 'Magazine', 'cmb2' ),
			'Journal' => __( 'Journal', 'cmb2' ),
			'Other' => __( 'Other', 'cmb2' ),
		),
		'default' => '',
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'published_in_title',
		'name' => __('Published in Title', 'cmb2'),
		'desc' => __('Enter the title of the book, magazine, journal, or other.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Published in Title', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'volume',
		'name' => __('Volume', 'cmb2'),
		'desc' => __('Enter the volume.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Volume', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'issue',
		'name' => __('Issue', 'cmb2'),
		'desc' => __('Enter the issue.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Issue', 'cmb2'),
		),
	) );
	$soe_faculty_publication_box2->add_field( array (
		'id' => 'pages',
		'name' => __('Page(s)', 'cmb2'),
		'desc' => __('Enter the page(s).', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Page(s)', 'cmb2'),
		),
	) );
	
	// Faculty Presentation Metabox
	$soe_faculty_presentation_box = new_cmb2_box( array(
		'id' => 'faculty_presentation_box',
		'title' => __('Faculty Presentation Instructions', 'cmb2' ),
		'object_types' => array('presentations'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );	
	$soe_faculty_presentation_box->add_field( array (
		'id' => 'faculty_presentation_title',
		'name' => __('Faculty Presentation Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the presentation in the TITLE field. The title entered in the field will be used to identify the presentation in administrative menus, and will be displayed on the profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );	
	$soe_faculty_presentation_box->add_field( array (
		'id' => 'faculty_presentation_information',
		'name' => __('Faculty Presentation Information', 'cmb2'),
		'desc' => __('Please complete the following form before publishing the presentation. The information entered in the form will appear on your profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );	
	$soe_faculty_presentation_box2 = new_cmb2_box( array(
		'id' => 'faculty_presentation_box2',
		'title' => __('Faculty Presentation Information', 'cmb2' ),
		'object_types' => array('presentations'), // post type
		'context' => 'normal',
		'priority' => 'high',
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'faculty_presentation_professional_information',
		'name' => __('Professional Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'doctorate',
		'name' => __('Doctorate', 'cmb2'),
		'desc' => __('Do you have a doctorate?', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'Yes' => __('Yes', 'cmb2'),
			'No'  => __('No', 'cmb2'),
		),
		'default' => 'No',
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter your first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('First Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter your middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter your last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'baylor_title',
		'name' => __('Baylor Title', 'cmb2'),
		'desc' => __('Enter your Baylor title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Baylor Title', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'faculty_presentation_co_presenter_information',
		'name' => __('Co-Presenter Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_presentation_co_presenters_group = $soe_faculty_presentation_box2->add_field( array (
		'id'          => 'co_presenters',
		'type'        => 'group',
		'description' => __( 'Enter Co-Presenter(s)', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Co-Presenter ({#})', 'cmb2' ), 
			'add_button'    => __( 'Add Another Co-Presenter', 'cmb2' ),
			'remove_button' => __( 'Remove Co-Presenter', 'cmb2' ),
			'sortable'      => true,
		)
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_presenters_group, array(
		'id' => 'co_presenter_has_doctorate',
		'name' => __('Doctorate', 'cmb2'),
		'desc' => __('Co-Presenter has a doctorate?', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'Yes' => __('Yes', 'cmb2'),
			'No'  => __('No', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_presenters_group, array(
		'id' => 'co_presenter_first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter the Co-Presenter\'s first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Co-Presenter\'s First Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_presenters_group, array(
		'id' => 'co_presenter_middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter the Co-Presenter\'s middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_presenters_group, array(
		'id' => 'co_presenter_last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter the Co-Presenter\'s last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_presenters_group, array(
		'id' => 'co_presenter_affiliated_with_baylor',
		'name' => __('Co-Presenter Affiliated with Baylor', 'cmb2'),
		'desc' => __('If Co-Presenter is affiliated with Baylor enter the Co-Presenter\'s Baylor title.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_presenters_group, array(
		'id' => 'co_presenter_baylor_title',
		'name' => __('Baylor Title', 'cmb2'),
		'desc' => __('Enter the Co-Presenter\'s Baylor title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Baylor Title', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_presenters_group, array(
		'id' => 'co_presenter_not_affiliated_with_baylor',
		'name' => __('Co-Presenter Not Affiliated with Baylor', 'cmb2'),
		'desc' => __('If Co-Presenter is not affiliated with Baylor enter the Co-Presenter\'s university.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_presenters_group, array(
		'id' => 'co_presenter_university',
		'name' => __('Co-Presenter University', 'cmb2'),
		'desc' => __('Enter the Co-Presenter\'s university.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('University', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'faculty_presentation_co_author_information',
		'name' => __('Co-Author Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_presentation_co_authors_group = $soe_faculty_presentation_box2->add_field( array (
		'id'          => 'co_authors',
		'type'        => 'group',
		'description' => __( 'Enter Co-Author(s)', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Co-Author ({#})', 'cmb2' ),
			'add_button'    => __( 'Add Another Co-Author', 'cmb2' ),
			'remove_button' => __( 'Remove Co-Author', 'cmb2' ),
			'sortable'      => true,
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_authors_group, array(
		'id' => 'co_author_has_doctorate',
		'name' => __('Doctorate', 'cmb2'),
		'desc' => __('Co-Author has a doctorate?', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'Yes' => __('Yes', 'cmb2'),
			'No'  => __('No', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_authors_group, array(
		'id' => 'co_author_first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Co-Author\'s First Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_authors_group, array(
		'id' => 'co_author_middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_authors_group, array(
		'id' => 'co_author_last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_authors_group, array(
		'id' => 'co_author_affiliated_with_baylor',
		'name' => __('Co-Author Affiliated with Baylor', 'cmb2'),
		'desc' => __('If Co-Author is affiliated with Baylor enter the Co-Author\'s Baylor title.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_authors_group, array(
		'id' => 'co_author_baylor_title',
		'name' => __('Baylor Title', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s Baylor title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Baylor Title', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_authors_group, array(
		'id' => 'co_author_not_affiliated_with_baylor',
		'name' => __('Co-Author Not Affiliated with Baylor', 'cmb2'),
		'desc' => __('If Co-Author is not affiliated with Baylor enter the Co-Author\'s university.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_presentation_box2->add_group_field( $soe_faculty_presentation_co_authors_group, array(
		'id' => 'co_author_university',
		'name' => __('Co-Author University', 'cmb2'),
		'desc' => __('Enter the Co-Author\'s university.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('University', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'faculty_presentation_presentation_information',
		'name' => __('Presentation Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'presentation_title',
		'name' => __('Presentation Title', 'cmb2'),
		'desc' => __('Enter the presentation title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Presentation Title', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'conference_event_name',
		'name' => __('Conference/Event Name', 'cmb2'),
		'desc' => __('Enter the conference/event name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Conference/Event Name', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'presentation_date',
		'name' => __('Presentation Date', 'cmb2'),
		'desc' => __('Enter the presentation date.', 'cmb2'),
		'type' => 'text_date',
		'date_format' => __( 'F j, Y', 'cmb2' ),
		'attributes'  => array(
			'placeholder' => __('Date', 'cmb2'),
		),
	) );
	$soe_faculty_presentation_box2->add_field( array (
		'id' => 'presentation_location',
		'name' => __('Presentation Location', 'cmb2'),
		'desc' => __('Enter the presentation location.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Presentation Location', 'cmb2'),
		),
	) );
	
	// Faculty Award Metabox
	$soe_faculty_award_box = new_cmb2_box( array(
		'id' => 'faculty_award_box',
		'title' => __('Faculty Award Instructions', 'cmb2' ),
		'object_types' => array('awards'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );
	$soe_faculty_award_box->add_field( array (
		'id' => 'faculty_award_title',
		'name' => __('Faculty Award Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the award in the TITLE field. The title entered in the field will be used to identify the award in administrative menus, and will be displayed on the profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_award_box->add_field( array (
		'id' => 'faculty_award_information',
		'name' => __('Faculty Award Information', 'cmb2'),
		'desc' => __('Please complete the following form before publishing the award. The information entered in the form will appear on your profile and activity pages', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_award_box2 = new_cmb2_box( array(
		'id' => 'faculty_award_box2',
		'title' => __('Faculty Award Information', 'cmb2' ),
		'object_types' => array('awards'), // post type
		'context' => 'normal',
		'priority' => 'high',
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'faculty_award_professional_information',
		'name' => __('Professional Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'doctorate',
		'name' => __('Doctorate', 'cmb2'),
		'desc' => __('Do you have a doctorate?', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'Yes' => __('Yes', 'cmb2'),
			'No'  => __('No', 'cmb2'),
		),
		'default' => 'No',
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter your first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('First Name', 'cmb2'),
		),
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter your middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name', 'cmb2'),
		),
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter your last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
		),
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'baylor_title',
		'name' => __('Baylor Title', 'cmb2'),
		'desc' => __('Enter your Baylor title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Baylor Title', 'cmb2'),
		),
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'faculty_award_award_information',
		'name' => __('Award Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'award_title',
		'name' => __('Award Title', 'cmb2'),
		'desc' => __('Enter the award title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Award Title', 'cmb2'),
		),
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'award_given_by',
		'name' => __('Award Given By', 'cmb2'),
		'desc' => __('Enter who the award is given by.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Award Given By', 'cmb2'),
		),
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'award_date',
		'name' => __('Award Date', 'cmb2'),
		'desc' => __('Enter the award date.', 'cmb2'),
		'type' => 'text_date',
		'date_format' => __( 'F j, Y', 'cmb2' ),
		'attributes'  => array(
			'placeholder' => __('Date', 'cmb2'),
		),
	) );
	$soe_faculty_award_box2->add_field( array (
		'id' => 'award_reason',
		'name' => __('Award Reason', 'cmb2'),
		'desc' => __('Enter the reason the award was given.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Award Reason', 'cmb2'),
		),
	) );
	
	// Faculty Grant Metabox
	$soe_faculty_grant_box = new_cmb2_box( array(
		'id' => 'faculty_grant_box',
		'title' => __('Faculty Grant Instructions', 'cmb2' ),
		'object_types' => array('grants'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );
	$soe_faculty_grant_box->add_field( array (
		'id' => 'faculty_grant_title',
		'name' => __('Faculty Grant Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the grant in the TITLE field. The title entered in the field will be used to identify the grant in administrative menus, and will be displayed on the profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_grant_box->add_field( array (
		'id' => 'faculty_grant_information',
		'name' => __('Faculty Grant Information', 'cmb2'),
		'desc' => __('Please complete the following form before publishing the grant. The information entered in the form will appear on your profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_grant_box2 = new_cmb2_box( array(
		'id' => 'faculty_grant_box2',
		'title' => __('Faculty Grant Information', 'cmb2' ),
		'object_types' => array('grants'), // post type
		'context' => 'normal',
		'priority' => 'high',
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'faculty_grant_professional_information',
		'name' => __('Professional Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'doctorate',
		'name' => __('Doctorate', 'cmb2'),
		'desc' => __('Do you have a doctorate?', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'Yes' => __('Yes', 'cmb2'),
			'No'  => __('No', 'cmb2'),
		),
		'default' => 'No',
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter your first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('First Name', 'cmb2'),
		),
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter your middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name', 'cmb2'),
		),
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter your last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
		),
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'baylor_title',
		'name' => __('Baylor Title', 'cmb2'),
		'desc' => __('Enter your Baylor title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Baylor Title', 'cmb2'),
		),
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'faculty_grant_grant_information',
		'name' => __('Grant Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'grant_internal_external',
		'name' => __('Internal or External?', 'cmb2'),
		'desc' => __('Is this an internal or external grant?', 'cmb2'),
		'type' => 'radio', 
		'options' => array(
			'Internal' => __( 'Internal', 'cmb2' ),
			'External' => __( 'External', 'cmb2' )
		),
		'default' => 'Internal',
		'attributes'  => array(
			'required'    => 'required',
		),
	) );	
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'grant_title',
		'name' => __('Grant Title', 'cmb2'),
		'desc' => __('Enter the grant title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Grant Title', 'cmb2'),
		),
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'grant_amount',
		'name' => __('Grant Amount', 'cmb2'),
		'desc' => __('Enter the ammount of the grant that was given.', 'cmb2'),
		'type' => 'text_money',
		'attributes'  => array(
			'placeholder' => __('Grant Amount', 'cmb2'),
		),
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'grant_given_by',
		'name' => __('Grant Given By', 'cmb2'),
		'desc' => __('Enter who the grant is given by.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Grant Given By', 'cmb2'),
		),
	) );
	$soe_faculty_grant_box2->add_field( array (
		'id' => 'grant_date',
		'name' => __('Grant Date', 'cmb2'),
		'desc' => __('Enter the grant date.', 'cmb2'),
		'type' => 'text_date',
		'date_format' => __( 'F j, Y', 'cmb2' ),
		'attributes'  => array(
			'placeholder' => __('Date', 'cmb2'),
		),
	) );
		
	// Faculty Professional Leadership Metabox
	$soe_faculty_professional_leadership_box = new_cmb2_box( array(
		'id' => 'faculty_professional_leadership_box',
		'title' => __('Faculty Professional Leadership Instructions', 'cmb2' ),
		'object_types' => array('leadership'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );
	$soe_faculty_professional_leadership_box->add_field( array (
		'id' => 'faculty_professional_leadership_title',
		'name' => __('Faculty Professional Leadership Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the professional leadership in the TITLE field. The title entered in the field will be used to identify the professional leadership in administrative menus, and will be displayed on the profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_professional_leadership_box->add_field( array (
		'id' => 'faculty_professional_leadership_information',
		'name' => __('Faculty Professional Leadership Information', 'cmb2'),
		'desc' => __('Please complete the following form before publishing the professional leadership. The information entered in the form will appear on your profile and activity pages.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_professional_leadership_box2 = new_cmb2_box( array(
		'id' => 'faculty_professional_leadership_box2',
		'title' => __('Faculty Professional Leadership Information', 'cmb2' ),
		'object_types' => array('leadership'), // post type
		'context' => 'normal',
		'priority' => 'high',
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'faculty_professional_leadership_professional_information',
		'name' => __('Professional Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'doctorate',
		'name' => __('Doctorate', 'cmb2'),
		'desc' => __('Do you have a doctorate?', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'Yes' => __('Yes', 'cmb2'),
			'No'  => __('No', 'cmb2'),
		),
		'default' => 'No',
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'first_name',
		'name' => __('First Name', 'cmb2'),
		'desc' => __('Enter your first name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('First Name', 'cmb2'),
		),
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'middle_name',
		'name' => __('Middle Name', 'cmb2'),
		'desc' => __('Enter your middle name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Middle Name', 'cmb2'),
		),
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'last_name',
		'name' => __('Last Name', 'cmb2'),
		'desc' => __('Enter your last name.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Last Name', 'cmb2'),
		),
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'baylor_title',
		'name' => __('Baylor Title', 'cmb2'),
		'desc' => __('Enter your Baylor title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Baylor Title', 'cmb2'),
		),
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'faculty_professional_leadership_grant_information',
		'name' => __('Professional Leadership Information', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'leadership_title',
		'name' => __('Professional Leadership Title', 'cmb2'),
		'desc' => __('Enter the professional leadership title.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Professional Leadership Title', 'cmb2'),
		),
	) );
	$soe_faculty_professional_leadership_box2->add_field( array (
		'id' => 'leadership_affiliation',
		'name' => __('Professional Leadership Affiliation', 'cmb2'),
		'desc' => __('Enter the name of the affiliation tied to the professional leadership.', 'cmb2'),
		'type' => 'text',
		'attributes'  => array(
			'placeholder' => __('Professional Leadership Affiliation', 'cmb2'),
		),
	) );
	
	// Faculty Affiliations Metabox
	$soe_faculty_affiliation_box = new_cmb2_box( array(
		'id' => 'faculty_affiliation_box',
		'title' => __('Faculty Affiliation Instructions', 'cmb2' ),
		'object_types' => array('affiliations'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );
	$soe_faculty_affiliation_box->add_field( array (
		'id' => 'faculty_affiliation_title',
		'name' => __('Faculty Affiliation Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the affiliation in the TITLE field. The title entered in the field will be used to identify the affiliation in administrative menus, and will be displayed on the profile page.', 'cmb2'),
		'type' => 'title',
	) );
	
	// Faculty Teaching Philosophy Metabox
	$soe_faculty_teaching_philosophy_box = new_cmb2_box( array(
		'id' => 'faculty_teaching_philosophy_box',
		'title' => __('Faculty Teaching Philosophy Instructions', 'cmb2' ),
		'object_types' => array('philosophy'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );	
	$soe_faculty_teaching_philosophy_box->add_field( array (
		'id' => 'faculty_teaching_philosophy_title',
		'name' => __('Faculty Teaching Philosophy Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the teaching philosophy in the TITLE field. The title entered in the field will be used to identify the teaching philosophy in administrative menus, and will be displayed on the profile page.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_teaching_philosophy_box->add_field( array (
		'id' => 'faculty_teaching_philosophy_information',
		'name' => __('Faculty Teaching Philosophy Information', 'cmb2'),
		'desc' => __('Please enter any information about the teaching philosophy in the EDITOR. The information entered in the field will appear on the profile page.', 'cmb2'),
		'type' => 'title',
	) );
	$soe_faculty_teaching_philosophy_box2 = new_cmb2_box( array(
		'id' => 'faculty_teaching_philosophy_box2',
		'title' => __('Faculty Teaching Philosophy Information', 'cmb2' ),
		'object_types' => array('philosophy'), // post type
		'context' => 'normal',
		'priority' => 'high',
	) );		
	$soe_faculty_teaching_philosophy_box2->add_field( array (
		'id' => 'teaching_philosophy',
		'name' => __('Teaching Philosophy', 'cmb2'),
		'type' => 'textarea',
		'attributes' => array(
			'maxlength'  => 500,
			'required'    => 'required'
		),
	) );	
		
	// Faculty Course Metabox
	$soe_faculty_course_box = new_cmb2_box( array(
		'id' => 'faculty_course_box',
		'title' => __('Faculty Course Instructions', 'cmb2' ),
		'object_types' => array('courses'), // post type
		'context' => 'side',
		'priority' => 'high',
	) );
	$soe_faculty_course_box->add_field( array (
		'id' => 'faculty_course_title',
		'name' => __('Faculty Course Title', 'cmb2'),
		'desc' => __('Please enter a title that best represents the course in the TITLE field (ex. Introduction to Teaching (TED 1312). The title entered in the field will be used to identify the teaching philosophy in administrative menus, and will be displayed on the profile page.', 'cmb2'),
		'type' => 'title',
	) );
	
	// Faculty Featured Metabox
	$soe_faculty_featured_box = new_cmb2_box( array(
		'id' => 'faculty_featured_box',
		'title' => __( 'Featured Post', 'cmb2' ),
		'object_types' => array(
			'post',
			'expertise',
			'philosophy',
			'presentations', 
			'publications',  
			'awards',
			'research',
			'grants',
			'leadership' ), // post type
		'context' => 'side',
		'priority' => 'core',
	) );
	$soe_faculty_featured_box->add_field( array (
		'id' => 'faculty_featured_response',
		'name' => __('"Feature" this post.', 'cmb2'),
		'desc' => __('Please select "Yes" to mark this post as "Featured" if the post is significant enough to remain at the top of the activity list.', 'cmb2'),
		'type' => 'radio_inline',
		'options' => array(
			'1' => __('Yes', 'cmb2'),
			'0'  => __('No', 'cmb2'),
		),
		'default' => 'No',
	) );
}

?>