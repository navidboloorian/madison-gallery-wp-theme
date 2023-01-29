<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Madison Gallery">
        <meta name="author" content="Navid Boloorian">
        <?php 
            // injects styles
            wp_head(); 
        ?>
    </head>
    <body>
        <header id="header-wrapper">
            <nav id="navbar">
                <!--unblurred this image as a QOL fix from the original website-->
                <a href="#"><img width="235" alt="Madison Gallery" src=<?php echo get_template_directory_uri()."/assets/images/navbar-logo.jpg" ?>></a>
                <?php
                    // retrieves the menu links wp admin
                    wp_nav_menu(
                        array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                        )
                    );
                ?>
            </nav>
        </header>