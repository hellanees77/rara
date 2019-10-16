<?php
/**
 * Featured Section options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add Featured section
$wp_customize->add_section( 'tale_travel_featured_section', array(
	'title'             => esc_html__( 'Featured','tale-travel' ),
	'description'       => esc_html__( 'Featured Section options.', 'tale-travel' ),
	'panel'             => 'tale_travel_front_page_panel',
) );

// Featured content enable control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[featured_section_enable]', array(
	'default'			=> 	$options['featured_section_enable'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[featured_section_enable]', array(
	'label'             => esc_html__( 'Featured Section Enable', 'tale-travel' ),
	'section'           => 'tale_travel_featured_section',
	'on_off_label' 		=> tale_travel_switch_options(),
) ) );

// Featured content type control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[featured_content_type]', array(
	'default'          	=> $options['featured_content_type'],
	'sanitize_callback' => 'tale_travel_sanitize_select',
) );

$wp_customize->add_control( 'tale_travel_theme_options[featured_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'tale-travel' ),
	'section'           => 'tale_travel_featured_section',
	'type'				=> 'select',
	'active_callback' 	=> 'tale_travel_is_featured_section_enable',
	'choices'			=> tale_travel_featured_content_type(),
) );

// featured posts drop down chooser control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[featured_content_post]', array(
	'sanitize_callback' => 'tale_travel_sanitize_page',
) );

$wp_customize->add_control( new Tale_Travel_Dropdown_Chooser( $wp_customize, 'tale_travel_theme_options[featured_content_post]', array(
	'label'             => esc_html__( 'Select posts', 'tale-travel' ),
	'section'           => 'tale_travel_featured_section',
	'choices'			=> tale_travel_post_choices(),
	'active_callback'	=> 'tale_travel_is_featured_section_content_post_enable',
) ) );

// featured trips drop down chooser control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[featured_content_trip]', array(
	'sanitize_callback' => 'tale_travel_sanitize_page',
) );

$wp_customize->add_control( new Tale_Travel_Dropdown_Chooser( $wp_customize, 'tale_travel_theme_options[featured_content_trip]', array(
	'label'             => esc_html__( 'Select Trip', 'tale-travel' ),
	'section'           => 'tale_travel_featured_section',
	'choices'			=> tale_travel_trip_choices(),
	'active_callback'	=> 'tale_travel_is_featured_section_content_trip_enable',
) ) );

// Featured subscribe enable control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[featured_subscribe_enable]', array(
	'default'			=> 	$options['featured_subscribe_enable'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[featured_subscribe_enable]', array(
	'label'             => esc_html__( 'Featured Subscription Enable', 'tale-travel' ),
	'description'       => esc_html__( 'Install Jetpack and Enable Subscription Module to activate Subsription form.', 'tale-travel' ),
	'section'           => 'tale_travel_featured_section',
	'active_callback' 	=> 'tale_travel_is_featured_section_enable',
	'on_off_label' 		=> tale_travel_switch_options(),
) ) );

// Featured title setting and control
$wp_customize->add_setting( 'tale_travel_theme_options[featured_subscribe_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['featured_subscribe_title'],
) );

$wp_customize->add_control( 'tale_travel_theme_options[featured_subscribe_title]', array(
	'label'           	=> esc_html__( 'Subscription Title', 'tale-travel' ),
	'section'        	=> 'tale_travel_featured_section',
	'active_callback' 	=> 'tale_travel_is_featured_section_subscribe_enable',
	'type'				=> 'text',
) );

// Featured btn title setting and control
$wp_customize->add_setting( 'tale_travel_theme_options[featured_subscribe_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['featured_subscribe_btn_title'],
) );

$wp_customize->add_control( 'tale_travel_theme_options[featured_subscribe_btn_title]', array(
	'label'           	=> esc_html__( 'Subscription Button Title', 'tale-travel' ),
	'section'        	=> 'tale_travel_featured_section',
	'active_callback' 	=> 'tale_travel_is_featured_section_subscribe_enable',
	'type'				=> 'text',
) );

// Featured image setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[featured_subscribe_image]', array(
	'sanitize_callback' => 'tale_travel_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tale_travel_theme_options[featured_subscribe_image]',
		array(
		'label'       		=> esc_html__( 'Subscription Image', 'tale-travel' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'tale-travel' ), 500, 500 ),
		'section'     		=> 'tale_travel_featured_section',
		'active_callback'	=> 'tale_travel_is_featured_section_subscribe_enable',
) ) );