<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'tale_travel_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'tale-travel' ),
		'priority'   			=> 900,
		'panel'      			=> 'tale_travel_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'tale_travel_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'tale_travel_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'tale_travel_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'tale-travel' ),
		'section'    			=> 'tale_travel_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tale_travel_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'tale_travel_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tale_travel_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'tale_travel_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'tale_travel_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Tale_Travel_Switch_Control( $wp_customize, 'tale_travel_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'tale-travel' ),
		'section'    			=> 'tale_travel_section_footer',
		'on_off_label' 		=> tale_travel_switch_options(),
    )
) );