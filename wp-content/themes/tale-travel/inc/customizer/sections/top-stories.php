<?php
/**
 * Top Stories Section options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add Top Stories section
$wp_customize->add_section( 'tale_travel_top_stories_section', array(
	'title'             => esc_html__( 'Top Stories','tale-travel' ),
	'description'       => esc_html__( 'Top Stories Section options.', 'tale-travel' ),
	'panel'             => 'tale_travel_front_page_panel',
) );

// Top Stories content enable control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[top_stories_section_enable]', array(
	'default'			=> 	$options['top_stories_section_enable'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[top_stories_section_enable]', array(
	'label'             => esc_html__( 'Top Stories Section Enable', 'tale-travel' ),
	'section'           => 'tale_travel_top_stories_section',
	'on_off_label' 		=> tale_travel_switch_options(),
) ) );

// popular destination title setting and control
$wp_customize->add_setting( 'tale_travel_theme_options[top_stories_title]', array(
	'default'			=> $options['top_stories_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tale_travel_theme_options[top_stories_title]', array(
	'label'           	=> esc_html__( 'Title', 'tale-travel' ),
	'section'        	=> 'tale_travel_top_stories_section',
	'active_callback' 	=> 'tale_travel_is_top_stories_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tale_travel_theme_options[top_stories_title]', array(
		'selector'            => '#recent-posts .section-header h2.section-title',
		'settings'            => 'tale_travel_theme_options[top_stories_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tale_travel_top_stories_title_partial',
    ) );
}

// Top Stories content type control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[top_stories_content_type]', array(
	'default'          	=> $options['top_stories_content_type'],
	'sanitize_callback' => 'tale_travel_sanitize_select',
) );

$wp_customize->add_control( 'tale_travel_theme_options[top_stories_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'tale-travel' ),
	'section'           => 'tale_travel_top_stories_section',
	'type'				=> 'select',
	'active_callback' 	=> 'tale_travel_is_top_stories_section_enable',
	'choices'			=> tale_travel_top_stories_content_type(),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'tale_travel_theme_options[top_stories_content_category]', array(
	'sanitize_callback' => 'tale_travel_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Tale_Travel_Dropdown_Taxonomies_Control( $wp_customize,'tale_travel_theme_options[top_stories_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'tale-travel' ),
	'description'      	=> esc_html__( 'Note: Top Stories selected no of posts will be shown from selected category', 'tale-travel' ),
	'section'           => 'tale_travel_top_stories_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'tale_travel_is_top_stories_section_content_category_enable'
) ) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'tale_travel_theme_options[top_stories_content_destination]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Tale_Travel_Dropdown_Taxonomies_Control( $wp_customize,'tale_travel_theme_options[top_stories_content_destination]', array(
	'label'             => esc_html__( 'Select Destinations', 'tale-travel' ),
	'section'           => 'tale_travel_top_stories_section',
	'taxonomy'			=> 'travel_locations',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'tale_travel_is_top_stories_section_content_destination_enable'
) ) );
