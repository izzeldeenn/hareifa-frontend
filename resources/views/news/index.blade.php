@extends('layouts.app')

@php
// Sample news data - Replace with actual database query
$featuredNews = (object)[
    'id' => 1,
    'title' => 'انطلاق بطولة الدوري الممتاز لموسم 2023-2024',
    'excerpt' => 'انطلقت منافسات بطولة الدوري الممتاز لموسم 2023-2024 بمباريات مثيرة شهدت مفاجآت عديدة.',
    'image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195d86',
    'category' => 'الدوري الممتاز',
    'date' => now()->subDays(2),
    'comments' => 24
];

$news = collect([
    [
        'id' => 2,
        'title' => 'فوز كبير للزمالك على الأهلي في ديربي القاهرة',
        'excerpt' => 'حقق فريق الزمالك فوزاً كبيراً على الأهلي في مباراة مثيرة جمعتهما على ملعب القاهرة الدولي.',
        'image' => 'https://images.unsplash.com/photo-1540747913346-19e32dc3e97e',
        'category' => 'أخبار الأندية',
        'date' => now()->subDays(1),
        'comments' => 45
    ],
    [
        'id' => 3,
        'title' => 'الأهلي يتأهل لدور الـ16 من دوري أبطال أفريقيا',
        'excerpt' => 'تأهل النادي الأهلي المصري إلى دور الـ16 من بطولة دوري أبطال أفريقيا بعد فوزه على مضيفه',
        'image' => 'https://images.unsplash.com/photo-1579952363872-0e90497376d9',
        'category' => 'أخبار الأندية',
        'date' => now()->subDays(3),
        'comments' => 32
    ],
    [
        'id' => 4,
        'title' => 'منتخب مصر يبدأ تحضيراته لتصفيات كأس العالم',
        'excerpt' => 'بدأ المنتخب المصري لكرة القدم معسكره التدريبي استعداداً لمواجهتي غينيا بيساو وكينيا',
        'image' => 'https://images.unsplash.com/photo-1540747913346-19e32dc3e97e',
        'category' => 'منتخب مصر',
        'date' => now()->subDays(4),
        'comments' => 28
    ],
    [
        'id' => 5,
        'title' => 'الاتحاد المصري يعلن عن جدول مباريات كأس مصر',
        'excerpt' => 'أعلن الاتحاد المصري لكرة القدم عن جدول مباريات دور الـ16 من بطولة كأس مصر',
        'image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195d86',
        'category' => 'كأس مصر',
        'date' => now()->subDays(5),
        'comments' => 15
    ],
    [
        'id' => 6,
        'title' => 'مواجهات قوية في الجولة 12 من الدوري الإنجليزي',
        'excerpt' => 'تشهد الجولة 12 من الدوري الإنجليزي الممتاز مواجهات قوية بين أبرز الأندية',
        'image' => 'https://images.unsplash.com/photo-1579952363872-0e90497376d9',
        'category' => 'الدوريات الأوروبية',
        'date' => now()->subDays(6),
        'comments' => 38
    ]
])->map(function($item) {
    return (object)$item;
});

$categories = [
    'الدوري المصري', 'كأس مصر', 'أخبار الأندية', 'منتخب مصر', 'الدوريات الأوروبية', 'كأس العالم للأندية'
];
@endphp

@section('content')
<!-- Main Content -->
<main class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured News -->
                <div class="card border-0 shadow-sm mb-5 overflow-hidden">
                    <div class="position-relative">
                        <img src="{{ $featuredNews->image }}" class="card-img-top" alt="{{ $featuredNews->title }}" style="height: 450px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-warning text-dark me-2">{{ $featuredNews->category }}</span>
                                <span class="text-white small"><i class="far fa-clock me-1"></i> {{ $featuredNews->date->diffForHumans() }}</span>
                                <span class="text-white-50 small me-3"><i class="far fa-comment ms-3 me-1"></i> {{ $featuredNews->comments }} تعليق</span>
                            </div>
                            <h2 class="h3 text-white mb-0">{{ $featuredNews->title }}</h2>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text mb-4">{{ $featuredNews->excerpt }}</p>
                        <a href="#" class="btn btn-warning px-4">
                            اقرأ المزيد <i class="fas fa-arrow-left me-2"></i>
                        </a>
                    </div>
                </div>

                <!-- News Grid -->
                <div class="row g-4">
                    @foreach($news as $item)
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                                <span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark">{{ $item->category }}</span>
                            </div>
                            <div class="card-body">
                                <h3 class="h5 fw-bold mb-2">{{ $item->title }}</h3>
                                <p class="card-text text-muted small">{{ $item->excerpt }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-muted small">
                                        <i class="far fa-clock me-1"></i> {{ $item->date->diffForHumans() }}
                                    </span>
                                    <a href="#" class="btn btn-sm btn-outline-warning">
                                        اقرأ المزيد <i class="fas fa-arrow-left me-1"></i>
                                    </a>
                                </div>
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

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Categories -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-folder-open me-2 text-warning"></i> الأقسام</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 py-3 px-4">
                                <a href="#" class="text-decoration-none text-dark">{{ $category }}</a>
                                <span class="badge bg-light text-dark">{{ rand(5, 20) }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Popular News -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-fire me-2 text-warning"></i> الأكثر قراءة</h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($news->take(4) as $item)
                        <div class="p-3 border-bottom">
                            <div class="d-flex">
                                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="rounded-2" style="width: 80px; height: 60px; object-fit: cover;">
                                <div class="me-3">
                                    <h6 class="mb-1"><a href="#" class="text-dark text-decoration-none">{{ Str::limit($item->title, 40) }}</a></h6>
                                    <small class="text-muted"><i class="far fa-clock me-1"></i> {{ $item->date->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tags -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-tags me-2 text-warning"></i> الكلمات الدالة</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            <a href="#" class="btn btn-sm btn-light border px-3 py-2">كرة القدم</a>
                            <a href="#" class="btn btn-sm btn-light border px-3 py-2">الدوري المصري</a>
                            <a href="#" class="btn btn-sm btn-light border px-3 py-2">منتخب مصر</a>
                            <a href="#" class="btn btn-sm btn-light border px-3 py-2">أخبار الأندية</a>
                            <a href="#" class="btn btn-sm btn-light border px-3 py-2">الدوري الإنجليزي</a>
                            <a href="#" class="btn btn-sm btn-light border px-3 py-2">دوري الأبطال</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Newsletter -->
<section class="py-5 bg-warning">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h3 class="fw-bold mb-2">اشترك في نشرتنا البريدية</h3>
                <p class="mb-0">احصل على آخر الأخبار والتحديثات مباشرة إلى بريدك الإلكتروني</p>
            </div>
            <div class="col-lg-6">
                <form class="d-flex">
                    <input type="email" class="form-control form-control-lg" placeholder="بريدك الإلكتروني">
                    <button type="submit" class="btn btn-dark me-2 px-4">اشتراك</button>
                </form>
            </div>
        </div>
    </div>
</section>

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
    
    .form-control:focus {
        border-color: #FFD700;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    }
</style>
@endpush

@push('scripts')
<script>
    // Add any custom JavaScript here if needed
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any plugins or custom scripts
    });
</script>
@endpush
@endsection