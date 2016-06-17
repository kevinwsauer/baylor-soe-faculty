<?php
/**
 * @package SOE-Faculty
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="index-box">
        <div class="entry-content">
			
        	<?php the_content(); ?>
       
	    </div><!-- .entry-content -->
        <footer class="entry-footer">
	    	<div class="entry-meta">
               
			    <?php soe_faculty_posted_on(); ?>
               
			    <?php edit_post_link( __( ' Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?>
            
			</div><!-- .entry-meta -->
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->
                