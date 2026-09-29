<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RateSmart - Nền Tảng Dữ Liệu Giá & Định Giá Tự Động')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            600: '#16a34a',
                            700: '#008037', // RateSmart Primary Green
                            800: '#00662c',
                            900: '#004d21',
                        }
                    },
                    fontFamily: {
                        heading: ['"Plus Jakarta Sans"', 'sans-serif'],
                        sans: ['"Inter"', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    @yield('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-brand-100 selection:text-brand-900">

    <!-- Header Navigation -->
    <header class="bg-white/95 backdrop-blur-md sticky top-0 z-40 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-emerald-500 flex items-center justify-center text-white shadow-lg shadow-brand-700/20 group-hover:scale-105 transition">
                    <i data-lucide="sparkles" class="w-5 h-5"></i>
                </div>
                <div>
                    <div class="text-2xl font-black tracking-tight text-slate-900 leading-none">
                        <span class="text-slate-900">R<span class="text-brand-700">★</span>te</span><span class="text-brand-700">Smart</span>
                    </div>
                    <div class="text-[9px] uppercase tracking-wider text-slate-400 font-semibold mt-0.5">Thành viên Lotus VFI</div>
                </div>
            </a>

            <nav class="hidden md:flex items-center space-x-7 text-sm font-semibold text-slate-600">
                <a href="{{ route('home') }}#home" class="hover:text-brand-700 transition">Trang Chủ</a>
                <a href="{{ route('home') }}#about" class="hover:text-brand-700 transition">Về Chúng Tôi</a>
                <a href="{{ route('home') }}#database" class="hover:text-brand-700 transition">Cơ Sở Dữ Liệu</a>
                <a href="{{ route('home') }}#solutions" class="hover:text-brand-700 transition">Giải Pháp Hợp Tác</a>
                <a href="{{ route('home') }}#clients" class="hover:text-brand-700 transition">Khách Hàng</a>
                <a href="{{ route('avm.index') }}" class="text-brand-700 font-bold hover:underline flex items-center gap-1">
                    <i data-lucide="map-pin" class="w-4 h-4"></i> Tra Cứu AVM
                </a>
                <a href="{{ route('home') }}#contact" class="hover:text-brand-700 transition">Liên Hệ</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('avm.index') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-brand-700 text-brand-700 font-semibold text-sm hover:bg-brand-50 transition">
                    Demo Tra Cứu
                </a>
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-semibold text-sm shadow transition flex items-center gap-1.5">
                    <i data-lucide="shield" class="w-3.5 h-3.5 text-emerald-400"></i> Admin
                </a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950 text-white py-14 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-10">
                <div class="space-y-4 md:col-span-2">
                    <div class="text-2xl font-black">
                        R<span class="text-brand-700">★</span>te<span class="text-brand-700">Smart</span>
                    </div>
                    <p class="text-xs text-slate-400 max-w-md leading-relaxed">
                        Công ty thành viên Công ty Thẩm định giá Hoa Sen (Lotus VFI). Tiên phong xây dựng hạ tầng cơ sở dữ liệu giá lớn và mô hình định giá tự động (AVM) tại Việt Nam.
                    </p>
                    <div class="text-xs text-slate-400 space-y-1">
                        <div>Trụ sở: Tòa nhà Licogi 13, số 164 Khuất Duy Tiến, Thanh Xuân, Hà Nội</div>
                        <div>Hotline: <strong class="text-white">0853 293 333</strong> | Website: ratesmart.com.vn</div>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white mb-3 uppercase tracking-wider">Giải Pháp</h4>
                    <ul class="text-xs space-y-2 text-slate-400">
                        <li><a href="#" class="hover:text-white">Cho thuê dịch vụ SaaS</a></li>
                        <li><a href="#" class="hover:text-white">Private Cloud & Update Data</a></li>
                        <li><a href="#" class="hover:text-white">May đo hệ thống Core Banking</a></li>
                        <li><a href="{{ route('avm.index') }}" class="hover:text-white">Tra cứu định giá AVM</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white mb-3 uppercase tracking-wider">Về RateSmart</h4>
                    <ul class="text-xs space-y-2 text-slate-400">
                        <li><a href="#" class="hover:text-white">Hệ sinh thái Thẩm định giá Hoa Sen</a></li>
                        <li><a href="#" class="hover:text-white">Đội ngũ lãnh đạo</a></li>
                        <li><a href="#" class="hover:text-white">Quy trình chuẩn hóa 5 bước</a></li>
                        <li><a href="{{ route('admin.dashboard') }}" class="text-emerald-400 hover:underline">Đăng nhập Admin CMS</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-900 text-xs text-slate-500 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>© 2026 RATESMART VIETNAM COMPANY LIMITED. Bảo lưu mọi quyền.</div>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-slate-300">Bảo mật thông tin</a>
                    <a href="#" class="hover:text-slate-300">Điều khoản dịch vụ</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
    @yield('scripts')
</body>
</html>
