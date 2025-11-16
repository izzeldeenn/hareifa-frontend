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

    <!-- Main Content -->
    <main class="container-fluid p-0">
        <!-- Featured News -->
        <section class="featured-news position-relative" style="height: 80vh; overflow: hidden;">
            <div class="position-absolute w-100 h-100">
                <img src="{{asset('images/Pasted image.png')}}" alt="الخبر الرئيسي" class="w-100 h-100" style="object-fit: cover;">
            </div>
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.1) 100%);">
                <div class="container h-100 d-flex align-items-end">
                    <div class="row w-100">
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
                            <button class="btn btn-warning w-100 mt-2">التفاصيل</button>
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
                    <div class="featured-players-slider d-flex flex-nowrap overflow-auto py-3">
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
                        <div class="player-card flex-shrink-0 me-3" style="width: 240px;">
                            <div class="card h-100 border-0 shadow-sm rounded-2xl overflow-hidden">
                                <div class="position-relative">
                                    <div class="ratio ratio-1x1">
                                        <img src="https://randomuser.me/api/portraits/men/{{ $index + 1 }}.jpg" class="img-fluid" alt="{{ $player['name'] }}" style="object-fit: cover;">
                                    </div>
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-warning text-dark">{{ $player['rating'] }} <i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="card-body text-center px-3 py-2">
                                    <h5 class="card-title mb-1 text-truncate" title="{{ $player['name'] }}">{{ $player['name'] }}</h5>
                                    <span class="badge bg-light text-dark mb-2">{{ $player['position'] }}</span>
                                    <div class="d-flex justify-content-center gap-2">
                                        <span class="badge bg-light text-dark d-flex align-items-center">
                                            <i class="fas fa-video text-primary me-1"></i> {{ $player['videos'] }}
                                        </span>
                                        <span class="badge bg-light text-dark d-flex align-items-center">
                                            <i class="fas fa-trophy text-warning me-1"></i> {{ $player['titles'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-top-0 pt-0 px-3 pb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-start" style="font-size: 0.8rem;">
                                            <div class="text-muted small">الأكاديمية</div>
                                            <div class="fw-bold text-truncate" style="max-width: 120px;">{{ $player['academy'] ?? 'غير محدد' }}</div>
                                        </div>
                                        <button class="btn btn-sm btn-dark rounded-pill px-3" style="font-size: 0.75rem;">
                                         مشاهدات
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

        <!-- Clubs Section -->
        <section class="py-5 bg-dark text-light">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-warning text-dark px-4 py-2 rounded-pill mb-3">أبرز الأندية</span>
                    <h2 class="fw-bold mb-3">أندية حريفه</h2>
                    <div class="divider bg-warning mx-auto"></div>
                </div>
                
                <div class="row g-4">
                    @php
                        $clubs = [
                            [
                                'name' => 'نادي الأهلي',
                                'governorate' => 'القاهرة',
                                'city' => 'القاهرة',
                                'logo_url' => 'https://via.placeholder.com/300x200/1a1a1a/ffffff?text=نادي+الأهلي',
                                'level' => 'pro',
                                'head_coach' => 'مارسيل كولر',
                                'created_at' => now()->subDays(rand(1, 30))
                            ],
                            [
                                'name' => 'نادي الزمالك',
                                'governorate' => 'القاهرة',
                                'city' => 'الجيزة',
                                'logo_url' => 'https://via.placeholder.com/300x200/1a1a1a/ffffff?text=نادي+الزمالك',
                                'level' => 'pro',
                                'head_coach' => 'جوزيه جوميز',
                                'created_at' => now()->subDays(rand(1, 30))
                            ],
                            [
                                'name' => 'نادي الإسماعيلي',
                                'governorate' => 'الإسماعيلية',
                                'city' => 'الإسماعيلية',
                                'logo_url' => 'https://via.placeholder.com/300x200/1a1a1a/ffffff?text=نادي+الإسماعيلي',
                                'level' => 'pro',
                                'head_coach' => 'محمد حسن',
                                'created_at' => now()->subDays(rand(1, 30))
                            ]
                        ];
                        
                        $levelLabels = [
                            'pro' => 'المحترفين',
                            'second' => 'الدرجة الثانية',
                            'third' => 'الدرجة الثالثة',
                            'academy' => 'الأكاديمية'
                        ];
                    @endphp
                    
                    @foreach($clubs as $club)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden bg-gray-800 transition-all hover-scale">
                            <div class="position-relative" style="height: 200px; overflow: hidden;">
                                <div class="position-relative" style="height: 160px; background: linear-gradient(135deg, #1a1a1a 0%, #2d3748 100%);">
                                    <!-- Banner Area -->
                                    <div class="w-100 h-100" style="background: url('https://images.unsplash.com/photo-1574629810360-7efbbe195f86?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;">
                                    </div>
                                    <!-- Circular Logo -->
                                    <div class="position-absolute top-100 start-50 translate-middle" style="width: 100px; height: 100px;">
                                        <div class="rounded-circle border-4 border-white bg-white d-flex align-items-center justify-content-center" style="width: 100%; height: 100%; padding: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                            <img src="{{ $club['logo_url'] }}" alt="{{ $club['name'] }}" class="img-fluid" style="width: 90%; height: 90%; object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-warning text-white">{{ $levelLabels[$club['level']] ?? $club['level'] }}</span>
                                </div>
                            </div>
                            <div class="card-body p-4 pt-5">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold mb-0 text-white">{{ $club['name'] }}</h5>
                                    <span class="text-white-50 small"><i class="far fa-calendar-alt me-1"></i> {{ $club['created_at']->diffForHumans() }}</span>
                                </div>
                                
                                <div class="club-details">
                                    <div class="d-flex align-items-center mb-2 text-white">
                                        <i class="fas fa-map-marker-alt text-warning me-2"></i>
                                        <span>{{ $club['city'] }}، {{ $club['governorate'] }}</span>
                                    </div>
                                    <div class="d-flex align-items-center text-white">
                                        <i class="fas fa-user-tie text-warning me-2"></i>
                                        <span>المدير الفني: {{ $club['head_coach'] }}</span>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-secondary">
                                    <a href="#" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                        <i class="fas fa-eye me-1"></i> عرض التفاصيل
                                    </a>
                                    <div class="social-links">
                                        <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-5">
                    <a href="#" class="btn btn-warning btn-lg rounded-pill px-4">
                        <i class="fas fa-arrow-left me-2"></i> عرض جميع الأندية
                    </a>
                </div>
            </div>
        </section>
        
        <style>
            .bg-gray-800 {
                background-color: #1f2937;
            }
            .hover-scale {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .hover-scale:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            }
            .divider {
                width: 60px;
                height: 3px;
                margin: 0 auto;
            }
            .club-logo-container {
                position: relative;
                transition: all 0.3s ease;
            }
            .club-logo-container:hover {
                transform: scale(1.05);
            }
        </style>

        <!-- Teams Section -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-success text-white px-4 py-2 rounded-pill mb-3">الفرق</span>
                    <h2 class="fw-bold mb-3">الفرق الرياضية</h2>
                    <div class="divider bg-success mx-auto"></div>
                </div>
                
                <div class="row g-4">
                    @php
                        $teams = [
                            [
                                'name' => 'فريق الناشئين',
                                'club' => 'نادي الأهلي',
                                'age_group' => 'تحت 18 سنة',
                                'players_count' => 25,
                                'coach' => 'أحمد محمود',
                                'color' => '#dc3545'  // Red for Al Ahly
                            ],
                            [
                                'name' => 'فريق الأشبال',
                                'club' => 'نادي الزمالك',
                                'age_group' => 'تحت 16 سنة',
                                'players_count' => 22,
                                'coach' => 'خالد إبراهيم',
                                'color' => '#ffffff'  // White for Zamalek
                            ],
                            [
                                'name' => 'فريق البراعم',
                                'club' => 'نادي الإسماعيلي',
                                'age_group' => 'تحت 14 سنة',
                                'players_count' => 20,
                                'coach' => 'عمرو وليد',
                                'color' => '#ffc107'  // Yellow for Ismaily
                            ]
                        ];
                    @endphp
                    
                    @foreach($teams as $team)
                    <div class="col-md-4">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm hover-scale">
                            <!-- Team Header with Color -->
                            <div class="position-relative">
                                <div style="height: 8px; background-color: {{ $team['color'] }};"></div>
                                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(0,0,0,0.1) 100%);"></div>
                            </div>
                            
                            <div class="card-body text-center p-4">
                                <!-- Team Logo -->
                                <div class="mb-4">
                                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 100px; height: 100px; background: linear-gradient(145deg, #f8f9fa 0%, #e9ecef 100%); border: 3px solid #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                        <i class="fas fa-tshirt fa-3x" style="color: {{ $team['color'] }};"></i>
                                    </div>
                                </div>
                                
                                <!-- Team Info -->
                                <h4 class="mb-2 fw-bold">{{ $team['name'] }}</h4>
                                <p class="text-muted mb-3">{{ $team['club'] }}</p>
                                
                                <div class="d-flex justify-content-center gap-3 mb-3">
                                    <div>
                                        <div class="text-muted small">الفئة العمرية</div>
                                        <div class="fw-bold">{{ $team['age_group'] }}</div>
                                    </div>
                                    <div class="vr"></div>
                                    <div>
                                        <div class="text-muted small">عدد اللاعبين</div>
                                        <div class="fw-bold">{{ $team['players_count'] }} لاعب</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center justify-content-center text-muted small mb-3">
                                    <i class="fas fa-user-tie me-2" style="color: {{ $team['color'] }};"></i>
                                    <span>المدرب: {{ $team['coach'] }}</span>
                                </div>
                                
                                <a href="#" class="btn btn-outline-success btn-sm rounded-pill px-4">
                                    <i class="fas fa-eye me-1"></i> عرض الفريق
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-5">
                    <a href="#" class="btn btn-success btn-lg rounded-pill px-4">
                        <i class="fas fa-arrow-left me-2"></i> عرض جميع الفرق
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Competitions Section -->
<section class="py-5" style="background: #1A093A;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0 text-white">
                <i class="fas fa-trophy me-2 text-warning"></i> المسابقات
            </h2>
            <a href="#" class="btn btn-link text-warning text-decoration-none">
                عرض الكل <i class="fas fa-arrow-left me-2"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach([
                [
                    'name' => 'الدوري المصري الممتاز',
                    'season' => '2023/2024',
                    'banner' => 'https://i.imgur.com/oW1jTxV.jpeg',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/2/20/Egyptian_Premier_League_logo.png/600px-Egyptian_Premier_League_logo.png',
                    'rounds' => '34 جولة',
                    'teams' => 18,
                    'matches' => 306,
                    'status' => 'نشط'
                ],
                [
                    'name' => 'كأس مصر',
                    'season' => '2024',
                    'banner' => 'https://i.imgur.com/mWwYg7S.jpeg',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/7/79/Egypt_Cup.png/600px-Egypt_Cup.png',
                    'rounds' => 'نظام خروج المغلوب',
                    'teams' => 32,
                    'matches' => 31,
                    'status' => 'قادم'
                ],
                [
                    'name' => 'دوري أبطال أفريقيا',
                    'season' => '2023/2024',
                    'banner' => 'https://i.imgur.com/sEub5xf.jpeg',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/79/CAF_Champions_League_logo.png/600px-CAF_Champions_League_logo.png',
                    'rounds' => 'مرحلة المجموعات',
                    'teams' => 16,
                    'matches' => 61,
                    'status' => 'منتهي'
                ],
            ] as $comp)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden">

                    <!-- Banner -->
                    <div class="position-relative" style="height: 170px;">
                        <img src="{{ $comp['banner'] }}" 
                             alt="banner" class="w-100 h-100 object-fit-cover">
                        <div class="position-absolute top-0 start-0 w-100 h-100" 
                             style="background: rgba(0,0,0,0.45);"></div>

                        <!-- Logo -->
                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-2">
                            <div class="bg-white p-2 rounded-circle shadow">
                                <img src="{{ $comp['logo'] }}" 
                                     class="rounded-circle" width="70" height="70">
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center mt-4">
                        <h5 class="card-title mb-1 fw-bold text-dark">
                            {{ $comp['name'] }}
                        </h5>
                        <span class="text-muted small d-block mb-3">
                            {{ $comp['season'] }}
                        </span>

                        <div class="text-start px-3">
                            <p class="mb-1 text-muted">
                                <i class="fas fa-calendar-alt text-warning me-1"></i>
                                <strong>عدد الجولات:</strong> {{ $comp['rounds'] }}
                            </p>

                            <p class="mb-1 text-muted">
                                <i class="fas fa-users text-warning me-1"></i>
                                <strong>عدد الفرق:</strong> {{ $comp['teams'] }}
                            </p>

                            <p class="mb-3 text-muted">
                                <i class="fas fa-futbol text-warning me-1"></i>
                                <strong>عدد المباريات:</strong> {{ $comp['matches'] }}
                            </p>

                            <span class="badge 
                                {{ $comp['status'] == 'نشط' ? 'bg-success' : ($comp['status'] == 'قادم' ? 'bg-warning text-dark' : 'bg-secondary') }}
                                px-3 py-2 rounded-pill fw-bold">
                                {{ $comp['status'] }}
                            </span>
                        </div>

                        <a href="#" class="btn btn-warning text-dark fw-bold mt-3 px-4 py-2">
                            عرض التفاصيل
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- Tryouts Section -->
<section class="py-5" style="background:#ffffff;">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">
                <i class="fas fa-clipboard-check me-2 text-info"></i> اختبارات الأداء
            </h2>
            <a href="#" class="btn btn-link text-warning text-decoration-none">
                عرض الكل <i class="fas fa-arrow-left me-2"></i>
            </a>
        </div>

        <div class="row g-4">

            @foreach([
                [
                    'title' => 'اختبار الناشئين',
                    'club' => 'الأهلي',
                    'city' => 'القاهرة',
                    'date' => '15 ديسمبر 2023',
                    'banner' => 'https://i.imgur.com/B9ri7N1.jpeg',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/4/4a/Al_Ahly_SC_logo.png/200px-Al_Ahly_SC_logo.png',
                    'status' => 'مفتوح',
                    'registered' => 28,
                    'max' => 44,
                ],
                [
                    'title' => 'اختبار الأشبال',
                    'club' => 'الزمالك',
                    'city' => 'الجيزة',
                    'date' => '20 ديسمبر 2023',
                    'banner' => 'https://i.imgur.com/u8qHqJc.jpeg',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/0/0c/ZamalekSC.png/200px-ZamalekSC.png',
                    'status' => 'قريبًا',
                    'registered' => 0,
                    'max' => 44,
                ],
                [
                    'title' => 'اختبار البراعم',
                    'club' => 'الإسماعيلي',
                    'city' => 'الإسماعيلية',
                    'date' => '10 يناير 2024',
                    'banner' => 'https://i.imgur.com/1QOClUy.jpeg',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/3/3f/Ismaily_SC_logo.png/200px-Ismaily_SC_logo.png',
                    'status' => 'مغلق',
                    'registered' => 44,
                    'max' => 44,
                ],
            ] as $try)

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden tryout-card" style="transition:0.3s;">

                    <!-- Banner -->
                    <div class="position-relative" style="height: 180px;">
                        <img src="{{ $try['banner'] }}" class="w-100 h-100 object-fit-cover">
                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background: rgba(0,0,0,0.45);"></div>

                        <!-- Logo -->
                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-2">
                            <div class="bg-white p-2 rounded-circle shadow">
                                <img src="{{ $try['logo'] }}" width="70" height="70" class="rounded-circle">
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center mt-4">
                        <h5 class="fw-bold">{{ $try['title'] }}</h5>
                        <p class="text-muted small mb-1">
                            <i class="fas fa-shield-alt text-warning me-1"></i>
                            نادي {{ $try['club'] }}
                        </p>

                        <!-- Status Badge -->
                        <span class="badge 
                            @if($try['status']=='مفتوح') bg-success 
                            @elseif($try['status']=='قريبًا') bg-warning text-dark
                            @else bg-danger 
                            @endif
                            px-3 py-2 rounded-pill fw-bold mb-3 d-inline-block">
                            {{ $try['status'] }}
                        </span>

                        <div class="text-start px-3">

                            <p class="mb-1 text-muted">
                                <i class="far fa-calendar-alt text-info me-1"></i>
                                <strong>التاريخ:</strong> {{ $try['date'] }}
                            </p>

                            <p class="mb-1 text-muted">
                                <i class="fas fa-map-marker-alt text-info me-1"></i>
                                <strong>المدينة:</strong> {{ $try['city'] }}
                            </p>

                            <p class="mb-2 text-muted">
                                <i class="fas fa-users text-info me-1"></i>
                                <strong>المتقدمون:</strong> {{ $try['registered'] }} / {{ $try['max'] }}
                            </p>

                            <!-- Progress Bar -->
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-info" role="progressbar"
                                     style="width: {{ ($try['registered'] / $try['max']) * 100 }}%;"></div>
                            </div>

                        </div>

                        <a href="#"
                           class="btn btn-info text-white fw-bold mt-3 px-4 py-2 w-100 
                                  @if($try['status']=='مغلق') disabled @endif">
                            سجل الآن
                        </a>

                    </div>
                </div>
            </div>

            @endforeach

        </div>

    </div>
</section>

<style>
.tryout-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 0 25px rgba(0,255,255,0.3);
}
</style>

<!-- Coaches Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0"><i class="fas fa-user-tie me-2 text-danger"></i> المدربين</h2>
            <a href="#" class="btn btn-link text-warning text-decoration-none">عرض الكل <i class="fas fa-arrow-left me-2"></i></a>
        </div>

        <div class="row g-4">
            @php
                $coaches = [
                    [
                        'name' => 'محمد صلاح',
                        'level' => 'مدرب ناشئين',
                        'img' => 'https://images.pexels.com/photos/4761791/pexels-photo-4761791.jpeg?auto=compress&cs=tinysrgb&w=600',
                        'wins' => 6,
                        'rate' => 4.9,
                        'skills' => ['مهارات فردية', 'تهديف', 'سرعة']
                    ],
                    [
                        'name' => 'أحمد حجازي',
                        'level' => 'مدرب أشبال',
                        'img' => 'https://images.pexels.com/photos/9911888/pexels-photo-9911888.jpeg?auto=compress&cs=tinysrgb&w=600',
                        'wins' => 4,
                        'rate' => 4.7,
                        'skills' => ['دفاع', 'تمركز', 'لياقة']
                    ],
                    [
                        'name' => 'محمد النني',
                        'level' => 'مدرب براعم',
                        'img' => 'https://images.pexels.com/photos/9911885/pexels-photo-9911885.jpeg?auto=compress&cs=tinysrgb&w=600',
                        'wins' => 5,
                        'rate' => 4.8,
                        'skills' => ['تمرير', 'سيطرة', 'Vision']
                    ]
                ];
            @endphp

            @foreach($coaches as $coach)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 coach-card overflow-hidden" style="transition: .3s;">
                    <img src="{{ $coach['img'] }}" class="card-img-top" alt="coach" style="height:220px; object-fit:cover;">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1">{{ $coach['name'] }}</h5>
                        <p class="text-muted small mb-2">{{ $coach['level'] }}</p>

                        <div class="d-flex justify-content-center gap-2 mb-2">
                            <span class="badge bg-light text-dark"><i class="fas fa-trophy me-1 text-warning"></i> {{ $coach['wins'] }} بطولات</span>
                            <span class="badge bg-light text-dark"><i class="fas fa-star me-1 text-warning"></i> {{ $coach['rate'] }}</span>
                        </div>

                        <div class="mb-3">
                            @foreach($coach['skills'] as $skill)
                                <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">{{ $skill }}</span>
                            @endforeach
                        </div>

                        <a href="#" class="btn btn-outline-danger btn-sm rounded-pill px-4">عرض الملف</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<style>
    .coach-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15) !important;
    }
