<?php
/**
 * The header for our theme
 *
 * Displays the <head> section and everything up to <main>.
 * Includes Tailwind via CDN and WordPress essentials.
 *
 * @package ToothTheme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen flex flex-col">
