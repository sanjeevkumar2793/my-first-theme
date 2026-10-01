<?php
    $about_heading = get_theme_mod('about_heading','About Heading');
    $about_description = get_theme_mod('about_description','Enter Description here');
    $about_image =get_theme_mod("about_image",'');
    $about_subtitle = get_theme_mod('about_subtitle','About Subtitle');
    $about_stat_1 = get_theme_mod('about_stat_1','');
    $about_stat_2 = get_theme_mod('about_stat_2','');
    $about_stat_3 = get_theme_mod('about_stat_3','');
    $about_stat_1_label = get_theme_mod('about_stat_1_label','');
    $about_stat_2_label = get_theme_mod('about_stat_2_label','');
    $about_stat_3_label = get_theme_mod('about_stat_3_label','');
    $about_btn_label = get_theme_mod('about_btn_label','');
    $about_btn_link = get_theme_mod('about_btn_link','');
?>
<section class="about" id="about">
    <div class="container about-grid">
        <div class="about-image">
             <?php if($about_image) : 
                $img_id = attachment_url_to_postid($about_image);
                $img_alt =$img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                $img_alt = $img_alt ?   $img_alt : ''; 
            ?>
           
                    <img src="<?php echo esc_url($about_image); ?>"
                        alt="<?php echo esc_attr($img_alt); ?>"
                    >
                
            <?php endif; ?>
        </div>
        <div class="about-content">
            <p class="hero-tag">
                <?php echo esc_html($about_subtitle); ?>
            </p>
             <h2 >
                <?php echo esc_html($about_heading); ?>
            </h2>
            <p>
                <?php echo esc_html($about_description); ?>
            </p>
            <div class="about-stats-wrapper">
                <div class="about-stats">
                    <div class="about-stats-number">
                        <?php echo esc_html($about_stat_1); ?>
                    </div>
                    <div class="about-stats-text">
                        <?php echo esc_html($about_stat_1_label); ?>
                    </div>
                </div>
            
                <div class="about-stats">
                    <div class="about-stats-number">
                        <?php echo esc_html($about_stat_2); ?>
                    </div>
                    <div class="about-stats-text">
                        <?php echo esc_html($about_stat_2_label); ?>
                    </div>
                </div>
                <div class="about-stats">
                    <div class="about-stats-number">
                        <?php echo esc_html($about_stat_3); ?>
                    </div>
                    <div class="about-stats-text">
                        <?php echo esc_html($about_stat_3_label); ?>
                    </div>
                </div>
            </div>
            <?php if ($about_btn_label && $about_btn_link) : ?>
                <a href="<?php echo esc_url($about_btn_link); ?>" class="btn btn-primary">
                    <?php echo esc_html($about_btn_label); ?>
                </a>
            <?php endif; ?>
        </div>
       
    </div>
</section>