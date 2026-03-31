<?php

/**
 * Fortuna Beauty Theme Functions
 */

// Theme Setup
function eluxnails_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'eluxnails'),
    ));
}
add_action('after_setup_theme', 'eluxnails_setup');

// Enqueue Styles & Scripts
function eluxnails_enqueue_assets()
{
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Great+Vibes&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400&display=swap', array(), null);

    // Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), null);

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), null);

    // AOS Animation
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array(), null);

    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);

    // Custom CSS
    wp_enqueue_style('eluxnails-custom', get_template_directory_uri() . '/assets/css/custom-style.css', array('bootstrap-css'), '1.0');

    // Theme stylesheet
    wp_enqueue_style('eluxnails-style', get_stylesheet_uri(), array('eluxnails-custom'), '1.0');

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), null, true);

    // AOS JS
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), null, true);

    // Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);

    // Custom JS
    wp_enqueue_script('eluxnails-script', get_template_directory_uri() . '/assets/js/custom-script.js', array('bootstrap-js', 'aos-js', 'swiper-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'eluxnails_enqueue_assets');

// Theme Activation Automation
function eluxnails_activate_theme()
{
    // 1. Set Permalinks to /%postname%/
    if (get_option('permalink_structure') !== '/%postname%/') {
        update_option('permalink_structure', '/%postname%/');
    }

    // 2. Define pages to create
    $pages = array(
        'gallery' => array(
            'title' => 'Gallery',
            'template' => 'page-gallery.php'
        ),
        'prices' => array(
            'title' => 'Prices',
            'template' => 'page-prices.php'
        ),
        'contact' => array(
            'title' => 'Contact',
            'template' => 'page-contact.php'
        )
    );

    foreach ($pages as $slug => $data) {
        $check_page = get_page_by_path($slug);

        if (!$check_page) {
            $page_id = wp_insert_post(array(
                'post_title' => $data['title'],
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1
            ));

            if ($page_id) {
                update_post_meta($page_id, '_wp_page_template', $data['template']);
            }
        } else {
            // Already exists, still update the template to be sure
            update_post_meta($check_page->ID, '_wp_page_template', $data['template']);
        }
    }

    // 3. Flush Rewrite Rules
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'eluxnails_activate_theme');

// Language Switcher Helper
function elux_get_lang()
{
    if (isset($_GET['lang'])) {
        $lang = $_GET['lang'] == 'en' ? 'en' : 'de';
        setcookie('elux_lang', $lang, time() + (86400 * 30), "/");
        return $lang;
    }
    return isset($_COOKIE['elux_lang']) ? $_COOKIE['elux_lang'] : 'de';
}

function _el($de, $en)
{
    echo elux_get_lang() == 'en' ? $en : $de;
}

function __el($de, $en)
{
    return elux_get_lang() == 'en' ? $en : $de;
}

function elux_custom_assets()
{
    // Nạp CSS
    wp_enqueue_style('elux-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');

    // Nạp JS
    wp_enqueue_script('elux-custom-script', get_template_directory_uri() . '/assets/js/custom-script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'elux_custom_assets');
