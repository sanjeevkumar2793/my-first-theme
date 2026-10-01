<?php get_header(); ?>
    <main class="page-wrapper">
        <div class="page-container">
           <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                    <article class="page-container">
                        <h2 class="page-title">
                            <?php the_title(); ?>
                        </h2>
                        <div class="page-body">
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