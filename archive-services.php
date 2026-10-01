<?php get_header(); ?>
    <main class="archive-wrapper">
        <div class="archive-container">
            <h1 class="section-heading text-center">Our Services</h1>
            <div class="blog-container">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="blog-card">
                            <div class="blog-card-content">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="blog-card-thumbnail">
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <h2 class="blog-card-title">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </a>
                                </h2>
                                <div class="blog-card-excerpt">
                                    <?php echo esc_html(get_the_excerpt()); ?>
                                </div>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="blog-card-link">
                                    Read More
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <div class="blog-pagination">
                        <?php the_posts_pagination([
                            'mid-size' => 2,
                            'prev_text' => '← Newer',
                            'next_text' => 'Older →',
                            'screen_reader_text' => 'Services navigation',
                        ]); ?>
                    </div>
                <?php else : ?>
                    <p>No services found.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>