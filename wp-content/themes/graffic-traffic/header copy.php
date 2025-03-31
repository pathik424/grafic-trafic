<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // This is required for WordPress to insert styles, scripts, and metadata ?>
</head>
<body <?php body_class(); ?>>

<!--
<header>
    <div class="site-header">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php 
                if (has_custom_logo()) {
                    the_custom_logo(); // Displays custom logo if set
                } else {
                    bloginfo('name'); // Displays site title if no custom logo
                }
                ?>
            </a>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary', // Register this location in functions.php
                'menu_class' => 'menu', // Add a CSS class to the menu
                'fallback_cb' => false, // Prevents a fallback menu
            ));
            ?>
        </nav>
    </div>
</header>
