<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حريفة - آخر أخبار الرياضة</title>
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
            border-bottom: 2px solid var(--main-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        
        .main-news {
            margin: 20px 0;
        }
        
        .main-news-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
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
        
        .news-title {
            font-weight: 700;
            margin: 10px 0;
            color: #333;
        }
        
        .news-time {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin: 30px 0 20px;
            color: var(--secondary-color);
        }
        
        .section-title {
            position: relative;
            padding-right: 15px;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            right: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--main-color), var(--accent-color));
            border-radius: 3px;
        }
        
        .leagues-bar {
            background-color: var(--main-color);
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--accent-color);
        }
        
        .league-icon {
            width: 40px;
            height: 40px;
            margin: 0 10px;
            transition: transform 0.3s;
        }
        
        .league-icon:hover {
            transform: scale(1.1);
        }
        
        footer {
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 30px 0 0;
            margin-top: 60px;
            border-top: 5px solid var(--main-color);
        }
        
        .social-icons a {
            color: var(--white);
            font-size: 20px;
            margin: 0 10px;
            transition: all 0.3s;
            background: rgba(255,255,255,0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .social-icons a:hover {
            color: var(--main-color);
            background: var(--white);
            transform: translateY(-3px);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="حريفة" style="height: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-compass"></i> الاستكشاف</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-graduation-cap"></i> الأكاديميات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-users"></i> اللاعبين</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-futbol"></i> المباريات</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="ابحث في الموقع..." aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
                <div class="leagues-bar">
                <div class="container">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="https://ssl.gstatic.com/onebox/media/sports/logos/4us2nC86HWKL9hSai5gCOQ_48x48.png" alt="الدوري الإنجليزي" class="league-icon">
                        <img src="https://ssl.gstatic.com/onebox/media/sports/logos/1hRaGIkdTprPhcHoAhdXWg_48x48.png" alt="الدوري الإنجليزي" class="league-icon">
                        <img src="https://ssl.gstatic.com/onebox/media/sports/logos/LoL2hMhqhyXotCjH4X8LLA_48x48.png" alt="الدوري الإيطالي" class="league-icon">
                        <img src="https://ssl.gstatic.com/onebox/media/sports/logos/0iShHhASp5q1SL4JhtwJiw_48x48.png" alt="الدوري الألماني" class="league-icon">
                        <img src="https://ssl.gstatic.com/onebox/media/sports/logos/1x/uefa_champions_league_square_48x48.png" alt="دوري أبطال أوروبا" class="league-icon">
                    </div>
                </div>
            </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Featured News -->
        <div class="row main-news">
            <div class="col-md-8">
                <div class="main-news-card">
                    <img src="https://via.placeholder.com/800x500" alt="الخبر الرئيسي" class="main-news-img">
                    <div class="p-3">
                        <span class="badge" style="background-color: var(--accent-color); color: var(--white)">مميز</span>
                        <h2 class="mb-3">فوز كبير للفريق الأول على منافسه في الدوري الممتاز</h2>
                        <p class="text-muted">حقق الفريق الأول فوزًا كبيرًا على منافسه في المباراة التي جمعتهما مساء اليوم ضمن منافسات الجولة العاشرة من الدوري الممتاز.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="news-time"><i class="far fa-clock"></i> منذ ساعة</span>
                            <a href="#" class="btn btn-sm" style="background-color: var(--accent-color); color: var(--white); border: 1px solid var(--accent-color);">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="news-card h-100">
                    <img src="https://via.placeholder.com/400x300" alt="خبر عاجل" class="w-100">
                    <div class="p-3">
                        <h4 class="news-title">إصابة نجم الفريق الأول قبل المباراة المهمة</h4>
                        <p class="text-muted mb-3">أصيب نجم الفريق الأول خلال التدريبات استعدادًا للمباراة المهمة أمام منافسه القوي.</p>
                        <span class="news-time"><i class="far fa-clock"></i> منذ 3 ساعات</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Latest News -->
        <h3 class="section-title">آخر الأخبار</h3>
        <div class="row">
            @for($i = 0; $i < 6; $i++)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="news-card">
                    <img src="https://via.placeholder.com/400x250" alt="خبر {{ $i + 1 }}" class="news-img">
                    <div class="p-3">
                        <h5 class="news-title">عنوان الخبر الرئيسي هنا مع بعض التفاصيل الإضافية</h5>
                        <p class="text-muted mb-2">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="news-time"><i class="far fa-clock"></i> منذ {{ $i + 1 }} ساعة</span>
                            <a href="#" class="btn btn-link p-0" style="color: var(--accent-color);">المزيد <i class="fas fa-arrow-left me-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        
        <!-- Videos Section -->
        <h3 class="section-title">أحدث الفيديوهات</h3>
        <div class="row">
            @for($i = 0; $i < 3; $i++)
            <div class="col-md-4 mb-4">
                <div class="news-card">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/400x225" alt="فيديو {{ $i + 1 }}" class="w-100">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button class="btn btn-danger rounded-circle" style="width: 60px; height: 60px;">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-3">
                        <h5 class="news-title">أهداف المباراة بين الفريقين في الدوري الممتاز</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="news-time"><i class="far fa-eye"></i> 1.2K مشاهدة</span>
                            <span class="news-time"><i class="far fa-clock"></i> 5:32 دقيقة</span>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">عن حريفة</h5>
                    <p>موقع رياضي متخصص في متابعة أخبار كرة القدم والرياضة العربية والعالمية، ويقدم تغطية حصرية لكل ما يخص الملاعب الخضراء.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">الرئيسية</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">أخبار كرة القدم</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">النتائج والمواعيد</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">ترتيب الفرق</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">تواصل معنا</h5>
                    <p><i class="fas fa-envelope me-2"></i> info@hareifa.com</p>
                    <p><i class="fas fa-phone me-2"></i> +1234567890</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center pt-3">
                <p class="mb-0">© 2025 حريفة. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set current date in Arabic
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('ar-EG', options);
    </script>
</body>
</html>