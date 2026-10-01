<?php get_header(); ?>
<main class="single-post-wrapper">
    <div class="single-post-container">
        <?php if (have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <article class="single-post">
                    
                        <h2 class="single-post-title">
                            <?php the_title(); ?>
                        </h2>
                        <p class="single-post-date">
                            Published on:<?php echo get_the_date(); ?>
                        </p>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="single-post-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="single-post-content">
                            <?php the_content(); ?>
                        </div>
                    
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                <p>No posts found.</p>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>