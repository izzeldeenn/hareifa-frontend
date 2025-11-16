@extends('layouts.app')

@php
// Sample academies data - Replace with actual database query
$featuredAcademy = (object)[
    'id' => 1,
    'name' => 'أكاديمية الأهلي لكرة القدم',
    'short_name' => 'أكاديمية الأهلي',
    'founded' => 2003,
    'location' => 'القاهرة، مصر',
    'age_groups' => ['تحت 8 سنوات', 'تحت 10 سنوات', 'تحت 12 سنة', 'تحت 14 سنة', 'تحت 16 سنة', 'تحت 18 سنة'],
    'director' => 'أحمد فتحي',
    'facilities' => ['3 ملاعب عشبية', 'صالة ألعاب رياضية', 'عيادة طبية', 'قاعات دراسية', 'سكن داخلي'],
    'website' => 'https://www.alahlyegypt.com/academy',
    'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
    'image' => 'https://images.unsplash.com/photo-1579952363872-0f9dee70d0d8',
    'success_stories' => [
        'أحمد فتحي' => 'لاعب دولي سابق ومدرب حالي',
        'محمد النني' => 'لاعب نادي أرسنال الإنجليزي',
        'رمضان صبحي' => 'لاعب دولي سابق',
        'محمد صلاح' => 'نجم ليفربول والمنتخب الوطني'
    ]
];

$academies = collect([
    [
        'id' => 1,
        'name' => 'أكاديمية الأهلي لكرة القدم',
        'short_name' => 'أكاديمية الأهلي',
        'location' => 'القاهرة، مصر',
        'founded' => 2003,
        'age_groups' => 'تحت 8-18 سنة',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9e/Al_Ahly_SC_logo.svg/200px-Al_Ahly_SC_logo.svg.png',
        'players' => 250,
        'rating' => 4.8
    ],
    [
        'id' => 2,
        'name' => 'أكاديمية الزمالك لكرة القدم',
        'short_name' => 'أكاديمية الزمالك',
        'location' => 'القاهرة، مصر',
        'founded' => 2005,
        'age_groups' => 'تحت 8-20 سنة',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/c/c1/Zamalek_SC_logo.svg/200px-Zamalek_SC_logo.svg.png',
        'players' => 200,
        'rating' => 4.7
    ],
    [
        'id' => 3,
        'name' => 'أكاديمية وادي دجلة',
        'short_name' => 'أكاديمية وادي دجلة',
        'location' => 'القاهرة الجديدة، مصر',
        'founded' => 2010,
        'age_groups' => 'تحت 6-16 سنة',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/5/5a/Pyramids_FC_logo.png/200px-Pyramids_FC_logo.png',
        'players' => 180,
        'rating' => 4.5
    ],
    [
        'id' => 4,
        'name' => 'أكاديمية المقاولون العرب',
        'short_name' => 'أكاديمية المقاولون',
        'location' => 'القاهرة، مصر',
        'founded' => 2008,
        'age_groups' => 'تحت 8-18 سنة',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/0/0e/Arab_Contractors_SC_logo.png/200px-Arab_Contractors_SC_logo.png',
        'players' => 150,
        'rating' => 4.3
    ],
    [
        'id' => 5,
        'name' => 'أكاديمية سموحة',
        'short_name' => 'أكاديمية سموحة',
        'location' => 'الإسكندرية، مصر',
        'founded' => 2012,
        'age_groups' => 'تحت 6-16 سنة',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/2/2c/Smouha_SC_logo.png/200px-Smouha_SC_logo.png',
        'players' => 120,
        'rating' => 4.2
    ],
    [
        'id' => 6,
        'name' => 'أكاديمية المصري',
        'short_name' => 'أكاديمية المصري',
        'location' => 'بورسعيد، مصر',
        'founded' => 2011,
        'age_groups' => 'تحت 8-18 سنة',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/7/7c/Al_Masry_SC_logo.png/200px-Al_Masry_SC_logo.png',
        'players' => 160,
        'rating' => 4.0
    ],
    [
        'id' => 7,
        'name' => 'أكاديمية إنبي',
        'short_name' => 'أكاديمية إنبي',
        'location' => 'القاهرة، مصر',
        'founded' => 2009,
        'age_groups' => 'تحت 8-20 سنة',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/1/1b/ENPPI_Club_Logo.png/200px-ENPPI_Club_Logo.png',
        'players' => 140,
        'rating' => 4.4
    ],
    [
        'id' => 8,
        'name' => 'أكاديمية طلائع الجيش',
        'short_name' => 'أكاديمية طلائع الجيش',
        'location' => 'القاهرة، مصر',
        'founded' => 2007,
        'age_groups' => 'تحت 8-18 سنة',
        'logo' => 'https://upload.wikimedia.org/wikipedia/ar/thumb/9/9d/Ittihad_Alexandria_SC_logo.png/200px-Ittihad_Alexandria_SC_logo.png',
        'players' => 130,
        'rating' => 4.1
    ]
])->map(function($item) {
    return (object)$item;
});

