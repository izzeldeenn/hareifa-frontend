@extends('layouts.app')

@php
// Sample clubs data - Replace with actual database query
$featuredClub = (object)[
    'id' => 1,
    'name' => 'النادي الأهلي',
    'short_name' => 'الأهلي',
    'founded' => 1907,
    'stadium' => 'ملعب القاهرة الدولي',
    'city' => 'القاهرة',
    'country' => 'مصر',
    'league' => 'الدوري المصري الممتاز',
    'manager' => 'مارسيل كولر',
    'stadium_capacity' => 74100,
    'website' => 'https://www.alahlyegypt.com',
    'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
    'stadium_image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195d86',
    'trophies' => [
        'دوري أبطال أفريقيا' => 11,
        'الدوري المصري الممتاز' => 43,
        'كأس مصر' => 38,
        'كأس السوبر الأفريقي' => 11
    ]
];

$clubs = collect([
    [
        'id' => 1,
        'name' => 'النادي الأهلي',
        'short_name' => 'الأهلي',
        'city' => 'القاهرة',
        'country' => 'مصر',
        'league' => 'الدوري المصري الممتاز',
        'founded' => 1907,
        'stadium' => 'ملعب القاهرة الدولي',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
        'trophies' => 120
    ],
    [
        'id' => 2,
        'name' => 'نادي الزمالك',
        'short_name' => 'الزمالك',
        'city' => 'القاهرة',
        'country' => 'مصر',
        'league' => 'الدوري المصري الممتاز',
        'founded' => 1911,
        'stadium' => 'ستاد القاهرة الدولي',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/c/c1/Zamalek_SC_logo.svg/200px-Zamalek_SC_logo.svg.png',
        'trophies' => 89
    ],
    [
        'id' => 3,
        'name' => 'نادي بيراميدز',
        'short_name' => 'بيراميدز',
        'city' => 'القاهرة',
        'country' => 'مصر',
        'league' => 'الدوري المصري الممتاز',
        'founded' => 2008,
        'stadium' => 'ملعب الدفاع الجوي',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/5/5a/Pyramids_FC_logo.png/200px-Pyramids_FC_logo.png',
        'trophies' => 5
    ],
    [
        'id' => 4,
        'name' => 'نادي المقاولون العرب',
        'short_name' => 'المقاولون',
        'city' => 'القاهرة',
        'country' => 'مصر',
        'league' => 'الدوري المصري الممتاز',
        'founded' => 1973,
        'stadium' => 'ملعب المقاولون العرب',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/0/0e/Arab_Contractors_SC_logo.png/200px-Arab_Contractors_SC_logo.png',
        'trophies' => 12
    ],
    [
        'id' => 5,
        'name' => 'نادي سموحة',
        'short_name' => 'سموحة',
        'city' => 'الإسكندرية',
        'country' => 'مصر',
        'league' => 'الدوري المصري الممتاز',
        'founded' => 1949,
        'stadium' => 'ملعب برج العرب',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/2/2c/Smouha_SC_logo.png/200px-Smouha_SC_logo.png',
        'trophies' => 8
    ],
    [
        'id' => 6,
        'name' => 'نادي الاتحاد السكندري',
        'short_name' => 'الاتحاد السكندري',
        'city' => 'الإسكندرية',
        'country' => 'مصر',
        'league' => 'الدوري المصري الممتاز',
        'founded' => 1914,
        'stadium' => 'ستاد الإسكندرية',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9d/Ittihad_Alexandria_SC_logo.png/200px-Ittihad_Alexandria_SC_logo.png',
        'trophies' => 15
    ],
    [
        'id' => 7,
        'name' => 'نادي المصري',
        'short_name' => 'المصري',
        'city' => 'بورسعيد',
        'country' => 'مصر',
        'league' => 'الدوري المصري الممتاز',
        'founded' => 1920,
        'stadium' => 'ملعب بورسعيد',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/7/7c/Al_Masry_SC_logo.png/200px-Al_Masry_SC_logo.png',
        'trophies' => 10
    ],
    [
        'id' => 8,
        'name' => 'نادي إنبي',
        'short_name' => 'إنبي',
        'city' => 'القاهرة',
        'country' => 'مصر',
        'league' => 'الدوري المصري الممتاز',
        'founded' => 2005,
        'stadium' => 'ملعب بتروسبورت',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/1/1b/ENPPI_Club_Logo.png/200px-ENPPI_Club_Logo.png',
        'trophies' => 3
    ]
])->map(function($item) {
    return (object)$item;
});

