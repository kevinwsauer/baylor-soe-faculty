<?php
/**
 * The custom template for the front-page. Kicks in automatically.
 */

get_header(); ?>
<div id="secondary" class="widget-area" role="complementary">
    <div id="profile-content">
    <?php
        // Gathers information from Profiles post type.
        $profiles_loop = new WP_Query(
			array(
				'post_type' => 'profiles',
            )
        );
        // Loop
        while ( $profiles_loop -> have_posts() ) : $profiles_loop -> the_post(); ?>
        <?php if (has_post_thumbnail()) { ?>
            <div class="faculty-post-thumbnail">
            <?php echo the_post_thumbnail('faculty-thumb'); ?>
            </div>
        <?php } ?>
            <div class="info"> 
                <h1 class="info-title"> 
                <?php 
                echo get_post_meta($post->ID, 'first_name', true);
                if(get_post_meta($post->ID, 'middle_name', true)) :
                    echo ' ' . get_post_meta($post->ID, 'middle_name', true); 
                endif;
                echo ' ' . get_post_meta($post->ID, 'last_name', true);
                if(get_post_meta($post->ID, 'title', true)) : 
                    echo ', ' . get_post_meta($post->ID, 'title', true);  
                endif; 
                ?>
                </h1>
                <?php if(get_post_meta($post->ID, 'positions', true)) : ?>
                    <div class="info-title"><?php echo nl2br(get_post_meta($post->ID, 'positions', true)); ?></div> 
                <?php endif; ?>
                <p>
                <strong>
                <?php
                if ( get_post_meta($post->ID, 'department', true) == 'Curriculum and Instruction' ) :
                    echo 'Curriculum &amp; Instruction';
                else: 
                    echo get_post_meta($post->ID, 'department', true);
                endif;
                ?>
                </strong><br />
                Baylor University<br />
                School of Education<br />
                Marrs McLean Science <?php echo get_post_meta($post->ID, 'room_number', true); ?><br />
                One Bear Place
                <?php 
                if ( get_post_meta($post->ID, 'department', true) == 'Curriculum and Instruction' ) :
                    echo ' #97314';
                elseif( get_post_meta($post->ID, 'department', true) == 'Educational Administration' ) :
                    echo ' #97312';
                elseif( get_post_meta($post->ID, 'department', true) == 'Educational Psychology' ) :
                    echo ' #97301';
                else:
                    echo ' #97304';
                endif;
                ?>
                <br />
                Waco, TX 76798 
                </p>
                <ul class="about-faculty-contact">
                <?php if(get_post_meta($post->ID, 'email', true)) :  ?>
                    <li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"><?php echo get_post_meta($post->ID, 'email', true); ?></a></li>
                <?php endif;
                if(get_post_meta($post->ID, 'phone_number', true)) : ?> 
                    <li><i class="fa fa-phone"></i> <a href="tel:+1-<?php echo get_post_meta($post->ID, 'phone_number', true); ?>"><?php echo get_post_meta($post->ID, 'phone_number', true); ?></a></li> 
                <?php endif;
                if(get_post_meta($post->ID, 'fax_number', true)) : ?>
                    <li><i class="fa fa-fax"></i> <a href="tel:+1-<?php echo get_post_meta($post->ID, 'fax_number', true); ?>"><?php echo get_post_meta($post->ID, 'fax_number', true); ?></a></li> 
                <?php endif;
                $websites = array();
                $websites = get_post_meta($post->ID, 'website', true);
                if(!empty($websites)) : 
                    foreach( $websites as $website ) : ?>
                        <li><a href="<?php echo $website; ?>"><?php echo $website; ?></a></li>
                <?php 
                    endforeach;
                endif;
                if( get_post_meta($post->ID, 'curriculum_vitae', true)): ?>
                    <li><a class="curriculum-vitae" href="<?php echo get_post_meta($post->ID, 'curriculum_vitae', true); ?>"><i class="fa fa-file-pdf-o"></i> Curriculum Vitae</a></li>
                <?php endif; ?>
                </ul>
                <div class="entry-meta">
                    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .entry-meta -->
            </div><!-- .info -->
        <?php
        endwhile; // end of the loop.
                    
        /* Restore original post data */
        wp_reset_postdata();
    ?>
    </div><!-- #profile-content -->
	<?php get_sidebar('1'); ?>
