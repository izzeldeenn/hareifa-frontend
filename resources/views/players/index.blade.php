@extends('layouts.app')

@php
// Sample players data - Replace with actual database query
$featuredPlayer = (object)[
    'id' => 1,
    'name' => 'محمد صلاح',
    'position' => 'مهاجم',
    'team' => 'ليفربول',
    'age' => 31,
    'nationality' => 'مصر',
    'image' => 'https://resources.premierleague.com/premierleague/photos/players/250x250/p118748.png',
    'goals' => 24,
    'assists' => 12,
    'matches' => 38
];

$players = collect([
    [
        'id' => 2,
        'name' => 'ساديو ماني',
        'position' => 'جناح',
        'team' => 'بايرن ميونخ',
        'age' => 31,
        'nationality' => 'السنغال',
        'image' => 'https://img.a.transfermarkt.technology/portrait/big/200512-1694594253.jpg',
        'goals' => 18,
        'assists' => 8,
        'matches' => 32
    ],
    [
        'id' => 3,
        'name' => 'كيفن دي بروين',
        'position' => 'وسط',
        'team' => 'مانشستر سيتي',
        'age' => 32,
        'nationality' => 'بلجيكا',
        'image' => 'https://img.a.transfermarkt.technology/portrait/big/88755-1671437160.jpg',
        'goals' => 15,
        'assists' => 25,
        'matches' => 36
    ],
    [
        'id' => 4,
        'name' => 'فيرجيل فان دايك',
        'position' => 'مدافع',
        'team' => 'ليفربول',
        'age' => 32,
        'nationality' => 'هولندا',
        'image' => 'https://img.a.transfermarkt.technology/portrait/big/139208-1671437160.jpg',
        'goals' => 5,
        'assists' => 3,
        'matches' => 35
    ],
    [
        'id' => 5,
        'name' => 'كيلين مبابي',
        'position' => 'مهاجم',
        'team' => 'باريس سان جيرمان',
        'age' => 24,
        'nationality' => 'فرنسا',
        'image' => 'https://img.a.transfermarkt.technology/portrait/big/342229-1671437160.jpg',
        'goals' => 28,
        'assists' => 10,
        'matches' => 34
    ],
    [
        'id' => 6,
        'name' => 'إرلينج هالاند',
        'position' => 'مهاجم',
        'team' => 'مانشستر سيتي',
        'age' => 23,
        'nationality' => 'النرويج',
        'image' => 'https://img.a.transfermarkt.technology/portrait/big/418560-1671437160.jpg',
        'goals' => 36,
        'assists' => 8,
        'matches' => 35
    ]
])->map(function($item) {
    return (object)$item;
});

$positions = ['حارس مرمى', 'مدافع', 'وسط', 'مهاجم', 'جناح'];
$teams = ['الأهلي', 'الزمالك', 'مانشستر سيتي', 'ليفربول', 'ريال مدريد', 'برشلونة', 'بايرن ميونخ', 'باريس سان جيرمان'];
$nationalities = ['مصر', 'السنغال', 'المغرب', 'الجزائر', 'تونس', 'المملكة العربية السعودية', 'فرنسا', 'إسبانيا', 'إنجلترا', 'البرازيل', 'الأرجنتين'];
@endphp

@section('content')
<!-- Hero Section -->
<section class="position-relative py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1522778119026-d647f0596c20') no-repeat center/cover; min-height: 300px; display: flex; align-items: center;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bold mb-3">اللاعبون</h1>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item active text-warning" aria-current="page">اللاعبون</li>
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
                        <label for="position" class="form-label">المركز</label>
                        <select class="form-select" id="position">
                            <option value="" selected>جميع المراكز</option>
                            @foreach($positions as $position)
                                <option value="{{ $position }}">{{ $position }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="team" class="form-label">الفريق</label>
                        <select class="form-select" id="team">
                            <option value="" selected>جميع الفرق</option>
                            @foreach($teams as $team)
                                <option value="{{ $team }}">{{ $team }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="nationality" class="form-label">الجنسية</label>
                        <select class="form-select" id="nationality">
                            <option value="" selected>جميع الجنسيات</option>
                            @foreach($nationalities as $nationality)
                                <option value="{{ $nationality }}">{{ $nationality }}</option>
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

        <!-- Featured Player -->
        <div class="card border-0 shadow-sm mb-5 overflow-hidden">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $featuredPlayer->image }}" class="img-fluid h-100" style="object-fit: cover;" alt="{{ $featuredPlayer->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-warning text-dark mb-2">لاعب الشهر</span>
                                <h2 class="h3 fw-bold mb-1">{{ $featuredPlayer->name }}</h2>
                                <p class="text-muted mb-2">{{ $featuredPlayer->position }} | {{ $featuredPlayer->team }} | {{ $featuredPlayer->nationality }}</p>
                            </div>
                            <div class="text-end">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">العمر:</span>
                                    <span class="fw-bold">{{ $featuredPlayer->age }} سنة</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">المباريات:</span>
                                    <span class="fw-bold">{{ $featuredPlayer->matches }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 mt-2">
                            <div class="col-4 text-center">
                                <div class="bg-light p-3 rounded-3">
                                    <div class="text-warning fw-bold display-6 mb-1">{{ $featuredPlayer->goals }}</div>
                                    <div class="text-muted small">هدف</div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="bg-light p-3 rounded-3">
                                    <div class="text-warning fw-bold display-6 mb-1">{{ $featuredPlayer->assists }}</div>
                                    <div class="text-muted small">تمريرة حاسمة</div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="bg-light p-3 rounded-3">
                                    <div class="text-warning fw-bold display-6 mb-1">{{ number_format($featuredPlayer->goals / $featuredPlayer->matches, 1) }}</div>
                                    <div class="text-muted small">معدل التهديف</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('players.show', $featuredPlayer->id) }}" class="btn btn-warning px-4">
                                الملف الشخصي <i class="fas fa-arrow-left me-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Players Grid -->
        <div class="row g-4">
            @foreach($players as $player)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="{{ $player->image }}" class="card-img-top" alt="{{ $player->name }}" style="height: 250px; object-fit: cover;">
                        <span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark">{{ $player->position }}</span>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="h5 fw-bold mb-1">{{ $player->name }}</h3>
                        <p class="text-muted mb-3">{{ $player->team }} | {{ $player->nationality }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $player->goals }}</div>
                                <div class="small text-muted">أهداف</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $player->assists }}</div>
                                <div class="small text-muted">تمريرات حاسمة</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $player->age }}</div>
                                <div class="small text-muted">العمر</div>
                            </div>
                        </div>
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-outline-warning w-100">
                            عرض الملف <i class="fas fa-arrow-left me-2"></i>
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
    
    .player-stats {
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