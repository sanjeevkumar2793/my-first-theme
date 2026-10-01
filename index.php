<?php get_header(); ?>
<main class="blog-wrapper archive-wrapper">
    <div class="blog-container ">
        <?php if (have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <article class="blog-card">
                    <div class="blog-card-content">
                        <h2 class="blog-card-title">
                           <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="blog-card-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="blog-card-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a class="blog-card-link" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                <p>No posts found.</p>
        <?php endif; ?>
    </div>
    <div class="blog-pagination">
                <?php the_posts_pagination([
                    'mid-size'=>2,
                    'prev_text'=>'← Newer Posts',
                    'next_text'=>'Older Posts →',
                    'screen_reader_text' => 'Blog posts navigation',
                ]); ?>
            </div>
</main> 
<!-- <main class="blog-wrapper">
    <?php get_template_part('template-parts/hero'); ?>
</main> -->
<?php get_footer(); ?>