<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <?php wp_body_open(); ?>
<header class="site-header">
    <div class="container header-container">
        <div class="site-branding">
            <?php if(has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
           <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo esc_html (get_bloginfo('name')); ?>
            </a>
             <?php endif; ?>
        </div>   
        <div class="header-search">
            <?php get_search_form(); ?>
        </div>
        <nav class="site-navigation">
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'primary-menu',
                    'fallback_cb' => false,
                ));
            ?>
        </nav>
        <?php 
            $header_button_text=get_theme_mod( 'header_button_text','Contact');
            $header_button_url=get_theme_mod('header_button_url','');
        ?>
        <?php if($header_button_text && $header_button_url) : ?>
            <div class="header-cta-btn">
                <a  href="<?php echo esc_url($header_button_url) ?>" class="btn btn-primary btn-sm"><?php echo esc_html($header_button_text); ?></a>
            </div>
        <?php endif; ?>

    </div>
</header>

    