$cities = ['القاهرة', 'الإسكندرية', 'بورسعيد', 'السويس', 'المنصورة', 'أسوان'];
$ageGroups = ['تحت 6 سنوات', 'تحت 8 سنوات', 'تحت 10 سنوات', 'تحت 12 سنة', 'تحت 14 سنة', 'تحت 16 سنة', 'تحت 18 سنة', 'تحت 20 سنة'];
$ratings = ['4.5+', '4.0+', '3.5+', '3.0+'];
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
                        <label for="city" class="form-label">المدينة</label>
                        <select class="form-select" id="city">
                            <option value="" selected>جميع المدن</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="age_group" class="form-label">الفئة العمرية</label>
                        <select class="form-select" id="age_group">
                            <option value="" selected>جميع الفئات</option>
                            @foreach($ageGroups as $group)
                                <option value="{{ $group }}">{{ $group }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="rating" class="form-label">التقييم</label>
                        <select class="form-select" id="rating">
                            <option value="" selected>جميع التقييمات</option>
                            @foreach($ratings as $rating)
                                <option value="{{ $rating }}">{{ $rating }}</option>
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

        <!-- Featured Academy -->
        <div class="card border-0 shadow-sm mb-5 overflow-hidden">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="position-relative h-100">
                        <img src="{{ $featuredAcademy->image }}" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="{{ $featuredAcademy->name }}">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <div class="d-flex align-items-center">
                                <img src="{{ $featuredAcademy->logo }}" alt="{{ $featuredAcademy->name }}" class="me-2" style="width: 50px; height: 50px; object-fit: contain;">
                                <h3 class="h4 text-white mb-0">{{ $featuredAcademy->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-warning text-dark mb-2">الأكاديمية المميزة</span>
                                <h2 class="h3 fw-bold mb-1">{{ $featuredAcademy->name }}</h2>
                                <p class="text-muted mb-2">{{ $featuredAcademy->location }} | تأسست عام {{ $featuredAcademy->founded }}</p>
                            </div>
                            <div class="text-end">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">المدير الفني:</span>
                                    <span class="fw-bold">{{ $featuredAcademy->director }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2">الفئات العمرية:</span>
                                    <span class="fw-bold">{{ implode(' - ', $featuredAcademy->age_groups) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 mt-2">
                            <div class="col-12">
                                <h5 class="fw-bold mb-3"><i class="fas fa-trophy text-warning me-2"></i> قصص النجاح</h5>
                                <div class="row g-3">
                                    @foreach($featuredAcademy->success_stories as $player => $achievement)
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-user-graduate text-warning me-2"></i>
                                                <div>
                                                    <h6 class="mb-0 fw-bold">{{ $player }}</h6>
                                                    <p class="mb-0 text-muted small">{{ $achievement }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('academies.show', $featuredAcademy->id) }}" class="btn btn-warning px-4">
                                الملف التعريفي <i class="fas fa-arrow-left me-2"></i>
                            </a>
                            <a href="#" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-calendar-alt me-1"></i> الجداول
                            </a>
                            <a href="#" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-graduation-cap me-1"></i> البرامج التدريبية
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academies Grid -->
        <div class="row g-4">
            @foreach($academies as $academy)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <img src="{{ $academy->logo }}" alt="{{ $academy->name }}" class="img-fluid" style="height: 100px; width: auto; object-fit: contain;">
                        </div>
                        <h3 class="h5 fw-bold mb-2">{{ $academy->name }}</h3>
                        <p class="text-muted mb-3">{{ $academy->location }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $academy->founded }}</div>
                                <div class="small text-muted">سنة التأسيس</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-warning">{{ $academy->players }}</div>
                                <div class="small text-muted">لاعب</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-warning">
                                    {{ $academy->rating }} <i class="fas fa-star text-warning"></i>
                                </div>
                                <div class="small text-muted">التقييم</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="badge bg-light text-dark">{{ $academy->age_groups }}</span>
                        </div>
                        <a href="{{ route('academies.show', $academy->id) }}" class="btn btn-outline-warning w-100">
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
    
    /* Success story card */
    .success-story-card {
        border-right: 3px solid #ffc107;
        transition: all 0.3s ease;
    }
    
    .success-story-card:hover {
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
    }
</style>
@endpush
@endsection