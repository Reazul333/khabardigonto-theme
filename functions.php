<?php
// ✅ CSS & JS সব একসাথে এনকিউ
function khabardigonto_enqueue_scripts() {
    // CSS
    wp_enqueue_style('khabardigonto-style', get_stylesheet_uri());

    // 🍔 মোবাইল মেনু
    wp_enqueue_script('hamburger-menu', get_template_directory_uri() . '/js/hamburger-menu.js', array(), null, true);

    // 🧠 ট্যাব সাইডবার
    wp_enqueue_script('sidebar-tabs', get_template_directory_uri() . '/js/sidebar-tab.js', array(), null, true);

    // 🌙 ডার্ক মোড
    wp_enqueue_script('dark-mode', get_template_directory_uri() . '/js/dark-mode.js', array(), null, true);

    // 🌀 Load More
    wp_enqueue_script('load-more', get_template_directory_uri() . '/js/load-more.js', array(), null, true);
    wp_localize_script('load-more', 'load_more_obj', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'khabardigonto_enqueue_scripts');

// ✅ থাম্বনেইল সাপোর্ট
add_theme_support('post-thumbnails');

// ✅ পোস্ট ফরম্যাট সাপোর্ট
add_theme_support('post-formats', array('image', 'video', 'quote'));

// ✅ কাস্টম লোগো সাপোর্ট
function khabardigonto_theme_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'khabardigonto_theme_setup');

// ✅ মেনু রেজিস্টার
function khabardigonto_register_menus() {
    register_nav_menu('primary', __('Primary Menu', 'khabardigonto'));
}
add_action('after_setup_theme', 'khabardigonto_register_menus');

// ✅ Footer + Sidebar Widgets Register
function khabardigonto_register_widget_areas() {
    // Footer 1
    register_sidebar(array(
        'name' => __('Footer Column 1', 'khabardigonto'),
        'id' => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));

    // Footer 2
    register_sidebar(array(
        'name' => __('Footer Column 2', 'khabardigonto'),
        'id' => 'footer-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));

    // Footer 3
    register_sidebar(array(
        'name' => __('Footer Column 3', 'khabardigonto'),
        'id' => 'footer-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));

    // Sidebar
    register_sidebar(array(
        'name' => __('Sidebar Widget Area', 'khabardigonto'),
        'id' => 'sidebar-1',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'khabardigonto_register_widget_areas');

// ✅ AJAX Load More
function khabardigonto_load_more_posts() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $query = new WP_Query(array(
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'paged' => $paged,
    ));

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/post-card');
        endwhile;
    endif;

    wp_die();
}
add_action('wp_ajax_load_more', 'khabardigonto_load_more_posts');
add_action('wp_ajax_nopriv_load_more', 'khabardigonto_load_more_posts');

// ✅ Theme Customizer Options
function khabardigonto_customize_register($wp_customize) {
    // Breaking News Toggle
    $wp_customize->add_section('khabardigonto_breaking_section', array(
        'title' => __('Breaking News Settings', 'khabardigonto'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('breaking_news_toggle', array(
        'default' => true,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('breaking_news_toggle', array(
        'label' => __('Show Breaking News?', 'khabardigonto'),
        'section' => 'khabardigonto_breaking_section',
        'type' => 'checkbox',
    ));

    // Dark Mode Toggle
    $wp_customize->add_setting('enable_dark_mode_toggle', array(
        'default' => true,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('enable_dark_mode_toggle', array(
        'label' => __('Enable Dark Mode Toggle?', 'khabardigonto'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'khabardigonto_customize_register');

// ✅ Breadcrumb Display
function khabardigonto_breadcrumbs_display() {
    if (!get_option('khabardigonto_enable_breadcrumbs') || is_home()) return;

    echo '<nav class="breadcrumbs">';
    echo '<a href="' . home_url() . '">🏠 হোম</a> » ';
    if (is_category() || is_single()) {
        the_category(' » ');
        if (is_single()) {
            echo ' » ';
            the_title();
        }
    } elseif (is_page()) {
        the_title();
    }
    echo '</nav>';
}
