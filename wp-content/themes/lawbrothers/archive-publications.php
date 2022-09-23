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
        <div class="publicationrow">
            <div class="publication-list">
                <?php
			/* Start the Loop */
			while ( have_posts() ) :
            the_post(); 
            $title = get_the_title();
            $link = get_the_permalink();
            $post_id = get_the_id();
            $excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
            $date = get_the_date();
            $image = get_the_post_thumbnail(get_the_ID(), 'full');
            $pdf = get_post_meta($post->ID, 'pdf', true);
            $publication_url = get_post_meta($post->ID, 'publication_url', true);
            $flipkart = get_post_meta($post->ID, 'flipkart', true);
            
            ?>
                <div class="card text-center">
                    <h6><?php echo $title ?></h6>
                    <div class="card-img">
                        <?php echo $image ?>
                    </div>
                    <div class="card-body">
                        <a href="' . $pdf . '" class="btn knowmore" target="_blank">PDF</a>
                        <a href="' . $publication_url . '" class="btn knowmore" target="_blank">Amazon</a>
                        <a href="' . $flipkart . '" class="btn knowmore" target="_blank">Flipkart</a>
                    </div>
                </div>
                <?php endwhile; endif; ?>
            </div>
            <?php the_posts_navigation(); ?>
        </div>
    </div>
</main><!-- #main -->

<?php

get_footer();