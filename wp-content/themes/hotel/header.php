<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width"/>
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <?php wp_head(); ?>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </head>

    <body <?php body_class(); ?>>
        <div id="wrapper-principal">
            <header id="masthead" class="site-header" role="banner">
                <div class="wrapper920">
                    <?php if (get_header_image()) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?> - <?php bloginfo('description'); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
                    <?php endif; ?>
                    <div class="navbar-header visible-xs-block pull-right">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-navigation-mobile">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                      </div>
                    <div id="telefono">
                        <div class="chiquito"><?= __("Telephone") ?>:</div>
                        <div class="grande">(123) 415 789</div>
                    </div>
                </div>

                <nav id="site-navigation-mobile" class="main-navigation visible-xs-block collapse" role="navigation" style="height:0px;" aria-expanded="false">
                    <div class="wrapper920">
                        <!--<button class="menu-toggle"><?php _e('Menu', 'twentytwelve'); ?></button>-->
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav-menu nav navbar-nav')); ?>
                    </div>
                </nav><!-- #site-navigation -->
                
            </header><!-- #masthead -->

            <nav id="site-navigation" class="main-navigation hidden-xs" role="navigation">
                <div class="wrapper920">
                    <!--<button class="menu-toggle"><?php _e('Menu', 'twentytwelve'); ?></button>-->
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav-menu nav navbar-nav')); ?>
                </div>
            </nav><!-- #site-navigation -->

            <div id="page" class="hfeed site wrapper920" style="overflow: visible;">
                <div id="main" class="wrapper">