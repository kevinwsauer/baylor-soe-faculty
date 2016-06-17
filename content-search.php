<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SOE-Faculty
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="index-box"> 
        <?php 
			$header = '<div class="other-header"><i class="fa fa-sticky-note"></i> Other</div>';
			if ( 'research' == get_post_type() ) :
				$header = '<div class="research-header"><i class="fa fa-bar-chart"></i> Research Interest</div>';	
			endif;
			
			if ( 'expertise' == get_post_type() ) :
				$header = '<div class="expertise-header"><i class="fa fa-lightbulb-o"></i> Expertise</div>';
			endif;
			
			if ( 'publications' == get_post_type() ) :
				$header = '<div class="publications-header"><i class="fa fa-book"></i> Publication</div>';
			endif;
			
			if ( 'presentations' == get_post_type() ) :
				$header = '<div class="presentations-header"><i class="fa fa-video-camera"></i> Presentation</div>';
			endif;
			
			if ( 'awards' == get_post_type() ) :
				$header = '<div class="awards-header"><i class="fa fa-trophy"></i> Award</div>';	
			endif;
			
			if ( 'grants' == get_post_type() ) :
				$header = '<div class="grants-header"><i class="fa fa-usd"></i> Grant';
				if ( get_post_meta( get_the_ID(), 'grant_internal_external', true ) == 'Internal' ) : 
					$header .= ' (Internal)';
				elseif ( get_post_meta( get_the_ID(), 'grant_internal_external', true ) == 'External' ) : 
					$header .= ' (External)';
				else: 
					// Do Nothing
				endif;
				$header .= '</div>';	
			endif;
				
			if ( 'leadership' == get_post_type() ) :
				$header = '<div class="leadership-header"><i class="fa fa-users"></i> Professional Leadership</div>';
			endif;
			
			echo $header;
			if (has_post_thumbnail()) {
				echo '<div class="class="small-index-thumbnail clear"">';
				echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'soe-faculty') . get_the_title() . '" rel="bookmark">';
				echo the_post_thumbnail('large-thumb');
				echo '</a>';
				echo '</div>';
			}
		?>  
        <header class="entry-header clear">
			<?php
                // Display a thumb tack at the top if this post is featured
                if ( (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true) === 1 ) {
                    echo '<div class="featured-post"><i class="fa fa-thumb-tack"></i> Featured</div>';
                }
            ?>  
			<?php
                /* translators: used between list items, there is a space after the comma */
                $category_list = get_the_category_list( __( ', ', 'soe-faculty' ) );
            
                if ( soe_faculty_categorized_blog() ) {
                    echo '<div class="category-list">' . $category_list . '</div>';
                }
            ?> 
            <h1 class="entry-title">
            <?php if ( 'post' == get_post_type() ) : ?>
            	<a href="<?php the_permalink(); ?>" rel="bookmark">
	   		<?php endif; ?>
			<?php
			if ( 'expertise' == get_post_type() ) :
				echo soe_faculty_custom_content();
			else :
				the_title(); 
            endif;
			?>
            <?php if ( 'post' == get_post_type() ) : ?>
            	</a>
            <?php endif; ?>
            </h1>
            <?php echo get_the_tag_list( '<ul class="tag-list"><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' ); ?>   
            <div class="entry-meta">
                <?php soe_faculty_posted_on(); ?>
                <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>  
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->
        <div class="entry-content">
		<?php
			if ( 'publications' == get_post_type() || 'presentations' == get_post_type() || 'awards' == get_post_type() || 'grants' == get_post_type() || 'leadership' == get_post_type() ) :
				echo '<p>' . soe_faculty_custom_content() . '</p>';
			elseif ( 'research' == get_post_type() ) :
				the_content();
			elseif ( 'post' == get_post_type() ) :
				the_excerpt();
			else :
				// Do not include
			endif;
		?>
        </div><!-- .entry-content -->
        <?php if ( 'post' == get_post_type() ) : ?>
            <footer class="entry-footer continue-reading">
                <a href="<?php echo get_permalink(); ?>" title="<?php echo  __('View ', 'soe-faculty') . get_the_title(); ?>" rel="bookmark">View <i class="fa fa-arrow-circle-o-right"></i></a>
            </footer><!-- .entry-footer --> 
        <?php endif; ?>   
    </div><!-- .index-box -->
</article><!-- #post-## -->
