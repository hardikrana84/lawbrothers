<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gross_Romanick
 */

get_header();
?>
<main id="primary" class="site-main">
    <div class="container no-sidebar">
        <header class="entry-header">
            <?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
            <div class="entry-meta">
                <?php
				lawbrothers_posted_on();
				lawbrothers_posted_by();
				?>
            </div><!-- .entry-meta -->
            <?php endif; ?>

        </header><!-- .entry-header -->

        <?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content-our-team', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>
    </div>
</main><!-- #main -->

<?php

get_footer();