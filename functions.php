<?php

/**
 * Registers the menu
 */
function sacsaentis_menus() {
    register_nav_menus( array( 'main-menu' => 'Hauptmenü' ) );
}
add_action( 'after_setup_theme', 'sacsaentis_menus' );


function sacsaentis_include_tourenberichte_on_homepage( $query ) {
    if ( $query->is_home()  ) {
        $query->set( 'post_type', array( 'post', 'sac_tourenbericht' ) );
    }
}
add_action( 'pre_get_posts', 'sacsaentis_include_tourenberichte_on_homepage' );
/**
 * Adds the scripts and styles to the header
 */
function sacsaentis_scripts_styles() {
    wp_enqueue_script( 'sacsaentis-scripts-main', get_template_directory_uri() . '/scripts/main.js', array( 'jquery' ), false, true );

    wp_enqueue_style( 'sacsaentis-style', get_template_directory_uri() . '/styles/main.css', array(), null );
    wp_enqueue_style( 'sacsaentis-fonts', '//fonts.googleapis.com/css?family=Asap:400,700', array(), null );
}
add_action( 'wp_enqueue_scripts', 'sacsaentis_scripts_styles' );


function sacsaentis_create_post_type() {
    register_post_type( 'sac_tourenbericht',
        array(
            'labels' => array(
                'name' => 'Tourenberichte',
                'singular_name' => 'Tourenbericht'
            ),
            'public' => true,
            'has_archive' => true,
            'taxonomies' => array( 'category' ),
            'rewrite' => array('slug' => 'tourenberichte'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-page',
        )
    );
}
add_action( 'init', 'sacsaentis_create_post_type' );




include_once(ABSPATH.WPINC.'/rss.php');
function droptours_rss( $url, $num_items = -1 ) {
    if ( $rss = fetch_rss( $url ) ) {
        echo '<ul>';

        if ( $num_items !== -1 ) {
            $rss->items = array_slice( $rss->items, 0, $num_items );
        }

        foreach ( (array) $rss->items as $item ) {
            printf(
                '<li>
                   <span class="date">%3$s</span>
                   <span class="tour_name">%2$s</span>
                   <span class="tour_kind">%4$s</span>
                   <span class="icons">
                     <a href="%1$s"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                   </span>
                 </li>',
                esc_url( $item['link'] ),
                esc_html( $item['title'] ),
                date( 'd.m.Y', date_timestamp_get(DateTime::createFromFormat(DateTime::ATOM, $item['droptours']['startdatum'])) ),
                esc_html( $item['droptours']['aktivitaet'])
            );
        }

        echo '</ul>';
    } else {
        _e( 'An error has occurred, which probably means the feed is down. Try again later.' );
    }
}

/**
 * Displays the post title
 *
 * @param $heading
 *
 * @return string Formatted output in HTML
 */
function sacsaentis_post_title( $heading, $post ) {
    echo '<' . $heading . ' class="entry-title">';
    the_title();
    echo '</' . $heading . '>';
}
