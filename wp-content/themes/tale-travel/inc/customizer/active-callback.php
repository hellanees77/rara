<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

if ( ! function_exists( 'tale_travel_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Tale Travel 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tale_travel_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'tale_travel_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'tale_travel_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Tale Travel 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tale_travel_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'tale_travel_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'tale_travel_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Tale Travel 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tale_travel_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'tale_travel_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'tale_travel_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Tale Travel 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function tale_travel_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tale_travel_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if slider section content type is trip.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_slider_section_content_trip_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[slider_content_type]' )->value();
	return tale_travel_is_slider_section_enable( $control ) && ( 'trip' == $content_type );
}

/**
 * Check if slider section content type is post.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_slider_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[slider_content_type]' )->value();
	return tale_travel_is_slider_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if featured section is enabled.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_featured_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tale_travel_theme_options[featured_section_enable]' )->value() );
}

/**
 * Check if featured section content type is post.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_featured_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[featured_content_type]' )->value();
	return tale_travel_is_featured_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if featured section content type is trip.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_featured_section_content_trip_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[featured_content_type]' )->value();
	return tale_travel_is_featured_section_enable( $control ) && ( 'trip' == $content_type );
}

/**
 * Check if featured section subscribe enable.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_featured_section_subscribe_enable( $control ) {
	return tale_travel_is_featured_section_enable( $control ) && $control->manager->get_setting( 'tale_travel_theme_options[featured_subscribe_enable]' )->value();
}

/**
 * Check if top stories section is enabled.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_top_stories_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tale_travel_theme_options[top_stories_section_enable]' )->value() );
}

/**
 * Check if top stories section content type is category.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_top_stories_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[top_stories_content_type]' )->value();
	return tale_travel_is_top_stories_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if top stories section content type is destination.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_top_stories_section_content_destination_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[top_stories_content_type]' )->value();
	return tale_travel_is_top_stories_section_enable( $control ) && ( 'destination' == $content_type );
}

/**
 * Check if popular trips section is enabled.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_popular_trips_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tale_travel_theme_options[popular_trips_section_enable]' )->value() );
}

/**
 * Check if popular trips section content type is category.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_popular_trips_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[popular_trips_content_type]' )->value();
	return tale_travel_is_popular_trips_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if popular trips section content type is trip types.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_popular_trips_section_content_trip_types_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[popular_trips_content_type]' )->value();
	return tale_travel_is_popular_trips_section_enable( $control ) && ( 'trip-types' == $content_type );
}

/**
 * Check if blog section is enabled.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'tale_travel_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[blog_content_type]' )->value();
	return tale_travel_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Tale Travel 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function tale_travel_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'tale_travel_theme_options[blog_content_type]' )->value();
	return tale_travel_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

