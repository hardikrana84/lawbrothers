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
            $pdf = get_post_meta($post_id, 'pdf', true);
            $publication_url = get_post_meta($post_id, 'publication_url', true);
            $flipkart = get_post_meta($post_id, 'flipkart', true);
            
            ?>
                <div class="card text-center">
                    <h6><?php echo $title ?></h6>
                    <div class="card-img">
                        <?php echo $image ?>
                    </div>
                    <div class="card-body">
                        <?php 
                        
                        if(!($pdf == '')){
                        echo "<a href='$pdf' class='btn knowmore' target='_blank'><strong>PDF</strong></a>";
                        }

                        if(!($publication_url == '')){
                        echo "<a href='$publication_url' class='btn knowmore' target='_blank'><strong>Amazon</strong></a>";
                        }

                        if(!($flipkart == '')){
                        echo "<a href='$flipkart' class='btn knowmore' target='_blank'><strong>Others</strong></a>";
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