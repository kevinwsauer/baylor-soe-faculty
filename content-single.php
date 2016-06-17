<?php
/**
 * @package SOE-Faculty
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<?php 
        if (has_post_thumbnail()) {
            echo '<div class="single-post-thumbnail clear">';
            echo the_post_thumbnail('large-thumb');
            echo '</div>';
        }
    ?>         
    <header class="entry-header">
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
		<?php
        if ( 'expertise' == get_post_type() ) :
            echo soe_faculty_custom_content();
        else :
            the_title(); 
        endif;
        ?>
        </h1>
        <?php echo get_the_tag_list( '<ul class="tag-list"><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' ); ?>     
		<div class="entry-meta">
			<?php soe_faculty_posted_on(); ?> 
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
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'soe-faculty' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
        <?php echo edit_post_link( __( 'Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' ); ?> 
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
