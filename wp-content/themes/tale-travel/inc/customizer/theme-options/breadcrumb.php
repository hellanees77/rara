<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

$wp_customize->add_section( 'tale_travel_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','tale-travel' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'tale-travel' ),
	'panel'             => 'tale_travel_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'tale-travel' ),
	'section'          	=> 'tale_travel_breadcrumb',
	'on_off_label' 		=> tale_travel_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'tale_travel_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'tale-travel' ),
	'active_callback' 	=> 'tale_travel_is_breadcrumb_enable',
	'section'          	=> 'tale_travel_breadcrumb',
) );
