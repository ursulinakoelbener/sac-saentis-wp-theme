<?php get_header(); ?>
    <div id="content_wrapper">
        <div id="content">
            <main role="main">
                <?php
                while ( have_posts() ) {
                    the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php sacsaentis_post_title( 'h1', $post ) ?>
                        </header>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php } ?>
            </main>
            <div id="sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div> <!-- end:content_wrapper -->
    </div> <!-- end:content -->
<?php get_footer(); ?>