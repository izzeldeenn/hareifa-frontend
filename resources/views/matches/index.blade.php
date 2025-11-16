@extends('layouts.app')

@php
// Sample matches data - Replace with actual database query
$liveMatches = collect([
    [
        'id' => 1,
        'home_team' => 'النادي الأهلي',
        'home_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
        'home_score' => 2,
        'away_team' => 'نادي الزمالك',
        'away_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/c/c1/Zamalek_SC_logo.svg/200px-Zamalek_SC_logo.svg.png',
        'away_score' => 1,
        'league' => 'الدوري المصري الممتاز',
        'time' => 'شوط 2 - 75\' دقيقة',
        'status' => 'مباشر',
        'is_live' => true,
        'match_events' => [
            ['minute' => '23\'', 'type' => 'goal', 'team' => 'home', 'player' => 'محمد شريف'],
            ['minute' => '45+2\'', 'type' => 'yellow-card', 'team' => 'away', 'player' => 'أحمد فتحي'],
            ['minute' => '51\'', 'type' => 'goal', 'team' => 'away', 'player' => 'مروان محسن'],
            ['minute' => '68\'', 'type' => 'goal', 'team' => 'home', 'player' => 'بيرسي تاو'],
        ]
    ],
    [
        'id' => 2,
        'home_team' => 'المصري',
        'home_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/7/7c/Al_Masry_SC_logo.png/200px-Al_Masry_SC_logo.png',
        'home_score' => 0,
        'away_team' => 'سموحة',
        'away_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/2/2c/Smouha_SC_logo.png/200px-Smouha_SC_logo.png',
        'away_score' => 0,
        'league' => 'الدوري المصري الممتاز',
        'time' => 'شوط 1 - 32\' دقيقة',
        'status' => 'مباشر',
        'is_live' => true,
        'match_events' => []
    ]
])->map(function($item) { return (object)$item; });

$upcomingMatches = collect([
    [
        'id' => 3,
        'home_team' => 'المقاولون العرب',
        'home_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/0/0e/Arab_Contractors_SC_logo.png/200px-Arab_Contractors_SC_logo.png',
        'home_score' => null,
        'away_team' => 'إنبي',
        'away_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/1/1b/ENPPI_Club_Logo.png/200px-ENPPI_Club_Logo.png',
        'away_score' => null,
        'league' => 'الدوري المصري الممتاز',
        'date' => 'الجمعة 20 نوفمبر',
        'time' => '20:00',
        'stadium' => 'ملعب المقاولون العرب',
        'is_live' => false
    ],
    [
        'id' => 4,
        'home_team' => 'الاتحاد السكندري',
        'home_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9d/Ittihad_Alexandria_SC_logo.png/200px-Ittihad_Alexandria_SC_logo.png',
        'home_score' => null,
        'away_team' => 'طلائع الجيش',
        'away_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9d/Ittihad_Alexandria_SC_logo.png/200px-Ittihad_Alexandria_SC_logo.png',
        'away_score' => null,
        'league' => 'الدوري المصري الممتاز',
        'date' => 'السبت 21 نوفمبر',
        'time' => '17:00',
        'stadium' => 'ستاد الإسكندرية',
        'is_live' => false
    ]
])->map(function($item) { return (object)$item; });

$recentMatches = collect([
    [
        'id' => 5,
        'home_team' => 'بيراميدز',
        'home_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/5/5a/Pyramids_FC_logo.png/200px-Pyramids_FC_logo.png',
        'home_score' => 2,
        'away_team' => 'سيراميكا',
        'away_logo' => 'https://via.placeholder.com/200x200/CCCCCC/666666?text=CLUB',
        'away_score' => 2,
        'league' => 'الدوري المصري الممتاز',
        'date' => 'أمس',
        'is_live' => false,
        'highlights' => 'https://youtube.com/embed/example1',
        'match_events' => [
            ['minute' => '18\'', 'type' => 'goal', 'team' => 'home', 'player' => 'إبراهيم عادل'],
            ['minute' => '34\'', 'type' => 'goal', 'team' => 'away', 'player' => 'أحمد ياسر'],
            ['minute' => '52\'', 'type' => 'goal', 'team' => 'home', 'player' => 'رمضان صبحي'],
            ['minute' => '89\'', 'type' => 'goal', 'team' => 'away', 'player' => 'كريم بامبو'],
            ['minute' => '90+3\'', 'type' => 'red-card', 'team' => 'home', 'player' => 'علي جبر']
        ]
    ],
    [
        'id' => 6,
        'home_team' => 'المصري',
        'home_logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/7/7c/Al_Masry_SC_logo.png/200px-Al_Masry_SC_logo.png',
        'home_score' => 1,
        'away_team' => 'سيراميكا',
        'away_logo' => 'https://via.placeholder.com/200x200/CCCCCC/666666?text=CLUB',
        'away_score' => 0,
        'league' => 'الدوري المصري الممتاز',
        'date' => '16 نوفمبر',
        'is_live' => false,
        'highlights' => 'https://youtube.com/embed/example2'
    ]
])->map(function($item) { return (object)$item; });

