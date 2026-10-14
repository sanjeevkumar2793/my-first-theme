<?php
    $contact_heading=get_theme_mod('contact_heading','');
    $contact_text=get_theme_mod('contact_text','');
?>

<section class="cta-band paper-deep" id="contact">
    <div class="container">
        <div class="section-head">
            <h2 class="heading-mb">
                <?php echo esc_html($contact_heading); ?>
            </h2>
            <p>
                <?php echo esc_html($contact_text); ?>
            </p>
        </div>
       <div class="contact-form">
            <?php echo do_shortcode('[forminator_form id="163"]'); ?>
       </div>
       
    
        
    </div>
</section>