
<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
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

            <div id="comments" class="comments-area">
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>

        <?php endwhile; ?>
    </main><!-- #main -->
</div>

<?php get_footer(); ?>