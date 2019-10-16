<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'tale_travel_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','tale-travel' ),
	'description'       => esc_html__( 'Excerpt section options.', 'tale-travel' ),
	'panel'             => 'tale_travel_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'tale_travel_sanitize_number_range',
	'validate_callback' => 'tale_travel_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'tale_travel_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'tale-travel' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'tale-travel' ),
	'section'     		=> 'tale_travel_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
