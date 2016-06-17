<?php
// Creates the custom content based on the data from the meta boxes
function soe_faculty_custom_content() {
		
	// Start of message string
	$output = '';
	
	if ( get_post_type() == 'expertise' ) :
	
		if ( get_post_meta( get_the_ID(), 'expertise', TRUE ) && get_post_meta( get_the_ID(), 'expertise', TRUE ) != 'Other' ) :
		
			 $expertise = get_post_meta( get_the_ID(), 'expertise', TRUE );
			 
		elseif ( get_post_meta( get_the_ID(), 'other_expertise', TRUE ) && ( get_post_meta( get_the_ID(), 'other_expertise', TRUE ) != '' ) && ( get_post_meta( get_the_ID(), 'expertise', TRUE ) == 'Other' ) ) :
			
			$expertise = get_post_meta( get_the_ID(), 'other_expertise', TRUE );
		
		else:
		
			// Do nothing
		
		endif;
		
		$output .= $expertise;
	
	endif;
	
	if ( get_post_type() == 'publications' || get_post_type() == 'presentations' || get_post_type() == 'awards' || get_post_type() == 'grants' || get_post_type() == 'leadership' ) :
	
		// Create full name
		$full_name;
		
		if ( get_post_meta( get_the_ID(), 'doctorate', TRUE ) && get_post_meta( get_the_ID(), 'doctorate', TRUE ) != '' ) :
		
			$doctorate = get_post_meta( get_the_ID(), 'doctorate', TRUE );
			
			if ( $doctorate == 'Yes' ) :
				
				$full_name .= 'Dr. ';
			
			endif;
				
		endif;
		
		if ( get_post_meta( get_the_ID(), 'first_name', TRUE ) && get_post_meta( get_the_ID(), 'first_name', TRUE ) != '' ) :
		
			$full_name .= get_post_meta( get_the_ID(), 'first_name', TRUE ) . ' ';
		
		endif;
		
		if ( get_post_meta( get_the_ID(), 'middle_name', TRUE ) && get_post_meta( get_the_ID(), 'middle_name', TRUE ) != '' ) :
		
			$full_name .= get_post_meta( get_the_ID(), 'middle_name', TRUE ) . ' ';
		
		endif;
		
		if ( get_post_meta( get_the_ID(), 'last_name', TRUE ) && get_post_meta( get_the_ID(), 'last_name', TRUE ) != '' ) :
	
			$full_name .= get_post_meta( get_the_ID(), 'last_name', TRUE );		
		
		endif;
	
		if ( get_post_meta( get_the_ID(), 'baylor_title', TRUE ) && get_post_meta( get_the_ID(), 'baylor_title', TRUE ) != '' ) :
		
			$baylor_title = strtolower( get_post_meta( get_the_ID(), 'baylor_title', TRUE ) );
		
		endif;
		
	endif;
	
	// Gets data for publications
	if ( get_post_type() == 'publications' ) :
	
		// Co-Authors
		if ( is_array( get_post_meta( get_the_ID(), 'co_authors', true) ) ) : // Checks for array
			
			// Co-Authors array()
			$co_authors = get_post_meta( get_the_ID(), 'co_authors', true);
			
			// Number of Co-Author entries
			$num_of_co_authors = count( $co_authors );
			
			// Number of times through foreach loop
			$count = 1;
			
			$co_authors_string = '';
			
			foreach ( $co_authors as $key => $entry ) : // Loop
				
				$co_author_doctorate = '';
				$co_author_fname = '';
				$co_author_mname = '';
				$co_author_lname = '';
				$co_author_butitle = '';
				$co_author_university = '';		
			
				if ( isset( $entry['co_author_has_doctorate'] ) && $entry['co_author_has_doctorate'] != '' ) :
						
						$co_author_doctorate = $entry['co_author_has_doctorate'];
						
						if ( $co_author_doctorate == 'Yes' ) :
					
							$co_authors_string .= 'Dr. ';
					
						endif;
					
				endif;
				
				if ( isset( $entry['co_author_first_name'] ) && $entry['co_author_first_name'] != '' ) :
				
					$co_author_fname = $entry['co_author_first_name'];
				
					$co_authors_string .= $co_author_fname . ' ';
				
				endif;
				
				if ( isset( $entry['co_author_middle_name'] ) && $entry['co_author_middle_name'] != '' ) :
				
					$co_author_mname = $entry['co_author_middle_name'];
				
					$co_authors_string .= $co_author_mname . ' ';
				
				endif;
				
				if ( isset( $entry['co_author_last_name'] ) && $entry['co_author_last_name'] != '' ) :
					
					$co_author_lname = $entry['co_author_last_name'];
				
					$co_authors_string .= $co_author_lname;		
				
				endif;
					
				if ( isset( $entry['co_author_baylor_title'] ) && $entry['co_author_baylor_title'] != '' ) :
				
					$co_author_butitle = $entry['co_author_baylor_title'];
				
					$co_authors_string .= ', ' . strtolower( $co_author_butitle );
					
				endif;	
			
				if ( isset( $entry['co_author_university'] ) && $entry['co_author_university'] != '' ) :
				
					$co_author_university = $entry['co_author_university'];
					
					$co_authors_string .= ', ' . $co_author_university;
					
				endif;
				
				if ( ( $num_of_co_authors - 1 ) == $count ) :
				
					$co_authors_string .= sprintf ( ', and ' );
					
				elseif ( $num_of_co_authors == $count ) :
					
					$co_authors_string .= '';
					
				else : 
				
					$co_authors_string .= sprintf ( ', ' );	
				
				endif;
				
				$count++;
			
			endforeach; // End Loop
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'publication_title', TRUE ) && get_post_meta( get_the_ID(), 'publication_title', TRUE ) != '' ) :
		
			$publication_title = get_post_meta( get_the_ID(), 'publication_title', TRUE );
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'publication_type', TRUE ) && get_post_meta( get_the_ID(), 'publication_type', TRUE ) != '' ) :
			
			$publication_type = get_post_meta( get_the_ID(), 'publication_type', TRUE );
			
		endif;

		if ( $publication_type == 'Other' ) :
			
			if ( get_post_meta( get_the_ID(), 'other_publication_type', TRUE ) && get_post_meta( get_the_ID(), 'other_publication_type', TRUE ) != '' ) :
	
				$other_publication_type = get_post_meta( get_the_ID(), 'other_publication_type', TRUE );
				
			endif;
		
		endif;
		
		if ( $publication_type == 'Article' || $publication_type == 'Chapter' || $publication_type == 'Other' ) :
		
			if ( get_post_meta( get_the_ID(), 'published_in', TRUE ) && get_post_meta( get_the_ID(), 'published_in', TRUE ) != '' ) :
		
				$published_in = get_post_meta( get_the_ID(), 'published_in', TRUE );
				
			endif;
			
			if ( get_post_meta( get_the_ID(), 'published_in_title', TRUE ) && get_post_meta( get_the_ID(), 'published_in_title', TRUE ) != '' ) :
			
				$published_in_title = get_post_meta( get_the_ID(), 'published_in_title', TRUE );
				
			endif;
			
			if ( get_post_meta( get_the_ID(), 'volume', TRUE ) && get_post_meta( get_the_ID(), 'volume', TRUE ) != '' ) :

				$volume = get_post_meta( get_the_ID(), 'volume', TRUE );
			
			endif;
			
			if ( get_post_meta( get_the_ID(), 'issue', TRUE ) && get_post_meta( get_the_ID(), 'issue', TRUE ) != '' ) :
				
				$issue = get_post_meta( get_the_ID(), 'issue', TRUE );	
			
			endif;
			
			if ( get_post_meta( get_the_ID(), 'pages', TRUE ) && get_post_meta( get_the_ID(), 'pages', TRUE ) != '' ) :
			
				$pages = get_post_meta( get_the_ID(), 'pages', TRUE );	
			
			endif;
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'publication_date', TRUE ) && get_post_meta( get_the_ID(), 'publication_date', TRUE ) != '' ) :
		
			$publication_date = get_post_meta( get_the_ID(), 'publication_date', TRUE );	
		
		endif;
		
		if ( $full_name ) :
		
			$output .= sprintf ( '%s', $full_name );	
		
		endif;
		
		if ( $baylor_title ) :
		
			$output .= sprintf ( ', %s', $baylor_title );
		
		endif;
		
		if ($publication_title ) :
		
			$output .= sprintf ( ', published %s', $publication_title );
			
		endif;
		
		if ( $publication_type == 'Article' || $publication_type == 'Chapter' || $publication_type == 'Other' ) :	
		
			if ( $published_in_title ) :
			
				$output .= sprintf ( ' in %s', $published_in_title );
				
			endif;
			
			if ( $volume ) :
		
				$output .= sprintf ( ', Vol. %s', $volume );
			
			endif;
			
			if ( $issue ) :
			
				$output .= sprintf ( ', Issue %s', $issue );
			
			endif;
			
			if ( $pages ) :
			
				$output .= sprintf ( ', p. %s', $pages);
			
			endif;
		
		endif;
		
		if ( $publication_date ) :
		
			$output .= sprintf ( ', %s', $publication_date );
		
		endif;
		
		if ( $co_authors_string ) :
			
				$output .= sprintf ( ', with co-author(s) %s', $co_authors_string );
			
		endif;
		
		$output .= sprintf ('.' );
		
	endif;
	
	// Gets data for presentations
	if ( get_post_type() == 'presentations' ) :
		
		// Co-Presenters
		if ( is_array( get_post_meta( get_the_ID(), 'co_presenters', true) ) ) : // Checks for array
	
			// Co-Presenters array()
			$co_presenters = get_post_meta( get_the_ID(), 'co_presenters', true);
			
			// Number of Co-Presenter entries
			$num_of_co_presenters = count( $co_presenters );
			
			if ( $num_of_co_presenters == 1 ) :
			
				$and = ', and ';
				
			else :
			
				$and = ', ';
			
			endif;
			
			// Number of times through foreach loop
			$count = 1;
			
			$co_presenters_string = '';
			
			foreach ( $co_presenters as $key => $entry ) : // Loop
				
				$co_presenter_doctorate = '';
				$co_presenter_fname = '';
				$co_presenter_mname = '';
				$co_presenter_lname = '';
				$co_presenter_butitle = '';
				$co_presenter_university = '';
				
				if ( isset( $entry['co_presenter_has_doctorate'] ) && $entry['co_presenter_has_doctorate'] != '' ) :
					
					$co_presenter_doctorate = $entry['co_presenter_has_doctorate'];
					
					if ( $co_presenter_doctorate == 'Yes' ) :
				
						$co_presenters_string .= 'Dr. ';
				
					endif;
				
				endif;
				
				if ( isset( $entry['co_presenter_first_name'] ) && $entry['co_presenter_first_name'] != '' ) :
				
					$co_presenter_fname = $entry['co_presenter_first_name'];
				
					$co_presenters_string .= $co_presenter_fname . ' ';
				
				endif;
				
				if ( isset( $entry['co_presenter_middle_name'] ) && $entry['co_presenter_middle_name'] != '' ) :
				
					$co_presenter_mname = $entry['co_presenter_middle_name'];
				
					$co_presenters_string .= $co_presenter_mname . ' ';
				
				endif;
				
				if ( isset( $entry['co_presenter_last_name'] ) && $entry['co_presenter_last_name'] != '' ) :
					
					$co_presenter_lname = $entry['co_presenter_last_name'];
				
					$co_presenters_string .= $co_presenter_lname;		
				
				endif;
					
				if ( isset( $entry['co_presenter_baylor_title'] ) && $entry['co_presenter_baylor_title'] != '' ) :
				
					$co_presenter_butitle = $entry['co_presenter_baylor_title'];
				
					$co_presenters_string .= ', ' . strtolower( $co_presenter_butitle );
					
				endif;	
			
				if ( isset( $entry['co_presenter_university'] ) && $entry['co_presenter_university'] != '' ) :
				
					$co_presenter_university = $entry['co_presenter_university'];
					
					$co_presenters_string .= ', ' . $co_presenter_university;
					
				endif;
				
				if ( ( $num_of_co_presenters - 1 ) == $count ) :
				
					$co_presenters_string .= sprintf ( ', and ' );	
				
				elseif (  $num_of_co_presenters > $count ) :
				
					$co_presenters_string .= sprintf ( ', ' );	
				
				else :
				
					$co_presenters_string .= '';
				
				endif;
				
				$count++;
				
			endforeach; // End Loop
			
		endif;
		
		// Co-Authors
		if ( is_array( get_post_meta( get_the_ID(), 'co_authors', true) ) ) : // Checks for array
			
			// Co-Authors array()
			$co_authors = get_post_meta( get_the_ID(), 'co_authors', true);
			
			// Number of Co-Author entries
			$num_of_co_authors = count( $co_authors );
			
			// Number of times through foreach loop
			$count = 1;
			
			$co_authors_string = '';
			
			foreach ( $co_authors as $key => $entry ) : // Loop
				
				$co_author_doctorate = '';
				$co_author_fname = '';
				$co_author_mname = '';
				$co_author_lname = '';
				$co_author_butitle = '';
				$co_author_university = '';		
			
				if ( isset( $entry['co_author_has_doctorate'] ) && $entry['co_author_has_doctorate'] != '' ) :
						
						$co_author_doctorate = $entry['co_author_has_doctorate'];
						
						if ( $co_author_doctorate == 'Yes' ) :
					
							$co_authors_string .= 'Dr. ';
					
						endif;
					
				endif;
				
				if ( isset( $entry['co_author_first_name'] ) && $entry['co_author_first_name'] != '' ) :
				
					$co_author_fname = $entry['co_author_first_name'];
				
					$co_authors_string .= $co_author_fname . ' ';
				
				endif;
				
				if ( isset( $entry['co_author_middle_name'] ) && $entry['co_author_middle_name'] != '' ) :
				
					$co_author_mname = $entry['co_author_middle_name'];
				
					$co_authors_string .= $co_author_mname . ' ';
				
				endif;
				
				if ( isset( $entry['co_author_last_name'] ) && $entry['co_author_last_name'] != '' ) :
					
					$co_author_lname = $entry['co_author_last_name'];
				
					$co_authors_string .= $co_author_lname;		
				
				endif;
					
				if ( isset( $entry['co_author_baylor_title'] ) && $entry['co_author_baylor_title'] != '' ) :
				
					$co_author_butitle = $entry['co_author_baylor_title'];
				
					$co_authors_string .= ', ' . strtolower( $co_author_butitle );
					
				endif;	
			
				if ( isset( $entry['co_author_university'] ) && $entry['co_author_university'] != '' ) :
				
					$co_author_university = $entry['co_author_university'];
					
					$co_authors_string .= ', ' . $co_author_university;
					
				endif;
				
				if ( ( $num_of_co_authors - 1 ) == $count ) :
				
					$co_authors_string .= sprintf ( ', and ' );
					
				elseif ( $num_of_co_authors == $count ) :
					
					$co_authors_string .= '';
					
				else : 
				
					$co_authors_string .= sprintf ( ', ' );	
				
				endif;
				
				$count++;
			
			endforeach; // End Loop
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'presentation_title', TRUE ) ) :
			
			$presentation_title = get_post_meta( get_the_ID(), 'presentation_title', TRUE );
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'conference_event_name', TRUE ) ) :

			$conference_event_name = get_post_meta( get_the_ID(), 'conference_event_name', TRUE );
		
		endif;
		
		if ( get_post_meta( get_the_ID(), 'presentation_date', TRUE ) ) :
		
			$presentation_date = get_post_meta( get_the_ID(), 'presentation_date', TRUE );	
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'presentation_location', TRUE ) ) :
		
			$presentation_location = get_post_meta( get_the_ID(), 'presentation_location', TRUE );
		
		endif;
		
		if ( $full_name ) :
		
			$output .= sprintf ( '%s', $full_name );	
		
		endif;
		
		if ( $baylor_title ) :
		
			$output .= sprintf ( ', %s', $baylor_title );
		
		endif;
		
		if ( $co_presenters_string ) :
		
			$output .= sprintf ( '%s%s', $and, $co_presenters_string );
		
		endif;
		
		if ( $presentation_title ) :
		
			$output .= sprintf ( ', presented %s', $presentation_title );
		
		endif;
		
		if ( $conference_event_name ) :
		
			$output .= sprintf ( ' at %s', $conference_event_name );
		
		endif;
		
		if ( $presentation_date ) :
		
			$output .= sprintf ( ', held %s', $presentation_date );
		
		endif;
		
		if ( $presentation_location ) :
		
			$output .= sprintf ( ', in %s', $presentation_location );
		
		endif;
		
		if ( $co_authors_string ) :

			$output .= sprintf ( ', co-authored by %s', $co_authors_string );

		endif;
		
		
		$output .= sprintf ('.' );
		
	endif;
	
	// Gets data for awards
	if ( get_post_type() == 'awards' ) :
	
		if ( get_post_meta( get_the_ID(), 'award_title', TRUE ) && get_post_meta( get_the_ID(), 'award_title', TRUE ) != '' ) :

			$award_title = get_post_meta( get_the_ID(), 'award_title', TRUE );

		endif;
		
		if ( get_post_meta( get_the_ID(), 'award_given_by', TRUE ) && get_post_meta( get_the_ID(), 'award_given_by', TRUE ) != '' ) :
		
			$award_given_by = get_post_meta( get_the_ID(), 'award_given_by', TRUE );
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'award_date', TRUE ) && get_post_meta( get_the_ID(), 'award_date', TRUE ) != '' ) :
		
			$award_date = get_post_meta( get_the_ID(), 'award_date', TRUE );	
			
		endif;
		
		if (	 get_post_meta( get_the_ID(), 'award_reason', TRUE ) && get_post_meta( get_the_ID(), 'award_reason', TRUE ) != '' ) :
		
			$award_reason = get_post_meta( get_the_ID(), 'award_reason', TRUE );
			
			$award_reason = strtolower( $award_reason );
			
		endif;
		
		if ( $full_name ) :
		
			$output .= sprintf ( '%s', $full_name );	
		
		endif;
		
		if ( $baylor_title ) :
		
			$output .= sprintf ( ', %s', $baylor_title );
		
		endif; 
		
		if ( $award_title ) :
		
			$output .= sprintf ( ', received %s', $award_title );
		
		endif; 
		
		if ( $award_reason ) :
		
			$output .= sprintf ( ' for %s', $award_reason ); 
		
		endif;
		
		if ( $award_given_by ) :
		
			$output .= sprintf ( ' from %s', $award_given_by ); 
		
		endif;
		
		if ( $award_date ) :
		
			$output .= sprintf ( ', %s', $award_date );
		
		endif;
		
		$output .= sprintf ('.' );
		
	endif;
	
	// Gets data for grants
	if ( get_post_type() == 'grants' ) :
		
		if ( get_post_meta( get_the_ID(), 'grant_title', TRUE ) && get_post_meta( get_the_ID(), 'grant_title', TRUE ) != '' ) :

			$grant_title = get_post_meta( get_the_ID(), 'grant_title', TRUE );

		endif;
		
		if ( get_post_meta( get_the_ID(), 'grant_amount', TRUE ) && get_post_meta( get_the_ID(), 'grant_amount', TRUE ) != '' ) :

			$grant_amount = get_post_meta( get_the_ID(), 'grant_amount', TRUE );
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'grant_given_by', TRUE ) && get_post_meta( get_the_ID(), 'grant_given_by', TRUE ) != '' ) :
		
			$grant_given_by = get_post_meta( get_the_ID(), 'grant_given_by', TRUE );
			
		endif;
		
		if ( get_post_meta( get_the_ID(), 'grant_date', TRUE ) && get_post_meta( get_the_ID(), 'grant_date', TRUE ) != '' ) :
		
			$grant_date = get_post_meta( get_the_ID(), 'grant_date', TRUE );	
			
		endif;
		
		if ( $full_name ) :
		
			$output .= sprintf ( '%s', $full_name );	
		
		endif;
		
		if ( $baylor_title ) :
		
			$output .= sprintf ( ', %s', $baylor_title );
		
		endif;
		
		if ( $grant_amount ) :
		
			$output .= sprintf ( '; $%s', $grant_amount );
		
		endif; 
		
		if ( $grant_title ) :
		
			$output .= sprintf ( '; %s', $grant_title );
		
		endif; 
		
		if ( $grant_given_by ) :
		
			$output .= sprintf ( '; %s', $grant_given_by );
		
		endif;
		
		$output .= sprintf ('.' );
		
	endif;
	
	// Gets data for professional leadership
	if ( get_post_type() == 'leadership' ) :
	
		if ( get_post_meta( get_the_ID(), 'leadership_title', TRUE ) && get_post_meta( get_the_ID(), 'leadership_title', TRUE ) != '' ) :

			$leadership_title = get_post_meta( get_the_ID(), 'leadership_title', TRUE );

		endif;
		
		if ( get_post_meta( get_the_ID(), 'leadership_affiliation', TRUE ) && get_post_meta( get_the_ID(), 'leadership_affiliation', TRUE ) != '' ) :

			$leadership_affiliation = get_post_meta( get_the_ID(), 'leadership_affiliation', TRUE );
			
		endif;
		
		
		if ( $full_name ) :
		
			$output .= sprintf ( '%s', $full_name );	
		
		endif;
		
		if ( $baylor_title ) :
		
			$output .= sprintf ( ', %s', $baylor_title );
		
		endif;
		
		if ( $leadership_title ) :
		
			$output .= sprintf ( '; %s', $leadership_title );
		
		endif; 
		
		if ( $leadership_affiliation ) :
		
			$output .= sprintf ( '; %s', $leadership_affiliation );
		
		endif; 
		
		$output .= sprintf ('.' );
	
	endif;
	
	// Gets data for teaching philosophy
	if ( get_post_type() == 'philosophy' ) :
	
		$teaching_philosophy = get_post_meta( get_the_ID(), 'teaching_philosophy', TRUE);
		
		$output .= $teaching_philosophy;
	
	endif;
	
	return $output;

}