<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MoversLaredo.com | Moving & Transport Services')</title>
    <meta name="description" content="@yield('description', 'Professional moving and transport services in Laredo. Reliable, safe, and fast solutions for your relocation needs.')">

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Brand Colors CSS -->
    <link href="{{ asset('css/brand-colors.css') }}" rel="stylesheet">

    <style>
        /* ===== MOVERS LAREDO COLOR PALETTE ===== */
        :root {
            --primary-blue: #1e3a8a;        /* Deep blue from logo */
            --secondary-blue: #3b82f6;      /* Bright blue */
            --accent-orange: #f59e0b;       /* Orange/amber from logo */
            --accent-gold: #fbbf24;         /* Gold accent */
            --dark-navy: #1e293b;           /* Dark navy */
            --light-blue: #dbeafe;          /* Light blue background */
            --success-green: #10b981;       /* Success/available */
            --text-dark: #1f2937;           /* Main text color */
            --text-light: #6b7280;          /* Secondary text */
            --background-light: #f8fafc;    /* Light background */
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
            background-color: var(--background-light);
        }

        /* ===== RESPONSIVE NAVIGATION ===== */
        .navbar {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-navy));
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(30, 58, 138, 0.15);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
            position: relative;
        }

        .logo {
            color: #fff;
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo img {
            height: 70px;
            width: auto;
            /* Removed filter to show original logo colors */
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: 500;
        }

        .nav-link:hover {
            background: var(--accent-orange);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
        }

        .mobile-toggle span {
            width: 25px;
            height: 3px;
            background: #fff;
            margin: 3px 0;
            transition: 0.3s;
        }

        .mobile-toggle.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .mobile-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-toggle.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        /* ===== RESPONSIVE BREAKPOINTS ===== */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 1rem;
            }

            .logo {
                font-size: 1.5rem;
            }

            .logo img {
                height: 60px;
            }

            .mobile-toggle {
                display: flex;
            }

            .nav-menu {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: linear-gradient(135deg, var(--primary-blue), var(--dark-navy));
                flex-direction: column;
                gap: 0;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                box-shadow: 0 8px 25px rgba(30, 58, 138, 0.2);
            }

            .nav-menu.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .nav-menu li {
                width: 100%;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }

            .nav-link {
                display: block;
                padding: 1rem;
                width: 100%;
                text-align: center;
            }

            .nav-link:hover {
                background: rgba(245, 158, 11, 0.2);
                transform: none;
            }
        }

        /* ===== MAIN CONTENT STYLES ===== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .section {
            padding: 4rem 0;
        }

        /* ===== HERO SECTION ===== */
        .hero {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 50%, var(--accent-orange) 100%);
            color: var(--white);
            text-align: center;
            padding: 8rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,0 1000,100 1000,0"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.95;
        }

        /* ===== BUTTONS ===== */
        .btn {
            display: inline-block;
            background: var(--accent-orange);
            color: var(--white);
            padding: 15px 35px;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            background: var(--accent-gold);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid var(--white);
            color: var(--white);
        }

        .btn-secondary:hover {
            background: var(--white);
            color: var(--primary-blue);
        }

        /* ===== CARDS & CONTENT ===== */
        .card {
            background: var(--white);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(30, 58, 138, 0.1);
            transition: all 0.3s ease;
            border: 1px solid var(--light-blue);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(30, 58, 138, 0.15);
            border-color: var(--accent-orange);
        }

        .grid {
            display: grid;
            gap: 2rem;
            margin: 2rem 0;
        }

        .grid-2 {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .grid-3 {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        /* ===== FOOTER ===== */
        .footer {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-navy));
            color: var(--white);
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: var(--accent-orange);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-section p, .footer-section a {
            color: #cbd5e1;
            text-decoration: none;
            margin-bottom: 0.5rem;
            display: block;
        }

        .footer-section a:hover {
            color: var(--accent-gold);
        }        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1rem;
            text-align: center;
            color: #94a3b8;
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 1024px) {
            .container {
                padding: 0 2rem;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .section {
                padding: 3rem 0;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .hero {
                padding: 6rem 0;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .btn {
                padding: 12px 25px;
                font-size: 1rem;
            }

            .section {
                padding: 2rem 0;
            }

            .card {
                padding: 1.5rem;
            }

            .grid {
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .card {
                padding: 1rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* ===== UTILITY CLASSES ===== */
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }

        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }
        .mb-4 { margin-bottom: 2rem; }

        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mt-4 { margin-top: 2rem; }

        .p-1 { padding: 0.5rem; }
        .p-2 { padding: 1rem; }
        .p-3 { padding: 1.5rem; }
        .p-4 { padding: 2rem; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/Movers_Laredo.png') }}" alt="Movers Laredo Logo">
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ route('services') }}" class="nav-link"><i class="fas fa-box"></i> Services</a></li>
                <li><a href="{{ route('quote') }}" class="nav-link"><i class="fas fa-calculator"></i> Quote</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link"><i class="fas fa-phone"></i> Contact</a></li>
            </ul>
            <div class="mobile-toggle" id="mobile-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><i class="fas fa-truck"></i> MoversLaredo.com</h3>
                    <p>Professional moving and transport services in Laredo, Texas. We provide reliable, safe, and fast solutions for all your relocation needs.</p>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-phone"></i> Contact Info</h3>
                    <p><i class="fas fa-phone"></i> (956) 526-8221</p>
                    <p><i class="fas fa-envelope"></i> quote@moverslaredo.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> 602 W. Calton RD, Laredo, TX 78041</p>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-clock"></i> Business Hours</h3>
                    <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                    <p>Saturday: 8:00 AM - 4:00 PM</p>
                    <p>Sunday: Emergency Services Only</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 MoversLaredo.com. All rights reserved. | Professional Moving Services in Laredo, Texas</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileToggle = document.getElementById('mobile-toggle');
            const navMenu = document.getElementById('nav-menu');

            mobileToggle.addEventListener('click', function() {
                mobileToggle.classList.toggle('active');
                navMenu.classList.toggle('active');
            });

            // Close menu when clicking on a link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    mobileToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.nav-container')) {
                    mobileToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add fade-in animation to elements when they come into view
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observe all cards and sections
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.card, .section').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
