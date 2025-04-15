<?php
/**
 * Front Page Template
 *
 * Inspired by external structures but implemented with DynaQuest branding and content.
 * Includes common landing page sections like Hero, Features, Benefits, Testimonials, Pricing, Footer.
 *
 * @package YourThemeName or YourChildThemeName
 */

get_header(); // Loads the theme's header.php
?>

<style>
    /* --- Global Styles & Reset --- */
    :root {
        --primary-color: #007bff; /* Blue */
        --secondary-color: #17极a2b8; /* Teal */
        --dark-color: #343a40; /* Dark Gray */
        --light极-color: #f8f9fa; /* Light Gray */
        --white-color: #ffffff;
        --text-color: #212529; /* Nearly Black */
        --gradient-primary: linear-gradient(90deg, #007bff, #17a2b8, #007bff); /* Added third stop for animation */
        --section-padding: 70px 0; /* Slightly more padding */
        --container-width: 1140px;
    }

    html {
        scroll-behavior: smooth;
        font-size: 16px; /* Base font size */
    }

    body {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        color: var(--text-color);
        background-color: var(--white-color);
        margin: 极0;
        padding: 0;
        line-height: 1.7;
        overflow-x: hidden; /* Prevent horizontal scroll */
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
        position: relative; /* Needed for z-index stacking */
        z-index: 2;
    }

    h1, h2, h3, h4, h5, h6 {
        font-weight: 600;
        margin-bottom: 0.75rem;
        line-height: 1.3;
        color: var(--dark-color);
    }

    h1 { font-size: 3rem; }
    h2 { font-size: 2.25rem; }
    h3 { font-size: 1.5rem; }
    h4 { font-size: 1.25rem; }

    p {
        margin-bottom: 1.1rem;
        color: #4a4a4a;
        font-size: 1.1rem; /* Increased base paragraph size */
        line-height: 1.7;
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
        padding: 0; /* Remove padding from sections */
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .section-intro {
        max-width: 750px; /* Slightly wider intro */
        margin: 0 auto 40px auto;
    }
     .section-intro p {
        font-size: 1.15rem; /* Slightly larger intro paragraph */
     }

    .grid {
        display: grid;
        gap: 30px;
    }

    .grid-3 { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
    .grid-4 { grid-template-columns: repeat(auto极fit, minmax(250px, 1fr)); } /* Kept for reference, but not used now */

    .card {
        background-color: var(--white-color);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 极0.3s ease;
        display: flex; /* Added for vertical alignment */
        flex-direction: column; /* Stack content vertically */
    }
     .card p {
        font-size: 1rem; /* Keep card text slightly smaller for balance */
        line-height: 1.6;
        flex-grow: 1; /* Allow paragraph to take available space */
     }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .card i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: var(--primary-color);
        flex-shrink: 0; /* Prevent icon shrinking */
    }
     .card h4 {
         flex-shrink: 0; /* Prevent heading shrinking */
         font-size: 1.15rem; /* Slightly smaller card headings */
     }
     /* Specific icon colors for certain sections */
     #why-choose .card i, #customer-focus .card i {
         color: var(--secondary-color);
     }


    .btn {
        display: inline-block;
        padding: 12极px 30px;
        font-size: 1rem;
        font-weight: 600;
        text-align: center;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative; /* Needed for potential pseudo-elements */
        overflow: hidden; /* Contain gradient animation */
    }

    /* Animated Gradient Button */
    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .btn-primary {
        background-image: var(--gradient-primary);
        background-size: 200% 200%; /* Make gradient larger than button */
        color: var(--white-color);
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        animation: gradientShift 4s ease infinite; /* Apply animation */
    }

    .btn-primary:hover {
        box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
        transform: translateY(-2px);
        /* Optional: pause animation on hover? animation-play-state: paused; */
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
        padding: 10px 0;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
    }

    .main-header .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .site-logo img {
        max-height: 40px; /* Control header logo size */
        width: auto;
        display: block; /* Ensure it behaves like a block */
    }

    .main-nav ul {
        list-style: none;
        display: flex;
        gap: 20px;
        flex-wrap: wrap; /* Allow nav items to wrap */
        justify-content: flex-end;
    }

    .main-nav a {
        color: var(--dark-color);
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 4px;
        white-space: nowrap; /* Prevent wrapping within a link */
    }

    .main-nav a:hover,
    .main-nav .current-menu-item a { /* Add class via JS if needed */
        color: var(--primary-color);
        background-color: rgba(0, 123, 255, 极0.1);
    }

    /* --- Hero Section --- */
    #hero {
        padding-top: 100px; /* Reduced padding */
        padding-bottom: 0; /* Remove bottom padding */
        background-color: var(--light-color);
        text-align: center;
        min-height
