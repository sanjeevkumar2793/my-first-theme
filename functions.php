<?php

function myfirsttheme_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5',array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    register_nav_menus(array(
        'primary-menu' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'myfirsttheme_setup');

function myfisttheme_styles(){
    wp_enqueue_style(
        'myfirsttheme-style', 
        get_stylesheet_uri(),
        array(),
        filemtime(get_stylesheet_directory().'/style.css')
        );

    wp_enqueue_script(
        'myfirsttheme-js',
        get_template_directory_uri().'/assets/js/main.js',
        array(),
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'myfisttheme_styles');

function myfirsttheme_excerpt_more($more){
    return '...';
}
add_filter('excerpt_more', 'myfirsttheme_excerpt_more');

function myfirsttheme_header_button_register($wp_customize){
    $wp_customize->add_section('header_options',array(
        'title' => __('Header Options','myfirsttheme'),
        'priority' => 20,
    ));
    $header_settings=array(
        'header_button_text'=>array(
            'label' =>__('Button Text','myfirsttheme'),
            'default' =>'Contact',
            'sanitize' => 'sanitize_text_field',
        ),
        'header_button_url'=>array(
            'label' =>__('Button URL','myfirsttheme'),
            'default'=>'',
            'sanitize' => 'esc_url_raw',
        ),
    );
    foreach($header_settings as $setting_id => $args){
         $wp_customize->add_setting($setting_id,array(
            'default' => $args['default'],
            'sanitize_callback' =>$args['sanitize'],
        ));
        $wp_customize->add_control($setting_id,array(
                'label' => $args['label'],
                'section' => 'header_options',
                'type' => 'text',
        ));
    }
   
   
}
add_action('customize_register','myfirsttheme_header_button_register');

function myfirsttheme_customize_register($wp_customize){
    $wp_customize->add_section('hero_options', array(
        'title' => __('Hero Options','myfirsttheme'),
        'priority' => 30,
    ));
    $hero_settings=array(
        'hero_subtitle' => array(
            'label' => __('Hero Subtitle', 'myfirsttheme'),
            'default' => get_bloginfo('description'),
            'sanitize' => 'sanitize_text_field',
            'type' => 'text',
        ),
        'hero_title' => array(
            'label' => __('Hero Title','myfirsttheme'),
            'default' => get_bloginfo('name'),
            'sanitize' => 'sanitize_text_field',
            'type' => 'text',
        ),
        'hero_text' => array(
            'label' => __('Hero Text','myfirsttheme'),
            'default' => '',
            'sanitize' => 'sanitize_textarea_field',
            'type' => 'textarea',
        ),
        'hero_btn_text' => array(
            'label' => __('Button Text','myfirsttheme'),
            'default' => 'Home',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text',
        ),
        'hero_btn_link' => array(
            'label' => __('Button Link', 'myfirsttheme'),
            'default' => '/learning',
            'sanitize' => 'esc_url_raw',
            'type' => 'text',
        ),
        'hero_second_btn_text' => array(
            'label' => __('Button Two Text','myfirsttheme'),
            'default' => 'Home',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text',
        ),
        'hero_second_btn_link' => array(
            'label' => __('Button Two Link', 'myfirsttheme'),
            'default' => '/learning',
            'sanitize' => 'esc_url_raw',
            'type' => 'text',
        ),
        'home_blog_section_heading' => array(
            'label' => __('Latest Post Heading','myfirsttheme'),
            'default' => 'Latest Blogs',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text',
        ),
    );

    foreach($hero_settings as $setting_id => $args){
        $wp_customize->add_setting($setting_id,array(
            'default' => $args['default'],
            'sanitize_callback' => $args['sanitize'],
        ));
        $wp_customize->add_control($setting_id,array(
            'label' => $args['label'],
            'section' => 'hero_options',
            'type' => $args['type'],
        ));
    }

    $wp_customize->add_setting('hero_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
                $wp_customize,
                'hero_image',
                array(
                'label' => 'Hero image',
                'section' => 'hero_options',
                )
            )
        ); 
   
}
add_action('customize_register','myfirsttheme_customize_register');

