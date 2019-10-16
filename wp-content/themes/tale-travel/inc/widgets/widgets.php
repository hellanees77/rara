<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Tale Travel
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*
 * Add Instagram widget
 */
require get_template_directory() . '/inc/widgets/instagram-widget.php';
/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';
/*
 * Add popular post meta
 */
require get_template_directory() . '/inc/widgets/popular-post/popular-post-meta.php';
/*
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/popular-post/popular-post-widget.php';
/*
 * Add contact info widget
 */
require get_template_directory() . '/inc/widgets/contact-info-widget.php';


/**
 * Register widgets
 */
function tale_travel_register_widgets() {

	register_widget( 'Tale_Travel_Latest_Post' );

	register_widget( 'Tale_Travel_Instagram_Widget' );

    register_widget( 'Tale_Travel_Popular_Post' );

	register_widget( 'Tale_Travel_Contact_Info' );

	register_widget( 'Tale_Travel_Social_Link' );

}
add_action( 'widgets_init', 'tale_travel_register_widgets' );