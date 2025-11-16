<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'حريفة - مشروع تطوير قطاع الناشئين في مصر')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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