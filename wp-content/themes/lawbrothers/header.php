<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lawbrothers
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon" sizes="16x16"
        href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-icon/favicon.png" />
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="96x96"
        href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-icon/apple-touch-icon-96x96.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-icon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="192x192"
        href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-icon/apple-touch-icon-192x192.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="toTop">
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'lawbrothers' ); ?></a>

        <header id="masthead" class="site-header">
            <div class="headernavrow">
                <div class="container">
                    <div class="brandlogo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle navigation-toggle" aria-controls="primary-menu"
                            aria-expanded="false">
                            <span class="menu-icon"><span class="icon-toggle" role="button"
                                    aria-label="Toggle Navigation"><span class="lines"></span></span></span>
                        </button>
                        <div class="headerright">
                            <div class="mobile-menu">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-1',
                                        'menu_id' => 'primary-menu',
                                    ) );
                                ?>
                            </div>
                        </div>
                    </nav>
                    <!-- #site-navigation -->
                </div>
            </div>
        </header><!-- #masthead -->

        <?php if ( ! is_front_page() && ! is_single() ) : ?>
        <div class="subbanner">
            <figure>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner1-1.jpg" alt="" title="">
            </figure>
            <div class="bannerinfo">
                <div class="container">
                    <?php echo do_shortcode('[header-infobox]');?>
                </div>
            </div>
        </div>
        <div class="breadcrumb">
            <div class="container">
                <?php get_breadcrumb(); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ( is_single() ) : ?>
        <div class="subbanner">
            <figure>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner1-1.jpg" alt="" title="">
            </figure>
            <div class="bannerinfo">
                <div class="container">
                    <h1 class="entry-title"><?php the_title() ?></h1>
                </div>
            </div>
        </div>
        <div class="breadcrumb">
            <div class="container">
                <?php get_breadcrumb(); ?>
            </div>
        </div>
        <?php endif; ?>