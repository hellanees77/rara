<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Tale Travel
 * @since Tale Travel 1.0.0
 */
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
$options = tale_travel_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
            </a>
        </div><!-- .featured-image -->
    <?php endif; ?>

    

    <div class="entry-container">
        <?php echo tale_travel_article_header_meta(); ?>

        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->

        <div class="entry-meta">
            <?php 
                tale_travel_posted_on();
                 
                if ( ! $options['hide_author'] ) :
                    echo tale_travel_author_meta();
                endif;
            ?>
        </div><!-- .entry-meta -->
    </div><!-- .entry-container -->

</article><!-- #post-## -->
