@extends('layouts.app')

@push('styles')
<style>
    :root {
        --dark-bg: #121212;
        --darker-bg: #0a0a0a;
        --card-bg: #1e1e1e;
        --card-hover: #2a2a2a;
        --text-primary: #f8f9fa;
        --text-secondary: #adb5bd;
        --accent-color: #ffc107;
        --accent-hover: #e0a800;
        --section-spacing: 5rem;
    }
    
    body {
        background-color: var(--dark-bg);
        color: var(--text-primary);
        line-height: 1.7;
    }
    
    .bg-light {
        background-color: var(--darker-bg) !important;
    }
    
    .bg-primary {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%) !important;
    }
    
    .card {
        background-color: var(--card-bg);
        border: 1px solid #333;
        transition: all 0.3s ease;
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        border-color: rgba(255, 193, 7, 0.3);
    }
    
    .text-muted {
        color: #fff !important;
        opacity: 0.9;
    }
    
    .btn-warning {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
        color: #000;
        font-weight: 600;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    
    .btn-warning:hover {
        background-color: var(--accent-hover);
        border-color: var(--accent-hover);
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
    }
    
    .section-img {
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    
    .section-img:hover {
        transform: scale(1.02);
    }
    
    .hero-illustration {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }
    
    .section-title {
        position: relative;
        display: inline-block;
        margin-bottom: 2.5rem;
        font-weight: 700;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50px;
        height: 3px;
        background: var(--accent-color);
    }
    
    .feature-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: rgba(255, 193, 7, 0.1);
        margin-bottom: 1.5rem;
    }
    
    .feature-icon i {
        font-size: 1.5rem;
        color: var(--accent-color);
    }
    
    .card-title {
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--accent-color);
    }
    
    .lead {
        font-size: 1.15rem;
        font-weight: 400;
        margin-bottom: 1.5rem;
    }
    
    .section {
        padding: var(--section-spacing) 0;
    }
    
    @media (max-width: 991.98px) {
        .section {
            padding: 3rem 0;
        }
        
        .hero-illustration {
            margin-top: 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="position-relative py-5 bg-primary text-white">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-end">
                <h1 class="display-4 fw-bold mb-4">رؤية واحدة… فرصة عادلة لكل موهبة</h1>
                <p class="lead mb-4">الحريفة هي منصة مفتوحة المصدر صُمّمت لتمنح كل لاعب موهوب في مصر والوطن العربي فرصة عادلة للوصول للأندية والمدربين، بعيدًا عن الوساطة، الفساد، والمحسوبية التي دمّرت أحلام آلاف الشباب.</p>
                <p class="lead">نؤمن أن الموهبة لا يجب أن تُدفن، وأن الطريق للنجاح يجب أن يكون واضحًا، شفافًا، ومتاحًا للجميع بدون استثناء.</p>
                <a href="{{ route('signup') }}" class="btn btn-warning btn-lg mt-3">انضم إلينا الآن</a>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="{{ asset('images/about/sebastian-wienroth-TcXLfFbB5fA-unsplash.jpg') }}" alt="فرصة عادلة لكل موهبة" class="hero-illustration">
            </div>
        </div>
    </div>
    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0;">
        <svg class="w-100" style="transform: rotate(180deg);" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M1200 120L0 16.48V0h1200v120z" fill="#0a0a0a"></path>
        </svg>
    </div>
</section>

<!-- Platform Identity -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="{{ asset('images/about/little-boys-5777155_1280.jpg') }}" alt="مجتمع مفتوح المصدر" class="img-fluid section-img">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4 section-title">منصة بناها مبرمجون أحرار… وليست تابعة لأي جهة</h2>
                <p class="lead">الحريفة ليست شركة، وليست مؤسسة، وليست مشروعًا شخصيًا.</p>
                <p class="mb-4">إنها مبادرة بناها مجتمع من المبرمجين الأحرار، المؤمنين بأن:</p>
                
                <div class="mb-4">
                    <h5 class="card-title">المعرفة يجب أن تكون مفتوحة</h5>
                    <p class="text-muted">لضمان الشفافية والمساواة للجميع</p>
                </div>
                
                <div class="mb-4">
                    <h5 class="card-title">الفرص يجب أن تكون متساوية</h5>
                    <p class="text-muted">بغض النظر عن الخلفية أو العلاقات</p>
                </div>
                
                <div>
                    <h5 class="card-title">الشفافية أسلوب حياة</h5>
                    <p class="text-muted">في كل خطوة من رحلة اللاعب</p>
                </div>
            </div>
        </div>
    </div>
</section>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="h5 mb-3 text-warning">المعرفة المفتوحة</h4>
                        <p class="text-muted mb-0">المعرفة يجب أن تكون مفتوحة للجميع</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="h5 mb-3 text-warning">العدالة المشتركة</h4>
                        <p class="text-muted mb-0">العدالة يجب أن تكون مشتركة بين الجميع</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="h5 mb-3 text-warning">مفتوحة المصدر</h4>
                        <p class="text-muted mb-0">المنصة مفتوحة المصدر بالكامل، تعتمد على التطوير المجتمعي</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why We Exist -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3 section-title">لماذا أنشأنا الحريفة؟</h2>
                    <p class="lead">لأن آلاف اللاعبين الموهوبين ضاعوا بسبب:</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="h5 mb-3 text-warning">الفساد</h4>
                                <p class="text-muted mb-0">داخل قطاع الناشئين</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="h5 mb-3 text-warning">غياب العدالة</h4>
                                <p class="text-muted mb-0">في الاختبارات والانتقاء</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="h5 mb-3 text-warning">سيطرة الشللية</h4>
                                <p class="text-muted mb-0">على الأندية ومراكز التدريب</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="h5 mb-3 text-warning">صوت غير مسموع</h4>
                                <p class="text-muted mb-0">صعوبة وصول اللاعب الموهوب لصوته الحقيقي</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-5">
                    <p class="lead">قررنا أن نُعيد الفرصة لمكانها الطبيعي: عند الموهبة نفسها.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3 section-title">كيف تعمل المنصة؟</h2>
            <p class="lead">نظام توثيق شفاف وحديث يعتمد على:</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="h5 mb-4 text-warning">ملف لاعب موثّق</h4>
                        <ul class="text-muted ps-4">
                            <li>البيانات الأساسية</li>
                            <li>مركز اللعب</li>
                            <li>الإحصائيات</li>
                            <li>الفيديوهات التوثيقية</li>
                            <li>تقييمات المدربين</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="h5 mb-4 text-warning">توثيق مجتمعي</h4>
                        <p class="text-muted">مراجعة الفيديوهات من قبل:</p>
                        <ul class="text-muted ps-4">
                            <li>مدربين معتمدين</li>
                            <li>حكام</li>
                            <li>أكاديميات</li>
                            <li>لاعبين سابقين</li>
                        </ul>
                        <p class="text-muted mb-0">وفق نظام شفاف، مفتوح، وقابل للتدقيق.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="h5 mb-4 text-warning">مكافحة التزوير</h4>
                        <ul class="text-muted ps-4">
                            <li>مراجعات متعددة</li>
                            <li>نظام سمعة (Reputation System)</li>
                            <li>سجل تعديلات شفاف</li>
                            <li>أكثر من مصدر توثيق</li>
                        </ul>
                        <p class="text-muted mb-0">لضمان مصداقية كل محتوى.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Vision -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Column -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="{{ asset('images/about/football-4544858_1280.jpg') }}" alt="رؤية الحريفة" class="img-fluid rounded-3 shadow-lg">
            </div>
            
            <!-- Content Column -->
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4 section-title">ماذا نريد أن نغيّر؟</h2>
                <p class="lead mb-4">نحن نؤمن بأن الرياضة يجب أن تكون منبرًا للعدالة والشفافية. نسعى لتغيير الواقع الحالي من خلال:</p>
                
                <div class="mb-4">
                    <h4 class="h5 mb-2 text-warning">رياضة عادلة</h4>
                    <p class="text-muted">يظهر فيها اللاعب عشان "يلعب كويس"… مش عشان "يعرف حد".</p>
                </div>
                
                <div class="mb-4">
                    <h4 class="h5 mb-2 text-warning">قطاع ناشئين شفاف</h4>
                    <p class="text-muted">يقدر أي نادي يشوف موهبة حقيقية من أي محافظة.</p>
                </div>
                
                <div class="mb-4">
                    <h4 class="h5 mb-2 text-warning">نظام يركز على اللاعبين</h4>
                    <p class="text-muted">يوفر طريقة عصرية لإظهار المواهب بدون تكلفة ولا وساطة.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3 section-title">قيمنا</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h4 class="h5 mb-3 text-warning">الشفافية</h4>
                        <p class="text-muted mb-0">كل معلومة لها مصدر، وكل تعديل مسجّل.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h4 class="h5 mb-3 text-warning">العدالة</h4>
                        <p class="text-muted mb-0">نفس الفرصة لكل لاعب، مهما كانت خلفيته.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h4 class="h5 mb-3 text-warning">المجتمعية</h4>
                        <p class="text-muted mb-0">المنصة ملك للناس… مش مؤسسة.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h4 class="h5 mb-3 text-warning">الحرية</h4>
                        <p class="text-muted mb-0">كود مفتوح، تطوير مفتوح، مشاركة مفتوحة.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">فريق العمل</h2>
            <p class="text-muted">نخبة من المحترفين المتخصصين في مجال الإعلام الرياضي</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="p-4">
                        <img src="https://ui-avatars.com/api/?name=محمد+أحمد&background=0D6EFD&color=fff&size=150" alt="محمد أحمد" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h4 class="h5 mb-1">محمد أحمد</h4>
                        <p class="text-muted mb-3">رئيس التحرير</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="p-4">
                        <img src="https://ui-avatars.com/api/?name=أحمد+علي&background=0D6EFD&color=fff&size=150" alt="أحمد علي" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h4 class="h5 mb-1">أحمد علي</h4>
                        <p class="text-muted mb-3">مدير التحرير</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="p-4">
                        <img src="https://ui-avatars.com/api/?name=سارة+محمد&background=0D6EFD&color=fff&size=150" alt="سارة محمد" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h4 class="h5 mb-1">سارة محمد</h4>
                        <p class="text-muted mb-3">محررة رياضية</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="p-4">
                        <img src="https://ui-avatars.com/api/?name=خالد+عمر&background=0D6EFD&color=fff&size=150" alt="خالد عمر" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h4 class="h5 mb-1">خالد عمر</h4>
                        <p class="text-muted mb-3">مصمم جرافيك</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="text-dark"><i class="fab fa-behance"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('about.developers') }}" class="btn btn-outline-primary">تعرف على المطورين <i class="fas fa-arrow-left ms-2"></i></a>
        </div>
    </div>
