<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function tale_travel_ocdi_import_files() {
    return array(
        array(
            'import_file_name'           => esc_html__( 'Tale Travel Demo', 'tale-travel' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo-data/tale-travel-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo-data/tale-travel-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo-data/tale-travel-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/screenshot.png',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'tale-travel' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'tale_travel_ocdi_import_files' );

/**
 * 
 * Automatically assign "Front page", "Posts page" and menu locations after the importer is done
 * 
 */
function tale_travel_ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Header Menu', 'nav_menu' );
    $secondary = get_term_by( 'name', 'Secondary Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'secondary' => $secondary->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'tale_travel_ocdi_after_import_setup' );

// Disable the ProteusThemes branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
