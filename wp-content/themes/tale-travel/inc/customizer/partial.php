<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Tale Travel
* @since Tale Travel 1.0.0
*/

if ( ! function_exists( 'tale_travel_top_stories_title_partial' ) ) :
    // top stories title
    function tale_travel_top_stories_title_partial() {
        $options = tale_travel_get_theme_options();
        return esc_html( $options['top_stories_title'] );
    }
endif;

if ( ! function_exists( 'tale_travel_popular_trips_title_partial' ) ) :
    // popular trips title
    function tale_travel_popular_trips_title_partial() {
        $options = tale_travel_get_theme_options();
        return esc_html( $options['popular_trips_title'] );
    }
endif;

if ( ! function_exists( 'tale_travel_blog_title_partial' ) ) :
    // blog title
    function tale_travel_blog_title_partial() {
        $options = tale_travel_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'tale_travel_copyright_text_partial' ) ) :
    // copyright text
    function tale_travel_copyright_text_partial() {
        $options = tale_travel_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
