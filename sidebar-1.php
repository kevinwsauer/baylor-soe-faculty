<?php
/**
 * The left sidebar containing a widget area.
 *
 * @package SOE-Faculty
 */
?>
<?php if ( is_front_page() ) : ?>
	<div id="profile-widgets">
<?php else : ?>
	<div id="secondary" class="widget-area" role="complementary">
<?php endif; ?>

<?php
	// Menu Widget
	echo '<aside class="widget widget_nav_menu">';
	echo '<h1 class="widget-title">' . __( 'Main Menu' ) . '</h1>';
	soe_faculty_sidebar_menu();
	echo '</aside>';

	// Categories Widget
	$categories_instance = array(
		'title' => __( 'Categories' ),
		'count' => 1,
		'hierarchical' => 1
	);
	$categories_args = array(
		'before_widget' => '<aside class="widget widget_categories">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	);
	the_widget( 'WP_Widget_Categories', $categories_instance, $categories_args );

	// Tag Widget
	$tag_instance = array(
		'title' => __( 'Tags' ),
		'taxonomy' => 'post_tag'
	);
	$tag_args = array(
		'before_widget' => '<aside class="widget widget_tag_cloud">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	);
	the_widget( 'WP_Widget_Tag_Cloud', $tag_instance, $tag_args );
	
	if ( is_active_sidebar( 'sidebar-1' ) ) :
		dynamic_sidebar( 'sidebar-1' );
	endif;   
?>

<?php if ( is_front_page() ) : ?>
	</div><!-- #profile-widgets -->
<?php else : ?>
	</div><!-- #secondary -->	
<?php endif; ?>
