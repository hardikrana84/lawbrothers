<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lawbrothers
 */

?>

<footer id="colophon" class="site-footer">

    <div class="footerrow1">
        <div class="container">
            <div class="footerblock">
                <?php dynamic_sidebar( 'footerblock1' ); ?>
            </div>
            <div class="footerblock">
                <?php dynamic_sidebar( 'footerblock2' ); ?>
            </div>
            <div class="footerblock">
                <?php dynamic_sidebar( 'footerblock3' ); ?>
            </div>
            <div class="footerblock">
                <?php dynamic_sidebar( 'footerblock4' ); ?>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <?php dynamic_sidebar( 'copyright' ); ?>
        </div>
    </div>
</footer> <!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>