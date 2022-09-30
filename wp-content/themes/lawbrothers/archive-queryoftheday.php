<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lawbrothers
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if ( have_posts() ) : ?>
        <div class="queryrow">
            <?php
			/* Start the Loop */
			while ( have_posts() ) :
            the_post(); 
            $title = get_the_title();
            $link = get_the_permalink();
            $post_id = get_the_id();
            $publication_url = get_post_meta($post_id, 'publication_url', true);
            $excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
            $date = get_the_date();
            $image = get_the_post_thumbnail(get_the_ID(), 'full');
            $editor = get_the_content();
            
            ?>

            <div class="card">
                <div class="question"><?php echo $title ?></div>
                <div class="answer"><?php echo $editor ?></div>
            </div>
            <?php endwhile; endif; ?>
            <?php the_posts_navigation(); ?>
        </div>
    </div>
</main><!-- #main -->

<?php

get_footer();