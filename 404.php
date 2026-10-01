<?php get_header(); ?>
    <main class="page-wrapper">
        <div class="page-container">
            <h2 class="page-title">Page Not Found</h2>
            <p>The page you are looking for does not exist.</p>
            <a href="<?php echo esc_url(home_url('/')); ?>">Return to Home</a>
        </div>
    </main>
<?php get_footer(); ?>