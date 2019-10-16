<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 * @return array An array of default values
 */

function tale_travel_get_default_theme_options() {
	$tale_travel_default_options = array(
		// Color Options
		'header_title_color'			=> '#ff8737',
		'header_tagline_color'			=> '#888',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'header_layout'					=> 'center-aligned',

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'tale-travel' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'tale-travel' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,
		'hide_author'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Slider
		'slider_section_enable'			=> true,
		'slider_content_type'			=> 'post',

		// featured
		'featured_section_enable'		=> true,
		'featured_subscribe_enable'		=> false,
		'featured_content_type'			=> 'post',
		'featured_subscribe_title'		=> esc_html__( 'Subscribe to our newsletter and be up to date of our latest articles, activities.', 'tale-travel' ),
		'featured_subscribe_btn_title'	=> esc_html__( 'Join Us', 'tale-travel' ),

		// top stories
		'top_stories_section_enable'	=> true,
		'top_stories_content_type'		=> 'category',
		'top_stories_title'				=> esc_html__( 'Top Stories', 'tale-travel' ),

		// popular trips
		'popular_trips_section_enable'	=> true,
		'popular_trips_content_type'	=> 'category',
		'popular_trips_title'			=> esc_html__( 'Popular Trips', 'tale-travel' ),

		// blog
		'blog_section_enable'			=> true,
		'blog_content_type'				=> 'category',
		'blog_title'					=> esc_html__( 'Latest Blog', 'tale-travel' ),

	);

	$output = apply_filters( 'tale_travel_default_theme_options', $tale_travel_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}