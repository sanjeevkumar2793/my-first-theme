<?php
    $contact_heading=get_theme_mod('contact_heading','');
    $contact_text=get_theme_mod('contact_text','');
?>

<section class="cta-band" id="contact">
    <div class="container">
        <h2>
            <?php echo esc_html($contact_heading); ?>
        </h2>
        <p>
            <?php echo esc_html($contact_text); ?>
        </p>
       <?php echo do_shortcode('[forminator_form id="163"]'); ?>
    <?php if(isset($_GET['contact']) &&  $_GET['contact'] ==='sent'): ?>
         <p class="contact-success">Message sent! Thanks.</p>
    <?php endif; ?>
        
    </div>
</section>