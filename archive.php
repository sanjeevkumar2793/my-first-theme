<?php get_header(); ?>
    <main class="archive-wrapper">
        <div class="archive-container">
            <h1>
                <?php the_archive_title(); ?>
            </h1>
            <div class="blog-container">
                <?php if(have_posts())  : ?> 
                    <?php while(have_posts()) : the_post(); ?>
                        <article class="blog-card">
                            <div class="blog-card-content">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="single-post-image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php endif; ?>
                                <h2 class="blog-card-title">
                                        <?php the_title(); ?>
                                </h2> 
                                <div class="blog-card-excerpt">
                                        <?php the_excerpt(); ?>
                                </div>       
                                <a href="<?php the_permalink(); ?>" class="blog-card-link">Read More</a>                    
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>No post found in archive.</p>
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
        </div>
    </main>   
<?php get_footer(); ?>