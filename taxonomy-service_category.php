<?php get_header(); ?>
    <main class="archive-wrapper">
        <div class="archive-container">
            <h1 class="section-heading text-center">
                <?php the_archive_title(); ?>
            </h1>
           
                <?php if(have_posts()) : ?>
                     <div class="blog-container">
                            <?php while(have_posts()) : the_post(); ?>
                                <?php get_template_part('template-parts/content-card'); ?>
                            <?php endwhile; ?>
                        
                            
                    </div>
                    <div class="blog-pagination">
                        <?php
                            the_posts_pagination([
                                'mid-size' =>2,
                                'prev_text'=> '← Newer',
                                'next_text'=> 'Older →',
                                    'screen_reader_text' => 'Services category navigation',
                            ]);
                        ?>
                    </div>
                <?php else : ?>
                        <p>No services post found.</p>
                <?php endif; ?>
        </div>
    </main>
<?php get_footer(); ?>