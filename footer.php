<footer class="site-footer">
    <div class="site-container">
        <div class="footer-widgets">
            <?php 
                for($i = 1; $i<=3; $i++){
                    if(is_active_sidebar('footer-'.$i)){
                        echo '<div class="footer-column footer-col-' . $i . '">';
                        dynamic_sidebar('footer-'.$i);
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <p>
            &copy; <?php echo wp_date('Y'); ?>
           <?php echo esc_html(get_bloginfo('name')); ?>
                
        </p>
    </div>
    
</footer>
<?php wp_footer(); ?>
</body>
</html>