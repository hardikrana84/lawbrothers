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
        <div class="awardsrow">
            <div class="awards-list">
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
            $cover_photo = get_post_meta($post->ID, 'cover_photo', true);
            $cover_preview = !empty($cover_photo) ? "<img src='$cover_photo'>" : '';
            ?>
                <div class="card">
                    <div class="card-img">
                        <?php echo $image ?>
                    </div>
                    <h6><?php echo $title ?></h6>

                    <div class="card-body">
                        <?php 
                        
                        if(!($cover_photo == '')){
                        echo "<a href='$cover_photo' class='btn knowmore' target='_blank'><strong>PDF</strong></a>";
                        }
                        ?>
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