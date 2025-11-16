@extends('layouts.app')

@section('content')
<main class="container-fluid p-0">
    <!-- Hero Section with Signup Form -->
    <section class="position-relative" style="height: 100vh; min-height: 600px;">
        <!-- Background Image -->
        <div class="position-absolute w-100 h-100">
            <img src="{{ asset('images/about/pexels-yogendras31-1375152.jpg') }}" alt="إنشاء حساب" class="w-100 h-100" style="object-fit: cover;">
        </div>
        
        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.7);">
            <div class="container h-100 d-flex align-items-center">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-6">
                        <!-- Signup Card -->
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <!-- Left Side - Form -->
                                    <div class="col-md-7 p-5">
                                        <div class="text-center mb-5">
                                            <h2 class="fw-bold mb-3" style="color: var(--accent-color);">إنشاء حساب جديد</h2>
                                            <p class="text-muted">انضم إلينا وتمتع بجميع المميزات</p>
                                        </div>
                                        
                                        <form method="POST" action="{{ route('signup') }}" id="signupForm">
                                            @csrf
                                            
                                            <!-- Name Input -->
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="fas fa-user text-muted"></i>
                                                    </span>
                                                    <input id="name" type="text" 
                                                           class="form-control form-control-lg border-end-0 @error('name') is-invalid @enderror" 
                                                           name="name" value="{{ old('name') }}" 
                                                           required autocomplete="name" autofocus
                                                           placeholder="الاسم الكامل">
                                                </div>
                                                @error('name')
                                                    <span class="text-danger small d-block mt-2">
                                                        <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Email Input -->
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="fas fa-envelope text-muted"></i>
                                                    </span>
                                                    <input id="email" type="email" 
                                                           class="form-control form-control-lg border-end-0 @error('email') is-invalid @enderror" 
                                                           name="email" value="{{ old('email') }}" 
                                                           required autocomplete="email"
                                                           placeholder="البريد الإلكتروني">
                                                </div>
                                                @error('email')
                                                    <span class="text-danger small d-block mt-2">
                                                        <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Phone Number -->
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="fas fa-phone text-muted"></i>
                                                    </span>
                                                    <input id="phone" type="tel" 
                                                           class="form-control form-control-lg border-end-0 @error('phone') is-invalid @enderror" 
                                                           name="phone" value="{{ old('phone') }}" 
                                                           required
                                                           placeholder="رقم الجوال">
                                                </div>
                                                @error('phone')
                                                    <span class="text-danger small d-block mt-2">
                                                        <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Password Input -->
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="fas fa-lock text-muted"></i>
                                                    </span>
                                                    <input id="password" type="password" 
                                                           class="form-control form-control-lg border-end-0 @error('password') is-invalid @enderror" 
                                                           name="password" required 
                                                           autocomplete="new-password"
                                                           placeholder="كلمة المرور">
                                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                                        <i class="far fa-eye"></i>
                                                    </button>
                                                </div>
                                                @error('password')
                                                    <span class="text-danger small d-block mt-2">
                                                        <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="fas fa-lock text-muted"></i>
                                                    </span>
                                                    <input id="password-confirm" type="password" 
                                                           class="form-control form-control-lg border-end-0" 
                                                           name="password_confirmation" required 
                                                           autocomplete="new-password"
                                                           placeholder="تأكيد كلمة المرور">
                                                </div>
                                            </div>

                                            <!-- Terms & Conditions -->
                                            <div class="mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                                    <label class="form-check-label" for="terms">
                                                        أوافق على <a href="#" class="text-decoration-none" style="color: var(--accent-color);">الشروط والأحكام</a>
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="d-grid mb-4">
                                                <button type="submit" class="btn btn-lg text-white" style="background: linear-gradient(135deg, #FFD700, #ffc400); border: none;">
                                                    <span class="fw-bold">إنشاء حساب</span>
                                                </button>
                                            </div>

                                            <!-- Login Link -->
                                            <div class="text-center">
                                                <p class="mb-0">
                                                    لديك حساب بالفعل؟
                                                    <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: var(--accent-color);">
                                                        تسجيل الدخول
                                                    </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <!-- Right Side - Welcome Message -->
                                    <div class="col-md-5 d-none d-md-flex align-items-center text-white p-5" 
                                         style="background: linear-gradient(135deg, #ffae00, #ff9500);">
                                        <div>
                                            <h2 class="fw-bold mb-4">انضم إلى مجتمعنا</h2>
                                            <p class="mb-4">أنشئ حسابك الآن واستمتع بجميع مميزات المنصة</p>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <i class="fas fa-check-circle fa-2x text-white-50"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">متابعة الفرق المفضلة</h6>
                                                    <p class="small text-white-50 mb-0">تابع فرقك المفضلة وكن على اطلاع دائم</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mt-4">
                                                <div class="me-3">
                                                    <i class="fas fa-check-circle fa-2x text-white-50"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">حضور المباريات</h6>
                                                    <p class="small text-white-50 mb-0">احصل على تذاكر المباريات بسهولة</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mt-4">
                                                <div class="me-3">
                                                    <i class="fas fa-check-circle fa-2x text-white-50"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">تفاعل مع المجتمع</h6>
                                                    <p class="small text-white-50 mb-0">شارك آراءك وتفاعل مع المشجعين</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const passwordInput = this.parentElement.querySelector('input');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });

    // Phone number formatting
    document.getElementById('phone').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.startsWith('966')) {
            value = value.substring(3);
        }
        if (value.startsWith('0')) {
            value = value.substring(1);
        }
        e.target.value = value;
    });

    // Form validation
    document.getElementById('signupForm').addEventListener('submit', function(e) {
        const requiredFields = ['name', 'email', 'phone', 'password', 'password-confirm'];
        let isValid = true;
        
        requiredFields.forEach(field => {
            const element = document.getElementById(field);
            if (!element.value.trim()) {
                isValid = false;
                element.classList.add('is-invalid');
            }
        });
        
        if (!document.getElementById('terms').checked) {
            isValid = false;
            document.getElementById('terms').classList.add('is-invalid');
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
@endpush

<style>
    .form-control, .form-control:focus, .input-group-text {
        height: 50px;
        border-radius: 8px;
        border-color: #e0e0e0;
    }
    
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(var(--accent-rgb), 0.1);
        border-color: var(--accent-color);
    }
    
    .btn {
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .form-check-input:checked {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }
    
    .form-check-input.is-invalid {
        border-color: #dc3545;
    }
    
    .form-check-label a {
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .form-check-label a:hover {
        text-decoration: underline;
    }
    
    /* RTL Support */
    html[dir="rtl"] .form-check-input {
        margin-right: -1.5em;
        margin-left: 0.5em;
    }
    
    html[dir="rtl"] .input-group-text {
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
        border-top-left-radius: 8px !important;
        border-bottom-left-radius: 8px !important;
    }
    
    html[dir="rtl"] .form-control {
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
    }
</style>
@endsection