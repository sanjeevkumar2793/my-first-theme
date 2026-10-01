   <?php
      $services_query = new WP_Query(array(
        'post_type'      => 'services',
        'posts_per_page' => 3,
    ));
   ?>
   <?php if ($services_query->have_posts()) : ?>
            <section class="section-padding">
                <h2 class="section-heading text-center">
                    <?php echo esc_html(get_theme_mod('home_services_heading', 'Our Services')); ?>
                </h2>
                <div class="blog-container">
                    <?php
                        while ($services_query->have_posts()) : $services_query->the_post();
                            get_template_part('template-parts/content-card');
                        endwhile;
                    ?>
                </div>
            </section>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>