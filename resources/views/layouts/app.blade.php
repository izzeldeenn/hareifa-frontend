<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'حريفة - آخر أخبار الرياضة')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --main-color: #FFD700; /* Yellow */
            --secondary-color: #1a1a1a; /* Black */
            --accent-color: #FFA500; /* Orange */
            --light-gray: #f5f5f5;
            --white: #ffffff;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: var(--white);
            padding: 10px 0;
            border: none !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            transition: all 0.3s ease-in-out;
        }
        
        /* Remove any border from navbar elements */
        .navbar,
        .navbar *,
        .navbar:before,
        .navbar:after,
        .navbar-nav .nav-link,
        .navbar-nav .nav-item,
        .navbar > .container,
        .navbar > .container-fluid,
        .navbar-collapse,
        .navbar-toggler {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
        
        /* Remove any border on focus/hover */
        .navbar-toggler:focus,
        .navbar-toggler:active {
            outline: none !important;
            box-shadow: none !important;
        }
        
        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.98) !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 5px 0;
        }
        
        body {
            padding-top: 70px;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 24px;
            color: var(--secondary-color) !important;
            padding: 0;
            margin-right: 20px;
        }
        
        .nav-link {
            color: var(--secondary-color) !important;
            font-weight: 500;
            margin: 0 8px;
            transition: all 0.3s;
            padding: 8px 12px;
            border-radius: 4px;
        }
        
        .nav-link:hover {
            color: var(--main-color) !important;
            background-color: rgba(255, 215, 0, 0.1);
        }
        
        .nav-link i {
            margin-left: 5px;
        }
        
        .featured-news {
            position: relative;
            margin-bottom: 0;
        }
        
        .featured-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 50%, rgba(0,0,0,0) 100%);
        }
        
        .featured-content {
            position: relative;
            z-index: 2;
        }
        
        .match-card {
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }
        
        .match-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        .player-card {
            padding: 20px;
            transition: all 0.3s ease;
        }
        
        .player-card:hover {
            transform: translateY(-5px);
        }
        
        .player-number {
            position: absolute;
            bottom: 10px;
            right: 50%;
            transform: translateX(50%);
            background: var(--main-color);
            color: var(--secondary-color);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
        }
        
        .academy-card {
            transition: all 0.3s ease;
        }
        
        .academy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        .main-news-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        
        .news-card {
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            background: var(--white);
            border: 1px solid #eee;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            border-color: var(--main-color);
        }
        
        .news-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        /* Custom Button Styles */
        .btn-outline-dark.hover-bg-black:hover {
            background-color: #000;
            color: #fff !important;
        }
        
        .btn-dark.hover-bg-gray-800:hover {
            background-color: #333;
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        /* Footer Styles */
        .text-gold {
            color: #FFD700 !important;
        }
        
        .hover-gold:hover {
            color: #FFD700 !important;
            transition: color 0.3s ease;
        }
        
        .hover-gold:hover i {
            color: #FFD700 !important;
        }
        
        footer a {
            transition: all 0.3s ease;
        }
        
        footer .text-muted {
            color: #a0a0a0 !important;
        }
        
        footer .border-dark {
            border-color: #333 !important;
        }

        /* Featured Players Slider */
        .featured-players-slider {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px 0 20px;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .featured-players-slider::-webkit-scrollbar {
            display: none;
        }

        .player-card {
            flex: 0 0 auto;
            width: 240px;
            transition: transform 0.3s ease;
        }

        .player-card:hover {
            transform: translateY(-5px);
        }

        .player-card .card {
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .player-card .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .player-card .badge {
            font-weight: 500;
            padding: 5px 8px;
            border-radius: 6px;
        }

        .player-card .social-links a {
            transition: all 0.3s ease;
            display: inline-block;
        }

        .player-card .social-links a:hover {
            color: #FFD700 !important;
            transform: translateY(-2px);
        }

        .slider-nav button {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50% !important;
            padding: 0;
        }

        .slider-nav button:hover {
            background-color: #FFD700;
            border-color: #FFD700;
            color: #000 !important;
        }
    </style>
    @stack('styles')
    @include('layouts.navbar')
</head>
<body>
    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    @include('layouts.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.featured-players-slider');
            const prevButton = document.querySelector('.player-prev');
            const nextButton = document.querySelector('.player-next');
            let isDown = false;
            let startX;
            let scrollLeft;

            // Mouse drag functionality
            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
                slider.style.cursor = 'grabbing';
            });

            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.style.cursor = 'grab';
            });

            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.style.cursor = 'grab';
            });

            slider.addEventListener('mousemove', (e) => {
                if(!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 2;
                slider.scrollLeft = scrollLeft - walk;
            });

            // Touch events for mobile
            slider.addEventListener('touchstart', (e) => {
                isDown = true;
                startX = e.touches[0].pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            }, false);

            slider.addEventListener('touchend', () => {
                isDown = false;
            }, false);

            slider.addEventListener('touchmove', (e) => {
                if(!isDown) return;
                e.preventDefault();
                const x = e.touches[0].pageX - slider.offsetLeft;
                const walk = (x - startX) * 2;
                slider.scrollLeft = scrollLeft - walk;
            }, false);

            // Button controls
            prevButton.addEventListener('click', () => {
                slider.scrollBy({
                    left: -300,
                    behavior: 'smooth'
                });
            });

            nextButton.addEventListener('click', () => {
                slider.scrollBy({
                    left: 300,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('nav.navbar');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
            });
        });
    </script>
</body>
</html>