function myfirsttheme_homeabout_register($wp_customize){
    $wp_customize->add_section('about_options',array(
        'title' => __('About Options','myfirsttheme'),
        'priority' => 40,
    ));
    $about_settings = array(
        'about_subtitle'=> array(
            'label' => __('About Subtitle','myfirsttheme'),
            'default' => 'About Subtitle',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text',
        ),
        'about_heading' => array(
            'label' => __('About Heading', 'myfirsttheme'),
            'default' => 'About Heading',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text',
        ),
        'about_description' => array(
            'label' => __('About Description','myfirsttheme'),
            'default' => 'Enter Description here',
            'sanitize' => 'sanitize_textarea_field',
            'type' => 'textarea',
        ),
        'about_stat_1' => array(
            'label' =>__('Enter Years','myfirsttheme'),
            'default' => '',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text'
        ),
        'about_stat_1_label' => array(
            'label' => __('Enter Text For Year','myfirsttheme'),
            'default' => '',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text'
        ),
        'about_stat_2' => array(
            'label' =>__('Enter Projects','myfirsttheme'),
            'default' => '',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text'
        ),
        'about_stat_2_label' => array(
            'label' => __('Enter Text For Projects','myfirsttheme'),
            'default' => '',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text'
        ),
        'about_stat_3' => array(
            'label' =>__('Enter Client Satisfaction','myfirsttheme'),
            'default' => '',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text'
        ),
        'about_stat_3_label' => array(
            'label' => __('Enter Text For Client Satisfaction','myfirsttheme'),
            'default' => '',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text'
        ),
        'about_btn_label' =>array(
            'label' => __('Button Text', 'myfirsttheme'),
            'default' => '',
            'sanitize' =>'sanitize_text_field',
            'type' => 'text'
        ),
        'about_btn_link' =>array(
            'label' => __('Button Link', 'myfirsttheme'),
            'default' => '',
            'sanitize' =>'esc_url_raw',
            'type' => 'text'
        ),

    );
    foreach($about_settings as $setting_id => $args){
        $wp_customize -> add_setting($setting_id,array(
            'default' => $args['default'],
            'sanitize_callback' => $args['sanitize'],
        ));
        $wp_customize -> add_control($setting_id,array(
            'label' => $args['label'],
            'section' => 'about_options',
            'type' => $args['type'],
        ));

    }

    $wp_customize->add_setting('about_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize -> add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'about_image',
            array(
                'label' => __('About Image','myfirsttheme'),
                 'section' => 'about_options',
            )
        )
    );

}
add_action('customize_register','myfirsttheme_homeabout_register');


//cpt
function myfirsttheme_services_cpt(){
    register_post_type(
        'services',
        array(
            'label'        => 'Services',
            'labels'       => array(
                'name'          => 'Services',
                'singular_name' => 'Service',
                'add_new'       => 'Add New Service',
                'add_new_item'  => 'Add New Service',
                'edit_item'     => 'Edit Service',
                'new_item'      => 'New Service',
                'view_item'     => 'View Service',
                'search_items'  => 'Search Services',
                'not_found'     => 'No services found',
                
            ),
            'public'       => true,
            'has_archive'  => true,
            'supports'     => array('title', 'editor', 'thumbnail', 'excerpt','author','comments', 'revisions','page-attributes'),
            'menu_icon'    => 'dashicons-admin-generic',
            'rewrite'      => array('slug' => 'services'),
            
        )
    );

    register_taxonomy(
        'service_category',
        'services',    
        array(
            'label' => 'Service Categories',
            'labels'    => array(
                'name'          => 'Service Categories',
                'singular_name' => 'Service Category',
                'search_items'  => 'Search Service Categories',
                'all_items'     => 'All Service Categories',
                'edit_item'     => 'Edit Service Category',
                'add_new_item'  => 'Add New Service Category',
                'not_found'     => 'No Service Categories found',
            ),
            'hierarchical' => true,
            'rewrite'      => array('slug' => 'service-category'),   // URL ke liye safe hyphen
        )  
    );
}
add_action('init', 'myfirsttheme_services_cpt');

