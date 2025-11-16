@extends('layouts.app')

@php
// Sample leagues data - Replace with actual database query
$featuredLeagues = collect([
    [
        'id' => 1,
        'name' => 'الدوري المصري الممتاز',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/1/1f/Egyptian_Premier_League_Logo.png/200px-Egyptian_Premier_League_Logo.png',
        'season' => '2024/2025',
        'matches_played' => 170,
        'top_scorer' => 'محمد شريف',
        'top_scorer_goals' => 18,
        'top_scorer_team' => 'النادي الأهلي',
        'top_scorer_photo' => 'https://via.placeholder.com/100/CCCCCC/666666?text=MS',
        'champion' => 'النادي الأهلي',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
        'champions_league_spots' => 2,
        'relegation_spots' => 3,
        'total_teams' => 18,
        'total_matches' => 306,
        'total_goals' => 712,
        'avg_goals_per_match' => 2.33
    ],
    [
        'id' => 2,
        'name' => 'دوري أبطال أفريقيا',
        'country' => 'أفريقيا',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/0/0a/CAF_Champions_League_logo.png/200px-CAF_Champions_League_logo.png',
        'season' => '2024/2025',
        'matches_played' => 62,
        'top_scorer' => 'بيرسي تاو',
        'top_scorer_goals' => 8,
        'top_scorer_team' => 'النادي الأهلي',
        'top_scorer_photo' => 'https://via.placeholder.com/100/CCCCCC/666666?text=PT',
        'champion' => 'النادي الأهلي',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
        'champions_league_spots' => 1,
        'relegation_spots' => 0,
        'total_teams' => 16,
        'total_matches' => 125,
        'total_goals' => 289,
        'avg_goals_per_match' => 2.31
    ]
])->map(function($item) { return (object)$item; });

$leagues = collect([
    [
        'id' => 1,
        'name' => 'الدوري المصري الممتاز',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/1/1f/Egyptian_Premier_League_Logo.png/200px-Egyptian_Premier_League_Logo.png',
        'teams' => 18,
        'champion' => 'النادي الأهلي',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
        'top_scorer' => 'محمد شريف',
        'goals' => 18,
        'matches' => 170,
        'goals_per_match' => 2.33
    ],
    [
        'id' => 2,
        'name' => 'دوري أبطال أفريقيا',
        'country' => 'أفريقيا',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/0/0a/CAF_Champions_League_logo.png/200px-CAF_Champions_League_logo.png',
        'teams' => 16,
        'champion' => 'النادي الأهلي',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
        'top_scorer' => 'بيرسي تاو',
        'goals' => 8,
        'matches' => 62,
        'goals_per_match' => 2.31
    ],
    [
        'id' => 3,
        'name' => 'كأس مصر',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/5/5c/Egypt_FA_Cup_Logo.png/200px-Egypt_FA_Cup_Logo.png',
        'teams' => 27,
        'champion' => 'نادي الزمالك',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/c/c1/Zamalek_SC_logo.svg/200px-Zamalek_SC_logo.svg.png',
        'top_scorer' => 'محمد شريف',
        'goals' => 6,
        'matches' => 30,
        'goals_per_match' => 2.15
    ],
    [
        'id' => 4,
        'name' => 'كأس السوبر المصري',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/6/6a/Egyptian_Super_Cup_logo.png/200px-Egyptian_Super_Cup_logo.png',
        'teams' => 2,
        'champion' => 'النادي الأهلي',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
        'top_scorer' => 'محمود كهربا',
        'goals' => 1,
        'matches' => 1,
        'goals_per_match' => 2.00
    ],
    [
        'id' => 5,
        'name' => 'دوري أبطال أوروبا',
        'country' => 'أوروبا',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/0/0c/UEFA_Champions_League_logo.png/200px-UEFA_Champions_League_logo.png',
        'teams' => 32,
        'champion' => 'مانشستر سيتي',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/e/eb/Manchester_City_FC_badge.svg/200px-Manchester_City_FC_badge.svg.png',
        'top_scorer' => 'إرلينج هالاند',
        'goals' => 12,
        'matches' => 125,
        'goals_per_match' => 2.78
    ],
    [
        'id' => 6,
        'name' => 'الدوري الإنجليزي الممتاز',
        'country' => 'إنجلترا',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/f/f2/Premier_League_Logo.svg/200px-Premier_League_Logo.svg.png',
        'teams' => 20,
        'champion' => 'مانشستر سيتي',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/e/eb/Manchester_City_FC_badge.svg/200px-Manchester_City_FC_badge.svg.png',
        'top_scorer' => 'إرلينج هالاند',
        'goals' => 36,
        'matches' => 380,
        'goals_per_match' => 2.85
    ],
    [
        'id' => 7,
        'name' => 'الدوري الإسباني',
        'country' => 'إسبانيا',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/2/26/LaLiga_logo_2023.svg/200px-LaLiga_logo_2023.svg.png',
        'teams' => 20,
        'champion' => 'برشلونة',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/4/47/FC_Barcelona_%28crest%29.svg/200px-FC_Barcelona_%28crest%29.svg.png',
        'top_scorer' => 'روبرت ليفاندوفسكي',
        'goals' => 23,
        'matches' => 380,
        'goals_per_match' => 2.51
    ],
    [
        'id' => 8,
        'name' => 'الدوري السعودي للمحترفين',
        'country' => 'السعودية',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9b/Saudi_Professional_League_Logo.png/200px-Saudi_Professional_League_Logo.png',
        'teams' => 16,
        'champion' => 'الاتحاد',
        'champion_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9b/Al-Ittihad_Club_Logo.svg/200px-Al-Ittihad_Club_Logo.svg.png',
        'top_scorer' => 'عبدالرزاق حمدالله',
        'goals' => 21,
        'matches' => 240,
        'goals_per_match' => 2.46
    ]
])->map(function($item) { return (object)$item; });

