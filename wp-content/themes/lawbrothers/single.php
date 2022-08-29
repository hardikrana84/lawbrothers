<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lawbrothers
 */

get_header();
?>

<main id="primary" class="site-main">

    <div class="container">
        <div class="single-left">
            <h2 class="entry-title"><?php the_title(); ?></h2>
            <?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'hr-theme' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'hr-theme' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
        </div>
        <div class="single-right">
            <?php get_sidebar();?>
        </div>
    </div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();