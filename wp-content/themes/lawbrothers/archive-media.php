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
        <div class="mediarow">
            <div class="media-list">
                <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); 
				$title = get_the_title();
				$link = get_the_permalink();
				$post_id = get_the_id();
				$media_url = get_post_meta($post_id, 'media_url', true);
				$excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
				$date = get_the_date();
				$image = get_the_post_thumbnail(get_the_ID(), 'full');
				
				?>
                <div class="card text-center">
                    <h6><?php echo $title ?></h6>
                    <div class="card-img">
                        <a href="<?php echo $media_url ?>" target="_blank"><?php echo $image ?> </a>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo $media_url ?>" class="btn knowmore" target="_blank">Know More</a>
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