@extends('layouts.app')

<style>
    :root {
        --primary-color: #FFD700; /* Yellow */
        --secondary-color: #FF8C00; /* Orange */
        --dark-color: #000000; /* Black */
        --light-color: #FFFFFF; /* White */
        --accent-color: #FF8C00; /* Orange as accent */
    }
    
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: var(--dark-color);
    }
    
    .btn-primary:hover {
        background-color: #e6c200;
        border-color: #e6c200;
        color: var(--dark-color);
    }
    
    .btn-outline-primary {
        color: var(--dark-color);
        border-color: var(--primary-color);
    }
    
    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: var(--dark-color);
    }
    
    .card {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    .card-header {
        background-color: var(--light-color);
        border-bottom: 2px solid var(--primary-color);
    }
    
    .table th {
        background-color: var(--light-color);
        color: var(--dark-color);
        border-bottom: 2px solid var(--primary-color);
    }
    
    .badge {
        font-weight: 500;
    }
    
    .badge.bg-success {
        background-color: var(--primary-color) !important;
        color: var(--dark-color);
    }
    
    .badge.bg-primary {
        background-color: var(--secondary-color) !important;
    }
    
    .badge.bg-dark {
        background-color: var(--dark-color) !important;
    }
</style>

@php
// Sample data - Replace this with actual database query later
$donations = collect([
    (object)[
        'is_anonymous' => false,
        'name' => 'أحمد محمد',
        'amount' => 200,
        'payment_method' => 'vodafone_cash',
        'created_at' => now()->subHours(2),
        'message' => 'شكراً لجهودكم المميزة'
    ],
    (object)[
        'is_anonymous' => true,
        'name' => null,
        'amount' => 100,
        'payment_method' => 'fawry',
        'created_at' => now()->subDays(1),
        'message' => ''
    ],
    (object)[
        'is_anonymous' => false,
        'name' => 'محمد علي',
        'amount' => 500,
        'payment_method' => 'bank_transfer',
        'created_at' => now()->subDays(3),
        'message' => 'استمروا في العطاء'
    ]
]);

// Sample statistics
$totalDonations = $donations->sum('amount');
$donationsCount = $donations->count();
$lastMonthDonations = $donations->sum('amount'); // Simplified for demo
@endphp

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="display-5 fw-bold mb-0" style="color: var(--accent-color);">دعم المنصة</h1>
                <p class="text-muted mb-0">ساهم في استمرارية منصتنا وتطوير محتواها الرياضي المتميز</p>
            </div>
            <button type="button" class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#donationModal" style="background-color: var(--primary-color); border-color: var(--primary-color); color: var(--dark-color);">
                <i class="fas fa-plus me-2"></i>تبرع الآن
            </button>
        </div>

        <!-- Latest Donations -->
        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5" style="border: 1px solid rgba(0, 0, 0, 0.1) !important;">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0">آخر التبرعات</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">المتبرع</th>
                                <th class="text-center">المبلغ</th>
                                <th class="text-center">طريقة الدفع</th>
                                <th class="text-center">التاريخ</th>
                                <th class="text-center">الرسالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($donations as $donation)
                            <tr>
                                <td class="text-center">
                                    @if($donation->is_anonymous)
                                        متبرع كريم
                                    @else
                                        {{ $donation->name ?? 'زائر' }}
                                    @endif
                                </td>
                                <td class="text-center">{{ number_format($donation->amount) }} ج.م</td>
                                <td class="text-center">
                                    @if($donation->payment_method === 'vodafone_cash')
                                        <span class="badge bg-success">فودافون كاش</span>
                                    @elseif($donation->payment_method === 'fawry')
                                        <span class="badge bg-primary">فوري</span>
                                    @elseif($donation->payment_method === 'bank_transfer')
                                        <span class="badge bg-dark">تحويل بنكي</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $donation->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    @if($donation->message)
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="{{ $donation->message }}">
                                            <i class="fas fa-comment-dots"></i>
                                        </button>
                                    @else
                                        - 
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <p class="mb-0">لا توجد تبرعات حتى الآن. كن أول المتبرعين!</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Donation Stats -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card border-0 rounded-4 h-100 shadow-sm" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: var(--dark-color);">
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold mb-2">{{ number_format($totalDonations) }} ج.م</div>
                        <p class="mb-0">إجمالي التبرعات</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-4 h-100 shadow-sm" style="background: linear-gradient(135deg, var(--secondary-color), #e67e00); color: var(--light-color);">
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold mb-2">{{ number_format($donationsCount) }}</div>
                        <p class="mb-0">عدد المتبرعين</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-4 h-100 shadow-sm" style="background: linear-gradient(135deg, var(--dark-color), #333); color: var(--light-color);">
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold mb-2">{{ number_format($lastMonthDonations) }} ج.م</div>
                        <p class="mb-0">في آخر 30 يوم</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donation Modal -->
        <div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 overflow-hidden">
                    <div class="modal-header border-0 py-4 px-4" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
                        <h5 class="modal-title text-white" id="donationModalLabel">تبرع الآن</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" id="donationForm">
                        @csrf
                        <div class="modal-body p-4">
                            <div class="mb-4">
                                <label class="form-label fw-bold mb-3">اختر مبلغ التبرع</label>
                                <div class="row g-3">
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amount1" value="50" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary w-100 py-3" for="amount1">
                                            50 ج.م
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amount2" value="100" autocomplete="off">
                                        <label class="btn btn-outline-primary w-100 py-3" for="amount2">
                                            100 ج.م
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amount3" value="200" autocomplete="off">
                                        <label class="btn btn-outline-primary w-100 py-3" for="amount3">
                                            200 ج.م
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="fas fa-money-bill-wave text-muted"></i>
                                        </span>
                                        <input type="number" name="custom_amount" class="form-control form-control-lg border-end-0" placeholder="أو اكتب المبلغ المطلوب" min="1">
                                        <span class="input-group-text bg-white">ج.م</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold mb-3">طريقة الدفع</label>
                                <div class="d-flex flex-column gap-3">
                                    <div class="form-check border rounded p-3">
                                        <input class="form-check-input" type="radio" name="payment_method" id="vodafoneCash" value="vodafone_cash" checked>
                                        <label class="form-check-label w-100" for="vodafoneCash">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('images/vodafone-cash.png') }}" alt="فودافون كاش" class="me-3" style="width: 40px;">
                                                <div>
                                                    <h6 class="mb-0">فودافون كاش</h6>
                                                    <small class="text-muted">01000000000</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-check border rounded p-3">
                                        <input class="form-check-input" type="radio" name="payment_method" id="fawry" value="fawry">
                                        <label class="form-check-label w-100" for="fawry">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('images/fawry.png') }}" alt="فوري" class="me-3" style="width: 40px;">
                                                <div>
                                                    <h6 class="mb-0">فوري</h6>
                                                    <small class="text-muted">كود الخدمة: 999</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-check border rounded p-3">
                                        <input class="form-check-input" type="radio" name="payment_method" id="bankTransfer" value="bank_transfer">
                                        <label class="form-check-label w-100" for="bankTransfer">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('images/bank.png') }}" alt="تحويل بنكي" class="me-3" style="width: 40px;">
                                                <div>
                                                    <h6 class="mb-0">تحويل بنكي</h6>
                                                    <small class="text-muted">البنك الأهلي - 999999999999</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="donationMessage" class="form-label fw-bold">رسالة (اختياري)</label>
                                <textarea class="form-control" id="donationMessage" name="message" rows="3" placeholder="اكتب رسالتك هنا..."></textarea>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="is_anonymous" id="isAnonymous">
                                <label class="form-check-label" for="isAnonymous">
                                    التبرع كمجهول
                                </label>
                            </div>

                            <div id="donorInfo">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="donorName" class="form-label">الاسم</label>
                                        <input type="text" class="form-control" id="donorName" name="name" placeholder="الاسم">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="donorPhone" class="form-label">رقم الهاتف</label>
                                        <input type="tel" class="form-control" id="donorPhone" name="phone" placeholder="01XXXXXXXXX">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 bg-light">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-paper-plane me-2"></i>إرسال التبرع
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            // Toggle donor info based on anonymous checkbox
            document.getElementById('isAnonymous').addEventListener('change', function() {
                document.getElementById('donorInfo').style.display = this.checked ? 'none' : 'block';
            });

            // Handle custom amount selection
            document.querySelectorAll('input[name="amount"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.querySelector('input[name="custom_amount"]').value = '';
                });
            });

            document.querySelector('input[name="custom_amount"]').addEventListener('input', function() {
                if (this.value) {
                    document.querySelectorAll('input[name="amount"]').forEach(radio => {
                        radio.checked = false;
                    });
                }
            });

            // Form validation
            document.getElementById('donationForm').addEventListener('submit', function(e) {
                const customAmount = document.querySelector('input[name="custom_amount"]').value;
                const amountRadios = document.querySelectorAll('input[name="amount"]:checked');
                
                if (!customAmount && amountRadios.length === 0) {
                    e.preventDefault();
                    alert('الرجاء اختيار مبلغ للتبرع');
                    return false;
                }
                
                // If custom amount is used, set it as the amount value
                if (customAmount) {
                    const hiddenAmount = document.createElement('input');
                    hiddenAmount.type = 'hidden';
                    hiddenAmount.name = 'amount';
                    hiddenAmount.value = customAmount;
                    this.appendChild(hiddenAmount);
                }
                
                return true;
            });
        </script>
        @endpush
                                   

        <!-- How Donations Help Section -->
        <div class="row mt-5 pt-5">
            <div class="col-12 text-center mb-4">
                <h2 class="fw-bold mb-4">كيف تساعد تبرعاتك؟</h2>
                <p class="text-muted">مساهمتك تمكننا من تقديم محتوى رياضي متميز وخدمات أفضل لمجتمعنا</p>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="icon-lg bg-soft-primary text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-server"></i>
                        </div>
                        <h5 class="mb-3">تطوير المنصة</h5>
                        <p class="text-muted mb-0">تحسين أداء الموقع وإضافة مميزات جديدة</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="icon-lg bg-soft-primary text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h5 class="mb-3">محتوى حصري</h5>
                        <p class="text-muted mb-0">إنتاج محتوى رياضي متميز وحصري</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="icon-lg bg-soft-primary text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5 class="mb-3">دعم المجتمع</h5>
                        <p class="text-muted mb-0">تنظيم فعاليات وأنشطة رياضية مجتمعية</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center fw-bold mb-5">الأسئلة الشائعة</h2>
                
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                كيف يمكنني التأكد من وصول تبرعي؟
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                سنقوم بإرسال إشعار لك عبر البريد الإلكتروني أو رقم الهاتف المسجل بمجرد استلام تبرعك. كما يمكنك متابعة حالة تبرعك من خلال حسابك الشخصي على المنصة.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                هل يمكنني الحصول على إشعار ضريبي عن تبرعي؟
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                نعم، يمكنك الحصول على إشعار ضريبي عن تبرعك. يرجى التواصل مع فريق الدعم عبر البريد الإلكتروني مع إرفاق إثبات الدفع.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                هل يمكنني إلغاء تبرعي أو استرداد أموالي؟
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                نأسف، لا يمكن استرداد التبرعات النقدية بعد إتمام عملية الدفع. نحرص على استخدام التبرعات بشكل أمثل لخدمة أهداف المنصة.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-5" style="background-color: #f8f9fa;">
    <div class="container text-center py-4">
        <h2 class="fw-bold mb-4">هل لديك استفسار آخر؟</h2>
        <p class="lead text-muted mb-4">فريق الدعم لدينا جاهز لمساعدتك في أي استفسار</p>
        <a href="{{ route('contact') }}" class="btn btn-lg text-white px-4" style="background: linear-gradient(135deg, #FFD700, #ffc400); border: none;">
            <i class="fas fa-headset me-2"></i> تواصل معنا
        </a>
    </div>
</div>
@endsection