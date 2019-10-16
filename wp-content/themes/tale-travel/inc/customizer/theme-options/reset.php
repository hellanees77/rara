<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'tale_travel_reset_section', array(
	'title'             => esc_html__('Reset all settings','tale-travel'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'tale-travel' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'tale_travel_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'tale_travel_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'tale_travel_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'tale-travel' ),
	'section'           => 'tale_travel_reset_section',
	'type'              => 'checkbox',
) );
