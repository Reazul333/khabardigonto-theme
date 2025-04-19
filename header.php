<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>

    <!-- ✅ Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <!-- ✅ Meta SEO Tags -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ Open Graph (Facebook Preview) -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url()); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.jpg">

    <!-- ✅ Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.jpg">

    <!-- ✅ Canonical URL -->
    <link rel="canonical" href="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>

    <!-- 🟢 Top Bar with Date & Social Icons -->
    <div class="top-bar">
        <div class="date">
            📅 <?php echo date_i18n('j F, Y'); ?>
        </div>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-x-twitter"></i></a>
            <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </div>

    <!-- 🔴 Site Title & Tagline -->
    <div class="header-top">
        <div class="site-branding">
            <?php
            if (function_exists('the_custom_logo') && has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<h1><a href="' . home_url() . '">' . get_bloginfo('name') . '</a></h1>';
            }
            ?>
            <p><?php bloginfo('description'); ?></p>
        </div>
    </div>

    <!-- ☰ Hamburger Menu -->
    <button class="hamburger-menu" id="hamburger-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button>

    <!-- 🔗 Navigation Menu -->
    <nav class="main-menu" id="main-menu">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'menu',
        ));
        ?>
    </nav>

    <!-- 🔍 Search Box -->
    <div class="search-box">
        <?php get_search_form(); ?>
    </div>

    <!-- 🌙 Dark Mode Toggle -->
    <?php if (get_theme_mod('enable_dark_mode_toggle', true)) : ?>
        <div class="dark-mode-toggle" style="text-align: center; margin-top: 10px;">
            <button id="darkModeBtn" title="Dark Mode Toggle">🌙 ডার্ক মোড</button>
        </div>
    <?php endif; ?>

</header>

