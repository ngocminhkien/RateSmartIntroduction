<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RateSmart Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#008037',
                            800: '#00662c',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 flex h-screen overflow-hidden">

    <!-- Admin Sidebar -->
    <aside class="w-64 bg-slate-950 border-r border-slate-800 p-5 flex flex-col justify-between shrink-0">
        <div class="space-y-6">
            <div class="flex items-center gap-2">
                <div class="w-9 h-9 rounded-xl bg-brand-700 flex items-center justify-center text-white font-black text-sm">
                    RS
                </div>
                <div>
                    <div class="font-bold text-white text-base">RateSmart Admin</div>
                    <div class="text-[10px] text-emerald-400 font-mono">Laravel 11 • MySQL 8</div>
                </div>
            </div>

            <nav class="space-y-1 text-xs font-semibold">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-brand-700 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Tổng Quan (Dashboard)
                </a>
                <a href="{{ route('admin.properties.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.properties.*') ? 'bg-brand-700 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                    <i data-lucide="database" class="w-4 h-4"></i> Dữ Liệu Giá & BĐS
                </a>
                <a href="{{ route('admin.leads.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.leads.*') ? 'bg-brand-700 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                    <i data-lucide="inbox" class="w-4 h-4"></i> Yêu Cầu Liên Hệ & Báo Giá
                </a>
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-900">
                    <i data-lucide="external-link" class="w-4 h-4"></i> Xem Website Ngoài
                </a>
            </nav>
        </div>

        <div class="pt-4 border-t border-slate-800 space-y-2">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-slate-800 text-xs font-bold flex items-center justify-center text-emerald-400">
                    VQ
                </div>
                <div class="text-xs">
                    <div class="font-bold text-white">Vũ Văn Quân</div>
                    <div class="text-[10px] text-slate-400">CEO & Super Admin</div>
                </div>
            </div>
            <a href="{{ route('home') }}" class="w-full py-2 bg-slate-900 hover:bg-slate-800 text-slate-300 text-xs rounded-lg font-medium flex items-center justify-center gap-1.5 mt-2">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Về Website
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-8">
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-900/60 border border-emerald-500/50 text-emerald-200 text-xs font-bold flex items-center gap-2">
                <i data-lucide="check-circle" class="w-4 h-4"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        lucide.createIcons();
    </script>
    @yield('scripts')
</body>
</html>
