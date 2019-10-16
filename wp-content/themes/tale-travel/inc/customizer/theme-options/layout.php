<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'tale_travel_layout', array(
	'title'               => esc_html__('Layout','tale-travel'),
	'description'         => esc_html__( 'Layout section options.', 'tale-travel' ),
	'panel'               => 'tale_travel_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[site_layout]', array(
	'sanitize_callback'   => 'tale_travel_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Tale_Travel_Custom_Radio_Image_Control ( $wp_customize, 'tale_travel_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'tale-travel' ),
	'section'             => 'tale_travel_layout',
	'choices'			  => tale_travel_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'tale_travel_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Tale_Travel_Custom_Radio_Image_Control ( $wp_customize, 'tale_travel_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'tale-travel' ),
	'section'             => 'tale_travel_layout',
	'choices'			  => tale_travel_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'tale_travel_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Tale_Travel_Custom_Radio_Image_Control ( $wp_customize, 'tale_travel_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'tale-travel' ),
	'section'             => 'tale_travel_layout',
	'choices'			  => tale_travel_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'tale_travel_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Tale_Travel_Custom_Radio_Image_Control( $wp_customize, 'tale_travel_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'tale-travel' ),
	'section'             => 'tale_travel_layout',
	'choices'			  => tale_travel_sidebar_position(),
) ) );