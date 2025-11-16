@extends('layouts.app')

@section('content')
<main class="container-fluid p-0">
    <!-- Hero Section with Login Form -->
    <section class="position-relative" style="height: 100vh; min-height: 600px;">
        <!-- Background Image -->
        <div class="position-absolute w-100 h-100">
            <img src="{{ asset('images/Pasted image.png') }}" alt="تسجيل الدخول" class="w-100 h-100" style="object-fit: cover;">
        </div>
        
        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.7);">
            <div class="container h-100 d-flex align-items-center">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-6">
                        <!-- Login Card -->
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <!-- Left Side - Form -->
                                    <div class="col-md-7 p-5">
                                        <div class="text-center mb-5">
                                            <h2 class="fw-bold mb-3" style="color: var(--accent-color);">مرحباً بعودتك</h2>
                                            <p class="text-muted">سجل دخولك للوصول إلى حسابك</p>
                                        </div>
                                        
                                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                                            @csrf
                                            
                                            <!-- Email Input -->
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="fas fa-envelope text-muted"></i>
                                                    </span>
                                                    <input id="email" type="email" 
                                                           class="form-control form-control-lg border-end-0 @error('email') is-invalid @enderror" 
                                                           name="email" value="{{ old('email') }}" 
                                                           required autocomplete="email" autofocus
                                                           placeholder="البريد الإلكتروني">
                                                </div>
                                                @error('email')
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
                                                           autocomplete="current-password"
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

                                            <!-- Remember & Forgot Password -->
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        تذكرني
                                                    </label>
                                                </div>
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: var(--accent-color);">
                                                        نسيت كلمة المرور؟
                                                    </a>
                                                @endif
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="d-grid mb-4">
                                                <button type="submit" class="btn btn-lg text-white" style="background: linear-gradient(135deg, #FFD700, #ffc400); border: none;">
                                                    <span class="fw-bold">تسجيل الدخول</span>
                                                </button>
                                            </div>

                                            <!-- Register Link -->
                                            <div class="text-center">
                                                <p class="mb-0">
                                                    ليس لديك حساب؟
                                                    <a href="{{ route('signup') }}" class="text-decoration-none fw-bold" style="color: var(--accent-color);">
                                                        إنشاء حساب جديد
                                                    </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <!-- Right Side - Welcome Message -->
                                    <div class="col-md-5 d-none d-md-flex align-items-center text-white p-5" 
                                         style="background: linear-gradient(135deg, #ffae00, #ff9500);">
                                        <div>
                                            <h2 class="fw-bold mb-4">مرحباً بك في منصتنا</h2>
                                            <p class="mb-4">سجل دخولك للوصول إلى جميع مميزات المنصة ومتابعة آخر المستجدات</p>
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

    // Form validation
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        if (!email || !password) {
            e.preventDefault();
            // You can add custom validation feedback here
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
    
    .toggle-password {
        background-color: white;
        border: 1px solid #ced4da;
        border-right: none;
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        padding: 0 15px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
    }
    
    .card {
        border: none;
        overflow: hidden;
    }
    
    .card-body {
        padding: 0;
    }
    
    @media (max-width: 767.98px) {
        .position-relative {
            height: auto !important;
            min-height: 100vh;
        }
        
        .card {
            margin: 20px;
            width: calc(100% - 40px);
        }
    }
</style>
@endsection