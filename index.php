<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>
                    </header>

                    <div class="entry-content">
                        <div class="article-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                    <footer class="entry-footer">
                        <?php
                        if ('post' === get_post_type()) :
                            ?>
                            <div class="entry-meta">
                                <?php
                                mutiangao_posted_on();
                                mutiangao_posted_by();
                                ?>
                            </div>
                        <?php endif; ?>
                    </footer>
                </article><!-- #post-<?php the_ID(); ?> -->
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'mutiangao'); ?></p>
        <?php endif; ?>
    </main><!-- #main -->
</div>

<?php get_footer(); ?>




