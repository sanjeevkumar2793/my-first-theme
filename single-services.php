<?php get_header(); ?>
<main class="single-post-wrapper">
    <div class="single-post-container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post">
                    <h2 class="single-post-title">
                        <?php echo esc_html(get_the_title()); ?>
                    </h2>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="single-post-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="single-post-content">
                        <?php the_content(); ?>
                    </div>
                    <?php comments_template(); ?>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>