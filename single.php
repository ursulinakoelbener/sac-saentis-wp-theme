<?php get_header(); ?>
    <div id="content_wrapper">
        <div id="content">
            <main role="main">
                <?php
                while ( have_posts() ) {
                    the_post();
                    $format = get_post_format( $post->ID ); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header clearfix">
                            <h1><?php the_title(); ?></h1>
                        </header>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->
                <?php } ?>
            </main>
        </div> <!-- end:content_wrapper -->
    </div> <!-- end:content -->
<?php get_footer(); ?>