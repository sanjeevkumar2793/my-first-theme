<?php
    $hero_title = get_theme_mod('hero_title',get_bloginfo('name'));
    $hero_subtitle = get_theme_mod('hero_subtitle',get_bloginfo('description'));
    $hero_text = get_theme_mod('hero_text','');
    $hero_btn_text = get_theme_mod('hero_btn_text','Home');
    $hero_btn_link = get_theme_mod('hero_btn_link','/learning');
    $hero_second_btn_text = get_theme_mod('hero_second_btn_text', 'Home2');
    $hero_second_btn_link = get_theme_mod('hero_second_btn_link','/learning');
    $hero_image = get_theme_mod('hero_image','');

    if (! $hero_btn_link) {
        $services_page = get_page_by_path('services');
        if ($services_page) {
            $hero_btn_link = get_permalink($services_page->ID);
        }
    }
?>
<section class="hero-section" aria-label="<?php echo esc_attr($hero_title); ?>">
   <div class="container hero-container">
        <div class="hero-content">
             <p class="hero-tag">
                <?php echo esc_html($hero_subtitle); ?>
            </p>
            <h1>
                <?php echo esc_html($hero_title); ?>
            </h1>
            <p class="hero-text">
                <?php echo esc_html($hero_text); ?>
            </p>
        
            <div class="hero-actions">
                <?php if ($hero_btn_link && $hero_btn_text) : ?>
                    <a href="<?php echo esc_url($hero_btn_link); ?>"
                    class="btn btn-primary">
                        <?php echo esc_html($hero_btn_text); ?>
                    </a>
                <?php endif; ?>
                <?php if ($hero_second_btn_link && $hero_second_btn_text) : ?>
                    <a href="<?php echo esc_url($hero_second_btn_link); ?>"
                    class="btn btn-ghost">
                        <?php echo esc_html($hero_second_btn_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
       <div class="hero-image-section">
            <?php if($hero_image) : 
                $img_id = attachment_url_to_postid($hero_image);
                $img_alt =$img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';
                $img_alt = $img_alt ?   $img_alt : ''; 
            ?>
            <div class="hero-image">
                <img src="<?php echo esc_url($hero_image) ?>"
                alt="<?php echo esc_attr($img_alt); ?>"> 
            </div>
            <?php endif; ?>
       </div>
       
       
    </div>
</section>