<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package lawbrothers
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'gross-romanick' ); ?>
            </h1>
        </header><!-- .page-header -->

        <div class="page-content container">
            <div class="error-page-content">
                <div class="error-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404-image.png"
                        class="aligncenter" alt="404" title="404" />
                </div>
                <!-- <div class="error-title">
						<h1> 404 </h1>
						<span> Page not Found </span>
					</div> -->
                <a class="back-to-home" href="<?php bloginfo('home'); ?>"> Back to Home </a>
            </div>
        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();