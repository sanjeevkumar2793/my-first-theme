<?php
   $testimonial_query = new WP_Query(array(
        'post_type' => 'testimonial',
        'posts_per_page' => -1,
    ));
    $testimonial_heading=get_theme_mod('testimonial_heading','Testimonial');
    $testimonial_text = get_theme_mod('testimonial_text','');
?>

  <?php if ($testimonial_query->have_posts()) : ?>
        <section class="testimonials" id="testimonials">
            <div class="container">
                <div class="section-head">
                    <h2>
                        <?php echo esc_html($testimonial_heading); ?>
                    </h2>
                    <p>
                        <?php echo esc_html($testimonial_text); ?>
                    </p>
                </div>
                
            <div class="testimonial-container">
                <div class="testimonial-wrapper">
                    <div class="slider-track">
                            <?php while($testimonial_query->have_posts()) : $testimonial_query->the_post();?>
                            <div class="testimonial-card">
                                <div class="testimonial-content">
                                    <div class="testimonial-card-content">
                                        <blockquote>
                                            <?php echo esc_html(get_the_content()); ?>
                                        </blockquote>
                                    </div>
                                    <?php $rating=get_post_meta(get_the_ID(),'_testimonial_rating',true); ?>
                                    <?php if($rating): ?>
                                        <div class="testimonial-rating">
                                            <?php echo str_repeat('★', $rating); ?>
                                            <?php echo str_repeat('☆', max(0, 5 - $rating)); ?>
                                        </div>
                                    <?php endif; ?>
                                
                                    
                                    <?php $company=get_post_meta(get_the_ID(),'_testimonial_company',true); ?>
                                   
                                    <?php $position=get_post_meta(get_the_ID(),'_testimonial_position',true); ?>
                                    
                                    
                                    <div class="testimonial-image-wrapper">
                                        <?php if(has_post_thumbnail()): ?>
                                            <div class="testimonial-image">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="testimonial-name-postion-wrapper">
                                            <h2 class="testimonial-author">
                                                <?php echo esc_html(get_the_title()); ?>
                                            </h2>
                                            <div class="testimonial-postion-company-wrapper">
                                                <?php if($position) : ?>
                                                    <div class="testimonial-position">
                                                        <?php echo esc_html($position).',';?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($company) : ?>
                                                    <div class="testimonial-company">
                                                        <?php echo esc_html($company); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; 
                            wp_reset_postdata();
                            ?>
                    </div>
                    <div class="testimonial-controls">
                        <button class="slider-prev">←</button>
                        <div class="slider-dots"></div>
                        <button class="slider-next">→</button>
                    </div>
                  
                  
                </div>
                
            </div>
            </div>
            
        </section>
      <?php endif; ?>