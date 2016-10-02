<?php

/**
 * Registers the menu
 */
function sacsaentis_menus() {
    register_nav_menus( array( 'main-menu' => 'Hauptmenü' ) );
}
add_action( 'after_setup_theme', 'sacsaentis_menus' );

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
            'rewrite' => array('slug' => 'tourenberichte'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-page',
        )
    );
}
add_action( 'init', 'sacsaentis_create_post_type' );


function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'sac_tourenbericht' ) );
    return $query;
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
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
