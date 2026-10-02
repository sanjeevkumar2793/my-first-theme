 <?php 
                $query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));
                $home_blog_section_heading = get_theme_mod('home_blog_section_heading','Latest Blogs');

              

             
        ?>
        <section class="section-padding">
          
            <h2 class="section-heading text-center"><?php echo esc_html($home_blog_section_heading); ?></h2>
            <?php if ($query->have_posts()) : ?>
                <div class="blog-container">
                    <?php   
                        while($query->have_posts()): $query->the_post();
                            get_template_part('template-parts/content-card');
                        endwhile;
                    ?>
                </div>
            <?php 
                wp_reset_postdata();
                endif; 
            ?>
      </section>
    