<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'tale_travel_slider_section', array(
	'title'             => esc_html__( 'Banner','tale-travel' ),
	'description'       => esc_html__( 'Banner Section options.', 'tale-travel' ),
	'panel'             => 'tale_travel_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'tale-travel' ),
	'section'           => 'tale_travel_slider_section',
	'on_off_label' 		=> tale_travel_switch_options(),
) ) );

// Slider content type control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[slider_content_type]', array(
	'default'          	=> $options['slider_content_type'],
	'sanitize_callback' => 'tale_travel_sanitize_select',
) );

$wp_customize->add_control( 'tale_travel_theme_options[slider_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'tale-travel' ),
	'section'           => 'tale_travel_slider_section',
	'type'				=> 'select',
	'active_callback' 	=> 'tale_travel_is_slider_section_enable',
	'choices'			=> tale_travel_slider_content_type(),
) );

// slider posts drop down chooser control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[slider_content_post]', array(
	'sanitize_callback' => 'tale_travel_sanitize_page',
) );

$wp_customize->add_control( new Tale_Travel_Dropdown_Chooser( $wp_customize, 'tale_travel_theme_options[slider_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'tale-travel' ),
	'section'           => 'tale_travel_slider_section',
	'choices'			=> tale_travel_post_choices(),
	'active_callback'	=> 'tale_travel_is_slider_section_content_post_enable',
) ) );

// slider posts drop down chooser control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[slider_content_trip]', array(
	'sanitize_callback' => 'tale_travel_sanitize_page',
) );

$wp_customize->add_control( new Tale_Travel_Dropdown_Chooser( $wp_customize, 'tale_travel_theme_options[slider_content_trip]', array(
	'label'             => esc_html__( 'Select Trip', 'tale-travel' ),
	'section'           => 'tale_travel_slider_section',
	'choices'			=> tale_travel_trip_choices(),
	'active_callback'	=> 'tale_travel_is_slider_section_content_trip_enable',
) ) );