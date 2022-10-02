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
                        <div class="header-block-right">
                            <div class="custom-search-form">
                                <?php echo get_search_form(); ?>
                            </div>
                            <button class="menu-toggle navigation-toggle" aria-controls="primary-menu"
                                aria-expanded="false">
                                <span class="menu-icon"><span class="icon-toggle" role="button"
                                        aria-label="Toggle Navigation"><span class="lines"></span></span></span>
                            </button>
                        </div>
                        <div class="headerright">
                            <div class="mobile-menu">
                                <div class="menu-row">
                                    <div class="logo-row">
                                        <div class="brandlogo">
                                            <?php the_custom_logo(); ?>
                                        </div>
                                        <?php
                                            wp_nav_menu( array(
                                                'theme_location' => 'social_links',
                                            ) );
                                        ?>
                                    </div>
                                    <div class="menu-block2">
                                        <?php
                                            wp_nav_menu( array(
                                                'theme_location' => 'menu-1',
                                                'menu_id' => 'primary-menu',
                                            ) );
                                        ?>
                                        <div class="rightside-menu">
                                            <?php
                                            wp_nav_menu( array(
                                                'theme_location' => 'mainmenu-right',
                                            ) );
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- #site-navigation -->

                </div>
            </div>
        </header><!-- #masthead -->

        <header class="d-header" style="display:none;">
            <div class="d-logo"><a href="https://www.kcsitglobal.com/home" title=""><img
                        src="https://www.kcsitglobal.com/images/logo.png" alt="" title=""></a>
            </div>
            <div class="d-header-right ml-auto flex-div">
                <button class="d-navigation-toggle"><span class="menu-icon"><span class="icon-toggle"
                            aria-label="Toggle Navigation"><span class="lines"></span></span></span></button>
            </div>
            <div class="d-header-nav">
                <div class="d-nav-head flex-div align-items-stretch">
                    <div class="navhead-left flex-div">
                        <div class="nav-logo"><a href="https://www.kcsitglobal.com" title=""><img
                                    src="https://www.kcsitglobal.com/images/logo.png" alt="" title=""></a>
                        </div>
                        <div id="navheadmenu" class="navheadmenu ml-auto">
                            <ul class="navhead-link flex-div ml-auto">
                                <li><a title="" href="https://www.kcsitglobal.com/case-studies">Case Studies</a></li>
                                <li><a title="" href="https://www.kcsitglobal.com/blogs">Blogs</a></li>
                                <li><a title="" href="https://www.kcsitglobal.com/articles">Articles</a></li>
                                <li><a title="" href="https://www.kcsitglobal.com/white-papers">White Papers</a></li>
                                <li><a title="" href="https://www.kcsitglobal.com/contact-us">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="navhead-right flex-div ml-auto">
                        <ul class="nav-social flex-div">
                            <li class="facebook"><a href="https://www.facebook.com/kcsitglobal" target="_blank"><i
                                        class="facebook_ico"></i></a></li>
                            <li class="twitter"><a href="https://twitter.com/Kcsitglobal" target="_blank"><i
                                        class="la la-twitter"></i></a></li>
                            <li class="linkedin"><a href="https://www.linkedin.com/company/9250874/" target="_blank"><i
                                        class="linkedin_ico"></i></a></li>
                            <li class="youtube"><a href="https://www.youtube.com/c/KcsitglobalTech/videos"
                                    target="_blank"><i class="la la-youtube"></i></a></li>
                        </ul>
                        <a href="JavaScript:void(0);" class="close-dnav"><i class="la la-close"></i></a>
                    </div>
                </div>
                <div class="d-nav-row">
                    <div class="d-nav-col-left">
                        <div class="nav-col">
                            <h3>Digital</h3>
                            <ul class="nav-menu">
                                <li><a title="Tech Consulting"
                                        href="https://www.kcsitglobal.com/solution/tech-consulting">Tech Consulting</a>
                                </li>
                                <li><a title="Cloud" href="https://www.kcsitglobal.com/solution/cloud">Cloud</a></li>
                                <li><a title="Data Engineering &amp; Analytics"
                                        href="https://www.kcsitglobal.com/solution/data-engineering-analytics">Data
                                        Engineering &amp; Analytics</a></li>
                                <li><a title="AI &amp; Automation"
                                        href="https://www.kcsitglobal.com/solution/ai-automation">AI &amp;
                                        Automation</a></li>
                                <li><a title="Mobility"
                                        href="https://www.kcsitglobal.com/solution/mobility">Mobility</a></li>
                                <li><a title="Digital Transformation"
                                        href="https://www.kcsitglobal.com/solution/digital-transformation">Digital
                                        Transformation</a></li>
                                <li><a title="Design Solutions"
                                        href="https://www.kcsitglobal.com/solution/design-solutions">Design
                                        Solutions</a></li>
                                <li><a title="Product Engineering"
                                        href="https://www.kcsitglobal.com/solution/product-engineering">Product
                                        Engineering</a></li>
                                <li><a title="IT Infrastructure"
                                        href="https://www.kcsitglobal.com/solution/it-infrastructure">IT
                                        Infrastructure</a></li>
                                <li><a title="SAP S/4HANA – The Intelligent ERP"
                                        href="https://www.kcsitglobal.com/solution/sap">SAP S/4HANA – The Intelligent
                                        ERP</a></li>
                                <li><a title="SharePoint"
                                        href="https://www.kcsitglobal.com/solution/sharepoint">SharePoint</a></li>
                                <li><a title="Power BI" href="https://www.kcsitglobal.com/solution/power-bi">Power
                                        BI</a></li>
                                <li><a title="SAHAYAK for SAP"
                                        href="https://www.kcsitglobal.com/solution/sahayak-for-sap">SAHAYAK for SAP</a>
                                </li>
                                <li><a title="Modern Workplace"
                                        href="https://www.kcsitglobal.com/solution/modern-workplace">Modern
                                        Workplace</a></li>
                                <li><a title="Microsoft Dynamics 365"
                                        href="https://www.kcsitglobal.com/solution/microsoft-dynamics-365">Microsoft
                                        Dynamics 365</a></li>
                                <li><a title="Cloud Security"
                                        href="https://www.kcsitglobal.com/solution/cloud-security">Cloud Security</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-col">
                            <h3>Industries</h3>
                            <ul class="nav-menu">
                                <li><a title="Hi-Tech" href="https://www.kcsitglobal.com/industry/hi-tech">Hi-Tech</a>
                                </li>
                                <li><a title="Retail / FMCG"
                                        href="https://www.kcsitglobal.com/industry/retail-fmcg">Retail / FMCG</a></li>
                                <li><a title="Energy &amp; Utilities"
                                        href="https://www.kcsitglobal.com/industry/energy-utilities">Energy &amp;
                                        Utilities</a></li>
                                <li><a title="Hospitality &amp; Leisure"
                                        href="https://www.kcsitglobal.com/industry/hospitality-leisure">Hospitality
                                        &amp; Leisure</a></li>
                                <li><a title="Financial Services"
                                        href="https://www.kcsitglobal.com/industry/financial-services">Financial
                                        Services</a></li>
                                <li><a title="Healthcare"
                                        href="https://www.kcsitglobal.com/industry/healthcare">Healthcare</a></li>
                                <li><a title="e-Governance"
                                        href="https://www.kcsitglobal.com/industry/e-governance">e-Governance</a></li>
                                <li><a title="Real Estate" href="https://www.kcsitglobal.com/industry/real-estate">Real
                                        Estate</a></li>
                                <li><a title="Manufacturing &amp; Engineering"
                                        href="https://www.kcsitglobal.com/industry/manufacturing-engineering">Manufacturing
                                        &amp; Engineering</a></li>
                                <li><a title="Media &amp; Entertainment"
                                        href="https://www.kcsitglobal.com/industry/media-entertainment">Media &amp;
                                        Entertainment</a></li>
                                <li><a title="Agriculture"
                                        href="https://www.kcsitglobal.com/industry/agriculture">Agriculture</a></li>
                                <li><a title="Education"
                                        href="https://www.kcsitglobal.com/industry/education">Education</a></li>
                                <li><a title="Pharma &amp; LifeSciences"
                                        href="https://www.kcsitglobal.com/industry/pharma-lifesciences">Pharma &amp;
                                        LifeSciences</a></li>
                                <li><a title="Transportation &amp; Logistics"
                                        href="https://www.kcsitglobal.com/industry/transportation-logistics">Transportation
                                        &amp; Logistics</a></li>
                                <li><a title="Power &amp; Utility"
                                        href="https://www.kcsitglobal.com/industry/power-utility">Power &amp;
                                        Utility</a></li>
                            </ul>
                        </div>
                        <div class="nav-col">
                            <h3>Products</h3>
                            <ul class="nav-menu">
                                <li><a title="Konfluence"
                                        href="https://www.kcsitglobal.com/product/konfluence">Konfluence</a></li>
                                <li><a title="eCube" href="https://www.kcsitglobal.com/product/ecube">eCube</a></li>
                                <li><a title="eHSM" href="https://www.kcsitglobal.com/product/ehsm">eHSM</a></li>
                                <li><a title="Smart Town" href="https://www.kcsitglobal.com/product/smart-town">Smart
                                        Town</a></li>
                                <li><a title="iNet" href="https://www.kcsitglobal.com/product/inet">iNet</a></li>
                                <li><a title="H-Connect"
                                        href="https://www.kcsitglobal.com/product/h-connect">H-Connect</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-nav-col-right">
                        <div class="nav-col mb-3">
                            <h3>Company</h3>
                            <ul class="nav-menu">
                                <li><a title="" href="https://www.kcsitglobal.com/company-overview">About KCS</a></li>
                                <li><a title="" href="https://www.kcsitglobal.com/our-certification">Our
                                        Certifications</a></li>
                                <li><a title="" href="https://www.kcsitglobal.com/howwework">How We Work</a></li>

                                <li><a title="" href="https://www.kcsitglobal.com/news">News</a></li>
                            </ul>
                        </div>
                        <div class="nav-col mb-3">
                            <h3>Life at KCS</h3>
                            <ul class="nav-menu">
                                <li><a title="" href="https://www.kcsitglobal.com/infrastructure">Infrastructure</a>
                                </li>
                                <li><a title="" href="https://www.kcsitglobal.com/clubs">Clubs</a></li>
                                <li><a title="" href="https://www.kcsitglobal.com/events">Events</a></li>
                            </ul>
                        </div>
                        <div class="nav-col">
                            <h3>Career</h3>
                            <ul class="nav-menu">
                                <li><a title="" href="https://www.kcsitglobal.com/current-openings">Current Openings</a>
                                </li>

                                <li><a title="" href="https://www.kcsitglobal.com/current-openings/apply-now">Apply at
                                        KCS</a></li>
                            </ul>
                        </div>
                        <div class="nav-col">
                            <a href="https://www.kcsitglobal.com/pdf/KCS-Brochure.pdf" target="_blank"
                                class="btn_part menubrochure"><i class="pdfico"></i>Company Brochure</a>
                        </div>
                    </div>
                </div>

            </div>
        </header>


        <?php if ( is_front_page() ) : ?>
        <?php echo do_shortcode ('[home-slider]') ?>
        <?php endif; ?>
        <?php if ( ! is_front_page() && ! is_single() && !is_archive() ) : ?>
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


        <?php if ( is_archive() ) : ?>
        <div class="subbanner">
            <figure>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner1-1.jpg" alt="" title="">
            </figure>
            <div class="bannerinfo">
                <div class="container">
                    <h1 class="entry-title"><?php post_type_archive_title() ?></h1>
                </div>
            </div>
        </div>
        <div class="breadcrumb">
            <div class="container">
                <?php get_breadcrumb(); ?>
            </div>
        </div>
        <?php endif; ?>