</div><!-- #secondary -->	
    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            	<div class="index-box">
            	<?php
				global $wp_query; 
				// Gathers information from Profiles post type.
                $profiles_loop = new WP_Query(
					array(
						'post_type' => 'profiles',
                    )
                );
				
    			// Loop
                while ( $profiles_loop-> have_posts() ) : $profiles_loop-> the_post(); ?> 
                <div class="activity-container">       
				<?php
                // Bio information
				if (get_post_meta($post->ID, 'about_me', true)) : ?>
                	<div class="info-header info-title">
						<i class="fa fa-newspaper-o"></i> Bio
					</div><!-- .info-header .info-title -->
                    <header class="entry-header">
                    </header><!--.entry-header -->
                    <div class="entry-content">
                        <p><?php echo nl2br(get_post_meta($post->ID, 'about_me', true)); ?></p>
                        <div class="entry-meta">
                            <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                        </div><!-- .entry-meta -->
                    </div><!-- .entry-content -->
				<?php 
				endif;
                ?>
                </div><!-- .activity-container -->
				<?php
				endwhile; // end of the loop.
				
				/* Restore original post data */
				wp_reset_postdata();
				
				// Gathers information from Degrees post type.
				$degrees_loop = new WP_Query(
					array(
						'post_type' => 'degrees',
						'post_per_page' => -1,
						'nopaging' => true
					)
				);
				
				$degrees_num_posts = $degrees_loop->found_posts;
				
				if ( $degrees_loop-> have_posts() ) : ?>
                    <div class="activity-container">
                        <div class="info-header info-title">
                            <i class="fa fa-graduation-cap"></i> Degrees (<?php echo $degrees_num_posts; ?>)
                        </div><!-- .info-header .info-title -->
				<?php 
				endif;
				$i = 0;
				// Loop
				while ( $degrees_loop-> have_posts() ) : $degrees_loop-> the_post(); 
					if (($i % 2) == 0 ) {
						echo $i > 0 ? '</div>' : ''; // close div if it's not the first
						echo '<div class="column-wrapper">';	
					}
					?>	
                        <div class="column-item">
                            <header class="entry-header">
                            </header><!--.entry-header -->
                            <div class="entry-content">
                                <p>
                                <?php
                                    if(get_post_meta($post->ID, 'degree', true)) :
                                        echo '<span class="activity-title">' . get_post_meta($post->ID, 'degree', true) . '</span>'; 
                                    endif;
                                    if(get_post_meta($post->ID, 'year', true)) : 
                                        echo '<br />' . get_post_meta($post->ID, 'year', true); 
                                    endif; 
                                    if(get_post_meta($post->ID, 'institution', true)) : 
                                        echo '<br />' . get_post_meta($post->ID, 'institution', true); 
                                    endif;
                                    if(get_post_meta($post->ID, 'city', true)) : 
                                        echo '<br />' . get_post_meta($post->ID, 'city', true); 
                                    endif;
                                    if(get_post_meta($post->ID, 'state', true)) : 
                                        echo ', ' . get_post_meta($post->ID, 'state', true); 
                                    endif;
                                ?>
                                </p>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( 'Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                        </div><!-- .column-item -->
				<?php
				$i++;
				endwhile; // end of the loop.
				if ( $degrees_loop-> have_posts() ) : ?>
                	</div><!-- close last .column-wraper div -->
                </div><!-- .activity-container -->
				<?php
				endif;
				
				/* Restore original post data */
				wp_reset_postdata(); 
				
				// Gathers information from Certifications post type.
				$certifications_loop = new WP_Query(
					array(
						'post_type' => 'certifications',
						'post_per_page' => -1,
						'nopaging' => true
					)
				);
				
				$certifications_num_posts = $certifications_loop->found_posts;
				
				if ( $certifications_loop-> have_posts() ) : ?>
                    <div class="activity-container">
                        <div class="info-header info-title">
                            <i class="fa fa-certificate"></i> Certifications (<?php echo $certifications_num_posts; ?>)
                        </div><!-- .info-header .info-title -->
				<?php 
				endif;
				$i = 0;
				// Loop
				while ( $certifications_loop-> have_posts() ) : $certifications_loop-> the_post(); 
					if (($i % 2) == 0 ) {
						echo $i > 0 ? '</div>' : ''; // close div if it's not the first
						echo '<div class="column-wrapper">';	
					}
					?>	
                        <div class="column-item">
                            <header class="entry-header">
                            </header><!--.entry-header -->
                            <div class="entry-content">
                                <p>
                                <?php
                                    if(get_post_meta($post->ID, 'certification', true)) :
                                        echo '<span class="activity-title">' . get_post_meta($post->ID, 'certification', true) . '</span>'; 
                                    endif;
                                    if(get_post_meta($post->ID, 'year', true)) : 
                                        echo '<br />' . get_post_meta($post->ID, 'year', true); 
                                    endif; 
                                ?>
                                </p>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( 'Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                        </div><!-- .column-item -->
				<?php
				$i++;
				endwhile; // end of the loop.
				if ( $certifications_loop-> have_posts() ) : ?>
                	</div><!-- close last .column-wraper div -->
                </div><!-- .activity-container -->
				<?php
				endif;
				
				/* Restore original post data */
				wp_reset_postdata(); 
				
				// Gathers information from Research post type.
                $research_count = get_option( 'num_posts_research_interests' ); // Gets number of posts from options page
				
				// Checks for negative count or NULL sets default of 5
				if ( $research_count <= 0 || $research_count == NULL ) {
					$research_count = 5;	
				}
				
				if ( $research_count != 0 ) {
					
					$research_loop = new WP_Query(
						array(
							'post_type' => 'research',
							'post_per_page' => -1,
							'nopaging' => true,
							'meta_key' => 'faculty_featured_response',
							'orderby' => array(
								'faculty_featured_response' => 'DESC',
								'date' => 'DESC')
						)
					);
					
					$research_num_posts = $research_loop->found_posts;
					
					if ( $research_loop-> have_posts() ) : ?>
                        <div class="activity-container research-interests">
                            <div class="info-header info-title">
                                <i class="fa fa-bar-chart"></i> Research Interests (<?php echo $research_num_posts; ?>)
                                <?php if ( $research_num_posts > $research_count ) : ?>
                                    <span class="latest-posts">
                                        <span class="research-interests-all">Showing <?php echo $research_count; ?> of <?php echo $research_num_posts; ?>.</span>
                                        <span class="research-interests-less">Showing <?php echo $research_num_posts; ?> of <?php echo $research_num_posts; ?>.</span>
                                        <span class="research-interests-show-all"> Show All <i class="fa fa-arrow-circle-o-down"></i></span>
                                        <span class="research-interests-show-less"> Show Less <i class="fa fa-arrow-circle-o-up"></i></span>
                                    </span>
                                <?php endif; ?>
                            </div><!-- .info-header .info-title -->
					<?php
					endif;
					$count = 1;
					// Loop
					while ($research_loop-> have_posts() ) :$research_loop-> the_post(); ?>
                     	<div class="column-row
						<?php
                        if ($count > $research_count) :
                            echo ' research-interests-toggle';
                        endif;
                        ?>
                        ">
                            <header class="entry-header">
                                <p class="activity-title">
                                    <?php
                                        // Display a thumb tack at the top if this post is featured
                                        if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
                                            echo '<i class="fa fa-thumb-tack"></i> ';
                                        }
                                    ?> 
                                   <?php the_title(); ?>
                                </p>
                            </header><!--.entry-header -->
                            <div class="entry-content">
                                <?php the_content(); ?>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                      	</div><!-- .column-row -->
					<?php
					$count++;
					endwhile; // end of the loop.
					if ( $research_loop-> have_posts() ) : ?>
					</div><!-- .activity-container .research-interests -->
					<?php
					endif;
					
					/* Restore original post data */
					wp_reset_postdata();
				
				}
				
				// Gathers information from Expertise post type.
                $expertise_count = get_option( 'num_posts_expertise' ); // Gets number of posts from options page
				
				// Checks for negative count or NULL sets default of 5
				if ( $expertise_count <= 0 || $expertise_count == NULL ) {
					$expertise_count = 5;	
				}
				
				if ( $expertise_count != 0 ) {
					
					$expertise_loop = new WP_Query(
						array(
							'post_type' => 'expertise',
							'post_per_page' => -1,
							'nopaging' => true,
							'meta_key' => 'faculty_featured_response',
							'orderby' => array(
								'faculty_featured_response' => 'DESC',
								'date' => 'DESC')
						)
					);
					
					$expertise_num_posts = $expertise_loop->found_posts;
					
					if ( $expertise_loop-> have_posts() ) : ?>
                        <div class="activity-container expertise">
                            <div class="info-header info-title">
                            	<i class="fa fa-lightbulb-o"></i> Expertise (<?php echo $expertise_num_posts; ?>)
                                <?php if ( $expertise_num_posts > $expertise_count ) : ?>
                                    <span class="latest-posts">
                                        <span class="expertise-all">Showing <?php echo $expertise_count; ?> of <?php echo $expertise_num_posts; ?>.</span>
                                        <span class="expertise-less">Showing <?php echo $expertise_num_posts; ?> of <?php echo $expertise_num_posts; ?>.</span>
                                        <span class="expertise-show-all"> Show All <i class="fa fa-arrow-circle-o-down"></i></span>
                                        <span class="expertise-show-less"> Show Less <i class="fa fa-arrow-circle-o-up"></i></span>
                                    </span>
                                <?php endif; ?>
                            </div><!-- .info-header .info-title -->
					<?php 
					endif;
                    $i = 0;
					$count = 1;
					// Loop
					while ( $expertise_loop-> have_posts() ) : $expertise_loop-> the_post(); 
						if (($i % 2) == 0 ) {
							echo $i > 0 ? '</div>' : ''; // close div if it's not the first
							echo '<div class="column-wrapper">';	
						}
						?>
                            <div class="column-item
                            <?php
							if ($count > $expertise_count) :
								echo ' expertise-toggle';
							endif;
							?>
                            ">
                                <header class="entry-header">
                                    <p class="activity-title">
										<?php
                                            // Display a thumb tack at the top if this post is featured
                                            if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
                                                echo '<i class="fa fa-thumb-tack"></i> ';
                                            }
                                        ?> 
                                        <?php echo soe_faculty_custom_content(); ?>
                                    </p>
                                </header><!--.entry-header -->
                                <div class="entry-content">
                                    <div class="entry-meta">
                                        <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                    </div><!-- .entry-meta -->
                                </div><!-- .entry-content -->
                            </div><!-- .column-item -->
					<?php
                    $i++;
					$count++;
					endwhile; // end of the loop.
					if ( $expertise_loop-> have_posts() ) : ?>
						</div><!-- close last .column-wraper div -->
					</div><!-- .activity-container .expertise -->
					<?php
					endif;
					
					/* Restore original post data */
					wp_reset_postdata();
					
				}
				
				// Gathers information from Publications post type.
                $publications_count = get_option( 'num_posts_publications' ); // Gets number of posts from options page
				
				// Checks for negative count or NULL sets default of 5
				if ( $publications_count <= 0 || $publications_count == NULL ) {
					$publications_count = 5;	
				}
				
				if ( $publications_count != 0 ) {
				
					$publications_loop = new WP_Query(
						array(
							'post_type' => 'publications',
							'post_per_page' => -1,
							'nopaging' => true,
							'meta_key' => 'faculty_featured_response',
							'orderby' => array(
								'faculty_featured_response' => 'DESC',
								'date' => 'DESC')
						)
					);
					
					$publications_num_posts = $publications_loop->found_posts;
					
					if ( $publications_loop-> have_posts() ) : ?>
                        <div class="activity-container publications">
                            <div class="info-header info-title">
                                <i class="fa fa-book"></i> Select Publications (<?php echo $publications_num_posts; ?>)
                                <?php if ( $publications_num_posts > $publications_count ) : ?>
                                    <span class="latest-posts">
                                        <span class="publications-all">Showing <?php echo $publications_count; ?> of <?php echo $publications_num_posts; ?>.</span>
                                        <span class="publications-less">Showing <?php echo $publications_num_posts; ?> of <?php echo $publications_num_posts; ?>.</span>
                                        <span class="publications-show-all"> Show All <i class="fa fa-arrow-circle-o-down"></i></span>
                                        <span class="publications-show-less"> Show Less <i class="fa fa-arrow-circle-o-up"></i></span>
                                    </span>
                                <?php endif; ?>
                            </div><!-- .info-header .info-title -->
					<?php
					endif;
					$count = 1;	
					// Loop
					while ( $publications_loop-> have_posts() ) : $publications_loop-> the_post(); ?>
                     	<div class="column-row
						<?php
                        if ($count > $publications_count) :
                            echo ' publications-toggle';
                        endif;
                        ?>
                        ">
                            <header class="entry-header">
                                <p class="activity-title">
                                	<?php
										// Display a thumb tack at the top if this post is featured
										if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
											echo '<i class="fa fa-thumb-tack"></i> ';
										}
									?> 
                                    <?php the_title(); ?>
                                </p>
                            </header><!--.entry-header -->
                            <div class="entry-content">
                                <p><?php echo soe_faculty_custom_content(); ?></p>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                      	</div><!-- .column-row -->
					<?php
					$count++;
					endwhile; // end of the loop.
					if ( $publications_loop-> have_posts() ) : ?>
					</div><!-- .activity-container .publications -->
					<?php
					endif;
					
					/* Restore original post data */
					wp_reset_postdata();
					
				}
				
				// Gathers information from Presentations post type.
                $presentations_count = get_option( 'num_posts_presentations' ); // Gets number of posts from options page
				
				// Checks for negative count or NULL sets default of 5
				if ( $presentations_count <= 0 || $presentations_count == NULL ) {
					$presentations_count = 5;	
				}
				
				if ( $presentations_count != 0 ) {
					
					$presentations_loop = new WP_Query(
						array(
							'post_type' => 'presentations',
							'post_per_page' => -1,
							'nopaging' => true,
							'meta_key' => 'faculty_featured_response',
							'orderby' => array(
								'faculty_featured_response' => 'DESC',
								'date' => 'DESC')
						)
					);
					
					$presentations_num_posts = $presentations_loop->found_posts;
					
					if ( $presentations_loop-> have_posts() ) : ?>
                        <div class="activity-container presentations">
                            <div class="info-header info-title">
                                <i class="fa fa-video-camera"></i> Select Presentations (<?php echo $presentations_num_posts; ?>)
                                <?php if ( $presentations_num_posts > $presentations_count ) : ?>
                                    <span class="latest-posts">
                                        <span class="presentations-all">Showing <?php echo $presentations_count; ?> of <?php echo $presentations_num_posts; ?>.</span>
                                        <span class="presentations-less">Showing <?php echo $presentations_num_posts; ?> of <?php echo $presentations_num_posts; ?>.</span>
                                        <span class="presentations-show-all"> Show All <i class="fa fa-arrow-circle-o-down"></i></span>
                                        <span class="presentations-show-less"> Show Less <i class="fa fa-arrow-circle-o-up"></i></span>
                                    </span>
                                <?php endif; ?>
                            </div><!-- .info-header .info-title -->
					<?php
					endif;
					$count = 1;	
					// Loop
					while ( $presentations_loop-> have_posts() ) : $presentations_loop-> the_post(); ?>
                        <div class="column-row
						<?php
                        if ($count > $presentations_count) :
                            echo ' presentations-toggle';
                        endif;
                        ?>
                        ">   
                            <header class="entry-header">
                                <p class="activity-title">
                                	<?php
										// Display a thumb tack at the top if this post is featured
										if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
											echo '<i class="fa fa-thumb-tack"></i> ';
										}
									?> 
                                    <?php the_title(); ?>
                                </p>
                            </header><!--.entry-header -->
                            <div class="entry-content">
                                <p><?php echo soe_faculty_custom_content(); ?></p>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                        </div><!-- .column-row -->
					<?php
					$count++;
					endwhile; // end of the loop.
					if ( $presentations_loop-> have_posts() ) : ?>
					</div><!-- .activity-container .presentations -->
					<?php
					endif;
					
					/* Restore original post data */
					wp_reset_postdata();
				
				}
				
				// Gathers information from Awards post type.
                $awards_count = get_option( 'num_posts_awards' ); // Gets number of posts from options page
				
				// Checks for negative count or NULL sets default of 5
				if ( $awards_count <= 0 || $awards_count == NULL ) {
					$awards_count = 5;	
				}
				
				if ( $awards_count != 0 ) {
				
					$awards_loop = new WP_Query(
						array(
							'post_type' => 'awards',
							'post_per_page' => -1,
							'nopaging' => true,
							'meta_key' => 'faculty_featured_response',
							'orderby' => array(
								'faculty_featured_response' => 'DESC',
								'date' => 'DESC')
						)
					);
					
					$awards_num_posts = $awards_loop->found_posts;
					
					if ( $awards_loop-> have_posts() ) : ?>
                        <div class="activity-container awards">
                            <div class="info-header info-title">
                            	<i class="fa fa-trophy"></i> Awards &amp; Honors (<?php echo $awards_num_posts; ?>)
                                <?php if ( $awards_num_posts > $awards_count ) : ?>
                                    <span class="latest-posts">
                                        <span class="awards-all">Showing <?php echo $awards_count; ?> of <?php echo $awards_num_posts; ?>.</span>
                                        <span class="awards-less">Showing <?php echo $awards_num_posts; ?> of <?php echo $awards_num_posts; ?>.</span>
                                        <span class="awards-show-all"> Show All <i class="fa fa-arrow-circle-o-down"></i></span>
                                        <span class="awards-show-less"> Show Less <i class="fa fa-arrow-circle-o-up"></i></span>
                                    </span>
                                <?php endif; ?>
                            </div><!-- .info-header .info-title -->
					<?php 
					endif;
					$count = 1;
					// Loop
					while ( $awards_loop-> have_posts() ) : $awards_loop-> the_post(); ?>
                    	 <div class="column-row
						<?php
                        if ($count > $awards_count) :
                            echo ' awards-toggle';
                        endif;
                        ?>
                        ">
                            <header class="entry-header">
                                <p class="activity-title">
                                    <?php
                                        // Display a thumb tack at the top if this post is featured
                                        if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
                                            echo '<i class="fa fa-thumb-tack"></i> ';
                                        }
                                    ?> 
                                    <?php the_title(); ?>
                                </p>
                            </header><!--.entry-header -->
                            <div class="entry-content">
                            	<p><?php echo soe_faculty_custom_content(); ?></p>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                        </div><!-- .column-row-->
					<?php
					$count++;
					endwhile; // end of the loop.
					if ( $awards_loop-> have_posts() ) : ?>
					</div><!-- .activity-container .awards -->
					<?php
					endif;
					
					/* Restore original post data */
					wp_reset_postdata();
					
				}
				
				// Gathers information from Grants post type for internal grants.
                $grant_count = get_option( 'num_posts_grants' ); // Gets number of posts from options page
								
				// Checks for negative count or NULL sets default of 5
				if ( $grant_count <= 0 || $grant_count == NULL ) {
					$grant_count = 5;	
				}
				
				if ( $grant_count != 0 ) {
					
					$internal_grants_loop = new WP_Query(
						array(
							'post_type' => 'grants',
							'post_per_page' => -1,
							'nopaging' => true,
							'meta_key' => 'faculty_featured_response',
							'orderby' => array(
								'faculty_featured_response' => 'DESC',
								'date' => 'DESC'
							),
							'meta_query' => array(
								array(
									'key' => 'grant_internal_external',
									'value' => 'Internal'
								),
								array(
									'key' => 'faculty_featured_response'
								),
							)
						)
					);
					
					$internal_grants_num_posts = $internal_grants_loop->found_posts;
					
					if ( $internal_grants_loop-> have_posts() ) : ?>
                        <div class="activity-container grants">
                            <div class="info-header info-title">
                                <i class="fa fa-usd"></i> Internal Grants (<?php echo $internal_grants_num_posts; ?>)
                                <?php if ( $internal_grants_num_posts > $grant_count ) : ?>
                                    <span class="latest-posts">
                                        <span class="internal-grants-all">Showing <?php echo $grant_count; ?> of <?php echo $internal_grants_num_posts; ?>.</span>
                                        <span class="internal-grants-less">Showing <?php echo $internal_grants_num_posts; ?> of <?php echo $internal_grants_num_posts; ?>.</span>
                                        <span class="internal-grants-show-all"> Show All <i class="fa fa-arrow-circle-o-down"></i></span>
                                        <span class="internal-grants-show-less"> Show Less <i class="fa fa-arrow-circle-o-up"></i></span>
                                    </span>
                                <?php endif; ?>
                            </div><!-- .info-header .info-title -->
					<?php
					endif;
					$count = 1;
					// Loop
					while ( $internal_grants_loop-> have_posts() ) : $internal_grants_loop-> the_post(); ?>
                        <div class="column-row
                        <?php
                        if ($count > $grant_count) :
                            echo ' internal-grants-toggle';
                        endif;
                        ?>
                        ">	
                            <header class="entry-header">
                                <p class="activity-title">
                                    <?php
                                        // Display a thumb tack at the top if this post is featured
                                        if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
                                            echo '<i class="fa fa-thumb-tack"></i> ';
                                        }
                                    ?> 
                                    <?php the_title(); ?>
                                </p>
                            </header><!--.entry-header -->
                            <div class="entry-content">
                            	<p><?php echo soe_faculty_custom_content(); ?></p>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                        </div><!-- .column-row-->
					<?php
					$count++;
					endwhile; // end of the loop.
					if ( $internal_grants_loop-> have_posts() ) : ?>
					</div><!-- .activity-container .grants -->
					<?php
					endif;
					
					/* Restore original post data */
					wp_reset_postdata();
				}
					
				// Gathers information from Grants post type for external grants.
               $grant_count = get_option( 'num_posts_grants' ); // Gets number of posts from options page
								
				// Checks for negative count or NULL sets default of 5
				if ($grant_count <= 0 || $grant_count == NULL ) {
					$grant_count = 5;	
				}
				
				if ( $grant_count != 0 ) { 
				
					$external_grants_loop = new WP_Query(
							array(
							'post_type' => 'grants',
							'post_per_page' => -1,
							'nopaging' => true,
							'meta_key' => 'faculty_featured_response',
							'orderby' => array(
								'faculty_featured_response' => 'DESC',
								'date' => 'DESC'
							),
							'meta_query' => array(
								array(
									'key' => 'grant_internal_external',
									'value' => 'External'
								),
								array(
									'key' => 'faculty_featured_response'
								),
							)
						)
					);
						
					$external_grants_num_posts =$external_grants_loop->found_posts;
					
					if ($external_grants_loop-> have_posts() ) : ?>
						<div class="activity-container grants">
							<div class="info-header info-title">
								<i class="fa fa-usd"></i> External Grants (<?php echo$external_grants_num_posts; ?>)
								<?php if ($external_grants_num_posts >$grant_count ) : ?>
									<span class="latest-posts">
										<span class="external-grants-all">Showing <?php echo$grant_count; ?> of <?php echo$external_grants_num_posts; ?>.</span>
										<span class="external-grants-less">Showing <?php echo$external_grants_num_posts; ?> of <?php echo$external_grants_num_posts; ?>.</span>
										<span class="external-grants-show-all"> Show All <i class="fa fa-arrow-circle-o-down"></i></span>
										<span class="external-grants-show-less"> Show Less <i class="fa fa-arrow-circle-o-up"></i></span>
									</span>
								<?php endif; ?>
							</div><!-- .info-header .info-title -->
					<?php
					endif;
					$count = 1;
					// Loop
					while ($external_grants_loop-> have_posts() ) :$external_grants_loop-> the_post(); ?>
                        <div class="column-row
                        <?php
                        if ($count >$grant_count) :
                            echo ' external-grants-toggle';
                        endif;
                        ?>
                        ">	
                            <header class="entry-header">
                                <p class="activity-title">
                                    <?php
                                        // Display a thumb tack at the top if this post is featured
                                        if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
                                            echo '<i class="fa fa-thumb-tack"></i> ';
                                        }
                                    ?> 
                                    <?php the_title(); ?>
                                </p>
                            </header><!--.entry-header -->
                            <div class="entry-content">
                            	<p><?php echo soe_faculty_custom_content(); ?></p>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                        </div><!-- .column-row -->
					<?php
					$count++;
					endwhile; // end of the loop.
					if ($external_grants_loop-> have_posts() ) : ?>
					</div><!-- .activity-container .grants -->
					<?php
					endif;
					
					/* Restore original post data */
					wp_reset_postdata();
				}
				
				// Gathers information from Profesional Leadership post type.
				$leadership_count = get_option( 'num_posts_professional_leadership' ); // Gets number of posts from options page
						
				// Checks for negative count or NULL sets default of 5
				if ( $leadership_count <= 0 || $leadership_count == NULL ) {
					$leadership_count = 5;	
				}
				
				if ( $leadership_count != 0 ) {
					
					$leadership_loop = new WP_Query(
						array(
							'post_type' => 'leadership',
							'post_per_page' => -1,
							'nopaging' => true,
							'meta_key' => 'faculty_featured_response',
							'orderby' => array(
								'faculty_featured_response' => 'DESC',
								'date' => 'DESC')
						)
					);
					
					$leadership_num_posts = $leadership_loop->found_posts;
					
					if ( $leadership_loop-> have_posts() ) : ?>
						<div class="activity-container professional-leadership">
							<div class="info-header info-title">
								<i class="fa fa-users"></i> Professional Leadership (<?php echo $leadership_num_posts; ?>)
								<?php if ( $leadership_num_posts > $leadership_count ) : ?>
									<span class="latest-posts">
										<span class="professional-leadership-all">Showing <?php echo $leadership_count; ?> of <?php echo $leadership_num_posts; ?>.</span>
										<span class="professional-leadership-less">Showing <?php echo $leadership_num_posts; ?> of <?php echo $leadership_num_posts; ?>.</span>
										<span class="professional-leadership-show-all"> Show All <i class="fa fa-arrow-circle-o-down"></i></span>
										<span class="professional-leadership-show-less"> Show Less <i class="fa fa-arrow-circle-o-up"></i></span>
									</span>
								<?php endif; ?>
							</div><!-- .info-header .info-title -->
					<?php
					endif;
					$count = 1;
					// Loop
					while ( $leadership_loop-> have_posts() ) : $leadership_loop-> the_post(); ?>
                        <div class="column-row
                        <?php
                        if ($count > $leadership_count) :
                            echo ' professional-leadership-toggle';
                        endif;
                        ?>
                        ">
                            <header class="entry-header">
                                <p class="activity-title">
                                    <?php
                                        // Display a thumb tack at the top if this post is featured
                                        if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
                                            echo '<i class="fa fa-thumb-tack"></i> ';
                                        }
                                    ?> 
                                    <?php the_title(); ?>
                                </p>
                            </header><!--.entry-header -->
                            <div class="entry-content">
                            	<p><?php echo soe_faculty_custom_content(); ?></p>
                                <div class="entry-meta">
                                    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->
                        </div><!-- .column-row -->
					<?php
					$count++;
					endwhile; // end of the loop.
					if ( $leadership_loop-> have_posts() ) : ?>
						</div><!-- close last .column-wraper div -->
					</div><!-- .activity-container .professional-leadership -->
					<?php
					endif;
					
					/* Restore original post data */
					wp_reset_postdata(); 
					
				}
				
				// Gathers information from Professional Affiliations post type.	
				$affiliations_loop = new WP_Query(
					array(
						'post_type' => 'affiliations',
						'post_per_page' => -1,
						'nopaging' => true
					)
				);
				
				$affiliations_num_posts = $affiliations_loop->found_posts;
				
				if ( $affiliations_loop-> have_posts() ) : ?>
					<div class="activity-container affiliations">
						<div class="info-header info-title">
							<i class="fa fa-sitemap"></i> Affiliations (<?php echo $affiliations_num_posts; ?>)
						</div><!-- .info-header .info-title -->
				<?php
				endif;
				$i = 0;
				// Loop
				while ( $affiliations_loop-> have_posts() ) : $affiliations_loop-> the_post(); 
					if (($i % 2) == 0 ) {
						echo $i > 0 ? '</div>' : ''; // close div if it's not the first
						echo '<div class="column-wrapper">';	
					}
					?>
						<div class="column-item">
							<header class="entry-header">
								<p class="activity-title">
									<?php the_title(); ?>
								</p>
							</header><!--.entry-header -->
							<div class="entry-content">
								<div class="entry-meta">
									<?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
								</div><!-- .entry-meta -->
							</div><!-- .entry-content -->
						</div><!-- .column-item -->
				<?php
				$i++;
				endwhile; // end of the loop.
				if ( $affiliations_loop-> have_posts() ) : ?>
					</div><!-- close last .column-wraper div -->
				</div><!-- .activity-container .affiliations -->
				<?php
				endif;
				
				/* Restore original post data */
				wp_reset_postdata(); 
				
				// Gathers information from Teaching Philosophies post type.	
				$philosophies_loop = new WP_Query(
					array(
						'post_type' => 'philosophy',
						'post_per_page' => -1,
						'nopaging' => true
					)
				);
				
				$philosophies_num_posts = $philosophies_loop->found_posts;
				
				if ( $philosophies_loop-> have_posts() ) : ?>
					<div class="activity-container philosophies">
						<div class="info-header info-title">
							<i class="fa fa-cogs"></i> Teaching Philosophies (<?php echo $philosophies_num_posts; ?>)
						</div><!-- .info-header .info-title -->
				<?php
				endif;
				// Loop
				while ( $philosophies_loop-> have_posts() ) : $philosophies_loop-> the_post(); ?>
					<div class="column-row">
						<header class="entry-header">
							<p class="activity-title">
								<?php the_title(); ?>
							</p>
						</header><!--.entry-header -->
						<div class="entry-content">
							<p><?php  echo soe_faculty_custom_content(); ?></p>
							<div class="entry-meta">
								<?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
							</div><!-- .entry-meta -->
						</div><!-- .entry-content -->
					</div><!-- .column-row -->
				<?php
				endwhile; // end of the loop.
				if ( $philosophies_loop-> have_posts() ) : ?>
				</div><!-- .activity-container .philosophies -->
				<?php
				endif;
				
				/* Restore original post data */
				wp_reset_postdata();
				
				// Gathers information from Courses post type.
				$courses_loop = new WP_Query(
					array(
						'post_type' => 'courses',
						'post_per_page' => -1,
						'nopaging' => true
					)
				);
				
				$courses_num_posts = $courses_loop->found_posts;
				
				if ( $courses_loop-> have_posts() ) : ?>
					<div class="activity-container">
						<div class="info-header info-title">
							<i class="fa fa-university"></i> Courses (<?php echo $courses_num_posts; ?>)
						</div><!-- .info-header .info-title -->
				<?php
				endif;
				$i = 0;
				// Loop
				while ( $courses_loop-> have_posts() ) : $courses_loop-> the_post(); 
					if (($i % 2) == 0 ) {
						echo $i > 0 ? '</div>' : ''; // close div if it's not the first
						echo '<div class="column-wrapper">';	
					}
					?>
						<div class="column-item">
							<header class="entry-header">
								<p class="activity-title">
									<?php the_title(); ?>
								</p>
							</header><!--.entry-header -->
							<div class="entry-content">
								<div class="entry-meta">
									<?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
								</div><!-- .entry-meta -->
							</div><!-- .entry-content -->
						</div><!-- .column-item -->
				<?php
				$i++;
				endwhile; // end of the loop.
				if ( $courses_loop-> have_posts() ) : ?>
					</div><!-- close last .column-wraper div -->
				</div><!-- .activity-container -->
				<?php
				endif;
				
				/* Restore original post data */
				wp_reset_postdata();
					
				?>
                </div><!-- .index-box -->
            </article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>