function myfirsttheme_homeservices_register($wp_customize){
    $wp_customize->add_section('our_services_options',array(
        'title' => __('Our Services Options','myfirsttheme'),
         'priority' => 45,
    ));
    $our_servies_settings=array(
        'our_services_heading' => array(
            'label' => __('Our Services Heading','myfirsttheme'),
            'default' => '',
            'sanitize' => 'sanitize_text_field',
            'type' => 'text'
        ),
        'our_service_text' =>array(
            'label' => __('Our Services Text','myfirsttheme'),
            'default' =>'',
            'sanitize' => 'sanitize_textarea_field',
            'type' => 'textarea'
        ),
    );
    foreach($our_servies_settings as $setting_id=>$args){
        $wp_customize->add_setting($setting_id,array(
            'default' => $args['default'],
            'sanitize_callback' => $args['sanitize'],
        ));

        $wp_customize->add_control($setting_id,array(
            'label' => $args['label'],
            'section' => 'our_services_options',
            'type' => $args['type'],
        ));
    }
}
add_action('customize_register','myfirsttheme_homeservices_register');

function myfirsttheme_service_icons(){
    return array(
        '' => 'None - Use Image',
        'design' => 'Web Design',
        'code' => 'Development',
        'ui' => 'UI/UX Design',
        'cart'    => 'E-commerce',
        'speed'   => 'Optimization',
        'support' => 'Maintenance',
    );
}
function myfirsttheme_get_service_icon_svg($key){
    $svgs=array(
        'design' => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none"><rect x="2" y="2" width="22" height="22" rx="3" stroke="currentColor" stroke-width="1.6"></rect><path d="M2 9h22" stroke="currentColor" stroke-width="1.6"></path><circle cx="6" cy="5.5" r="0.9" fill="currentColor"></circle><circle cx="9.2" cy="5.5" r="0.9" fill="currentColor"></circle></svg>',
        'code' => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M8 6 2 13l6 7M18 6l6 7-6 7M15 3l-4 20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
        'ui' => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none"><rect x="2" y="4" width="22" height="16" rx="2" stroke="currentColor" stroke-width="1.6"></rect><path d="M9 24h8M13 20v4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path></svg>',
        'cart'    => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M2 3h3l2.4 14.4a2 2 0 0 0 2 1.6h9.3a2 2 0 0 0 2-1.6L23 8H6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path><circle cx="10" cy="23" r="1.4" fill="currentColor"></circle><circle cx="18" cy="23" r="1.4" fill="currentColor"></circle></svg>',
        'speed'   => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M13 2v4M13 20v4M2 13h4M20 13h4M5 5l3 3M18 18l3 3M21 5l-3 3M8 18l-3 3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path><circle cx="13" cy="13" r="5" stroke="currentColor" stroke-width="1.6"></circle></svg>',
        'support' => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M13 3v3M13 20v3M3 13h3M20 13h3M6 6l2 2M18 18l2 2M20 6l-2 2M8 18l-2 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path><path d="M13 9a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" stroke="currentColor" stroke-width="1.6"></path></svg>',
    );
    return isset($svgs[$key]) ? $svgs[$key] : '';
}
function myfirsttheme_service_icon_meta_box(){
    add_meta_box(
        'service_icon',
        'Service Icon',
        'myfirsttheme_service_icon_meta_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes','myfirsttheme_service_icon_meta_box');

function myfirsttheme_service_icon_meta_callback($post){
    wp_nonce_field('myfirsttheme_service_icon_save','service_icon_nonce');
    $icon = get_post_meta($post->ID,'_service_icon',true);
    ?>
        <select name="_service_icon" style="width:100%">
            <?php foreach(myfirsttheme_service_icons() as $key =>$label) : ?>
                <option value="<?php echo esc_attr($key); ?>" <?php selected($icon,$key); ?> >
                    <?php echo esc_html($label) ?>
                </option>
            <?php endforeach; ?>
        </select> 
    <?php
}

function myfirsttheme_service_icon_save($post_id){
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if(!isset($_POST['service_icon_nonceuser']) || !wp_verify_nonce($_POST['service_icon_nonce'],'myfirsttheme_service_icon_save')) return;
    if(!current_user_can('edit_post',$post_id)) return;
    if(get_post_type($post_id) !== 'services') return;
    if(isset($_POST['_service_icon'])){
        update_post_meta($post_id,'_service_icon', sanitize_key($_POST['_service_icon']));
    }
}
add_action('save_post','myfirsttheme_service_icon_save');
// cpt testimonials
function myfirsttheme_testimonials_cpt(){
    register_post_type(
        'testimonial',
        array(
            'label' => 'Testimonials',
            'labels' => array(
                'name' => 'Testimonials',
                'singular_name' => 'Testimonial',
                'add_new' => 'Add New Testimonial',
                'add_new_item' =>  'Add New Testimonial',
                'edit_item' => 'Edit Testimonial',
                'new_item' => 'New Testimonial',
                'view_item'     => 'View Testimonial',
                'search_items'  => 'Search Testimonial',
                'not_found'     => 'No testimonials found',
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-format-quote',
            'rewrite' => array('slug' => 'testimonial'),
        )
    );
}
add_action('init','myfirsttheme_testimonials_cpt');

function myfirsttheme_hometestimonial_register($wp_customize){
    $wp_customize->add_section('testimonial_options',array(
        'title' =>__('Testimonial Options','myfirsttheme'),
        'priority' => 50,
    ));
    $wp_customize->add_setting('testimonial_heading',array(
       
        'default' => 'Testimonial',
        'sanitize_callback'=>'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonial_heading',array(
         'label' => __('Testimonial Heading','myfirsttheme'),
          'type' => 'text',
         'section' =>'testimonial_options',
    ));
}
add_action('customize_register','myfirsttheme_hometestimonial_register');

function myfirsttheme_testimonial_meta_box(){
    add_meta_box(
        'testimonial_details',
        'Testimonial Details',
        'myfirsttheme_testimonial_details_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes','myfirsttheme_testimonial_meta_box');

function myfirsttheme_testimonial_details_callback($post){
    $rating = get_post_meta($post->ID,'_testimonial_rating',true);
    $company = get_post_meta($post->ID,'_testimonial_company',true);
    $position = get_post_meta($post->ID,'_testimonial_position',true);

    echo '<p>';
    echo '<label for="_testimonial_rating">Rating (1-5): </label>';
    echo '<input type="number" name="_testimonial_rating" id="_testimonial_rating" min="1" max="5" value="'.esc_attr($rating).'">';
    echo '</p>';
    
    echo '<p>';
    echo '<label for="_testimonial_company">Company Name</label>';
    echo '<input type="text" name="_testimonial_company" id="_testimonial_company" value="'.esc_attr($company).'" class="widefat">';
    echo '</p>';

    echo '<p>';
    echo '<label for="_testimonial_position">Position</label>';
    echo '<input type="text" name="_testimonial_position" id="_testimonial_position" value="'.esc_attr($position).'" class="widefat">';
    echo '</p>';

    wp_nonce_field('myfirsttheme_testimonial_meta', 'testimonial_meta_nonce');
}
function myfirsttheme_testimonial_save_meta($post_id) {
    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) return;
    if(!current_user_can('edit_post',$post_id)) return;
    if (! isset($_POST['testimonial_meta_nonce']) ||
        ! wp_verify_nonce($_POST['testimonial_meta_nonce'], 'myfirsttheme_testimonial_meta')) {
        return;
    }

    if (get_post_type($post_id) !== 'testimonial') return;

    
    $rating = absint($_POST['_testimonial_rating']);
    if ($rating < 1 || $rating > 5) {
        $rating = 5;   // ya koi default
    }

   update_post_meta($post_id, '_testimonial_rating', $rating);
   if(isset($_POST['_testimonial_company'])){
        update_post_meta(
            $post_id,
            '_testimonial_company',
            sanitize_text_field($_POST['_testimonial_company'])
        );
   }
  
   if(isset($_POST['_testimonial_position'])){
        update_post_meta(
            $post_id,
            '_testimonial_position',
            sanitize_text_field($_POST['_testimonial_position'])
        );
   }

  
}
add_action('save_post','myfirsttheme_testimonial_save_meta');

//footer

function myfirsttheme_widgets_init(){
    $footer_cols=array(
        array('name' => __('Footer Column 1 - Logo/About','myfirsttheme'), 'id' => 'footer-1'),
        array('name' => __('Footer Columm 2 - Navigation','myfirsttheme'), 'id' => 'footer-2'),
        array('name' => __('Footer Column 3 - Contact','myfirsttheme'),'id' => 'footer-3'),
    );
    foreach ($footer_cols as $col){
         register_sidebar(array(
        'name' => $col['name'],
        'id' => $col['id'],
        'before_widget' =>'<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' =>'<h3 class="footer-widget-title">',
        'after_title' =>'</h3>',
    ));
    }
   
}
add_action('widgets_init','myfirsttheme_widgets_init');