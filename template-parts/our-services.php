<?php
    $our_services_heading=get_theme_mod('our_services_heading','');
    $our_service_text =get_theme_mod('our_service_text','');
    $services_query=new WP_Query(array(
        'post_type' => 'services',
        'posts_per_page' => 6,
        'orderby'        => 'menu_order',
        'order' =>'ASC'
    ));
    
?>
<section class="services" id="services">
    <div class="container">
        <div class="section-head">
            <h2>
                <?php echo esc_html($our_services_heading); ?>
            </h2>
            <p>
                <?php echo esc_html($our_service_text); ?>
            </p>
        </div>
        <div class="services-grid">
             <?php if($services_query->have_posts()) : ?>
                    <?php while($services_query->have_posts()) : $services_query->the_post(); ?>
                      <?php  $service_icon = get_post_meta(get_the_ID(),'_service_icon',true); ?>
                        <article class="services-card">
                            <span class="service-icon" aria-hidden="true">
                                <?php
                                    if($service_icon){
                                        echo myfirsttheme_get_service_icon_svg($service_icon);
                                    } elseif(has_post_thumbnail()){
                                    
                                            the_post_thumbnail(array(26,26)); 
                                    
                                    }
                                ?>
                            </span>
                            <h3><?php echo esc_html(get_the_title()); ?></h3>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="learn-more">Learn more <span>›</span></a>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
        </div>
       
    </div>
</section>