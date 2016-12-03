<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?php if ( is_singular() && pings_open() ) { ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php }
    wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!--[if lt IE 10]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <button class="sacsaentis-nav-toggle c-hamburger c-hamburger--htx"><span>toggle menu</span></button>
    <div class="sacsaentis-nav-pane">
        <?php wp_nav_menu( array(
            'theme_location' => 'main-menu',
            'container' => '',
            'fallback_cb' => '__return_false'
        ) ); ?>
        <hr class="sacsaentis-nav-pane__separator">
        <a class="btn_fb" target="_blank" href="https://www.facebook.com/sacsaentis/"><img src="<?php bloginfo('template_directory'); ?>/images/icon_fb.png"></a>
    </div>
