<?php get_header(); ?>
<div class="archive-wrapper">
    <div class="section-container">
        <h2 class="section-heading">
           <?php
                printf(__('Search result for: %s', 'myfirsttheme'),'<span>' . get_search_query() . '</span>');
           ?>
        </h2>
        <?php if(have_posts()) : ?>
            <div class="blog-container">
                <?php while(have_posts()) : the_post() ?>
                    <?php get_template_part('template-parts/content-card'); ?>
                <?php endwhile; ?>
            </div>
            <div class="pagination">
                    <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p>No results found for this search. Try a different keyword:</p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>