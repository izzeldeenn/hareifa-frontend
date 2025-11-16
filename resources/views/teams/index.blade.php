@extends('layouts.app')

@php
// Sample teams data - Replace with actual database query
$featuredTeam = (object)[
    'id' => 1,
    'name' => 'النادي الأهلي',
    'short_name' => 'الأهلي',
    'founded' => 1907,
    'stadium' => 'ستاد القاهرة الدولي',
    'city' => 'القاهرة',
    'country' => 'مصر',
    'logo' => 'https://upload.wikimedia.org/wikipedia/ar/3/3e/Al_Ahly_SC_logo.png',
    'stadium_image' => 'https://images.unsplash.com/photo-1508098682722-e99c47a06b43',
    'matches_played' => 38,
    'wins' => 30,
    'draws' => 6,
    'losses' => 2,
    'goals_for' => 78,
    'goals_against' => 15,
    'points' => 96,
    'position' => 1,
    'league' => 'الدوري المصري الممتاز',
    'trophies' => 143,
    'manager' => 'مارسيل كولر',
    'captain' => 'محمد الشناوي'
];

$teams = collect([
    [
        'id' => 2,
        'name' => 'نادي الزمالك',
        'short_name' => 'الزمالك',
        'founded' => 1911,
        'stadium' => 'ستاد القاهرة الدولي',
        'city' => 'القاهرة',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/1/1d/Zamalek_SC_Logo.png/200px-Zamalek_SC_Logo.png',
        'matches_played' => 38,
        'wins' => 26,
        'draws' => 8,
        'losses' => 4,
        'points' => 86,
        'position' => 2,
        'league' => 'الدوري المصري الممتاز'
    ],
    [
        'id' => 3,
        'name' => 'نادي بيراميدز',
        'short_name' => 'بيراميدز',
        'founded' => 2008,
        'stadium' => 'ستاد الدفاع الجوي',
        'city' => 'القاهرة',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/6/6a/Pyramids_FC_logo.png/200px-Pyramids_FC_logo.png',
        'matches_played' => 38,
        'wins' => 24,
        'draws' => 7,
        'losses' => 7,
        'points' => 79,
        'position' => 3,
        'league' => 'الدوري المصري الممتاز'
    ],
    [
        'id' => 4,
        'name' => 'نادي سموحة',
        'short_name' => 'سموحة',
        'founded' => 1949,
        'stadium' => 'ستاد الإسكندرية',
        'city' => 'الإسكندرية',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/5/5a/Smouha_SC_logo.png/200px-Smouha_SC_logo.png',
        'matches_played' => 38,
        'wins' => 19,
        'draws' => 10,
        'losses' => 9,
        'points' => 67,
        'position' => 4,
        'league' => 'الدوري المصري الممتاز'
    ],
    [
        'id' => 5,
        'name' => 'نادي المصري',
        'short_name' => 'المصري',
        'founded' => 1920,
        'stadium' => 'ستاد الإسكندرية',
        'city' => 'الإسكندرية',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/5/5f/Al-Masry_SC_logo.png/200px-Al-Masry_SC_logo.png',
        'matches_played' => 38,
        'wins' => 16,
        'draws' => 12,
        'losses' => 10,
        'points' => 60,
        'position' => 5,
        'league' => 'الدوري المصري الممتاز'
    ],
    [
        'id' => 6,
        'name' => 'نادي إنبي',
        'short_name' => 'إنبي',
        'founded' => 2004,
        'stadium' => 'ستاد بتروسبورت',
        'city' => 'القاهرة',
        'country' => 'مصر',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9a/ENPPI_Club_Logo.png/200px-ENPPI_Club_Logo.png',
        'matches_played' => 38,
        'wins' => 15,
        'draws' => 10,
        'losses' => 13,
        'points' => 55,
        'position' => 6,
        'league' => 'الدوري المصري الممتاز'
    ]
])->map(function($item) {
    return (object)$item;
});

$leagues = ['الدوري المصري الممتاز', 'دوري أبطال أفريقيا', 'الدوري السعودي', 'الدوري الإنجليزي', 'دوري أبطال أوروبا'];
$cities = ['القاهرة', 'الإسكندرية', 'بورسعيد', 'السويس', 'المنصورة', 'المنيا', 'أسيوط'];
$countries = ['مصر', 'المملكة العربية السعودية', 'المغرب', 'الجزائر', 'تونس', 'الإمارات'];
@endphp

