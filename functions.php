<?php
/**
 * DentalQuest AI Child Theme functions and definitions
 *
 * @package DentalQuest_Child
 */

// Define theme version (fixing the undefined constant error)
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

// Enable error reporting for debugging (remove in production)
if (!is_admin()) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

/**
 * Add Tailwind CSS and other styles in the head
 */
function dentalquest_inline_styles() {
    ?>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <style>
        :root {
            --brand-primary: #1d53dd;
            --brand-secondary: #103eb2;
            --brand-dark: #1b1f29;
            --brand-muted: #4B4F58;
            --brand-light: #f9fbff;
            --brand-white: #ffffff;
            --brand-accent: #7296f2;
            --brand-subtle: #e0e3eb;
            --brand-pricing-bg: #d1d1e1;
        }
        
        .text-brand-primary { color: var(--brand-primary); }
        .bg-brand-primary { background-color: var(--brand-primary); }
        .text-brand-secondary { color: var(--brand-secondary); }
        .bg-brand-secondary { background-color: var(--brand-secondary); }
        /* Add other custom color classes as needed */
    </style>
    <?php
}
add_action('wp_head', 'dentalquest_inline_styles', 5);

// Disable the WordPress Admin Bar for all users except administrators
if (!current_user_can('administrator')) {
    add_filter('show_admin_bar', '__return_false');
}

// Remove Register Button
function remove_register_button() {
    remove_action('wp_footer', 'wp_register');
}
add_action('wp_footer', 'remove_register_button');

/**
 * Enqueue parent theme styles and child theme styles.
 */
function dentalquest_child_scripts() {
    // Enqueue child theme style
    wp_enqueue_style('dentalquest-child-style', get_stylesheet_uri(), array(), _S_VERSION);
    
    // Add Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap', array(), null);
    
    // Add Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
}
add_action('wp_enqueue_scripts', 'dentalquest_child_scripts', 20);

/**
 * Theme setup function
 */
function dentalquest_child_setup() {
    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'dentalquest'),
        'footer'  => esc_html__('Footer Menu', 'dentalquest'),
    ));

    // Add theme support for various features
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'dentalquest_child_setup');

/**
 * Add custom classes to navigation menu items
 */
function dentalquest_nav_menu_css_class($classes, $item) {
    $classes[] = 'text-gray-600 hover:text-brand-primary px-3 py-2 rounded-md text-sm font-medium transition duration-150';
    
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'text-brand-primary';
    }
    
    return $classes;
}
add_filter('nav_menu_css_class', 'dentalquest_nav_menu_css_class', 10, 2);

/**
 * Add custom classes to navigation menu links
 */
function dentalquest_nav_menu_link_attributes($atts, $item, $args) {
    $atts['class'] = 'hover:text-brand-primary transition duration-150';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'dentalquest_nav_menu_link_attributes', 10, 3);

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function dentalquest_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'dentalquest_pingback_header');

/**
 * Debugging function
 */
function dentalquest_debug_footer() {
    if (current_user_can('administrator')) {
        echo '<!-- DentalQuest Child Theme loaded successfully -->';
    }
}
add_action('wp_footer', 'dentalquest_debug_footer'); 