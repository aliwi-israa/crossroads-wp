<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<a href="#" id="back-to-top"></a>
<div id="de-loader"></div>
<header class="transparent scroll-light">
    <div class="container p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10 wrapper">
                    <div class="de-flex-col">
                        <div id="logo">
                            <a href="<?php echo home_url(); ?>">
                                <img class="logo-main" src="<?php echo get_template_directory_uri(); ?>/assets/images/crosroads-dental-clinic-logo-white.webp" alt="crosroads dental clinic logo" width="595" height="170" style="width: 100%; height: auto;">
                                <img class="logo-scroll" src="<?php echo get_template_directory_uri(); ?>/assets/images/crosroads-dental-clinic-logo.webp" alt="crosroads dental clinic logo" width="480" height="138" style="width: 100%; height: auto;">
                                <img class="logo-mobile" src="<?php echo get_template_directory_uri(); ?>/assets/images/crosroads-dental-clinic-logo-white.webp" alt="crosroads dental clinic logo" width="595" height="170" style="width: 100%; height: auto;">
                            </a>
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <?php
                            wp_nav_menu([
                                'theme_location' => 'main_menu',
                                'menu_id'        => 'mainmenu',
                                'container'      => false
                            ]);
                        ?>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area d-flex gap-3 align-items-center">
                            <a href="<?php echo esc_url(get_theme_mod('booking_link', '#')); ?>" class="btn-main fx-slide">
                                <span>Book Appointment</span>
                            </a>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('clinic_phone', '+1 234-5678')); ?>" class="btn-main fx-slide btn-outline-white">
                                <span>Call: <?php echo esc_html(get_theme_mod('clinic_phone', '+1 234-5678')); ?></span>
                            </a>
                            <div class="d-flex d-md-none mobile-cta">
                                <a href="<?php echo esc_url(get_theme_mod('booking_link', '#')); ?>" class="btn-cta-green" aria-label="Link to Booking an Appointment">
                                    <i class="fs-30 id-color fa-solid fas fa-calendar-alt"></i>
                                </a>
                                <a href="tel:<?php echo esc_attr(get_theme_mod('clinic_phone', '+1 234-5678')); ?>" class="btn-cta-blue" aria-label="Link to Call us">
                                    <i class="fs-30 id-color fa-solid fa-phone"></i>
                                </a>
                            </div>
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
