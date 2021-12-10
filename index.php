<?php get_header(); ?>

<div class="news-box frontpage-box">
    <h2 class="frontpage-box__title">Berichte & News</h2>
    <ul>
        <?php
        $args = array( 'numberposts' => '10', 'post_type' => 'post' );
        $recent_posts = wp_get_recent_posts( $args );
        foreach( $recent_posts as $recent ){
            echo '<li><span class="news-box__date">' . get_the_date() . '</span><a class="news-box__link" href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li> ';
        }
        ?>
    </ul>
</div>

<div class="tours-box frontpage-box frontpage-box--bottom">
    <h2 class="frontpage-box__title">Nächste Touren</h2>
    <p>&nbsp;</p>
    <p>Zum <a class="tours-box__name" href="http://programm.sac-saentis.ch">Tourenprogramm</a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <?php droptours_rss('http://web-10.dropnet.ch/sac-saentis/rss.php', 3); ?>
</div>

<?php get_footer(); ?>
