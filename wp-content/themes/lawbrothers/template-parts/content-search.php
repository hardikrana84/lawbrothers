<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lawbrothers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header" style="display:none;">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>
        <?php endif; ?>
    </header><!-- .entry-header -->


    <div class="entry-summary">
        <a class="o-header--h4" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->