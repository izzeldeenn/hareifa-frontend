<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black py-3">
        <div class="container-fluid">
            <!-- Logo and Toggle -->
            <a class="navbar-brand me-4" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="حريفة" style="height: 40px; filter: brightness(0) invert(1)">
            </a>
            
            <!-- Desktop Navigation -->
            <div class="d-none d-md-flex align-items-center">
                <a href="#" class="text-decoration-none text-white-50 me-3 small hover-text-white">الاستكشاف</a>
                <a href="#" class="text-decoration-none text-white-50 me-3 small hover-text-white">الأكاديميات</a>
                <a href="#" class="text-decoration-none text-white-50 me-3 small hover-text-white">اللاعبين</a>
                <a href="#" class="text-decoration-none text-white-50 me-3 small hover-text-white">المباريات</a>
                <a href="#" class="text-decoration-none text-white-50 me-3 small hover-text-white">التبرعات</a>
                <a href="#" class="text-decoration-none text-white-50 me-3 small hover-text-white">من نحن</a>
            </div>
            
            <!-- Auth Buttons and Mobile Toggle -->
            <div class="d-none d-md-flex align-items-center">
                    <a href="#" class="btn btn-sm btn-outline-light border-2 fw-bold px-3 py-1 rounded-pill hover-text-dark transition-all me-2">
                        تسجيل الدخول
                    </a>
                    <a href="#" class="btn btn-sm btn-light text-dark fw-bold px-3 py-1 rounded-pill hover-bg-white transition-all shadow-sm">
                        إنشاء حساب
                    </a>
                </div>
                <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            
            <!-- Mobile Menu (Collapsible) -->
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
                <div class="d-flex flex-column d-md-none">
                    <a href="#" class="text-decoration-none text-white-50 py-2 d-flex align-items-center hover-text-white">
                        <i class="fas fa-compass ms-2"></i>الاستكشاف
                    </a>
                    <a href="#" class="text-decoration-none text-white-50 py-2 d-flex align-items-center hover-text-white">
                        <i class="fas fa-school ms-2"></i>الأكاديميات
                    </a>
                    <a href="#" class="text-decoration-none text-white-50 py-2 d-flex align-items-center hover-text-white">
                        <i class="fas fa-users ms-2"></i>اللاعبين
                    </a>
                    <a href="#" class="text-decoration-none text-white-50 py-2 d-flex align-items-center hover-text-white">
                        <i class="fas fa-futbol ms-2"></i>المباريات
                    </a>
                    <a href="#" class="text-decoration-none text-white-50 py-2 d-flex align-items-center hover-text-white">
                        <i class="fas fa-hand-holding-heart ms-2"></i>التبرعات
                    </a>
                    <a href="#" class="text-decoration-none text-white-50 py-2 d-flex align-items-center hover-text-white">
                        <i class="fas fa-info-circle ms-2"></i>من نحن
                    </a>
                    <div class="d-grid gap-2 mt-2">
                        <a href="#" class="btn btn-outline-light rounded-pill d-flex align-items-center justify-content-center">
                            <i class="fas fa-sign-in-alt ms-2"></i>تسجيل الدخول
                        </a>
                        <a href="#" class="btn btn-light text-dark rounded-pill d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus ms-2"></i>إنشاء حساب
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>