$leagues = ['الدوري المصري الممتاز', 'دوري أبطال أفريقيا', 'كأس مصر', 'كأس السوبر المصري'];
$cities = ['القاهرة', 'الإسكندرية', 'بورسعيد', 'السويس', 'المنصورة', 'أسوان'];
$countries = ['مصر', 'المغرب', 'الجزائر', 'تونس', 'السعودية', 'الإمارات'];
@endphp

@section('content')

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

        <!-- Featured Club -->
        <div class="card border-0 shadow-sm mb-5 overflow-hidden">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="position-relative h-100">
                        <img src="{{ $featuredClub->stadium_image }}" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="{{ $featuredClub->name }}">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <div class="d-flex align-items-center">
                                <img src="{{ $featuredClub->logo }}" alt="{{ $featuredClub->name }}" class="me-2" style="width: 50px; height: 50px; object-fit: contain;">
                                <h3 class="h4 text-white mb-0">{{ $featuredClub->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-warning text-dark mb-2">النادي المميز</span>
                                <h2 class="h3 fw-bold mb-1">{{ $featuredClub->name }}</h2>
                                <p class="text-muted mb-2">{{ $featuredClub->city }}، {{ $featuredClub->country }} | تأسس عام {{ $featuredClub->founded }}</p>
                            </div>
                            <div class="text-end">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">الملعب:</span>
                                    <span class="fw-bold">{{ $featuredClub->stadium }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">السعة:</span>
                                    <span class="fw-bold">{{ number_format($featuredClub->stadium_capacity) }} متفرج</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 mt-2">
                            @foreach($featuredClub->trophies as $trophy => $count)
                            <div class="col-3 text-center">
                                <div class="bg-light p-3 rounded-3">
                                    <div class="text-warning fw-bold display-6 mb-1">{{ $count }}</div>
                                    <div class="text-muted small">{{ $trophy }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('clubs.show', $featuredClub->id) }}" class="btn btn-warning px-4">
                                الملف التعريفي <i class="fas fa-arrow-left me-2"></i>
                            </a>
                            <a href="#" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-calendar-alt me-1"></i> المباريات
                            </a>
                            <a href="#" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-users me-1"></i> اللاعبون
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clubs Grid -->
        <div class="row g-4">
            @foreach($clubs as $club)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <img src="{{ $club->logo }}" alt="{{ $club->name }}" class="img-fluid" style="height: 120px; width: auto; object-fit: contain;">
                        </div>
                        <h3 class="h5 fw-bold mb-2">{{ $club->name }}</h3>
                        <p class="text-muted mb-3">{{ $club->city }}، {{ $club->country }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $club->founded }}</div>
                                <div class="small text-muted">سنة التأسيس</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $club->trophies }}</div>
                                <div class="small text-muted">البطولات</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-warning">
                                    <i class="fas fa-trophy text-warning"></i>
                                </div>
                                <div class="small text-muted">البطولات</div>
                            </div>
                        </div>
                        <a href="{{ route('clubs.show', $club->id) }}" class="btn btn-outline-warning w-100">
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
    
    /* Responsive fixes */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.25rem;
        }
        
        .display-4 {
            font-size: 2rem;
        }
    }
</style>
@endpush
@endsection