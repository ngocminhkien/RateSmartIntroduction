@extends('layouts.app')

@section('title', 'RateSmart - Nền Tảng Dữ Liệu Giá & Định Giá Tự Động Hàng Đầu')

@section('content')

<!-- HERO SECTION -->
<section id="home" class="relative pt-16 pb-24 lg:pt-24 lg:pb-32 overflow-hidden bg-gradient-to-b from-white via-brand-50/40 to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-100/80 border border-brand-200 text-brand-800 text-xs font-bold uppercase tracking-wider">
                    <i data-lucide="shield-check" class="w-4 h-4 text-brand-700"></i>
                    Thành viên Công ty Thẩm định giá Hoa Sen (Lotus VFI)
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-[1.15]">
                    Nền Tảng Dữ Liệu Giá & <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-700 to-emerald-600">Định Giá Tự Động (AVM)</span> Hàng Đầu
                </h1>

                <p class="text-lg text-slate-600 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
                    Ứng dụng công nghệ Big Data, AI và nền tảng dữ liệu thực tế từ Công ty Thẩm định giá Hoa Sen. Giải pháp tra cứu, thẩm định và quản trị rủi ro tài sản bảo đảm chuẩn xác hàng đầu cho Ngân hàng và Tổ chức tài chính.
                </p>

                <!-- Search Bar -->
                <div class="p-2 bg-white rounded-2xl shadow-xl shadow-slate-200/70 border border-slate-200/90 max-w-2xl mx-auto lg:mx-0">
                    <form action="{{ route('avm.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-2">
                        <div class="flex items-center gap-2 px-3 py-2 w-full text-slate-400">
                            <i data-lucide="search" class="w-5 h-5 text-brand-700 shrink-0"></i>
                            <input name="address" type="text" placeholder="Nhập địa chỉ BĐS (VD: 631 QL21B, Bích Hòa, Thanh Oai, Hà Nội)..." value="631 QL21B, Bích Hòa, Thanh Oai, Hà Nội" class="w-full text-slate-800 text-sm focus:outline-none placeholder:text-slate-400 font-medium">
                        </div>
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-brand-700 hover:bg-brand-800 text-white font-bold text-sm whitespace-nowrap shadow-md shadow-brand-700/20 transition flex items-center justify-center gap-2">
                            <i data-lucide="sparkles" class="w-4 h-4"></i> Tra Cứu AVM
                        </button>
                    </form>
                </div>

                <!-- Stats counter -->
                <div class="pt-6 grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-slate-200/70">
                    <div>
                        <div class="text-2xl font-black text-slate-900">{{ $stats['provinces_count'] }}</div>
                        <div class="text-xs text-slate-500 font-medium mt-0.5">Tỉnh thành Bảng giá NN</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-brand-700">{{ number_format($stats['hoasen_appraisals_count']) }}+</div>
                        <div class="text-xs text-slate-500 font-medium mt-0.5">Tài sản TĐG Hoa Sen</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-slate-900">{{ number_format($stats['market_comparables_count']) }}+</div>
                        <div class="text-xs text-slate-500 font-medium mt-0.5">BĐS thị trường xác thực</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-brand-700">{{ $stats['bank_provinces_count'] }}</div>
                        <div class="text-xs text-slate-500 font-medium mt-0.5">Tỉnh thành Data Ngân hàng</div>
                    </div>
                </div>

            </div>

            <!-- Preview Card -->
            <div class="lg:col-span-5 relative">
                <div class="relative bg-white p-5 rounded-3xl shadow-2xl border border-slate-200">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <span class="text-xs font-mono text-slate-400">ratesmart.com.vn/tra-cuu</span>
                        <span class="text-xs font-bold text-brand-700 bg-brand-50 px-2 py-0.5 rounded">AVM MAP LIVE</span>
                    </div>
                    <div class="mt-4 p-4 rounded-2xl bg-gradient-to-br from-brand-700 to-emerald-800 text-white space-y-2">
                        <div class="text-xs text-emerald-200 uppercase font-bold">Phiếu Tra Cứu Nhanh Mẫu</div>
                        <div class="text-sm font-bold">631 QL21B, Bích Hòa, Thanh Oai, Hà Nội</div>
                        <div class="text-xl font-black text-amber-300">101.584.000 đ/m² <span class="text-xs text-white font-normal">(9.752.064.000 đ)</span></div>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ route('avm.index') }}" class="w-full py-2.5 rounded-xl border border-brand-700 text-brand-700 font-bold text-xs hover:bg-brand-50 transition block">
                            Mở Trải Nghiệm Tra Cứu Đầy Đủ →
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CLIENTS -->
<section id="clients" class="py-12 bg-white border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-xs font-bold text-slate-400 uppercase tracking-widest mb-8">
            Được tin tưởng bởi các Định chế Tài chính & Doanh nghiệp hàng đầu
        </p>
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-6 items-center">
            @foreach($clients as $c)
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 text-center font-black {{ $c->color_class }} tracking-tight text-base hover:border-brand-300 transition">
                    {{ $c->name }}
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ABOUT US & LEADERS -->
<section id="about" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
            <span class="inline-flex px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase">Về Chúng Tôi</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Chuyên Môn Thẩm Định Kết Hợp Sức Mạnh Công Nghệ
            </h2>
            <p class="text-slate-600">
                RateSmart thừa hưởng hơn 20 năm kinh nghiệm từ Thẩm định giá Hoa Sen và công nghệ kiến trúc dữ liệu tiên tiến, nhằm số hóa và nâng tầm minh bạch cho thị trường BĐS.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($teamMembers as $m)
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-brand-50 text-brand-700 font-bold text-xs rounded-full uppercase">{{ $m->role_title }}</span>
                        <i data-lucide="award" class="w-5 h-5 text-brand-700"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">{{ $m->name }}</h3>
                    <p class="text-xs font-semibold text-slate-500 mb-3">{{ $m->organization }}</p>
                    <p class="text-sm text-slate-600 leading-relaxed">{{ $m->bio }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- DATABASE 4 PILLARS & 5-STEP PIPELINE -->
<section id="database" class="py-20 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
            <span class="inline-flex px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase">Hạ Tầng Dữ Liệu Lớn</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">4 Trụ Cột Cơ Sở Dữ Liệu Giá</h2>
            <p class="text-slate-600">Tổng hợp đa nguồn và chuẩn hóa theo chuẩn mực thẩm định giá quốc gia.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200">
                <h3 class="text-lg font-bold text-slate-900 mb-2">Giá Nhà Nước</h3>
                <p class="text-sm text-slate-600 mb-3">Toàn bộ bảng giá đất 63 tỉnh thành ban hành giai đoạn 2020 - 2025.</p>
                <div class="text-xs font-bold text-brand-700">Phủ 100% toàn quốc</div>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200">
                <h3 class="text-lg font-bold text-slate-900 mb-2">Giá Thẩm Định</h3>
                <p class="text-sm text-slate-600 mb-3">20.000 hồ sơ lưu trữ thực tế từ Thẩm định giá Hoa Sen.</p>
                <div class="text-xs font-bold text-emerald-700">Đã qua rà soát nghiệp vụ</div>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200">
                <h3 class="text-lg font-bold text-slate-900 mb-2">Giá Thị Trường</h3>
                <p class="text-sm text-slate-600 mb-3">10.000 tài sản so sánh giao dịch thực tế đã làm sạch.</p>
                <div class="text-xs font-bold text-blue-700">Loại bỏ giao dịch bất thường</div>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200">
                <h3 class="text-lg font-bold text-slate-900 mb-2">Giá Ngân Hàng</h3>
                <p class="text-sm text-slate-600 mb-3">Bảng giá tài sản bảo đảm phục vụ thẩm định rủi ro tín dụng.</p>
                <div class="text-xs font-bold text-purple-700">35 tỉnh thành trọng điểm</div>
            </div>
        </div>
    </div>
</section>

<!-- SOLUTIONS (3 PACKAGES) -->
<section id="solutions" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
            <span class="inline-flex px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase">Mô Hình Hợp Tác</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">3 Hình Thức Đề Xuất Hợp Tác Ngân Hàng</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($services as $s)
                <div class="bg-white rounded-3xl p-8 border {{ $s->is_featured ? 'border-2 border-brand-600 shadow-xl' : 'border-slate-200 shadow-sm' }} flex flex-col justify-between">
                    <div class="space-y-4">
                        @if($s->badge)
                            <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase">{{ $s->badge }}</span>
                        @endif
                        <h3 class="text-2xl font-bold text-slate-900">{{ $s->name }}</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">{{ $s->short_description }}</p>
                        @if($s->features)
                            <ul class="space-y-2 text-xs text-slate-600 pt-4 border-t border-slate-100">
                                @foreach($s->features as $f)
                                    <li class="flex items-center gap-2">
                                        <i data-lucide="check" class="w-4 h-4 text-brand-700 shrink-0"></i>
                                        {{ $f }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-100">
                        <div class="text-xs text-slate-500 mb-3">{{ $s->pricing_note }}</div>
                        <a href="#contact" class="w-full py-3 rounded-xl {{ $s->is_featured ? 'bg-brand-700 hover:bg-brand-800 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-800' }} font-bold text-xs transition block text-center">
                            Đăng Ký Tư Vấn
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CONTACT FORM -->
<section id="contact" class="py-20 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12">
            <div class="lg:col-span-5 space-y-6">
                <span class="inline-flex px-3 py-1 rounded-full bg-brand-700/30 text-emerald-400 text-xs font-bold uppercase">Liên Hệ & Hợp Tác</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Sẵn Sàng Triển Khai Định Giá Số?</h2>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Đội ngũ chuyên gia của RateSmart và Thẩm định giá Hoa Sen sẵn sàng đồng hành, tư vấn giải pháp dữ liệu giá tối ưu nhất cho Quý ngân hàng và doanh nghiệp.
                </p>
                <div class="space-y-4 pt-4 text-sm text-slate-300">
                    <div>Trụ sở: Tòa nhà Licogi 13, số 164 Khuất Duy Tiến, Thanh Xuân, Hà Nội</div>
                    <div>Hotline: <strong class="text-white">0853 293 333</strong></div>
                    <div>Website: https://ratesmart.com.vn</div>
                </div>
            </div>

            <div class="lg:col-span-7 bg-slate-800/90 p-8 rounded-3xl border border-slate-700">
                <h3 class="text-xl font-bold mb-6">Đăng Ký Nhận Tư Vấn & Demo</h3>
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-1">Họ và tên *</label>
                            <input required name="full_name" type="text" placeholder="Nguyễn Văn A" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-brand-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-1">Số điện thoại *</label>
                            <input required name="phone" type="tel" placeholder="0912 345 678" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-brand-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-1">Email công việc *</label>
                            <input required name="email" type="email" placeholder="a.nguyen@bank.com.vn" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-brand-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-1">Cơ quan / Ngân hàng *</label>
                            <input required name="company_name" type="text" placeholder="Ngân hàng ABC / CN Hà Nội" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-brand-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1">Mô hình quan tâm</label>
                        <select name="interested_package" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-brand-500 focus:outline-none">
                            <option value="SaaS">Gói 1: Cho thuê dịch vụ tra cứu (SaaS Online)</option>
                            <option value="Private Cloud">Gói 2: Cho thuê hệ thống & Cập nhật dữ liệu giá (Private Cloud)</option>
                            <option value="Custom Enterprise">Gói 3: May đo phát triển hệ thống riêng (Custom Enterprise)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1">Nội dung chi tiết</label>
                        <textarea name="message" rows="3" placeholder="Quý khách vui lòng cho biết nhu cầu tra cứu và số lượng cán bộ sử dụng..." class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-brand-500 focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 rounded-xl bg-brand-700 hover:bg-brand-600 text-white font-bold text-sm shadow-lg transition">
                        Gửi Yêu Cầu Tư Vấn Ngay
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
