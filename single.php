<?php get_header(); ?>
    <div class="content-wrapper">
        <main role="main" class="content-main">
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
                </article>
            <?php } ?>
        </main>
        <aside class="content-sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div>
<?php get_footer(); ?>