@section('content')
<!-- Hero Section -->
<section class="position-relative py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1574629810360-7efbbe195d86') no-repeat center/cover; min-height: 300px; display: flex; align-items: center;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bold mb-3">الفرق</h1>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item active text-warning" aria-current="page">الفرق</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="py-5 bg-light">
    <div class="container">
        <!-- Filters -->
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4"><i class="fas fa-filter me-2 text-warning"></i> تصفية النتائج</h5>
                <form class="row g-3">
                    <div class="col-md-3">
                        <label for="league" class="form-label">البطولة</label>
                        <select class="form-select" id="league">
                            <option value="" selected>جميع البطولات</option>
                            @foreach($leagues as $league)
                                <option value="{{ $league }}">{{ $league }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="city" class="form-label">المدينة</label>
                        <select class="form-select" id="city">
                            <option value="" selected>جميع المدن</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="country" class="form-label">الدولة</label>
                        <select class="form-select" id="country">
                            <option value="" selected>جميع الدول</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-warning w-100">
                            <i class="fas fa-search me-2"></i> بحث
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Featured Team -->
        <div class="card border-0 shadow-sm mb-5 overflow-hidden">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="position-relative h-100">
                        <img src="{{ $featuredTeam->stadium_image }}" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="{{ $featuredTeam->name }}">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <h3 class="h5 text-white mb-0">ملعب {{ $featuredTeam->stadium }}</h3>
                            <p class="text-white-50 mb-0">{{ $featuredTeam->city }}، {{ $featuredTeam->country }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-warning text-dark mb-2">فريق الشهر</span>
                                <h2 class="h3 fw-bold mb-1">{{ $featuredTeam->name }}</h2>
                                <p class="text-muted mb-2">تأسس عام {{ $featuredTeam->founded }} | {{ $featuredTeam->league }}</p>
                            </div>
                            <div class="text-end">
                                <img src="{{ $featuredTeam->logo }}" alt="{{ $featuredTeam->name }}" style="height: 80px; width: auto;">
                            </div>
                        </div>
                        <div class="row g-4 mt-2">
                            <div class="col-4 text-center">
                                <div class="bg-light p-3 rounded-3">
                                    <div class="text-warning fw-bold display-6 mb-1">#{{ $featuredTeam->position }}</div>
                                    <div class="text-muted small">المركز الحالي</div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="bg-light p-3 rounded-3">
                                    <div class="text-warning fw-bold display-6 mb-1">{{ $featuredTeam->points }}</div>
                                    <div class="text-muted small">النقاط</div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="bg-light p-3 rounded-3">
                                    <div class="text-warning fw-bold display-6 mb-1">{{ $featuredTeam->trophies }}</div>
                                    <div class="text-muted small">البطولات</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('teams.show', $featuredTeam->id) }}" class="btn btn-warning px-4">
                                الملف التعريفي للفريق <i class="fas fa-arrow-left me-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Teams Grid -->
        <div class="row g-4">
            @foreach($teams as $team)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <img src="{{ $team->logo }}" alt="{{ $team->name }}" class="img-fluid" style="height: 100px; width: auto;">
                        </div>
                        <h3 class="h5 fw-bold mb-2">{{ $team->name }}</h3>
                        <p class="text-muted mb-3">{{ $team->league }}</p>
                        <div class="d-flex justify-content-around mb-3">
                            <div class="text-center">
                                <div class="fw-bold text-warning">#{{ $team->position }}</div>
                                <div class="small text-muted">المركز</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $team->points }}</div>
                                <div class="small text-muted">النقاط</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $team->wins }}</div>
                                <div class="small text-muted">الفوز</div>
                            </div>
                        </div>
                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-outline-warning w-100">
                            عرض الفريق <i class="fas fa-arrow-left me-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <nav class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</main>

@push('styles')
<style>
    body {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        text-align: right;
    }
    
    .card {
        transition: all 0.3s ease;
        border: none;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .btn-warning {
        background-color: #FFD700;
        border-color: #FFD700;
        color: #000;
        font-weight: 600;
    }
    
    .btn-warning:hover {
        background-color: #e6c200;
        border-color: #e6c200;
        color: #000;
    }
    
    .text-warning {
        color: #FF8C00 !important;
    }
    
    .breadcrumb {
        background: transparent;
        padding: 0;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        content: "\f104";
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #fff;
    }
    
    .page-link {
        color: #000;
        border: 1px solid #dee2e6;
        margin: 0 2px;
    }
    
    .page-item.active .page-link {
        background-color: #FFD700;
        border-color: #FFD700;
        color: #000;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #FFD700;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    }
    
    .team-stats {
        background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
        color: #000;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any plugins or custom scripts
        // Filter functionality can be added here
    });
</script>
@endpush
@endsection