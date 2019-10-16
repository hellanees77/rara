<?php
/**
 * Featured section
 *
 * This is the template for the content of featured section
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */
if ( ! function_exists( 'tale_travel_add_featured_section' ) ) :
    /**
    * Add featured section
    *
    *@since Tale Travel 1.0.0
    */
    function tale_travel_add_featured_section() {
    	$options = tale_travel_get_theme_options();
        // Check if destination is enabled on frontpage
        $featured_enable = apply_filters( 'tale_travel_section_status', true, 'featured_section_enable' );

        if ( true !== $featured_enable ) {
            return false;
        }
        // Get destination section details
        $section_details = array();
        $section_details = apply_filters( 'tale_travel_filter_featured_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render destination section now.
        tale_travel_render_featured_section( $section_details );
    }
endif;

if ( ! function_exists( 'tale_travel_get_featured_section_details' ) ) :
    /**
    * featured section details.
    *
    * @since Tale Travel 1.0.0
    * @param array $input featured section details.
    */
    function tale_travel_get_featured_section_details( $input ) {
        $options = tale_travel_get_theme_options();

        // Content type.
        $featured_content_type  = $options['featured_content_type'];
        
        $content = array();
        switch ( $featured_content_type ) {

            case 'post':
                $post_id = ! empty( $options['featured_content_post'] ) ? $options['featured_content_post'] : '' ;

                $args = array(
                    'post_type'         => 'post',
                    'p'          => absint( $post_id ),
                    'posts_per_page'    => 1,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'trip':

                if ( ! class_exists( 'WP_Travel' ) )
                    return;
                
                $post_id = ! empty( $options['featured_content_trip'] ) ? $options['featured_content_trip'] : '' ;
                
                $args = array(
                    'post_type'         => 'itineraries',
                    'post__in'          => absint( $page_id ),
                    'posts_per_page'    => 1,
                    'orderby'           => 'post__in',
                    );                    
            break;

            default:
            break;
        }


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = tale_travel_trim_content( 15 );
                    $page_post['author']    = tale_travel_author_meta();
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// destination section content details.
add_filter( 'tale_travel_filter_featured_section_details', 'tale_travel_get_featured_section_details' );


if ( ! function_exists( 'tale_travel_render_featured_section' ) ) :
  /**
   * Start destination section
   *
   * @return string destination content
   * @since Tale Travel 1.0.0
   *
   */
   function tale_travel_render_featured_section( $content_details = array() ) {
        $options = tale_travel_get_theme_options();
        $featured_content_type  = $options['featured_content_type'];
        $column = ( $options['featured_subscribe_enable'] && class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'subscriptions' ) ) ? 'col-2' : 'col-1';
        $subscription_title = ! empty( $options['featured_subscribe_title'] ) ? $options['featured_subscribe_title'] : '';
        $subscription_btn_title = ! empty( $options['featured_subscribe_btn_title'] ) ? $options['featured_subscribe_btn_title'] : esc_html__( 'Join Us', 'tale-travel' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="highlighted-posts" class="relative page-section">
            <div class="wrapper">
                <?php foreach ( $content_details as $content ) : ?>
                    <div class="main-highlighted-post <?php echo esc_attr( $column ); ?> clear">
                        <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                            <div class="featured-image">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                <?php endif; 

                                if ( ! in_array( $featured_content_type, array( 'category', 'page', 'post' ) ) ) : 
                                    $enable_sale     = get_post_meta( $content['id'], 'wp_travel_enable_sale', true );
                                    $trip_price      = wp_travel_get_trip_price( $content['id'] );
                                    $sale_price      = wp_travel_get_trip_sale_price( $content['id'] );
                                    $trip_per        = get_post_meta( $content['id'], 'wp_travel_price_per', true );
                                    $settings        = wp_travel_get_settings();
                                    $currency_code   = ( isset( $settings['currency'] ) ) ? $settings['currency'] : '';
                                    $currency_symbol = wp_travel_get_currency_symbol( $currency_code );
                                    ?>
                                    <div class="price-meta-wrapper">
                                        <span class="trip-price">                       
                                            <span class="current-price">
                                                <?php 
                                                    echo esc_html( $currency_symbol );
                                                    echo ( true == $enable_sale && $sale_price ) ? esc_html( $sale_price ) : esc_html( $trip_price );
                                                ?>
                                            </span>
                                        </span><!-- .trip-price -->
                                    </div>
                                <?php endif; ?>

                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <?php if ( $featured_content_type == 'post' ) :
                                    the_category( '', '', $content['id'] );
                                elseif ( $featured_content_type == 'trip' ) :
                                    $categories = get_the_terms( $content['id'], 'travel_locations' );
                                    if ( ! empty( $categories ) ) : ?>
                                        <ul class="post-categories">
                                            <?php foreach ( $categories as $cat ) : ?>
                                                <li><a href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>" rel="category tag"><?php echo esc_html( $cat->name ); ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; 
                                endif; ?>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-meta">
                                    <?php 
                                        tale_travel_posted_on( $content['id'] ); 
                                        echo wp_kses_post( $content['author'] );
                                    ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-container -->
                        </article>

                        <?php if ( 'col-2' == $column ) : ?>
                            <div id="subscribe-newsletter">
                                <?php if ( ! empty( $options['featured_subscribe_image'] ) ) : ?>
                                    <div class="featured-image">
                                        <img src="<?php echo esc_url( $options['featured_subscribe_image'] ); ?>">
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <?php 
                                    $subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="' . esc_html( $subscription_title ) . '" subscribe_button="' . esc_html( $subscription_btn_title ) . '" show_subscribers_total=""]';
                                    echo do_shortcode( wp_kses_post( $subscription_shortcode ) ); 
                                ?>
                            </div><!-- #subscribe-newsletter -->
                        <?php endif; ?>
                    </div><!-- .main-highlighted-post -->
                <?php endforeach; ?>
            </div><!-- .wrapper -->
        </div><!-- .highlighted-posts -->
        
    <?php }
endif;