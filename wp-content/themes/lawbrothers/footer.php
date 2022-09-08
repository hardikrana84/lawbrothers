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
<a href="#toTop" id="backtotop" title="Back to top"><i class="fa fa-arrow-up"></i></a>
<div class="whatsupapps">
    <a href="https://web.whatsapp.com/send?phone=919460724737&amp;text=Hi" data-action="open" data-phone="919460724737"
        target="_blank" class="whatsup webwhatapp"><span></span>Chat with us via<b>WhatsApp</b></a>

    <a href="https://api.whatsapp.com/send?phone=919460724737&amp;text=Hi" data-action="open" data-phone="919460724737"
        target="_blank" class="whatsup mobilewhatapp"><span></span>Chat with us via<b>WhatsApp</b></a>
</div>
<?php wp_footer(); ?>
<script src="https://kit.fontawesome.com/fd3e0b88a6.js" crossorigin="anonymous"></script>
</body>

</html>