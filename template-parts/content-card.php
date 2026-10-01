
<article class="blog-card">
    <div class="blog-card-content">
        <?php if(has_post_thumbnail()) : ?>
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
            <a href="<?php echo esc_url(get_permalink()); ?>" class="blog-card-link">Read More</a>
       
    </div>
</article>