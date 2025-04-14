<?php
/**
 * Front Page Template
 *
 * Inspired by external structures but implemented with DynaQuest branding and content.
 * Includes common landing page sections like Hero, Features, Benefits, Testimonials, Pricing, Footer.
 *
 * @package YourThemeName or YourChildThemeName
 */

// Get header
get_header();

// Define the sections for navigation
$sections = array(
    'hero' => 'Home',
    'challenges' => 'Challenges',
    'features' => 'Features',
    'why-choose' => 'Why Choose Us',
    'customer-focus' => 'Customer Focus',
    'pricing' => 'Pricing',
    'demo' => 'Get Demo'
);
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php // Tailwind CSS via CDN (as requested in example) ?>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script> 
    
    <!-- Add Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Add AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* --- Global Styles & Reset --- */
        :root {
            --primary-color: #007bff;
            --secondary-color: #17a2b8;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
            --white-color: #ffffff;
            --text-color: #212529;
            --gradient-primary: linear-gradient(90deg, #007bff, #17a2b8, #007bff);
            --section-padding: 40px 0; /* Reduced padding */
            --container-width: 1140px;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px; /* Account for fixed header */
            font-size: 16px;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: var(--text-color);
            background-color: var(--white-color);
            margin: 0;
            padding: 0;
            line-height: 1.5; /* Reduced line height */
            overflow-x: hidden;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 0 15px;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
            margin-bottom: 0.5rem; /* Reduced margin */
            line-height: 1.2;
            color: var(--dark-color);
        }

        h1 { font-size: 3rem; }
        h2 { font-size: 2.25rem; }
        h3 { font-size: 1.5rem; }
        h4 { font-size: 1.25rem; }

        p {
            margin-bottom: 0.8rem; /* Reduced margin */
            color: #4a4a4a;
            font-size: 1rem;
            line-height: 1.5;
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--secondary-color);
            text-decoration: none;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        i.fas, i.fab, i.far {
            display: inline-block;
            margin-bottom: 1rem;
            transition: transform 0.3s ease; /* Added for hover effect */
        }
        .card i:hover { /* Simple icon scale on hover */
            transform: scale(1.1);
        }

        section {
            padding: var(--section-padding);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .section-intro {
            max-width: 750px;
            margin: 0 auto 25px auto; /* Reduced margin */
        }
         .section-intro p {
            font-size: 1.15rem; /* Slightly larger intro paragraph */
         }

        .grid {
            display: grid;
            gap: 20px; /* Reduced gap */
        }

        .grid-3 { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
        .grid-4 { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); }

        .card {
            background-color: var(--white-color);
            padding: 20px; /* Reduced padding */
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }
         .card p {
            font-size: 0.95rem;
            line-height: 1.4;
            flex-grow: 1;
         }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            flex-shrink: 0;
        }
         .card h4 {
             flex-shrink: 0;
             font-size: 1.1rem;
             margin-bottom: 0.5rem;
         }
         #why-choose .card i, #customer-focus .card i {
             color: var(--secondary-color);
         }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .btn-primary {
            background-image: var(--gradient-primary);
            background-size: 200% 200%;
            color: var(--white-color);
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
            animation: gradientShift 4s ease infinite;
        }

        .btn-primary:hover {
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: var(--light-color);
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }

         .btn-secondary:hover {
            background-color: var(--primary-color);
            color: var(--white-color);
         }

        /* --- Header Navigation --- */
        .main-header {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 8px 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            height: 60px;
        }

        .main-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .site-logo {
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            position: relative;
        }

        .site-logo span {
            background: linear-gradient(120deg, #007bff, #00d5ff, #007bff);
            background-size: 200% auto;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
        }

        .site-logo:hover {
            text-decoration: none;
        }

        .site-logo .ai-text {
            color: var(--primary-color);
            font-weight: 800;
            margin-left: 2px;
        }

        .main-nav ul {
            list-style: none;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .main-nav a {
            color: var(--dark-color);
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 4px;
            white-space: nowrap;
        }

        .main-nav a:hover,
        .main-nav .current-menu-item a {
            color: var(--primary-color);
            background-color: rgba(0, 123, 255, 0.1);
        }

        html {
            scroll-behavior: smooth;
        }
        
        section[id] {
            scroll-margin-top: 5rem;
        }
        
        .section-nav {
            position: fixed;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 50;
            background: rgba(255, 255, 255, 0.9);
            padding: 0.5rem;
            border-radius: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .section-nav a {
            display: block;
            width: 0.75rem;
            height: 0.75rem;
            margin: 1rem 0;
            background: #e5e7eb;
            border-radius: 50%;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .section-nav a:hover {
            background: var(--brand-primary);
            transform: scale(1.2);
        }
        
        .section-nav a::before {
            content: attr(aria-label);
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            margin-right: 1rem;
            white-space: nowrap;
            font-size: 0.875rem;
            color: var(--brand-primary);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        
        .section-nav a:hover::before {
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .section-nav {
                display: none;
            }
        }

        /* --- Hero Section --- */
        #hero {
            padding-top: 100px;
            padding-bottom: 40px;
            background: linear-gradient(135deg, var(--light-color) 0%, #f0f8ff 100%);
            text-align: center;
            min-height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .ai-title {
            font-size: 3.5rem;
            font-weight: 700;
            background: linear-gradient(120deg, #007bff, #00d5ff, #007bff);
            background-size: 200% auto;
            color: #000;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
            margin-bottom: 1.5rem;
        }

        .ai-title .highlight {
            position: relative;
            display: inline-block;
        }

        .ai-title .highlight::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #007bff, #00d5ff);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.5s ease;
        }

        .ai-title:hover .highlight::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        @keyframes shine {
            0% { background-position: 200% center; }
            100% { background-position: -200% center; }
        }

        #hero .container {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        #hero h1 {
           font-size: 3.5rem;
           margin-bottom: 15px;
           color: var(--dark-color);
        }

        #hero .logo {
            max-width: 150px;
            margin: 0 auto 30px auto;
        }

        #hero h2 {
            font-size: 2.5rem; /* Slightly smaller */
            margin-bottom: 10px;
            font-weight: 500;
            min-height: 40px;
        }

        #hero p {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 25px auto;
            color: #444;
        }

        #hero .cta-button {
            margin-bottom: 25px;
        }

        .typed-cursor {
            opacity: 1;
            animation: typedjsBlink 0.7s infinite;
            color: var(--primary-color);
            font-weight: bold;
        }
        @keyframes typedjsBlink {
            50% { opacity: 0.0; }
        }

        /* --- Challenges Section --- */
        #challenges {
            background-color: var(--white-color);
        }
        #challenges .card {
            background-color: var(--light-color);
        }
         #challenges .card i {
            font-size: 3rem;
            color: var(--secondary-color);
            margin: 0 auto 1rem auto;
         }

        /* --- Features Section --- */
        #features {
            background-color: var(--light-color);
        }
         #features .card i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin: 0 auto 1rem auto;
         }

        /* --- Why Choose Section --- */
        #why-choose {
            background-color: var(--white-color);
        }
        #why-choose .section-intro p {
            font-size: 1.2rem;
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 25px;
        }
        #why-choose .section-intro .btn {
            margin-bottom: 40px;
        }

        /* --- Customer Focus Section --- */
        #customer-focus {
            background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), var(--gradient-primary);
            background-size: 100%, 200% 200%;
            color: var(--white-color);
            position: relative;
            padding: 80px 0;
        }

        #customer-focus::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            pointer-events: none;
        }

        #customer-focus .container {
            position: relative;
            z-index: 2;
        }

        #customer-focus h2 {
            color: var(--white-color);
            margin-bottom: 1.5rem;
        }

        #customer-focus .section-intro p {
            color: var(--white-color);
            font-size: 1.2rem;
            margin-bottom: 3rem;
            opacity: 0.9;
        }

        #customer-focus .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        #customer-focus .card h4 {
            color: var(--white-color);
        }

        #customer-focus .card p {
            color: rgba(255, 255, 255, 0.9);
        }

        #customer-focus .card i {
            color: var(--white-color);
            opacity: 0.9;
        }

        /* --- CTA Section Styles --- */
        .cta-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: start;
            margin-top: 30px;
        }

        .cta-content-left {
            text-align: left;
        }

        .request-demo-text {
            margin-bottom: 30px;
        }

        .request-demo-text h4 {
            font-size: 1.4rem;
            margin-bottom: 20px;
            color: var(--dark-color);
        }

        .request-demo-text p {
            margin-bottom: 15px;
        }

        .after-hours-info {
            font-size: 1.1rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 8px;
        }

        .cta-buttons-inline {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .cta-buttons-inline .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: var(--white-color);
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .cta-buttons-inline .btn:hover {
            background: var(--primary-color);
            color: var(--white-color);
            transform: translateY(-2px);
        }

        .cta-buttons-inline .btn i {
            margin: 0;
        }

        .cta-content-right {
            background: var(--white-color);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .cta-columns {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .cta-buttons-inline {
                justify-content: center;
            }

            .cta-content-left {
                text-align: center;
            }
        }

        /* Adjust section specific spacings */
        #challenges, #features, #why-choose, #customer-focus, #pricing, #final-cta {
            padding: 40px 0;
        }

        /* Smooth scroll behavior for all anchor links */
        a[href^="#"] {
            transition: all 0.3s ease;
        }

        /* Optimize animations for performance */
        [data-aos] {
            transition-duration: 600ms !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            :root {
                --section-padding: 30px 0;
            }

            h2 {
                font-size: 1.8rem;
            }

            .grid {
                gap: 15px;
            }

            .card {
                padding: 15px;
            }
        }

        @media (max-width: 576px) {
            :root { --container-width: 100%; } /* Full width */
        }

        /* --- Footer --- */
        .site-footer {
            background-color: var(--dark-color);
            color: rgba(255, 255, 255, 0.7);
            padding: 50px 0 30px 0;
            text-align: center;
        }

        .site-footer h3 {
            color: var(--white-color);
            font-size: 1.8rem; /* Adjusted size */
            margin-bottom: 10px;
        }

        .site-footer p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 25px;
            font-size: 1.05rem; /* Slightly larger footer text */
        }

        .footer-buttons {
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .footer-buttons .btn {
            background-color: var(--primary-color);
            color: var(--white-color);
            border: 1px solid var(--primary-color);
            padding: 10px 25px;
            font-size: 0.9rem;
            animation: none; /* Disable gradient animation for footer buttons */
            background-image: none; /* Reset background image */
        }
         .footer-buttons .btn i {
             margin-right: 8px; /* Space between icon and text */
             margin-bottom: 0; /* Reset icon margin */
             font-size: 0.9em; /* Slightly smaller icon */
         }

        .footer-buttons .btn:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .footer-bottom {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
        }

        .footer-bottom a {
            color: rgba(255, 255, 255, 0.7);
            margin: 0 10px;
        }

        .footer-bottom a:hover {
            color: var(--white-color);
        }

        /* --- Pricing Section --- */
        #pricing {
            background-color: var(--white-color);
            padding: 80px 0;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .pricing-card {
            background: var(--white-color);
            border-radius: 10px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .pricing-card.featured {
            border: 2px solid var(--primary-color);
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 123, 255, 0.1);
        }

        .pricing-card.featured::before {
            content: "Most Popular";
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .pricing-card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .pricing-card h3 {
            color: var(--dark-color);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .pricing-price {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .pricing-price span {
            font-size: 1rem;
            font-weight: 400;
            color: #666;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
            flex-grow: 1;
        }

        .pricing-features li {
            padding: 10px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            color: #666;
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        .pricing-features li i {
            margin-right: 8px;
            color: var(--primary-color);
        }

        .pricing-features li.included i {
            color: #28a745;
        }

        .pricing-features li.excluded {
            color: #999;
        }

        .pricing-features li.excluded i {
            color: #dc3545;
        }

        @media (max-width: 992px) {
            .pricing-grid {
                gap: 20px;
            }
            .pricing-card.featured {
                transform: scale(1.02);
            }
        }

        @media (max-width: 768px) {
            .pricing-card.featured {
                transform: none;
            }
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* Add these styles to your existing CSS section */
        .py-16 {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .md\:py-20 {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .bg-gray-50 {
            background-color: #F9FAFB;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .max-w-2xl {
            max-width: 42rem;
        }

        .bg-white {
            background-color: #FFFFFF;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .border {
            border-width: 1px;
        }

        .border-blue-200 {
            border-color: #BFDBFE;
        }

        .p-8 {
            padding: 2rem;
        }

        .text-center {
            text-align: center;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-gray-600 {
            color: #4B5563;
        }

        .text-4xl {
            font-size: 2.25rem;
            line-height: 2.5rem;
        }

        .md\:text-5xl {
            font-size: 3rem;
            line-height: 1;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .text-gray-500 {
            color: #6B7280;
        }

        .space-y-3 > * + * {
            margin-top: 0.75rem;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .flex {
            display: flex;
        }

        .items-start {
            align-items: flex-start;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .text-green-500 {
            color: #10B981;
        }

        .font-semibold {
            font-weight: 600;
        }

        .bg-blue-600 {
            background-color: #2563EB;
        }

        .text-white {
            color: #FFFFFF;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .hover\:bg-blue-700:hover {
            background-color: #1D4ED8;
        }

        .transition {
            transition-property: all;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        @media (min-width: 768px) {
            .md\:text-4xl {
                font-size: 2.25rem;
                line-height: 2.5rem;
            }
        }
    </style>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="main-header">
    <div class="container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <span>Dental</span><span>Quest</span><span>.AI</span>
        </a>
        <nav class="main-nav">
            <ul>
                <?php
                // Define the navigation items
                $nav_items = array(
                    'hero' => 'Home',
                    'challenges' => 'Challenges',
                    'features' => 'Features',
                    'why-choose' => 'Why Us?',
                    'customer-focus' => 'Approach',
                    'pricing' => 'Pricing',
                    'contact' => 'Contact'
                );

                // Generate the navigation items
                foreach ($nav_items as $section => $label) {
                    printf(
                        '<li><a href="#%s">%s</a></li>',
                        esc_attr($section),
                        esc_html($label)
                    );
                }
                ?>
            </ul>
        </nav>
    </div>
</header>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">
        <?php esc_html_e('Skip to content', 'your-theme-text-domain'); ?>
    </a>

<main id="main-content">
    <!-- Hero Section -->
    <section id="hero">
        <div class="container">
            <h1 class="ai-title" data-aos="fade-up">
                DentalQuest.AI
            </h1>
            <h2 data-aos="fade-up" data-aos-delay="100"><span id="typed-headline"></span></h2>
            <p data-aos="fade-up" data-aos-delay="200">
                Engage patients 24/7, automate tedious tasks, and grow your practice effortlessly
                with DynaQuest AI – the intelligent assistant designed for modern dentistry.
            </p>
            <a href="https://calendly.com/mramirez-dqtsi/dentalquest-ai-free-strategic-consultation" class="btn btn-primary cta-button" data-aos="fade-up" data-aos-delay="300">Book Your Free Demo</a>
            <h3 style="margin-top: 40px; font-weight: 600;" data-aos="fade-up" data-aos-delay="400">Wrestling with Your Front Office? It doesn't have to be this hard.</h3>
        </div>
    </section>

    <!-- Challenges Section -->
    <section id="challenges">
        <div class="container">
            <div class="section-intro" data-aos="fade-up">
                <h2>😟 Staff Scattered & Falling Behind?</h2>
                <p>Juggling calls, appointments, and paperwork leaves your team overwhelmed and prone to errors. Simple tasks become a grind.</p>
            </div>
            <div class="grid grid-3">
                <div class="card" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-calendar-times"></i>
                    <h4>📅 Scheduling Nightmares?</h4>
                    <p>No-shows, last-minute cancellations, and inefficient booking drain your revenue and disrupt your workflow.</p>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="200">
                     <i class="fas fa-headset"></i>
                    <h4>Your Dental Office needs DynaQuest Dental AI</h4>
                    <p>One simple system. No headaches. No tech overwhelm. Finally, AI that works *for* dentists.</p>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="300">
                     <i class="fas fa-cogs"></i>
                    <h4>AI that Does the Heavy Lifting</h4>
                    <p>No more chasing leads. No more no-shows. No more wasted marketing spend. From automated appointment booking to intelligent patient outreach, our AI fine-tunes every part of your practice. We don't just generate leads—we fill your chairs with the right patients at the right time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Load Template Parts -->
    <?php 
    // Features Section
    get_template_part('template-parts/landing/features');
    
    // Why Choose Section
    get_template_part('template-parts/landing/why-choose');
    
    // Customer Focus Section
    get_template_part('template-parts/landing/customer-focus');
    
    // Promotional CTA Section
    get_template_part('template-parts/landing/promo-cta');
    
    // Pricing Section
    get_template_part('template-parts/landing/pricing');
    
    // Final CTA Section
    get_template_part('template-parts/landing/final-cta');
    ?>

    <!-- Footer -->
    <footer id="contact" class="site-footer">
        <div class="container">
            <h3>DynaQuest AI</h3>
            <p>Need Assistance or Want to Learn More?<br> Contact us 24/7 for support, inquiries, or to schedule your demo.</p>
            <div class="footer-buttons">
                <a href="tel:+19546254175" class="btn">
                    <i class="fas fa-phone-alt"></i> Call Us
                </a>
                <a href="https://calendly.com/mramirez-dqtsi/dentalquest-ai-free-strategic-consultation" class="btn">
                     <i class="far fa-paper-plane"></i> Schedule Demo
                </a>
            </div>
            <div class="footer-bottom">
                &copy; 2025 DynaQuest AI. All Rights Reserved. |
                <a href="mailto:dentalquestai@dqtsi.com">Contact</a> |
                <a href="/privacy-policy/">Privacy Policy</a> |
                <a href="/terms-of-service/">Terms of Service</a>
            </div>
        </div>
    </footer>
</main>

<!-- Add JS Libraries -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

<!-- Initialization Scripts -->
<script>
    // Initialize AOS (Animate on Scroll)
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
    });

    // Initialize Typed.js
    document.addEventListener('DOMContentLoaded', function(){
        var options = {
            strings: ['Reimagine Your Dental Practice^1000', 'AI-Driven Patient Support^1000', 'Engage Patients 24/7'],
            typeSpeed: 50,
            backSpeed: 30,
            backDelay: 1500,
            startDelay: 500,
            loop: true
        };
        var typed = new Typed('#typed-headline', options);
    });
</script>

<?php
get_footer();
?>