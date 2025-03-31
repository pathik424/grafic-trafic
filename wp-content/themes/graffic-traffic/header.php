<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // This is required for WordPress to insert styles, scripts, and metadata ?>
</head>
<body <?php body_class(); ?>>


<header class="header_otr">
    <div class="container">
        <div class="header_main">
            <div class="header_image">
                <a href="<?php echo site_url(); ?>">
							<?php $header_logo = get_field('header_logo', 'option');
							if (!empty($header_logo)): ?>
								<img src="<?php echo esc_url($header_logo['url']); ?>" alt="<?php echo esc_attr($header_logo['alt']); ?>" />
							<?php endif; ?>
						</a>
            </div>
            <div class="header_menu right_menu ">
            <?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
            </div>
            <div class="mobileIcon">
                <span></span>
            </div>
        </div>
    </div>
</header>