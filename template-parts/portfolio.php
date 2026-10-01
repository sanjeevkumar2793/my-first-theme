<?php 
    $portfolio_heading = get_theme_mod('portfolio_heading','');
    $portfolio_text = get_theme_mod('portfolio_text','');
    $portfolio_query = new WP_Query(array(
        'post_type' => 'portfolio',
        'posts_per_page' => 3,
        'orderby' => 'menu_order',
        'order' =>'ASC',
    ));
?>
<section class="portfolio" id="portfolio">
    <div class="container">
       <div class="section-head">
            <h2>
                <?php echo esc_html($portfolio_heading); ?>
            </h2>
            <p>
                <?php echo esc_html($portfolio_text); ?>
            </p>
       </div>
       <div class="portfolio-grid">
            <?php if($portfolio_query->have_posts()) : ?>
                <?php while($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                   <?php  $portfolio_tag = get_post_meta(get_the_ID(),'_portfolio_tag',true); ?>
                    <article class="portfolio-card">
                        <div class="portfolio-media">
                            <?php if(has_post_thumbnail()) : ?>
                               <?php the_post_thumbnail('medium'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="portfolio-overlay">
                            <span class="portfolio-tag">
                                <?php
                                    if($portfolio_tag){
                                        echo esc_html($portfolio_tag);
                                    }
                                ?>
                            </span>
                            <h3>
                                <?php echo esc_html(get_the_title()); ?>
                            </h3>
                            <p>
                                <?php echo esc_html(get_the_excerpt()); ?>
                            </p>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
       </div>
    </div>
</section>