$countries = ['مصر', 'المغرب', 'الجزائر', 'تونس', 'السعودية', 'قطر', 'الإمارات', 'إنجلترا', 'إسبانيا', 'إيطاليا', 'ألمانيا', 'فرنسا'];
$continents = ['أفريقيا', 'أوروبا', 'آسيا', 'أمريكا الجنوبية', 'أمريكا الشمالية', 'أوقيانوسيا'];
@endphp

@section('content')
<!-- Hero Section -->
<section class="position-relative py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1574629810360-7efbbe195d86') no-repeat center/cover; min-height: 300px; display: flex; align-items: center;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bold mb-3">البطولات</h1>
            <p class="lead mb-4">استكشف جميع البطولات المحلية والقارية والدولية</p>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item active text-warning" aria-current="page">البطولات</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="py-5 bg-light">
    <div class="container">
        <!-- Search & Filters -->
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="ابحث عن بطولة...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="" selected>جميع الدول</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="" selected>جميع القارات</option>
                            @foreach($continents as $continent)
                                <option value="{{ $continent }}">{{ $continent }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-warning w-100">
                            <i class="fas fa-filter me-2"></i> تصفية
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Leagues -->
        @if($featuredLeagues->isNotEmpty())
        <div class="mb-5">
            <h3 class="fw-bold mb-4">بطولات مميزة</h3>
            <div class="row g-4">
                @foreach($featuredLeagues as $league)
                <div class="col-12">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="row g-0">
                            <div class="col-md-4 p-4 d-flex flex-column justify-content-center align-items-center text-center" style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1543351611-58f69d7c1781') center/cover;">
                                <img src="{{ $league->logo }}" alt="{{ $league->name }}" class="img-fluid mb-3" style="max-height: 100px; width: auto;">
                                <h3 class="text-white mb-2">{{ $league->name }}</h3>
                                <p class="text-warning mb-0">{{ $league->country }} - {{ $league->season }}</p>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="fw-bold mb-3">البطل الحالي</h5>
                                            <div class="d-flex align-items-center mb-4">
                                                <img src="{{ $league->champion_logo }}" alt="{{ $league->champion }}" class="img-fluid me-3" style="width: 60px; height: 60px; object-fit: contain;">
                                                <div>
                                                    <h6 class="mb-0">{{ $league->champion }}</h6>
                                                    <span class="text-muted small">البطل</span>
                                                </div>
                                            </div>
                                            
                                            <h5 class="fw-bold mb-3">الهداف</h5>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $league->top_scorer_photo }}" alt="{{ $league->top_scorer }}" class="img-fluid rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                                <div>
                                                    <h6 class="mb-0">{{ $league->top_scorer }}</h6>
                                                    <div class="text-muted small">{{ $league->top_scorer_team }}</div>
                                                    <span class="text-warning fw-bold">{{ $league->top_scorer_goals }} هدف</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="fw-bold mb-3">إحصائيات الموسم</h5>
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <div class="bg-light p-3 rounded-3 text-center">
                                                        <div class="text-warning fw-bold display-6 mb-1">{{ $league->matches_played }}</div>
                                                        <div class="text-muted small">مباراة</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="bg-light p-3 rounded-3 text-center">
                                                        <div class="text-warning fw-bold display-6 mb-1">{{ $league->total_goals }}</div>
                                                        <div class="text-muted small">هدف</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="bg-light p-3 rounded-3 text-center">
                                                        <div class="text-warning fw-bold display-6 mb-1">{{ $league->champions_league_spots }}</div>
                                                        <div class="text-muted small">أماكن في دوري الأبطال</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="bg-light p-3 rounded-3 text-center">
                                                        <div class="text-warning fw-bold display-6 mb-1">{{ $league->relegation_spots }}</div>
                                                        <div class="text-muted small">هبوط</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <a href="{{ route('leagues.show', $league->id) }}" class="btn btn-warning px-4 me-2">
                                            عرض التفاصيل <i class="fas fa-arrow-left me-2"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-secondary me-2">
                                            <i class="fas fa-table me-1"></i> الترتيب
                                        </a>
                                        <a href="#" class="btn btn-outline-secondary">
                                            <i class="fas fa-futbol me-1"></i> الهدافين
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- All Leagues -->
        <div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold mb-0">جميع البطولات</h3>
                <div class="d-flex
                    <select class="form-select form-select-sm w-auto me-2">
                        <option>ترتيب حسب: الأكثر شعبية</option>
                        <option>ترتيب أبجدي</option>
                        <option>الأحدث</option>
                    </select>
                </div>
            </div>
            
            <div class="row g-4">
                @foreach($leagues as $league)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <img src="{{ $league->logo }}" alt="{{ $league->name }}" class="img-fluid" style="height: 80px; width: auto; object-fit: contain;">
                            </div>
                            <h5 class="fw-bold mb-2">{{ $league->name }}</h5>
                            <span class="badge bg-light text-dark mb-3">{{ $league->country }}</span>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="text-center">
                                    <div class="fw-bold text-warning">{{ $league->teams }}</div>
                                    <div class="small text-muted">فريق</div>
                                </div>
                                <div class="text-center">
                                    <div class="fw-bold text-warning">{{ $league->matches }}</div>
                                    <div class="small text-muted">مباراة</div>
                                </div>
                                <div class="text-center">
                                    <div class="fw-bold text-warning">{{ $league->goals_per_match }}</div>
                                    <div class="small text-muted">هدف/مباراة</div>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center justify-content-between bg-light p-2 rounded-3 mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $league->champion_logo }}" alt="{{ $league->champion }}" class="img-fluid me-2" style="width: 30px; height: 30px; object-fit: contain;">
                                    <div class="text-start">
                                        <div class="small fw-bold">{{ $league->champion }}</div>
                                        <div class="xsmall text-muted">البطل</div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="small fw-bold">{{ $league->top_scorer }}</div>
                                    <div class="xsmall text-muted">{{ $league->goals }} هدف</div>
                                </div>
                            </div>
                            
                            <a href="{{ route('leagues.show', $league->id) }}" class="btn btn-outline-warning w-100">
                                عرض التفاصيل <i class="fas fa-arrow-left me-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">السابق</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">التالي</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</main>

@push('styles')
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    
    .page-link {
        color: #333;
        border: 1px solid #dee2e6;
        margin: 0 3px;
        border-radius: 5px !important;
    }
    
    .page-item.active .page-link {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }
    
    .page-link:hover {
        color: #000;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }
    
    .badge {
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 5px;
    }
    
    .btn-outline-warning {
        transition: all 0.3s ease;
    }
    
    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: #000 !important;
    }
    
    /* RTL Fixes */
    [dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
        float: right;
        padding-left: 0.5rem;
        padding-right: 0;
    }
    
    [dir="rtl"] .me-2 {
        margin-left: 0.5rem !important;
        margin-right: 0 !important;
    }
    
    [dir="rtl"] .ms-2 {
        margin-right: 0.5rem !important;
        margin-left: 0 !important;
    }
    
    /* Stats cards */
    .stat-card {
        border-right: 3px solid #ffc107;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        background-color: #fff8e1;
    }
    
    /* Responsive fixes */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.25rem;
        }
        
        .display-4 {
            font-size: 2rem;
        }
        
        .featured-league .row > div {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>
@endpush
@endsection