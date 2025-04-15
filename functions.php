<?php
/**
 * ToothTheme - Child Theme Functions
 */

add_action( 'wp_enqueue_scripts', 'tooththeme_enqueue_styles' );
function tooththeme_enqueue_styles() {
    wp_enqueue_style( 'astra-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tailwind-cdn', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css' );
}

add_action( 'after_setup_theme', 'tooththeme_setup' );
function tooththeme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
