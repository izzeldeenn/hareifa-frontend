@extends('layouts.app')

@php
    // Sample academies data - This would normally come from your controller
    $sampleAcademies = collect([
        (object)[
            'id' => 1,
            'name' => 'أكاديمية النجوم – القاهرة',
            'cover_image' => 'https://images.unsplash.com/photo-1577471488278-16eec37ffcc2',
            'logo' => 'https://ui-avatars.com/api/?name=النجوم&background=0D8ABC&color=fff&size=128',
            'city' => 'القاهرة',
            'region' => 'مصر الجديدة',
            'players_count' => 42,
            'videos_count' => 120,
            'rating' => 4
        ],
        (object)[
            'id' => 2,
            'name' => 'أكاديمية الأهلي للشباب',
            'cover_image' => 'https://images.unsplash.com/photo-1577471488278-16eec37ffcc2',
            'logo' => 'https://ui-avatars.com/api/?name=الأهلي&background=C10E1F&color=fff&size=128',
            'city' => 'الجيزة',
            'region' => 'الدقي',
            'players_count' => 85,
            'videos_count' => 210,
            'rating' => 5
        ],
        (object)[
            'id' => 3,
            'name' => 'نادي الزمالك للبراعم',
            'cover_image' => 'https://images.unsplash.com/photo-1531415074968-036ba1b575da',
            'logo' => 'https://ui-avatars.com/api/?name=الزمالك&background=000000&color=fff&size=128',
            'city' => 'القاهرة',
            'region' => 'المهندسين',
            'players_count' => 63,
            'videos_count' => 175,
            'rating' => 4
        ]
    ]);
    
    // If no academies are passed from the controller, use the sample data
    $academies = $academies ?? $sampleAcademies;
@endphp

