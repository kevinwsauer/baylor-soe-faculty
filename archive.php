<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SOE-Faculty
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
				<?php
					if ( is_category() ) :
						printf( __( 'Activity in the ', 'soe-faculty' ) );
						echo '<em>';
						single_cat_title();
						echo '</em> ' . __('category', 'soe-faculty') . ':';
					
					elseif ( is_tag() ) :
						printf( __( 'Activity with the ', 'soe-faculty' ) );
						echo '<em>';
						single_tag_title();
						echo '</em> ' . __('tag', 'soe-faculty') . ':';
					
					elseif ( is_author() ) :
						printf( __( 'Activity from Author: %s', 'soe-faculty' ), '<span class="vcard">' . get_the_author() . '</span>' );
					
					elseif ( is_day() ) :
						printf( __( 'Activity from %s', 'soe-faculty' ), '<span>' . get_the_date() . '</span>' );
					
					elseif ( is_month() ) :
						printf( __( 'Activity from %s', 'soe-faculty' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'soe-faculty' ) ) . '</span>' );
					
					elseif ( is_year() ) :
						printf( __( 'Activity from %s', 'soe-faculty' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'soe-faculty' ) ) . '</span>' );
					
					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						_e( 'Asides', 'soe-faculty' );
						
					else :
						_e( 'Archives', 'soe-faculty' );
					
					endif;
                ?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<section id="masonry-index" class="group clear"> 
            
			<?php get_sidebar('2'); ?>     
            
			<?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
            
                <?php
                    get_template_part( 'content', get_post_format() );
                ?>
            
			<?php endwhile; ?>
          
            </section><!-- #masonry-index -->
            
            <?php echo soe_faculty_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
