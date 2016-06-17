<?php
/**
 * The index sidebar containing a widget area.
 *
 * @package SOE-Faculty
 */
?>
<div id="secondary" class="widget-area clear" role="complementary">       
<?php
	// Menu Widget
	echo '<article class="index-widget"><div class="index-box"><aside class="widget widget_nav_menu">';
	echo '<h1 class="widget-title">' . __( 'Main Menu' ) . '</h1>';
	soe_faculty_sidebar_menu();
	echo '</aside></div></article>';

	// Categories Widget
	$categories_instance = array(
		'title' => __( 'Categories' ),
		'count' => 1,
		'hierarchical' => 1
	);
	$categories_args = array(
		'before_widget' => '<article class="index-widget"><div class="index-box"><aside class="widget widget_categories">',
		'after_widget'  => '</aside></div></article>',
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
		'before_widget' => '<article class="index-widget"><div class="index-box"><aside class="widget widget_tag_cloud">',
		'after_widget'  => '</aside></div></article>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	);
	the_widget( 'WP_Widget_Tag_Cloud', $tag_instance, $tag_args ); 
	
	if ( is_active_sidebar( 'sidebar-2' ) ) : 
		dynamic_sidebar( 'sidebar-2' ); 
	endif;
?>
</div><!-- #secondary -->