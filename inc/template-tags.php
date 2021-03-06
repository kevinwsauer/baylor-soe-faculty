<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package SOE-Faculty
 */

if ( ! function_exists( 'soe_faculty_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */

function soe_faculty_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '← Previous', 'soe-faculty' ),
		'next_text' => __( 'Next →', 'soe-faculty' ),
        'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'soe-faculty' ); ?></h1>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}               
endif;

if ( ! function_exists( 'soe_faculty_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function soe_faculty_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
    <nav class="navigation post-navigation" role="navigation">
        <div class="post-nav-box clear">
            <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'soe-faculty' ); ?></h1>
            <div class="nav-links">
                <?php
                previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . _x( 'Previous Post:', 'Previous post', 'soe-faculty' ) . '</div><h1>%link</h1></div>', '%title' );
                next_post_link(     '<div class="nav-next"><div class="nav-indicator">' . _x( 'Next Post:', 'Next post', 'soe-faculty' ) . '</div><h1>%link</h1></div>', '%title' );
                ?>
            </div><!-- .nav-links -->
        </div><!-- .post-nav-box -->
    </nav><!-- .navigation -->          
	<?php
}
endif;

if ( ! function_exists( 'soe_faculty_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function soe_faculty_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'soe-faculty' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'soe-faculty' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'soe_faculty_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function soe_faculty_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'soe-faculty' ) );
		if ( $categories_list && soe_faculty_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'soe-faculty' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'soe-faculty' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'soe-faculty' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'soe-faculty' ), __( '1 Comment', 'soe-faculty' ), __( '% Comments', 'soe-faculty' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'soe-faculty' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function soe_faculty_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'soe_faculty_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'soe_faculty_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so soe_faculty_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so soe_faculty_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in soe_faculty_categorized_blog.
 */
function soe_faculty_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'soe_faculty_categories' );
}
add_action( 'edit_category', 'soe_faculty_category_transient_flusher' );
add_action( 'save_post',     'soe_faculty_category_transient_flusher' );

// Main Menu 
function soe_faculty_main_menu() {
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'menu'            => 'Main Menu',
		)
	);
}

/*
 * Social media icon menu as per http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
 */
function soe_faculty_social_menu() {
	wp_nav_menu(
		array(
			'theme_location'  => 'social',
			'menu'            => 'Social Media Menu',
			'container'       => 'div',
			'container_id'    => 'menu-social',
			'container_class' => 'menu-social',
			'menu_id'         => 'menu-social-items',
			'menu_class'      => 'menu-items',
			'depth'           => 1,
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => '',
		)
	);
}  

function soe_faculty_sidebar_menu() {
	wp_nav_menu(
		array(
			'theme_location'  => 'sidebar',
			'menu'            => 'Sidebar Menu',
		)
	);
}  