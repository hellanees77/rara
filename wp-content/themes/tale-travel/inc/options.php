<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function tale_travel_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'tale-travel' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function tale_travel_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'tale-travel' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function tale_travel_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'tale-travel' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'tale_travel_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function tale_travel_selected_sidebar() {
        $tale_travel_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'tale-travel' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'tale-travel' ),
        );

        $output = apply_filters( 'tale_travel_selected_sidebar', $tale_travel_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'tale_travel_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function tale_travel_site_layout() {
        $tale_travel_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'tale_travel_site_layout', $tale_travel_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'tale_travel_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function tale_travel_global_sidebar_position() {
        $tale_travel_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'tale_travel_global_sidebar_position', $tale_travel_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'tale_travel_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function tale_travel_sidebar_position() {
        $tale_travel_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'tale_travel_sidebar_position', $tale_travel_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'tale_travel_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function tale_travel_pagination_options() {
        $tale_travel_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'tale-travel' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'tale-travel' ),
        );

        $output = apply_filters( 'tale_travel_pagination_options', $tale_travel_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'tale_travel_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function tale_travel_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'tale-travel' ),
            'off'       => esc_html__( 'Disable', 'tale-travel' )
        );
        return apply_filters( 'tale_travel_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'tale_travel_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function tale_travel_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'tale-travel' ),
            'off'       => esc_html__( 'No', 'tale-travel' )
        );
        return apply_filters( 'tale_travel_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'tale_travel_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function tale_travel_sortable_sections() {
        $sections = array(
            'slider'        => esc_html__( 'Main Slider', 'tale-travel' ),
            'featured'      => esc_html__( 'Featured', 'tale-travel' ),
            'top_stories'   => esc_html__( 'Top Stories', 'tale-travel' ),
            'popular_trips' => esc_html__( 'Popular Trips', 'tale-travel' ),
            'blog'          => esc_html__( 'Blog', 'tale-travel' ),
        );
        return apply_filters( 'tale_travel_sortable_sections', $sections );
    }
endif;

if ( ! function_exists( 'tale_travel_slider_content_type' ) ) :
    /**
     * slider Options
     * @return array site options
     */
    function tale_travel_slider_content_type() {
        $tale_travel_slider_content_type = array(
            'post'      => esc_html__( 'Post', 'tale-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $tale_travel_slider_content_type = array_merge( $tale_travel_slider_content_type, array(
                'trip'          => esc_html__( 'Trip', 'tale-travel' ),
                ) );
        }

        $output = apply_filters( 'tale_travel_slider_content_type', $tale_travel_slider_content_type );

        return $output;
    }
endif;

if ( ! function_exists( 'tale_travel_featured_content_type' ) ) :
    /**
     * Featured Options
     * @return array site featured options
     */
    function tale_travel_featured_content_type() {
        $tale_travel_featured_content_type = array(
            'post'      => esc_html__( 'Post', 'tale-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $tale_travel_featured_content_type = array_merge( $tale_travel_featured_content_type, array(
                'trip'          => esc_html__( 'Trip', 'tale-travel' ),
                ) );
        }

        $output = apply_filters( 'tale_travel_featured_content_type', $tale_travel_featured_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'tale_travel_top_stories_content_type' ) ) :
    /**
     * Top stories Options
     * @return array site top stories options
     */
    function tale_travel_top_stories_content_type() {
        $tale_travel_top_stories_content_type = array(
            'category'  => esc_html__( 'Category', 'tale-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $tale_travel_top_stories_content_type = array_merge( $tale_travel_top_stories_content_type, array(
                'destination'   => esc_html__( 'Destination', 'tale-travel' ),
                ) );
        }

        $output = apply_filters( 'tale_travel_top_stories_content_type', $tale_travel_top_stories_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'tale_travel_popular_trips_content_type' ) ) :
    /**
     * Popular Trips Options
     * @return array site top stories options
     */
    function tale_travel_popular_trips_content_type() {
        $tale_travel_popular_trips_content_type = array(
            'category'  => esc_html__( 'Category', 'tale-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $tale_travel_popular_trips_content_type = array_merge( $tale_travel_popular_trips_content_type, array(
                'trip-types'    => esc_html__( 'Trip Types', 'tale-travel' ),
                ) );
        }

        $output = apply_filters( 'tale_travel_popular_trips_content_type', $tale_travel_popular_trips_content_type );


        return $output;
    }
endif;
