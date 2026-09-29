@extends('layouts.admin')

@section('title', 'Yêu Cầu Hợp Tác & Báo Giá - RateSmart Admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-black text-white">Yêu Cầu Tư Vấn & Hợp Tác Ngân Hàng</h1>
            <p class="text-slate-400 text-xs mt-1">Danh sách đăng ký tư vấn giải pháp dữ liệu giá & AVM</p>
        </div>
    </div>

    <!-- Leads Table -->
    <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="text-slate-500 border-b border-slate-800 uppercase text-[10px]">
                    <tr>
                        <th class="pb-3">Họ Tên / Đơn Vị</th>
                        <th class="pb-3">Số Điện Thoại</th>
                        <th class="pb-3">Email</th>
                        <th class="pb-3">Gói Quan Tâm</th>
                        <th class="pb-3">Nội Dung Yêu Cầu</th>
                        <th class="pb-3">Thời Gian</th>
                        <th class="pb-3">Trạng Thái</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($leads as $lead)
                        <tr>
                            <td class="py-3.5">
                                <div class="font-bold text-white">{{ $lead->full_name }}</div>
                                <div class="text-[10px] text-slate-400">{{ $lead->company_name }}</div>
                            </td>
                            <td class="py-3.5">{{ $lead->phone }}</td>
                            <td class="py-3.5">{{ $lead->email }}</td>
                            <td class="py-3.5 text-emerald-400 font-bold">{{ $lead->interested_package ?? 'Tư vấn chung' }}</td>
                            <td class="py-3.5 max-w-xs truncate text-slate-400">{{ $lead->message ?? 'Không có' }}</td>
                            <td class="py-3.5 text-slate-400">{{ $lead->created_at->format('H:i d/m/Y') }}</td>
                            <td class="py-3.5">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/20 text-emerald-400 uppercase">
                                    {{ $lead->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-6 text-center text-slate-500">Chưa có yêu cầu liên hệ nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
            <div class="mt-4 pt-4 border-t border-slate-800">
                {{ $leads->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
