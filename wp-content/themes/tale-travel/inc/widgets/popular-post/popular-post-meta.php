<?php
/**
 * Tale Travel meta inclusion
 *
 * This is the template that includes all custom meta of Tale Travel
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */

if( ! function_exists( 'tale_travel_get_post_views' ) ): 
	/**
	*
 	* Get any post views count
	*
	* @since Tale Travel 1.0.0
	*
	* @param int $post_id Post id of current post.
 	* @return string String with views count
	*/
	function tale_travel_get_post_views( $post_id ){
		//Set the name of the meta field.
	    $count_key = 'post_views_count';

		//Get value of the meta field
	    $count = get_post_meta($post_id, $count_key, true);

		//If meta field is empty
	    if( $count=='' ){
			//Delete all custom fields with the specified key from the specified post. 
	        delete_post_meta( $post_id, $count_key );

			//Add a custom (meta) field (Name/value)to the specified post.
	        add_post_meta( $post_id, $count_key, '0' );

	        return "0 View";
	    }
	    return $count.' Views';
	}
endif;

if( ! function_exists( 'tale_travel_set_post_views' ) ): 
	/**
	*
 	* Set any post views
	*
	* @since Tale Travel 1.0.0
	*
	* @param int $post_id Post id of current post.
 	* @return string String with views count
	*/
	function tale_travel_set_post_views($post_id) {
		//Set the name of the meta field.
	    $count_key = 'post_views_count';

		//Get value of the meta field
	    $count = get_post_meta( $post_id, $count_key, true );

		//If meta field is empty
	    if( $count=='' ){
	        $count = 0;

			//Delete all custom fields with the specified key from the specified post. 
	        delete_post_meta( $post_id, $count_key );
	        
			//Add a custom (meta) field (Name/value)to the specified post.
	        add_post_meta( $post_id, $count_key, '0' );
	    }else{
	        $count++;
	        update_post_meta( $post_id, $count_key, $count );
	    }
	}
endif;
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

if( ! function_exists( 'tale_travel_track_post_views' ) ): 
	/**
	*
 	* Track if single page is loaded
	*
	* @since Tale Travel 1.0.0
	*
	* @param int $post_id Post id of current post.
 	* @return string String with views count
	*/
	function tale_travel_track_post_views ( $post_id ) {
	    if ( ! is_single() ) 
	    	return;
	    if ( empty ( $post_id) ) {
	        global $post;
	        $post_id = $post->ID;    
	    }
	    tale_travel_set_post_views( $post_id );
	}
endif;
add_action( 'wp_head', 'tale_travel_track_post_views');
