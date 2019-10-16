<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'tale_travel_pagination', array(
	'title'               => esc_html__('Pagination','tale-travel'),
	'description'         => esc_html__( 'Pagination section options.', 'tale-travel' ),
	'panel'               => 'tale_travel_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'tale_travel_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'tale-travel' ),
	'section'             => 'tale_travel_pagination',
	'on_off_label' 		=> tale_travel_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'tale_travel_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'tale_travel_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'tale-travel' ),
	'section'             => 'tale_travel_pagination',
	'type'                => 'select',
	'choices'			  => tale_travel_pagination_options(),
	'active_callback'	  => 'tale_travel_is_pagination_enable',
) );
