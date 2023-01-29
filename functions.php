<?php
    // unlocks wp features
    function mg_theme_support() {
        // adds dynamic title tags
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }

    function mg_register_styles() {
        // get version from style.css header comment
        $version = wp_get_theme()->get('Version');

        // array param is an array of dependencies
        wp_enqueue_style('madisongallery-style', get_template_directory_uri().'/style.css', array(), $version, 'all');
    }

    function mg_register_scripts() {
        // final parameter makes script tag show up in footer
        wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.3.min.js', array(), '1.0', true);
        wp_enqueue_script( 'madisongallery-script', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true);
    }

    function mg_menus() {
        $menu_locations = array(
            'primary' => 'Desktop Primary Navbar',
            'footer' => 'Footer Menu Items'
        );

        register_nav_menus($menu_locations);
    }

    function mg_post_type_artist() {
        $labels = array(
            'name' => __('Artist'),
            'singular_name' => __('Artist'),
            'add_new' => __('Add New Artist'),
            'add_new_item' => __('Add New Artist'),
            'edit_item' => __('Edit Artist'),
            'new_item' => __('New Artist'),
            'all_items' => __('All Artists'),
            'view_item' => __('View Artist'),
            'search_items' => __('Search Artists'),
        );

        $args = array(
            'labels' => $labels,
            'description' => 'Artist posts',
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
            'has_archive' => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
        );

        register_post_type('artist', $args);
    }


    // hijack wp hooks
    add_action('after_setup_theme', 'mg_theme_support');
    add_action('wp_enqueue_scripts', 'mg_register_styles');
    add_action('wp_enqueue_scripts', 'mg_register_scripts');
    add_action('init', 'mg_menus');
    add_action('init', 'mg_post_type_artist');
?>