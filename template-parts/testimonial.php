<?php
   $testimonial_query = new WP_Query(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => -1,
                ));
?>

  <?php if ($testimonial_query->have_posts()) : ?>
        <section class="section-padding main-background">
            <h2 class="section-heading text-center text-white">
                <?php echo esc_html(get_theme_mod('testimonial_heading','Testimonial')); ?>
            </h2>
            <div class="testimonial-container">
                <div class="testimonial-wrapper">
                    <div class="slider-track">
                            <?php while($testimonial_query->have_posts()) : $testimonial_query->the_post();?>
                            <div class="testimonial-card">
                                <div class="testimonial-content">
                                    <div class="testimonial-card-content">
                                        <?php echo esc_html(get_the_content()); ?>
                                    </div>
                                    <?php $rating=get_post_meta(get_the_ID(),'_testimonial_rating',true); ?>
                                    <?php if($rating): ?>
                                        <div class="testimonial-rating">
                                            <?php echo str_repeat('★', $rating); ?>
                                            <?php echo str_repeat('☆', max(0, 5 - $rating)); ?>
                                        </div>
                                    <?php endif; ?>
                                
                                    <h2 class="testimonial-author">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </h2>
                                    <?php $company=get_post_meta(get_the_ID(),'_testimonial_company',true); ?>
                                    <?php if($company) : ?>
                                        <div class="testimonial-company">
                                            <?php echo esc_html($company); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php $position=get_post_meta(get_the_ID(),'_testimonial_position',true); ?>
                                    <?php if($position) : ?>
                                        <div class="testimonial-position">
                                            <?php echo esc_html($position); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(has_post_thumbnail()): ?>
                                        <div class="testimonial-image">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endwhile; 
                            wp_reset_postdata();
                            ?>
                    </div>
                   <button class="slider-prev">←</button>
                   <button class="slider-next">→</button>
                  
                </div>
                 <div class="slider-dots"></div>
            </div>
        </section>
      <?php endif; ?>