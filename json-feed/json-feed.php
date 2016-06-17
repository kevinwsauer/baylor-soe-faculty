<?php
add_filter('query_vars', 'json_feed_queryvars');

function json_feed_queryvars($qvars)
{
  $qvars[] = 'jsonp';
  $qvars[] = 'date_format';
  $qvars[] = 'remove_uncategorized';
  return $qvars;
}

function json_feed()
{
	$data = array();
    $output = array();
    while (have_posts())
    {
        the_post();
		$data = array
        (
            'id' => (int) $post->ID,
			'featured' => (int) get_post_meta( get_the_ID(), 'faculty_featured_response', true ),
            'permalink' => get_permalink(),
			'author' => get_author_name( $post->ID ),
			'author_link' => get_author_posts_url( get_the_author_meta( $post->ID ), get_the_author_meta( 'user_nicename')),
			'featured_image' => get_the_post_thumbnail( $post->ID, 'large-thumb' ),
            'date' => get_the_time(json_feed_date_format()),
			'site_url' => site_url(),
            'categories' => json_feed_categories(),
            'tags' => json_feed_tags()
        );
		if ( get_post_type() == 'grants' )
		{
			$data['grant_internal_external'] = 	get_post_meta( get_the_ID(), 'grant_internal_external', true );
		}
		if ( get_post_type() == 'publications' || get_post_type() == 'presentations' || get_post_type() == 'awards' || get_post_type() == 'grants' || get_post_type() == 'leadership' ) 
		{
			$data['title'] = get_the_title();
			$data['content'] = soe_faculty_custom_content();
			$data['excerpt'] = '';
		}
		elseif ( get_post_type() == 'expertise' ) 
		{
			$data['title'] = soe_faculty_custom_content();
		}
		else 
		{
			$data['title'] = get_the_title();
			$data['content'] = get_the_content();
            $data['excerpt'] = get_the_excerpt();
		}
		$output[] = $data;
    }
    if (get_query_var('jsonp') == '')
    {
        header('Content-Type: application/json; charset=' . get_option('blog_charset'), true);
        echo json_encode($output);
    }
    else
    {
        header('Content-Type: application/javascript; charset=' . get_option('blog_charset'), true);
        echo get_query_var('jsonp') . '(' . json_encode($output) . ')';
    }
}

function json_feed_fullname_format()
{
	$output= '';
	$full_name = '';
	if ( get_post_meta( get_the_ID(), 'doctorate', true ) && get_post_meta( get_the_ID(), 'doctorate', true ) != '' ) 
	{
		$doctorate = get_post_meta( get_the_ID(), 'doctorate', true );
		if ( $doctorate == 'Yes' )
		{
			$full_name .= 'Dr. ';
		}	
	}
	if ( get_post_meta( get_the_ID(), 'first_name', true ) && get_post_meta( get_the_ID(), 'first_name', true ) != '' ) 
	{
		$full_name .= get_post_meta( get_the_ID(), 'first_name', true ) . ' ';
	}
	if ( get_post_meta( get_the_ID(), 'middle_name', true ) && get_post_meta( get_the_ID(), 'middle_name', true ) != '' ) 
	{
		$full_name .= get_post_meta( get_the_ID(), 'middle_name', true ) . ' ';
	}
	if ( get_post_meta( get_the_ID(), 'last_name', true ) && get_post_meta( get_the_ID(), 'last_name', true ) != '' ) 
	{
		$full_name .= get_post_meta( get_the_ID(), 'last_name', true );		
	}
	if ( get_post_meta( get_the_ID(), 'baylor_title', true ) && get_post_meta( get_the_ID(), 'baylor_title', true ) != '' ) 
	{
		$baylor_title = strtolower( get_post_meta( get_the_ID(), 'baylor_title', true ) );
	}
	if ( $full_name ) 
	{
		$output = sprintf ( '%s', $full_name );	
	}
	if ( $baylor_title ) 
	{
		$output .= sprintf ( ', %s', $baylor_title );
	}
	return $output;
}

function json_feed_date_format()
{
  if (get_query_var('date_format'))
  {
      return get_query_var('date_format');
  }
  else
  {
      return 'F j, Y';
  }
}  

function json_feed_categories()
{
    $categories = get_the_category();
    if (is_array($categories))
    {
        $categories = array_values($categories);
        if (get_query_var('remove_uncategorized'))
        {
            $categories = array_filter($categories, 'json_feed_remove_uncategorized');
        }
        return array_map('json_feed_format_category', $categories);
    }
    else
    {
        return array();
    }
}

function json_feed_remove_uncategorized($category)
{
    if ($category->cat_ID == 1 && $category->slug == 'uncategorized')
    {
        return false;
    }
    else
    {
        return true;
    }
}

function json_feed_format_category($category)
{
    return array
    (
        'id' => (int) $category->cat_ID,
        'title' => $category->cat_name,
        'slug' => $category->slug
    );
}

function json_feed_tags()
{
    $tags = get_the_tags();
    if (is_array($tags))
    {
        $tags = array_values($tags);
        return array_map('json_feed_format_tag', $tags);
    }
    else
    {
        return array();
    }
}

function json_feed_format_tag($tag)
{
    return array
    (
        'id' => (int) $tag->term_id,
        'title' => $tag->name,
        'slug' => $tag->slug
    );
}

add_action('do_feed_json', 'json_feed');

?>