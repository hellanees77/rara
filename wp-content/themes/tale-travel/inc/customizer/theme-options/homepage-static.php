<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Tale Travel
* @since Tale Travel 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'tale_travel_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'tale_travel_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'tale-travel' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'tale-travel' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	'active_callback' => 'tale_travel_is_static_homepage_enable',
) );