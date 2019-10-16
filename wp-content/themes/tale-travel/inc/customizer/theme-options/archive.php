<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'tale_travel_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','tale-travel' ),
	'description'       => esc_html__( 'Archive section options.', 'tale-travel' ),
	'panel'             => 'tale_travel_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'tale_travel_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'tale-travel' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'tale-travel' ),
	'section'           => 'tale_travel_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'tale_travel_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'tale-travel' ),
	'section'           => 'tale_travel_archive_section',
	'on_off_label' 		=> tale_travel_hide_options(),
) ) );

// Archive category setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'tale-travel' ),
	'section'           => 'tale_travel_archive_section',
	'on_off_label' 		=> tale_travel_hide_options(),
) ) );

// Archive author setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'tale-travel' ),
	'section'           => 'tale_travel_archive_section',
	'on_off_label' 		=> tale_travel_hide_options(),
) ) );