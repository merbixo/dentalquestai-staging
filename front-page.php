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
        --secondary-color: #17a2b8; /* Teal */
        --dark-color: #343a40; /* Dark Gray */
        --light-color: #f8f9fa; /* Light Gray */
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
        margin: 0;
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
    .grid-4 { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); } /* Kept for reference, but not used now */

    .card {
        background-color: var(--white-color);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
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
        background-color: rgba(0, 123, 255, 0.1);
    }

    /* --- Hero Section --- */
    #hero {
        padding-top: 150px; /* Keep padding for the hero section */
        padding-bottom: 0; /* Remove bottom padding */
        background-color: var(--light-color);
        text-align: center;
        min-height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    /* Particle Container Styling */
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1; /* Behind content */
        background-color: var(--light-color); /* Match section bg */
    }

    #hero .container { /* Ensure hero content is above particles */
        position: relative;
        z-index: 2;
    }


    #hero h1 { /* Hide original H1 if logo is primary */
       /* display: none; */ /* Or keep if desired */
       font-size: 3.5rem;
       margin-bottom: 15px;
       color: var(--dark-color);
    }

    #hero .logo {
        max-width: 150px; /* Adjusted hero logo size */
        margin: 0 auto 30px auto; /* Center hero logo */
    }

    #hero h2 {
        font-size: 1.8rem;
        margin-bottom: 15px;
        font-weight: 500;
        min-height: 50px; /* Reserve space for typed text */
    }

    #hero p {
        font-size: 1.2rem; /* Larger hero paragraph */
        max-width: 700px; /* Wider text block */
        margin: 0 auto 35px auto;
        color: #444;
    }

    #hero .cta-button {
        margin-bottom: 40px;
    }

    /* Typed.js Cursor */
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
        background-color: var(--light-color); /* Slightly different card bg */
    }
     #challenges .card i { /* Placeholder for images */
        font-size: 3rem;
        color: var(--secondary-color);
        margin: 0 auto 1rem auto; /* Center icon */
     }


    /* --- Features Section --- */
    #features {
        background-color: var(--light-color);
    }
     #features .card i {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin: 0 auto 1rem auto; /* Center icon */
     }

    /* --- Why Choose Section (Replaces Getting Started) --- */
    #why-choose {
        background-color: var(--white-color);
    }
    #why-choose .section-intro p {
        font-size: 1.2rem; /* Larger intro text */
        font-weight: 500;
        color: var(--dark-color);
        margin-bottom: 25px;
    }
    #why-choose .section-intro .btn {
        margin-bottom: 40px;
    }


    /* --- Testimonials Section --- */
    #testimonials {
        background-color: var(--light-color);
    }
    .testimonial-card {
        background-color: var(--white-color);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.07);
        margin-bottom: 20px; /* Spacing if they stack */
        border-left: 5px solid var(--secondary-color); /* Accent border */
        text-align: left;
        display: flex;
        flex-direction: column;
    }
    .testimonial-card blockquote {
        margin: 0 0 15px 0;
        font-style: italic;
        color: #555;
        font-size: 1.1rem;
        line-height: 1.7;
        border-left: 3px solid #eee;
        padding-left: 15px;
        flex-grow: 1;
    }
    .testimonial-author {
        font-weight: 600;
        color: var(--dark-color);
        margin-top: auto; /* Push author to bottom */
    }
    .testimonial-author span {
        display: block;
        font-weight: 400;
        font-size: 0.9rem;
        color: #777;
        margin-top: 3px;
    }


    /* --- Pricing CTA Bar --- */
    .pricing-cta-bar {
        background-color: var(--primary-color);
        padding: 0; /* Remove padding from the pricing CTA bar */
        text-align: center;
    }

    .btn-cta-alt {
        background-color: var(--white-color);
        color: var(--primary-color);
        padding: 12px 35px;
        font-weight: 600;
        border-radius: 6px; /* Slightly less rounded */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-transform: none; /* Normal case */
        letter-spacing: normal;
        animation: none; /* Override primary button animation */
        background-image: none; /* Override primary button animation */
    }

    .btn-cta-alt:hover {
        background-color: var(--light-color);
        color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }


    /* --- Pricing Section --- */
    #pricing {
        background-color: var(--white-color); /* Changed background */
        padding: var(--section-padding);
    }

    #pricing h2 {
        margin-bottom: 40px; /* Space below headline */
    }

    .pricing-box {
        max-width: 550px; /* Control width */
        margin: 0 auto; /* Center the box */
        background: var(--white-color);
        border-radius: 12px; /* More rounded corners */
        box-shadow: 0 10px 30px rgba(0, 80, 170, 0.15); /* Softer, deeper shadow */
        padding: 3px; /* Padding for gradient border effect */
        position: relative;
        background-image: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); /* Gradient border */
        overflow: hidden; /* Contain inner content */
    }

    .pricing-box-inner {
        background: var(--white-color); /* White inner background */
        border-radius: 10px; /* Slightly less rounded than outer */
        padding: 40px; /* Inner padding */
        text-align: center;
    }


    .pricing-box h3 {
        font-size: 1.8rem;
        color: var(--dark-color);
        margin-bottom: 8px;
    }

    .package-subtitle {
        font-size: 1rem;
        color: #6c757d; /* Gray color */
        margin-bottom: 30px;
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0 0 35px 0;
        text-align: left; /* Align list items left */
        display: inline-block; /* Allow centering via text-align on parent */
    }

    .features-list li {
        margin-bottom: 15px;
        font-size: 1.05rem; /* Slightly larger list text */
        color: var(--text-color);
        display: flex; /* Align icon and text */
        align-items: center;
    }

    .features-list li i {
        color: var(--secondary-color); /* Teal checkmarks */
        margin-right: 12px; /* Space after icon */
        font-size: 1.1em; /* Slightly larger icon */
        flex-shrink: 0; /* Prevent icon shrinking */
        margin-bottom: 0; /* Override default icon margin */
    }

    .price-tag {
        background-color: var(--dark-color);
        color: var(--white-color);
        padding: 15px 30px;
        border-radius: 8px;
        font-size: 1.4rem; /* Larger price font */
        font-weight: 600;
        display: inline-block; /* Fit content width */
        margin-top: 10px; /* Space above price */
    }

    /* --- Final CTA / Contact Info Section --- */
    #final-cta {
        background-color: var(--light-color);
        text-align: left; /* Align text left in columns */
    }
    #final-cta h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        text-align: center; /* Center main headline */
    }
    #final-cta .cta-highlight {
        font-size: 1.2rem;
        font-weight: 500;
        color: var(--primary-color);
        margin-bottom: 30px;
        display: block; /* Make it block for margin */
        text-align: center; /* Center highlight text */
    }
    .cta-columns {
        display: flex;
        gap: 40px; /* Space between columns */
        align-items: flex-start; /* Align items to top */
    }
    .cta-content-left {
        flex: 1; /* Take available space */
        min-width: 0; /* Prevent overflow */
    }
    .cta-content-right {
        flex-basis: 400px; /* Suggest width for form column */
        flex-shrink: 0; /* Don't shrink form column */
        background-color: var(--white-color);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.07);
    }
     /* Style Ninja Form elements (adjust selectors as needed) */
    .cta-content-right .nf-form-content button[type=submit] {
        /* Example: Style submit button like .btn-primary */
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
        background-image: var(--gradient-primary);
        background-size: 200% 200%;
        color: var(--white-color);
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        animation: gradientShift 4s ease infinite;
        width: 100%; /* Make button full width */
        margin-top: 15px;
    }
     .cta-content-right .nf-form-content button[type=submit]:hover {
         box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
         transform: translateY(-2px);
     }
     .cta-content-right .nf-form-content .nf-field-label label {
         font-weight: 500;
         margin-bottom: 5px;
     }
     .cta-content-right .nf-form-content .ninja-forms-field {
         width: 100%;
         padding: 10px 12px;
         border: 1px solid #ced4da;
         border-radius: 4px;
         margin-bottom: 15px;
         font-size: 1rem;
     }


    .request-demo-text h4 {
        font-size: 1.3rem;
        margin-bottom: 15px;
        color: var(--dark-color);
    }
    .request-demo-text p {
        font-size: 1rem;
        margin-bottom: 15px;
    }
    .request-demo-text strong {
        color: var(--primary-color);
    }

    .office-hours {
        max-width: 100%; /* Allow full width within column */
        margin: 30px 0; /* Adjust margin */
        text-align: left;
        background-color: var(--white-color);
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .office-hours h4 {
        text-align: center;
        margin-bottom: 15px;
        color: var(--secondary-color);
    }
    .office-hours ul {
        list-style: none;
        padding: 0;
    }
    .office-hours li {
        margin-bottom: 8px;
        display: flex;
        justify-content: space-between;
    }
     .office-hours li span:first-child {
         font-weight: 500;
     }
    .after-hours-info {
        margin-top: 20px; /* Reduced margin */
        margin-bottom: 20px; /* Added margin */
        font-size: 1rem;
        color: #555;
    }
    .cta-buttons-inline {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: flex-start; /* Align buttons left */
    }
    .cta-buttons-inline .btn {
        background-color: var(--primary-color);
        color: var(--white-color);
        border: 1px solid var(--primary-color);
        padding: 10px 20px; /* Slightly smaller */
        font-size: 0.9rem;
        animation: none;
        background-image: none;
    }
    .cta-buttons-inline .btn:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        transform: translateY(-2px);
    }
     .cta-buttons-inline .btn i {
         margin-right: 8px;
         margin-bottom: 0;
         font-size: 0.9em;
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

    /* --- Responsive Adjustments --- */
    @media (max-width: 992px) {
        :root { --container-width: 960px; }
        h1 { font-size: 2.8rem; }
        h2 { font-size: 2rem; }
        #hero h1 { font-size: 3rem; }
        p { font-size: 1.05rem; } /* Adjust base paragraph size */
        #hero p { font-size: 1.15rem; }
        .section-intro p { font-size: 1.1rem; }
        #customer-focus p { font-size: 1.05rem; }
        #customer-focus .section-intro p { font-size: 1.1rem; }
        .main-nav ul { gap: 15px; } /* Reduce nav gap */
        .cta-content-right { flex-basis: 350px; } /* Smaller form column */
    }

    @media (max-width: 768px) {
        :root { --container-width: 720px; }
        h1 { font-size: 2.5rem; }
        h2 { font-size: 1.8rem; }
        #hero h1 { font-size: 2.5rem; }
        #hero h2 { font-size: 1.5rem; min-height: 40px;}
        #hero p { font-size: 1.1rem; } /* Adjust hero paragraph */
        p { font-size: 1rem; } /* Base paragraph size for smaller screens */
        .section-intro p { font-size: 1.05rem; }
        #customer-focus p { font-size: 1rem; }
        #customer-focus .section-intro p { font-size: 1.05rem; }
        .card p { font-size: 0.95rem; } /* Adjust card text */

        .main-header .container { flex-direction: column; gap: 10px;}
        .main-nav ul { justify-content: center; flex-wrap: wrap; padding-bottom: 10px; gap: 10px;}
        .site-logo img { max-height: 35px; } /* Smaller logo on mobile */

        #hero { padding-top: 160px; min-height: 70vh; } /* Adjust padding for stacked nav */

        .grid-3, .grid-4 { grid-template-columns: 1fr; } /* Stack columns */
        #final-cta h2 { font-size: 1.6rem; }
        .cta-columns { flex-direction: column; } /* Stack columns */
        .cta-content-right { flex-basis: auto; width: 100%; } /* Full width form */
    }

    @media (max-width: 576px) {
        :root { --container-width: 100%; } /* Full width */
        h1 { font-size: 2.2rem; }
        h2 { font-size: 1.6rem; }
        h3 { font-size: 1.3rem; }
        #hero h1 { font-size: 2.2rem; }
        #hero h2 { font-size: 1.3rem; min-height: 35px;}
        #hero p { font-size: 1.05rem; }
        p { font-size: 1rem; } /* Consistent base size */
        .section-intro p { font-size: 1rem; }
        #customer-focus p { font-size: 1rem; }
        #customer-focus .section-intro p { font-size: 1rem; }
        .card p { font-size: 0.9rem; }

        .btn { padding: 10px 20px; font-size: 0.9rem; }
        section { padding: 40px 15px; } /* Add side padding */
        #hero { padding-top: 150px; min-height: 60vh;}
        .footer-buttons { flex-direction: column; align-items: center; }
        .site-logo img { max-height: 30px; }

        /* Pricing Responsive */
        .pricing-box-inner {
            padding: 30px 20px; /* Reduce padding on small screens */
        }
        .features-list li {
            font-size: 1rem;
        }
        .price-tag {
            font-size: 1.2rem;
            padding: 12px 25px;
        }
        .pricing-cta-bar {
            padding: 20px 0;
        }
         .btn-cta-alt {
             padding: 10px 25px;
             font-size: 0.9rem;
         }
         /* Testimonial Responsive */
         .testimonial-card blockquote {
             font-size: 1rem;
         }
         /* Final CTA Responsive */
         #final-cta h2 { font-size: 1.5rem; }
         #final-cta .cta-highlight { font-size: 1.1rem; }
         .office-hours { padding: 15px 20px; }
         .cta-buttons-inline { justify-content: center; } /* Center buttons when stacked */
         .cta-content-right { padding: 20px; }
    }

</style>

<!-- Add Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Add AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


<header class="main-header">
    <div class="container">
        <div class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <!-- Using the DynaQuest Logo -->
                <img src="https://dynaquest.ai/wp-content/uploads/2025/04/DentalQuest.png" alt="DynaQuest.AI Logo">
            </a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#challenges">Challenges</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#why-choose">Why Us?</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<main id="main-content">

    <!-- Hero Section -->
    <section id="hero">
        <div class="container">
             <img src="https://dynaquest.ai/wp-content/uploads/2025/04/DentalQuest.png" alt="Dental AI Tooth Logo" class="logo" data-aos="zoom-in">
            <h2 data-aos="fade-up" data-aos-delay="100"><span id="typed-headline"></span></h2>
            <p data-aos="fade-up" data-aos-delay="200">
                Engage patients 24/7, automate tedious tasks, and grow your practice effortlessly
                with DynaQuest AI – the intelligent assistant designed for modern dentistry.
            </p>
            <a href="#contact" class="btn btn-primary cta-button" data-aos="fade-up" data-aos-delay="300">Book Your Free Demo</a>
            <h3 style="margin-top: 40px; font-weight: 600;" data-aos="fade-up" data-aos-delay="400">Wrestling with Your Front Office? It doesn't have to be this hard.</h3>
        </div>
    </section>

    <!-- Challenges Section -->
    <section id="challenges">
        <div class="container">
            <div class="section-intro" data-aos="fade-up">
                <h2> Staff Scattered & Falling Behind?</h2>
                <p>Juggling calls, appointments, and paperwork leaves your team overwhelmed and prone to errors. Simple tasks become a grind.</p>
            </div>
            <div class="grid grid-3">
                <div class="card" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-calendar-times"></i>
                    <h4> Scheduling Nightmares?</h4>
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

    <!-- Features Section -->
    <section id="features">
        <div class="container">
             <!-- Optional Headline -->
             <!-- <h2 data-aos="fade-up">Core Features</h2> -->
            <div class="grid grid-3"> <!-- Changed to grid-3 -->
                <div class="card" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-calendar-check"></i>
                    <h4>✅ Automated Scheduling</h4>
                    <p>Eliminate manual appointment errors and double-bookings. Our AI finds the perfect slot, maximizing your chair time.</p>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-headset"></i>
                    <h4>✅ 24/7 Virtual Assistant</h4>
                    <p>Capture leads and handle inquiries even after hours. Never miss a potential patient call again.</p>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-bell"></i>
                    <h4>✅ Smart Appointment Reminders</h4>
                    <p>Drastically reduce no-shows and last-minute cancellations with intelligent, automated reminders via SMS and email.</p>
                </div>
                 <div class="card" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-exchange-alt"></i>
                    <h4>✅ Seamless Rescheduling</h4>
                    <p>AI-driven rescheduling offers patient-friendly options, filling gaps in your schedule automatically.</p>
                </div>
                 <div class="card" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <h4>✅ Insurance & Intake Automation</h4>
                    <p>Streamline tedious paperwork and verification processes, freeing up your staff for patient interaction.</p>
                </div>
                 <div class="card" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-sitemap"></i>
                    <h4>✅ Organized Workflow</h4>
                    <p>Bring tasks, discussions, and patient info together. Your calm, comfortable starting point every morning.</p>
                </div>
            </div>
        </div>
    </section>

     <!-- Why Choose Section -->
    <section id="why-choose">
        <div class="container">
            <div class="section-intro" data-aos="fade-up">
                <h2>Why Choose DynaQuest Dental AI?</h2>
                <p>Refreshingly no-nonsense. We replace outdated, clunky software with one streamlined system that just works.</p>
                 <a href="#contact" class="btn btn-secondary">Get a Free Consultation</a>
                <p style="margin-top: 30px;">Your practice is unique. So is our AI. We focus 100% on dental practices, tailoring everything we build to your specific needs and scaling with your growth.</p>
            </div>
            <div class="grid grid-3">
                <div class="card" data-aos="fade-up" data-aos-delay="100">
                     <i class="fas fa-star"></i>
                    <h4> Proven Success</h4>
                    <p>Trusted by top dental practices nationwide. We deliver real results you can see in your schedule and bottom line.</p>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="200">
                     <i class="fas fa-chart-line"></i>
                    <h4> Guaranteed ROI</h4>
                    <p>Reduce administrative time significantly, increase revenue through optimized scheduling and fewer no-shows.</p>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="300">
                     <i class="fas fa-tooth"></i>
                    <h4> Designed for Dentists</h4>
                    <p>Built specifically for the challenges and workflows of a modern dental office. No generic solutions here.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
<section id="pricing" class="py-16 md:py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">Simple, Transparent Pricing</h2>
        
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8 border border-blue-200">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold mb-2">🔥 AI Essentials Starter Package</h3>
                    <p class="text-gray-600 mb-6">Everything You Need to Launch Your AI-Powered Team—Fast.</p>
                    <div class="text-4xl md:text-5xl font-bold mb-1">$1,997<span class="text-lg text-gray-500 font-medium"> / month</span></div>
                </div>

                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2 mt-1">✅</span>
                        <span><strong class="font-semibold">Your Own Dedicated AI Customer Care Pro:</strong> Trained to speak your brand's language and deliver 5-star service on Day 1.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2 mt-1">✅</span>
                        <span><strong class="font-semibold">Flexible Roles. Zero Limits:</strong> Mix & match tasks across sales, support, lead gen, or admin—your AI adapts to fit your business.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2 mt-1">✅</span>
                        <span><strong class="font-semibold">Tailored Setup & Seamless Integration:</strong> We don't just plug in tools—we build your AI stack to win.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2 mt-1">✅</span>
                        <span><strong class="font-semibold">Live Performance Dashboard:</strong> See exactly how your AI is performing—daily insights, weekly wins.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2 mt-1">✅</span>
                        <span><strong class="font-semibold">Priority Support That's Actually Fast:</strong> Skip the line. Get real answers, real quick—whenever you need them.</span>
                    </li>
                </ul>

                <a href="https://calendly.com/rsteel-dqtsi/dentalquest-ai-discovery-session" class="block text-center bg-blue-600 text-white py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold text-lg">Get Started</a>
            </div>
        </div>
    </div>
</section>
</main><!-- #main-content -->


    <!-- Final CTA / Contact Info Section (NEW Structure) -->
    <section id="final-cta">
        <div class="container">
            <h2 data-aos="fade-up">Ready to See What AI Can Do for Your Practice?</h2>
            <span class="cta-highlight" data-aos="fade-up" data-aos-delay="100">🔥 Don't let outdated systems hurt your practice. AI is the future! Join hundreds of dentists already using DynaQuest AI to grow your business. 🔥</span>
            <div class="cta-columns">
                <div class="cta-content-left">
                    <div class="request-demo-text" data-aos="fade-right" data-aos-delay="150">
                        <h4> Request Your Personalized Demo of DentalQuest.AI</h4>
                        <p>See how practices like yours are using AI to cut admin time, streamline patient flow, and increase revenue—starting Day 1.</p>
                        <p><strong> No hype. Just real results, tailored to your clinic.</strong></p>
                        <p>But move fast—we only onboard 15 clinics per month to maintain hands-on support. <strong>Only 10 spots remain.</strong></p>
                        <p> Fill out the quick form or contact us directly to claim your slot—before this month's schedule closes</p>
                    </div>
                    <p class="after-hours-info" data-aos="fade-right" data-aos-delay="250">
                        After hours? Contact us 24/7 via phone, SMS, or email at <a href="mailto:dentalquestai@dqtsi.com">dentalquestai@dqtsi.com</a> for inquiries, support, and booking assistance.
                    </p>
                    <div class="cta-buttons-inline" data-aos="fade-right" data-aos-delay="300">
                        <a href="tel:+19546254175" class="btn"> <!-- Updated phone number -->
                            <i class="fas fa-phone-alt"></i> Phone
                        </a>
                        <a href="sms:+19546254175" class="btn"> <!-- Updated SMS number -->
                             <i class="fas fa-sms"></i> SMS
                        </a>
                         <a href="mailto:dentalquestai@dqtsi.com" class="btn"> <!-- Added email link -->
                             <i class="fas fa-envelope"></i> Email
                        </a>
                         <a href="https://calendly.com/rsteel-dqtsi/dentalquest-ai-discovery-session" class="btn"> <!-- Added Calendly link -->
                             <i class="fas fa-calendar-alt"></i> Book a Demo
                        </a>
                    </div>
                </div>
                <div class="cta-content-right" data-aos="fade-left" data-aos-delay="200">
                    <?php
                        // Ensure Ninja Forms plugin is active and form ID 3 exists
                        if ( shortcode_exists( 'ninja_form' ) ) {
                            echo do_shortcode('[ninja_form id=3]');
                        } else {
                            echo '<p>Contact form is currently unavailable. Please use the contact methods on the left.</p>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer id="contact" class="site-footer">
        <div class="container">
            <h3>DynaQuest AI</h3>
            <p>Need Assistance or Want to Learn More?<br> Contact us 24/7 for support, inquiries, or to schedule your demo.</p>
            <div class="footer-buttons">
                <a href="tel:+19546254175" class="btn"> <!-- Updated phone number -->
                    <i class="fas fa-phone-alt"></i> Call Us
                </a>
                <a href="mailto:dentalquestai@dqtsi.com" class="btn"> <!-- Added email link -->
                    <i class="fas fa-envelope"></i> Email
                </a>
                <a href="https://calendly.com/rsteel-dqtsi/dentalquest-ai-discovery-session" class="btn"> <!-- Added Calendly link -->
                    <i class="fas fa-calendar-alt"></i> Book a Demo
                </a>
            </div>
            <div class="footer-bottom">
                &copy; <?php echo date('Y'); ?> DynaQuest AI. All Rights Reserved. |
                <a href="/privacy-policy/">Privacy Policy</a> |
                <a href="/terms-of-service/">Terms of Service</a>
            </div>
        </div>
    </footer>

</main><!-- #main-content -->


<!-- Add JS Libraries -->
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2.9.3/tsparticles.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

<!-- Initialization Scripts -->
<script>
    // Initialize AOS (Animate on Scroll)
    AOS.init({
        duration: 800, // Animation duration
        once: true, // Only animate once
        offset: 50, // Trigger animations slightly early
    });

    // Initialize Typed.js
    document.addEventListener('DOMContentLoaded', function(){
        var options = {
            strings: ['Reimagine Your Dental Practice^1000', 'AI-Driven Patient Support^1000', 'Engage Patients 24/7'], // Text to type (^1000 = 1s pause)
            typeSpeed: 50, // Typing speed
            backSpeed: 30, // Backspacing speed
            backDelay: 1500, // Pause before backspacing
            startDelay: 500, // Pause before starting
            loop: true // Loop the animation
        };
        var typed = new Typed('#typed-headline', options);
    });

</script>

<?php
get_footer(); // Loads the theme's footer.php
?>
