<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

$options = tale_travel_get_theme_options();


if ( ! function_exists( 'tale_travel_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Tale Travel 1.0.0
	 */
	function tale_travel_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'tale_travel_doctype', 'tale_travel_doctype', 10 );


if ( ! function_exists( 'tale_travel_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'tale_travel_before_wp_head', 'tale_travel_head', 10 );

if ( ! function_exists( 'tale_travel_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tale-travel' ); ?></a>

		<?php
	}
endif;
add_action( 'tale_travel_page_start_action', 'tale_travel_page_start', 10 );

if ( ! function_exists( 'tale_travel_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_header_start() {
		$options = tale_travel_get_theme_options();
		$class = ! empty( $options['header_layout'] ) ? $options['header_layout'] : 'center-aligned';
		?>
		<div class="menu-overlay"></div>
		<header id="masthead" class="site-header <?php echo esc_attr( $class ); ?>" role="banner">
		<?php
	}
endif;
add_action( 'tale_travel_header_action', 'tale_travel_header_start', 20 );

if ( ! function_exists( 'tale_travel_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'tale_travel_page_end_action', 'tale_travel_page_end', 10 );

if ( ! function_exists( 'tale_travel_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_site_branding() {
		$options  = tale_travel_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="wrapper main-menu">
		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-identity">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( tale_travel_is_latest_posts() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'tale_travel_header_action', 'tale_travel_site_branding', 20 );

if ( ! function_exists( 'tale_travel_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_site_navigation() {
		$options = tale_travel_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="menu-label"><?php esc_html_e( 'Menu', 'tale-travel' ); ?></span>
				<?php
				echo tale_travel_get_svg( array( 'icon' => 'menu' ) );
				echo tale_travel_get_svg( array( 'icon' => 'close' ) );
				?>					
			</button>

			<?php  

        		$primary_defaults = array(
        			'theme_location' => 'primary',
        			'container' => false,
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'tale_travel_menu_fallback_cb',
        		);
        	
        		wp_nav_menu( $primary_defaults );

        		$secondary_defaults = array(
        			'theme_location' => 'secondary',
        			'container' => false,
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'secondary-menu',
        			'echo' => true,
        			'fallback_cb' => 'tale_travel_menu_fallback_cb',
        		);
        	
        		wp_nav_menu( $secondary_defaults );
        	?>
		</nav><!-- #site-navigation -->
		</div><!-- .wrapper -->
		<?php
	}
endif;
add_action( 'tale_travel_header_action', 'tale_travel_site_navigation', 30 );


if ( ! function_exists( 'tale_travel_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'tale_travel_header_action', 'tale_travel_header_end', 50 );

if ( ! function_exists( 'tale_travel_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'tale_travel_content_start_action', 'tale_travel_content_start', 10 );

if ( ! function_exists( 'tale_travel_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_header_image() {
		if ( tale_travel_is_frontpage() )
			return;
		$header_image = get_header_image();
		$class = '';
		if ( is_singular() ) :
			$class = ( has_post_thumbnail() || ! empty( $header_image ) ) ? '' : 'header-media-disabled';
		else :
			$class = ! empty( $header_image ) ? '' : 'header-media-disabled';
		endif;
		
		if ( is_singular() && has_post_thumbnail() ) : 
			$header_image = get_the_post_thumbnail_url( get_the_id(), 'full' );
    	endif; ?>

    	<div id="page-site-header" class="relative wrapper <?php echo esc_attr( $class ); ?>" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php echo tale_travel_custom_header_banner_title(); ?>
                </header>

                <?php tale_travel_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->

	<?php
	}
endif;
add_action( 'tale_travel_header_image_action', 'tale_travel_header_image', 10 );

if ( ! function_exists( 'tale_travel_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Tale Travel 1.0.0
	 */
	function tale_travel_add_breadcrumb() {
		$options = tale_travel_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( tale_travel_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * tale_travel_simple_breadcrumb hook
				 *
				 * @hooked tale_travel_simple_breadcrumb -  10
				 *
				 */
				do_action( 'tale_travel_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;

if ( ! function_exists( 'tale_travel_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_content_end() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'tale_travel_content_end_action', 'tale_travel_content_end', 10 );

if ( ! function_exists( 'tale_travel_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'tale_travel_footer', 'tale_travel_footer_start', 10 );

if ( ! function_exists( 'tale_travel_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_footer_site_info() {
		$theme_data = wp_get_theme();
		$options = tale_travel_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		?>
		<div class="site-info col-2">
                <div class="wrapper">
                    <span>
                    	<?php 
                    	echo tale_travel_santize_allow_tag( $copyright_text ); 
                    	/*echo ' ' . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'tale-travel' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>'; 
                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}*/
                    	?>
                	</span>
                	<span>
                		<?php  
                			$defaults = array(
		            			'theme_location' => 'social',
		            			'container' => false,
		            			'menu_class' => 'menu social-icons',
		            			'echo' => true,
		            			'fallback_cb' => 'tale_travel_menu_fallback_cb',
		            			'depth' => 1,
		            			'link_before' => '<span class="screen-reader-text">',
								'link_after' => '</span>',
		            		);
		            	
		            		wp_nav_menu( $defaults );
                		?>
                	</span>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'tale_travel_footer', 'tale_travel_footer_site_info', 40 );

if ( ! function_exists( 'tale_travel_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_footer_scroll_to_top() {
		$options  = tale_travel_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo tale_travel_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'tale_travel_footer', 'tale_travel_footer_scroll_to_top', 40 );

if ( ! function_exists( 'tale_travel_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Tale Travel 1.0.0
	 *
	 */
	function tale_travel_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'tale_travel_footer', 'tale_travel_footer_end', 100 );
