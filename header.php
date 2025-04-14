<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until the main content.
 * It includes essential WordPress hooks and Tailwind CSS.
 * It deliberately omits any visible header structure (like logos or navigation).
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DentalQuest
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php // Tailwind CSS via CDN ?>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    <?php // Font Awesome and AOS CSS - Required for our landing page components ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <?php // Google Fonts - Poppins ?>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <?php // WordPress Head Hook ?>
    <?php wp_head(); ?>

    <style>
        /* Essential CSS Variables and Reset */
        :root {
            --primary-color: #007bff;
            --secondary-color: #17a2b8;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
            --white-color: #ffffff;
            --text-color: #212529;
            --gradient-primary: linear-gradient(90deg, #007bff, #17a2b8, #007bff);
            --section-padding: 40px 0;
            --container-width: 1140px;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.5;
            color: var(--text-color);
        }

        .container {
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 0 15px;
            width: 100%;
        }

        /* Basic Button Styles */
        .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-primary {
            background-image: var(--gradient-primary);
            background-size: 200% 200%;
            color: var(--white-color);
            border: none;
            animation: gradientShift 4s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?> 