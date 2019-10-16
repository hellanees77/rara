<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'tale_travel_single_post_section', array(
	'title'             => esc_html__( 'Single Post','tale-travel' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'tale-travel' ),
	'panel'             => 'tale_travel_theme_options_panel',
) );

// Tourableve date meta setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'tale-travel' ),
	'section'           => 'tale_travel_single_post_section',
	'on_off_label' 		=> tale_travel_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'tale-travel' ),
	'section'           => 'tale_travel_single_post_section',
	'on_off_label' 		=> tale_travel_hide_options(),
) ) );

// Tourableve author category setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'tale-travel' ),
	'section'           => 'tale_travel_single_post_section',
	'on_off_label' 		=> tale_travel_hide_options(),
) ) );

// Tourableve tag category setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'tale-travel' ),
	'section'           => 'tale_travel_single_post_section',
	'on_off_label' 		=> tale_travel_hide_options(),
) ) );
