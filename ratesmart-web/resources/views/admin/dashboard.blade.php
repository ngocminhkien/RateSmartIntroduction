@extends('layouts.admin')

@section('title', 'RateSmart Dashboard - Quản Trị Hệ Thống')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-black text-white">Tổng Quan Hệ Thống RateSmart</h1>
            <p class="text-slate-400 text-xs mt-1">Cơ sở dữ liệu giá & Hệ thống định giá tự động AVM</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.properties.index') }}" class="px-3.5 py-2 bg-brand-700 hover:bg-brand-800 text-white rounded-xl text-xs font-bold flex items-center gap-1.5 shadow">
                <i data-lucide="plus" class="w-4 h-4"></i> Thêm Dữ Liệu Giá
            </a>
        </div>
    </div>

    <!-- 4 Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-slate-950 p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between text-slate-400 mb-2">
                <span class="text-xs font-semibold">Tổng Bản Ghi Dữ Liệu Giá</span>
                <i data-lucide="database" class="w-4 h-4 text-emerald-400"></i>
            </div>
            <div class="text-3xl font-black text-white">{{ number_format($stats['total_properties']) }}</div>
            <div class="text-[11px] text-emerald-400 mt-2 font-medium">{{ $stats['verified_properties'] }} bản ghi đã xác thực</div>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between text-slate-400 mb-2">
                <span class="text-xs font-semibold">Yêu Cầu Tư Vấn / Báo Giá</span>
                <i data-lucide="inbox" class="w-4 h-4 text-brand-500"></i>
            </div>
            <div class="text-3xl font-black text-white">{{ $stats['total_leads'] }}</div>
            <div class="text-[11px] text-amber-400 mt-2 font-medium">{{ $stats['new_leads'] }} yêu cầu mới chờ xử lý</div>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between text-slate-400 mb-2">
                <span class="text-xs font-semibold">Bài Viết & Báo Cáo</span>
                <i data-lucide="file-text" class="w-4 h-4 text-blue-400"></i>
            </div>
            <div class="text-3xl font-black text-white">{{ $stats['total_posts'] }}</div>
            <div class="text-[11px] text-blue-400 mt-2 font-medium">Báo cáo thị trường & Pháp lý</div>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between text-slate-400 mb-2">
                <span class="text-xs font-semibold">Gói Dịch Vụ Doanh Nghiệp</span>
                <i data-lucide="layers" class="w-4 h-4 text-purple-400"></i>
            </div>
            <div class="text-3xl font-black text-white">{{ $stats['services_count'] }}</div>
            <div class="text-[11px] text-purple-400 mt-2 font-medium">SaaS • Private Cloud • Custom Dev</div>
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800">
        <h3 class="text-sm font-bold text-white mb-4">Lượt Truy Vấn Tra Cứu AVM Theo Tháng</h3>
        <canvas id="dashChart" height="90"></canvas>
    </div>

    <!-- Recent Leads Table -->
    <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-bold text-white">Yêu Cầu Hợp Tác Ngân Hàng Mới Nhất</h3>
            <a href="{{ route('admin.leads.index') }}" class="text-xs text-brand-500 font-bold hover:underline">Xem tất cả →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="text-slate-500 border-b border-slate-800 uppercase text-[10px]">
                    <tr>
                        <th class="pb-3">Họ Tên / Đơn Vị</th>
                        <th class="pb-3">Số Điện Thoại</th>
                        <th class="pb-3">Email</th>
                        <th class="pb-3">Gói Quan Tâm</th>
                        <th class="pb-3">Thời Gian</th>
                        <th class="pb-3">Trạng Thái</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($recentLeads as $lead)
                        <tr>
                            <td class="py-3 font-semibold text-white">{{ $lead->full_name }} ({{ $lead->company_name }})</td>
                            <td class="py-3">{{ $lead->phone }}</td>
                            <td class="py-3">{{ $lead->email }}</td>
                            <td class="py-3 text-emerald-400">{{ $lead->interested_package }}</td>
                            <td class="py-3 text-slate-400">{{ $lead->created_at->diffForHumans() }}</td>
                            <td class="py-3"><span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-bold uppercase text-[10px]">{{ $lead->status }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-slate-500">Chưa có yêu cầu nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const ctx = document.getElementById('dashChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9'],
                datasets: [{
                    label: 'Lượt tra cứu AVM',
                    data: [2500, 3100, 4200, 4900, 5600, 6400, 7100, 8200, 9400],
                    backgroundColor: '#008037',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: '#94a3b8' } },
                    y: { grid: { color: '#1e293b' }, ticks: { color: '#94a3b8' } }
                }
            }
        });
    }
</script>
@endsection