@section('content')
<style>
        :root {
            --main-color: #ff8000; /* Yellow */
            --secondary-color: #1a1a1a; /* Black */
            --accent-color: #ff9100; /* Orange */
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
    <!-- Main Content -->
    <main class="container-fluid p-0">
        <!-- Featured News -->
        <section class="featured-news position-relative">
            <img src="{{asset('images/Pasted image.png')}}" alt="الخبر الرئيسي" class="w-100" style="height: 80vh; object-fit: cover;">
            <div class="featured-overlay">
                <div class="container h-100">
                    <div class="row h-100 align-items-end">
                        <div class="col-lg-8 mb-5">
                            <div class="featured-content text-white">
                                <span class="badge mb-3" style="background-color: var(--accent-color); font-size: 1rem; padding: 8px 15px;">الدوري الممتاز</span>
                                <h1 class="display-4 fw-bold mb-3">فوز تاريخي للفريق الأول بثلاثية نظيفة في كلاسيكو الدوري</h1>
                                <div class="d-flex align-items-center">
                                    <span class="me-3"><i class="far fa-calendar-alt me-2"></i> 15 نوفمبر 2025</span>
                                    <span><i class="far fa-eye me-2"></i> 2,543 مشاهدة</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Matches Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="section-title mb-4"><i class="fas fa-futbol me-2"></i> المباريات القادمة</h2>
                <div class="row g-4">
                    @for($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <div class="match-card p-4 bg-white rounded-3 shadow-sm">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-warning text-dark">الدوري الممتاز</span>
                                <span class="text-muted">الجمعة 20 نوفمبر</span>
                            </div>
                            <div class="teams d-flex justify-content-between align-items-center my-4">
                                <div class="team text-center">
                                    <img src="https://via.placeholder.com/80" alt="فريق" class="img-fluid mb-2" style="width: 60px; height: 60px; object-fit: contain;">
                                    <h5 class="mb-0">النصر</h5>
                                </div>
                                <div class="match-time text-center">
                                    <div class="bg-light p-2 rounded-pill d-inline-block px-4">
                                        <span class="fw-bold">21:00</span>
                                    </div>
                                    <p class="mt-2 mb-0 text-muted">ملعب الملك فهد</p>
                                </div>
                                <div class="team text-center">
                                    <img src="https://via.placeholder.com/80" alt="فريق" class="img-fluid mb-2" style="width: 60px; height: 60px; object-fit: contain;">
                                    <h5 class="mb-0">الهلال</h5>
                                </div>
                            </div>
                            <button class="btn btn-warning w-100 mt-2">احجز تذكرتك</button>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>

        <!-- Featured Players Slider Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0"><i class="fas fa-star me-2 text-warning"></i> أبرز اللاعبين</h2>
                    <div class="slider-nav">
                        <button class="btn btn-sm btn-outline-secondary me-2 player-prev"><i class="fas fa-chevron-right"></i></button>
                        <button class="btn btn-sm btn-outline-secondary player-next"><i class="fas fa-chevron-left"></i></button>
                    </div>
                </div>
                
                <div class="position-relative">
                    <div class="featured-players-slider">
                        @php
                            $players = [
                                ['name' => 'محمد صلاح', 'position' => 'مهاجم', 'videos' => 24, 'titles' => 8, 'rating' => 4.9],
                                ['name' => 'أحمد حجازي', 'position' => 'مدافع', 'videos' => 18, 'titles' => 5, 'rating' => 4.7],
                                ['name' => 'محمد النني', 'position' => 'وسط', 'videos' => 32, 'titles' => 12, 'rating' => 4.8],
                                ['name' => 'محمد شريف', 'position' => 'مهاجم', 'videos' => 15, 'titles' => 3, 'rating' => 4.5],
                                ['name' => 'محمد أبو جبل', 'position' => 'حارس مرمى', 'videos' => 21, 'titles' => 6, 'rating' => 4.6],
                                ['name' => 'عمر مرموش', 'position' => 'وسط', 'videos' => 19, 'titles' => 4, 'rating' => 4.4]
                            ];
                        @endphp
                        
                        @foreach($players as $index => $player)
                        <div class="player-card">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="position-relative">
                                    <img src="https://randomuser.me/api/portraits/men/{{ $index + 1 }}.jpg" class="card-img-top" alt="{{ $player['name'] }}">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-warning text-dark">{{ $player['rating'] }} <i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-1">{{ $player['name'] }}</h5>
                                    <p class="text-muted small mb-2">{{ $player['position'] }}</p>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="badge bg-light text-dark me-2">
                                            <i class="fas fa-video text-primary me-1"></i> {{ $player['videos'] }}
                                        </span>
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-trophy text-warning me-1"></i> {{ $player['titles'] }} ألقاب
                                        </span>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-top-0 pt-0 px-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="academy-info" style="font-size: 0.8rem;">
                                            <small class="text-muted">الأكاديمية</small>
                                            <div class="fw-bold text-truncate" style="max-width: 100px;">{{ $player['academy'] ?? 'غير محدد' }}</div>
                                        </div>
                                        <button class="btn btn-sm btn-dark rounded-pill px-2 py-1" style="font-size: 0.75rem;">
                                            <i class="fas fa-play-circle me-1"></i> مشاهدات
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if(count($players) == 0)
                    <div class="text-center py-5 bg-white rounded-lg shadow-sm">
                        <div class="display-1 mb-3">👋</div>
                        <h4 class="mb-3">لا يوجد لاعبين حالياً</h4>
                        <p class="text-muted mb-4">لو عندك لاعب حابب تضمّه — تواصل معانا الآن</p>
                        <a href="{{ route('signup') }}" class="btn btn-warning px-4">
                            <i class="fas fa-plus-circle me-2"></i> أضف لاعب
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Academies Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0"><i class="fas fa-graduation-cap me-2"></i> الأكاديميات</h2>
                    <a href="{{ route('players.index') }}" class="btn btn-link text-warning text-decoration-none">عرض الكل <i class="fas fa-arrow-left me-2"></i></a>
                </div>
                
                @if(isset($academies) && count($academies) > 0)
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($academies->take(3) as $academy)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-lg overflow-hidden">
                            <div class="position-relative">
                                <img src="{{ $academy->cover_image ?? 'https://images.unsplash.com/photo-1577471488278-16eec37ffcc2?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80' }}" 
                                     class="card-img-top" 
                                     alt="{{ $academy->name }}" 
                                     style="height: 160px; object-fit: cover;">
                                <div class="position-absolute" style="bottom: -20px; right: 15px;">
                                    <div class="bg-white rounded-circle shadow-sm" style="width: 60px; height: 60px; padding: 2px;">
                                        <img src="{{ $academy->logo ?? 'https://via.placeholder.com/60' }}" 
                                             class="img-fluid rounded-circle w-100 h-100" 
                                             alt="{{ $academy->name }}"
                                             style="object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-4">
                                <h5 class="card-title mb-1">{{ $academy->name }}</h5>
                                <p class="text-muted mb-2">
                                    <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                    {{ $academy->city }} - {{ $academy->region }}
                                </p>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="badge bg-light text-dark me-2">
                                        <i class="fas fa-users text-primary me-1"></i> {{ $academy->players_count ?? 0 }} لاعب
                                    </span>
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-video text-primary me-1"></i> {{ $academy->videos_count ?? 0 }} فيديو
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= ($academy->rating ?? 0) ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    </div>
                                    <a href="{{ route('academies.show', $academy->id) }}" class="btn btn-sm btn-outline-warning">
                                        عرض الأكاديمية <i class="fas fa-arrow-left me-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                                </div>
                @else
                <div class="text-center py-5 bg-white rounded-lg shadow-sm">
                    <div class="display-1 mb-3">👋</div>
                    <h4 class="mb-3">لسه بنضيف الأكاديميات المعتمدة</h4>
                    <p class="text-muted mb-4">لو عندك أكاديمية حابب تضمّها — تواصل معانا الآن</p>
                    <a href="#" class="btn btn-warning px-4">
                        <i class="fas fa-plus-circle me-2"></i> أضف أكاديميتك
                    </a>
                </div>
                @endif

                <div class="text-center mt-5">
                    <a href="{{ route('academies.index') }}" class="btn btn-warning px-5">
                        استكشف كل الأكاديميات <i class="fas fa-arrow-left me-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Latest News -->
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0"><i class="far fa-newspaper me-2"></i> آخر الأخبار</h2>
                    <a href="{{ route('players.index') }}" class="btn btn-link text-warning text-decoration-none">عرض الكل <i class="fas fa-arrow-left me-2"></i></a>
                </div>
                <div class="row g-4">
                    @for($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <div class="news-card h-100">
                            <img src="https://images.unsplash.com/photo-1579952363872-3f1b0e22d0a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="خبر" class="w-100" style="height: 200px; object-fit: cover;">
                            <div class="p-3">
                                <span class="badge bg-warning text-dark mb-2">كرة قدم</span>
                                <h5 class="news-title">انتصار كبير للفريق الأول في الدوري المحلي</h5>
                                <p class="text-muted mb-3">حقق الفريق الأول فوزًا كبيرًا على منافسه في المباراة التي جمعتهما مساء اليوم ضمن منافسات الجولة العاشرة من الدوري الممتاز.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted"><i class="far fa-clock me-1"></i> منذ ساعتين</span>
                                    <a href="#" class="btn btn-sm btn-outline-warning">اقرأ المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>
    </main>
@endsection