</style>
<!-- Referees Section -->
<section class="py-5" style="background:#1c0f3b;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0 text-white">
                <i class="fas fa-whistle me-2 text-primary"></i> الحكام
            </h2>
            <a href="#" class="btn btn-link text-warning text-decoration-none">
                عرض الكل <i class="fas fa-arrow-left me-2"></i>
            </a>
        </div>

        <div class="row g-4">
            @php
                $referees = [
                    [
                        'name' => 'جهاد جريشة',
                        'level' => 'حكم دولي',
                        'img' => 'https://images.pexels.com/photos/6149962/pexels-photo-6149962.jpeg?auto=compress&cs=tinysrgb&w=600',
                        'matches' => 75,
                        'rate' => 4.7,
                        'country' => 'مصر'
                    ],
                    [
                        'name' => 'محمود عاشور',
                        'level' => 'حكم دولي',
                        'img' => 'https://images.pexels.com/photos/6149963/pexels-photo-6149963.jpeg?auto=compress&cs=tinysrgb&w=600',
                        'matches' => 63,
                        'rate' => 4.5,
                        'country' => 'مصر'
                    ],
                    [
                        'name' => 'أحمد الغندور',
                        'level' => 'حكم دولي',
                        'img' => 'https://images.pexels.com/photos/6149965/pexels-photo-6149965.jpeg?auto=compress&cs=tinysrgb&w=600',
                        'matches' => 89,
                        'rate' => 4.9,
                        'country' => 'مصر'
                    ],
                ];
            @endphp

            @foreach($referees as $ref)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-lg rounded-4 referee-card overflow-hidden" style="transition:.3s;">
                    
                    <!-- Image -->
                    <div class="position-relative">
                        <img src="{{ $ref['img'] }}" class="card-img-top" alt="referee" style="height:200px; object-fit:cover;">
                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-2">
                            <div class="bg-white p-1 rounded-circle shadow">
                                <i class="fas fa-whistle text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center mt-3">
                        <h5 class="card-title mb-1">{{ $ref['name'] }}</h5>
                        <p class="text-muted small mb-2">{{ $ref['level'] }} - {{ $ref['country'] }}</p>

                        <div class="d-flex justify-content-center gap-2 mb-2 flex-wrap">
                            <span class="badge bg-primary">
                                <i class="fas fa-flag me-1"></i> {{ $ref['matches'] }} مباراة
                            </span>
                            <span class="badge bg-success">
                                <i class="fas fa-star me-1"></i> {{ $ref['rate'] }}
                            </span>
                        </div>

                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-4 mt-2">عرض الملف الشخصي</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.referee-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 25px rgba(0,0,0,0.25) !important;
}
</style>


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
                            <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=خبر+{{ $i + 1 }}" alt="خبر {{ $i + 1 }}" class="w-100" style="height: 200px; object-fit: cover;">
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
