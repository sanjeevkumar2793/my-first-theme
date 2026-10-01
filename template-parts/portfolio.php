<?php 
    $portfolio_heading = get_theme_mod('portfolio_heading','');
    $portfolio_text = get_theme_mod('portfolio_text','');
?>
<section class="portfolio" id="portfolio">
    <div class="container">
       <div class="section-headg">
            <h2>
                <?php echo esc_html($portfolio_heading); ?>
            </h2>
            <p>
                <?php echo esc_html($portfolio_text); ?>
            </p>
       </div>
    </div>
</section>