<?php get_header(); ?>

<main role="main">
    <div id="news">
        <h2>Berichte & News</h2>
        <ul>
            <?php
            $args = array( 'numberposts' => '5' );
            $recent_posts = wp_get_recent_posts();
            foreach( $recent_posts as $recent ){
                echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></li> ';
            }
            wp_reset_query();
            ?>
        </ul>
    </div>

    <div id="next_tour">
        <h2>Nächste Touren</h2>
        <?php droptours_rss('http://web-10.dropnet.ch/sac-saentis/rss.php', 3); ?>
    </div>
</main>

<?php get_footer(); ?>
