<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lawbrothers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header" style="display:none;">
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
		$title = get_the_title();
		$link = get_the_permalink();
		$post_id = get_the_id();
		$designation = get_post_meta($post_id, 'designation', true);
		$emailid = get_post_meta($post_id, 'emailid', true);
		$memberlocation = get_post_meta($post_id, 'memberlocation', true);
		$phonenumber = get_post_meta($post_id, 'phonenumber', true);
		$facebook_url = get_post_meta($post_id, 'facebook_url', true);
		$twitter_url = get_post_meta($post_id, 'twitter_url', true);
		$instagram_url = get_post_meta($post_id, 'instagram_url', true);
		$linkedin_url = get_post_meta($post_id, 'linkedin_url', true);
		$youtube_url = get_post_meta($post_id, 'youtube_url', true);
		//$desc  = wp_trim_words( get_the_excerpt(), 100, '...' );
		$desc  = get_the_excerpt();
		$editor = get_the_content();
		$excerpt = get_the_excerpt();
		$excerpt_meta= !empty($excerpt)? "<p>$excerpt</p>":'';
		$date = get_the_date();
		// echo '<pre>';
		// print_r( $postmeta1 );
		// echo '</pre>';
		$imageurl = get_the_post_thumbnail_url(get_the_ID(),'full');
		$image = get_the_post_thumbnail(get_the_ID(), 'full');
		$slider_output .= '<div class="vc_row container memberdetails">
								<div class="vc_col-sm-8">
									<span class="membertitle">'.$title.'</span> 
									<span class="memberdesignation">'.$designation.' </span>
								</div> 
								<div class="vc_col-sm-4">
									<span class="memberemail"><i class="far fa-envelope" aria-hidden="true"> </i><a href="mailto:'.$emailid.'"> '.$emailid.'</a> </span>
									<span class="memberlocation"><i class="fa fa-map-marker" aria-hidden="true"> </i> '.$memberlocation.'</span>
								</div>
							</div>';
		echo $slider_output;
	?>

    <div class="entry-content">
        <?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lawbrothers' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lawbrothers' ),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php lawbrothers_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->