$leagues = ['الدوري المصري الممتاز', 'كأس مصر', 'دوري أبطال أفريقيا', 'كأس الكونفيدرالية', 'الدوري السعودي', 'الدوري الإنجليزي الممتاز'];
$teams = ['الأهلي', 'الزمالك', 'المصري', 'سموحة', 'بيراميدز', 'المقاولون', 'إنبي', 'الاتحاد السكندري'];
@endphp

@section('content')
<!-- Hero Section -->
<section class="position-relative py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1508098682722-e99c47a06b43') no-repeat center/cover; min-height: 300px; display: flex; align-items: center;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bold mb-3">المباريات</h1>
            <p class="lead mb-4">تابع أحدث المباريات والنتائج المباشرة</p>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item active text-warning" aria-current="page">المباريات</li>
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
                        <label for="team" class="form-label">الفريق</label>
                        <select class="form-select" id="team">
                            <option value="" selected>جميع الفرق</option>
                            @foreach($teams as $team)
                                <option value="{{ $team }}">{{ $team }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="date" class="form-label">التاريخ</label>
                        <select class="form-select" id="date">
                            <option value="" selected>جميع الأوقات</option>
                            <option value="today">اليوم</option>
                            <option value="tomorrow">غداً</option>
                            <option value="week">هذا الأسبوع</option>
                            <option value="month">هذا الشهر</option>
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

        <!-- Live Matches -->
        @if($liveMatches->isNotEmpty())
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-danger text-white py-3">
                <div class="d-flex align-items-center">
                    <div class="live-indicator me-2"></div>
                    <h5 class="mb-0 fw-bold">مباريات مباشرة</h5>
                </div>
            </div>
            <div class="card-body p-0">
                @foreach($liveMatches as $match)
                <div class="p-4 border-bottom">
                    <div class="text-center mb-3">
                        <span class="badge bg-danger mb-2">{{ $match->status }}</span>
                        <h6 class="text-muted mb-0">{{ $match->league }}</h6>
                        <div class="text-muted small">{{ $match->time }}</div>
                    </div>
                    
                    <div class="row align-items-center">
                        <!-- Home Team -->
                        <div class="col-5 text-end">
                            <div class="d-flex flex-column align-items-end">
                                <h5 class="fw-bold mb-1">{{ $match->home_team }}</h5>
                                <div class="d-flex align-items-center justify-content-end">
                                    <span class="me-2">{{ $match->home_score }}</span>
                                    <img src="{{ $match->home_logo }}" alt="{{ $match->home_team }}" class="img-fluid" style="height: 40px; width: auto;">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Match Info -->
                        <div class="col-2 text-center">
                            <div class="bg-light rounded-pill py-1 px-3 d-inline-block">
                                <span class="text-danger fw-bold">VS</span>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('matches.show', $match->id) }}" class="btn btn-sm btn-outline-secondary">التفاصيل</a>
                            </div>
                        </div>
                        
                        <!-- Away Team -->
                        <div class="col-5 text-start">
                            <div class="d-flex flex-column">
                                <h5 class="fw-bold mb-1">{{ $match->away_team }}</h5>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $match->away_logo }}" alt="{{ $match->away_team }}" class="img-fluid me-2" style="height: 40px; width: auto;">
                                    <span>{{ $match->away_score }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Match Events -->
                    @if(!empty($match->match_events))
                    <div class="mt-3 pt-3 border-top">
                        <h6 class="small text-muted mb-2">أحداث المباراة:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($match->match_events as $event)
                            <div class="bg-light rounded-pill px-3 py-1 small">
                                @if($event['type'] == 'goal')
                                    <i class="fas fa-futbol text-success"></i>
                                @elseif($event['type'] == 'yellow-card')
                                    <i class="fas fa-square text-warning"></i>
                                @elseif($event['type'] == 'red-card')
                                    <i class="fas fa-square text-danger"></i>
                                @endif
                                <span class="me-1">{{ $event['minute'] }}</span>
                                <span class="fw-bold">{{ $event['player'] }}</span>
                                @if($event['type'] == 'goal')
                                    <span class="text-muted">(هدف)</span>
                                @elseif($event['type'] == 'yellow-card')
                                    <span class="text-muted">(إنذار)</span>
                                @elseif($event['type'] == 'red-card')
                                    <span class="text-muted">(طرد)</span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Upcoming Matches -->
        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 fw-bold">المباريات القادمة</h5>
            </div>
            <div class="card-body p-0">
                @foreach($upcomingMatches as $match)
                <div class="p-3 border-bottom">
                    <div class="text-center mb-2">
                        <h6 class="text-muted mb-0">{{ $match->league }}</h6>
                        <div class="small text-muted">{{ $match->date }} - {{ $match->time }}</div>
                        <div class="small text-muted">{{ $match->stadium }}</div>
                    </div>
                    
                    <div class="row align-items-center">
                        <!-- Home Team -->
                        <div class="col-5 text-end">
                            <div class="d-flex flex-column align-items-end">
                                <h5 class="fw-bold mb-1">{{ $match->home_team }}</h5>
                                <img src="{{ $match->home_logo }}" alt="{{ $match->home_team }}" class="img-fluid" style="height: 40px; width: auto;">
                            </div>
                        </div>
                        
                        <!-- Match Info -->
                        <div class="col-2 text-center">
                            <div class="bg-light rounded-pill py-1 px-3 d-inline-block">
                                <span class="fw-bold">VS</span>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="btn btn-sm btn-outline-primary">تذكرة</a>
                            </div>
                        </div>
                        
                        <!-- Away Team -->
                        <div class="col-5 text-start">
                            <div class="d-flex flex-column">
                                <h5 class="fw-bold mb-1">{{ $match->away_team }}</h5>
                                <img src="{{ $match->away_logo }}" alt="{{ $match->away_team }}" class="img-fluid" style="height: 40px; width: auto;">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <div class="text-center p-3">
                    <a href="#" class="btn btn-outline-primary">عرض المزيد من المباريات</a>
                </div>
            </div>
        </div>

        <!-- Recent Results -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0 fw-bold">النتائج السابقة</h5>
            </div>
            <div class="card-body p-0">
                @foreach($recentMatches as $match)
                <div class="p-3 border-bottom">
                    <div class="text-center mb-2">
                        <h6 class="text-muted mb-0">{{ $match->league }}</h6>
                        <div class="small text-muted">{{ $match->date }}</div>
                    </div>
                    
                    <div class="row align-items-center">
                        <!-- Home Team -->
                        <div class="col-5 text-end">
                            <div class="d-flex flex-column align-items-end">
                                <h5 class="fw-bold mb-1">{{ $match->home_team }}</h5>
                                <div class="d-flex align-items-center justify-content-end">
                                    <span class="me-2 fw-bold">{{ $match->home_score }}</span>
                                    <img src="{{ $match->home_logo }}" alt="{{ $match->home_team }}" class="img-fluid" style="height: 40px; width: auto;">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Match Info -->
                        <div class="col-2 text-center">
                            <div class="bg-light rounded-pill py-1 px-3 d-inline-block">
                                <span class="fw-bold">VS</span>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('matches.show', $match->id) }}" class="btn btn-sm btn-outline-dark">التفاصيل</a>
                            </div>
                        </div>
                        
                        <!-- Away Team -->
                        <div class="col-5 text-start">
                            <div class="d-flex flex-column">
                                <h5 class="fw-bold mb-1">{{ $match->away_team }}</h5>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $match->away_logo }}" alt="{{ $match->away_team }}" class="img-fluid me-2" style="height: 40px; width: auto;">
                                    <span class="fw-bold">{{ $match->away_score }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Match Highlights -->
                    @if(isset($match->highlights))
                    <div class="mt-3 pt-3 border-top text-center">
                        <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#highlightsModal{{ $match->id }}">
                            <i class="fas fa-play me-1"></i> مشاهدة ملخص المباراة
                        </a>
                    </div>
                    @endif
                </div>
                @endforeach
                
                <div class="text-center p-3">
                    <a href="#" class="btn btn-outline-dark">عرض المزيد من النتائج</a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Highlights Modals -->
@foreach($recentMatches as $match)
@if(isset($match->highlights))
<div class="modal fade" id="highlightsModal{{ $match->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ملخص مباراة {{ $match->home_team }} و {{ $match->away_team }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe src="{{ $match->highlights }}" title="YouTube video" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach

@push('styles')
<style>
    .live-indicator {
        width: 10px;
        height: 10px;
        background-color: #ff0000;
        border-radius: 50%;
        display: inline-block;
        animation: pulse 1.5s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(255, 0, 0, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 0, 0, 0); }
    }
    
    .card {
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    
    .card-header {
        border-bottom: none;
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
    
    /* Responsive fixes */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }
        
        .card-body {
            padding: 1rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Auto refresh live matches every 30 seconds
    function refreshLiveMatches() {
        // In a real app, this would be an AJAX call to get updated match data
        console.log('Refreshing live matches...');
    }
    
    // Refresh every 30 seconds
    setInterval(refreshLiveMatches, 30000);
</script>
@endpush
@endsection