</section>

<!-- Final Message -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="fw-bold mb-4 section-title">رسالتنا</h2>
                <p class="lead mb-4">لكل لاعب اتقال له "مفيش فرصة"…</p>
                <p class="lead mb-4">لكل شاب حلم يدخل نادي ومحدش سمعه…</p>
                <p class="lead mb-4">لكل موهبة اتظلمت…</p>
                <p class="lead mb-4">الحريفة اتبنت عشانك.</p>
                <p class="lead mb-4">اتعملت عشان صوتك يوصل.</p>
                <p class="lead mb-4">وفتحت أبوابها عشان الطريق يبقى واضح… ومكشوف… وحق للجميع.</p>
                
                <div class="d-flex justify-content-center gap-3 mt-5">
                    <a href="{{ route('signup') }}" class="btn btn-warning btn-lg">انضم إلينا الآن</a>
                    <a href="{{ route('about.developers') }}" class="btn btn-outline-light btn-lg">تعرف على المطورين</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Contribute -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3 section-title">كيف يمكنك المساهمة؟</h2>
            <p class="lead">الحريفة مشروع يبنيه الجميع… ويستفيد منه الجميع</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h4 class="h5 mb-3 text-warning">التطوير</h4>
                        <p class="text-muted mb-0">الانضمام لفريق التطوير</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h4 class="h5 mb-3 text-warning">المراجعة</h4>
                        <p class="text-muted mb-0">مراجعة الفيديوهات والملفات</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h4 class="h5 mb-3 text-warning">النشر</h4>
                        <p class="text-muted mb-0">نشر المشروع بين المهتمين</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .hover-scale {
        transition: transform 0.3s ease;
    }
    
    .hover-scale:hover {
        transform: translateY(-5px);
    }
    
    .card {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    .bg-warning {
        background-color: #ffc107 !important;
    }
    
    .text-warning {
        color: #ffc107 !important;
    }
    
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }
    
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        color: #000;
    }
    
    .btn-outline-warning {
        color: #ffc107;
        border-color: #ffc107;
    }
    
    .btn-outline-warning:hover {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }
    
    /* RTL Fixes */
    [dir="rtl"] .me-2 {
        margin-left: 0.5rem !important;
        margin-right: 0 !important;
    }
    
    [dir="rtl"] .ms-2 {
        margin-right: 0.5rem !important;
        margin-left: 0 !important;
    }
    
    /* Social Icons */
    .social-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
        transition: all 0.3s ease;
    }
    
    .social-icon:hover {
        background-color: #ffc107;
        color: #000;
        transform: translateY(-3px);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2.5rem;
        }
        
        .lead {
            font-size: 1.1rem;
        }
    }
</style>
@endpush
@endsection