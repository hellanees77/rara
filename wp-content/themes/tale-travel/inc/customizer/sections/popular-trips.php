<?php
/**
 * Popular Trips Section options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add Popular Trips section
$wp_customize->add_section( 'tale_travel_popular_trips_section', array(
	'title'             => esc_html__( 'Popular Trips','tale-travel' ),
	'description'       => esc_html__( 'Popular Trips Section options.', 'tale-travel' ),
	'panel'             => 'tale_travel_front_page_panel',
) );

// Popular Trips content enable control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[popular_trips_section_enable]', array(
	'default'			=> 	$options['popular_trips_section_enable'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[popular_trips_section_enable]', array(
	'label'             => esc_html__( 'Popular Trips Section Enable', 'tale-travel' ),
	'section'           => 'tale_travel_popular_trips_section',
	'on_off_label' 		=> tale_travel_switch_options(),
) ) );

// popular destination title setting and control
$wp_customize->add_setting( 'tale_travel_theme_options[popular_trips_title]', array(
	'default'			=> $options['popular_trips_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tale_travel_theme_options[popular_trips_title]', array(
	'label'           	=> esc_html__( 'Title', 'tale-travel' ),
	'section'        	=> 'tale_travel_popular_trips_section',
	'active_callback' 	=> 'tale_travel_is_popular_trips_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tale_travel_theme_options[popular_trips_title]', array(
		'selector'            => '#most-viewed-posts .section-header h2.section-title',
		'settings'            => 'tale_travel_theme_options[popular_trips_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tale_travel_popular_trips_title_partial',
    ) );
}

// Popular Trips content type control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[popular_trips_content_type]', array(
	'default'          	=> $options['popular_trips_content_type'],
	'sanitize_callback' => 'tale_travel_sanitize_select',
) );

$wp_customize->add_control( 'tale_travel_theme_options[popular_trips_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'tale-travel' ),
	'section'           => 'tale_travel_popular_trips_section',
	'type'				=> 'select',
	'active_callback' 	=> 'tale_travel_is_popular_trips_section_enable',
	'choices'			=> tale_travel_popular_trips_content_type(),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'tale_travel_theme_options[popular_trips_content_category]', array(
	'sanitize_callback' => 'tale_travel_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Tale_Travel_Dropdown_Taxonomies_Control( $wp_customize,'tale_travel_theme_options[popular_trips_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'tale-travel' ),
	'description'      	=> esc_html__( 'Note: Popular Trips selected no of posts will be shown from selected category', 'tale-travel' ),
	'section'           => 'tale_travel_popular_trips_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'tale_travel_is_popular_trips_section_content_category_enable'
) ) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'tale_travel_theme_options[popular_trips_content_trip_types]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Tale_Travel_Dropdown_Taxonomies_Control( $wp_customize,'tale_travel_theme_options[popular_trips_content_trip_types]', array(
	'label'             => esc_html__( 'Select Trip Types', 'tale-travel' ),
	'section'           => 'tale_travel_popular_trips_section',
	'taxonomy'			=> 'itinerary_types',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'tale_travel_is_popular_trips_section_content_trip_types_enable'
) ) );
