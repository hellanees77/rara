<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'tale_travel_menu', array(
	'title'             => esc_html__('Header Menu','tale-travel'),
	'description'       => esc_html__( 'Header Menu options.', 'tale-travel' ),
	'panel'             => 'nav_menus',
) );

// header layout control and setting
$wp_customize->add_setting( 'tale_travel_theme_options[header_layout]', array(
	'default'          	=> $options['header_layout'],
	'sanitize_callback' => 'tale_travel_sanitize_select',
) );

$wp_customize->add_control( 'tale_travel_theme_options[header_layout]', array(
	'label'             => esc_html__( 'Primary Menu Alignment', 'tale-travel' ),
	'section'           => 'tale_travel_menu',
	'type'				=> 'radio',
	'choices'			=> array(
		'center-aligned'	=> esc_html__( 'Center Align', 'tale-travel' ),
		'left-aligned'		=> esc_html__( 'Left Align', 'tale-travel' ),
		),
) );