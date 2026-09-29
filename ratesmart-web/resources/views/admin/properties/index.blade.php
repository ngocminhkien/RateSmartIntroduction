@extends('layouts.admin')

@section('title', 'Quản Lý Dữ Liệu Giá - RateSmart Admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-black text-white">Cơ Sở Dữ Liệu Giá BĐS</h1>
            <p class="text-slate-400 text-xs mt-1">Quản lý kho dữ liệu 63 tỉnh thành & tài sản thẩm định</p>
        </div>
        <div class="flex gap-2">
            <button onclick="alert('Tính năng Import CSV đang sẵn sàng!')" class="px-3.5 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-xl text-xs font-bold flex items-center gap-1.5 border border-slate-700">
                <i data-lucide="upload" class="w-4 h-4"></i> Import CSV
            </button>
        </div>
    </div>

    <!-- Filter form -->
    <div class="bg-slate-950 p-4 rounded-2xl border border-slate-800">
        <form action="{{ route('admin.properties.index') }}" method="GET" class="grid sm:grid-cols-4 gap-3 text-xs">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm địa chỉ..." class="px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-white focus:outline-none focus:border-brand-500">
            <select name="data_source" class="px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-white focus:outline-none focus:border-brand-500">
                <option value="">-- Tất cả nguồn giá --</option>
                <option value="hoasen_appraisal" {{ request('data_source') == 'hoasen_appraisal' ? 'selected' : '' }}>Thẩm định giá Hoa Sen</option>
                <option value="market_comparable" {{ request('data_source') == 'market_comparable' ? 'selected' : '' }}>Tài sản so sánh thị trường</option>
                <option value="government" {{ request('data_source') == 'government' ? 'selected' : '' }}>Giá Nhà nước</option>
            </select>
            <select name="province" class="px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-white focus:outline-none focus:border-brand-500">
                <option value="">-- Tất cả tỉnh thành --</option>
                <option value="Hà Nội" selected>Hà Nội</option>
                <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                <option value="Đà Nẵng">Đà Nẵng</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-brand-700 hover:bg-brand-800 text-white font-bold rounded-xl flex items-center justify-center gap-1">
                <i data-lucide="filter" class="w-3.5 h-3.5"></i> Lọc Dữ Liệu
            </button>
        </form>
    </div>

    <!-- Properties Table -->
    <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="text-slate-500 border-b border-slate-800 uppercase text-[10px]">
                    <tr>
                        <th class="pb-3">Địa Chỉ Chi Tiết</th>
                        <th class="pb-3">Nguồn Dữ Liệu</th>
                        <th class="pb-3">Diện Tích</th>
                        <th class="pb-3">Đơn Giá (đ/m²)</th>
                        <th class="pb-3">Tổng Giá Trị</th>
                        <th class="pb-3">Trạng Thái</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($properties as $prop)
                        <tr>
                            <td class="py-3.5">
                                <div class="font-bold text-white">{{ $prop->address }}</div>
                                <div class="text-[10px] text-slate-500">{{ $prop->ward }}, {{ $prop->district }}, {{ $prop->province }} • {{ $prop->road_position }}</div>
                            </td>
                            <td class="py-3.5">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-brand-500/20 text-brand-400 uppercase">
                                    {{ str_replace('_', ' ', $prop->data_source) }}
                                </span>
                            </td>
                            <td class="py-3.5">{{ $prop->area_m2 }} m²</td>
                            <td class="py-3.5 font-bold text-emerald-400">{{ number_format($prop->unit_price, 0, ',', '.') }} đ</td>
                            <td class="py-3.5 font-bold text-amber-300">{{ number_format($prop->total_value, 0, ',', '.') }} đ</td>
                            <td class="py-3.5">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/20 text-emerald-400">
                                    {{ $prop->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-6 text-center text-slate-500">Chưa có dữ liệu nào phù hợp.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($properties->hasPages())
            <div class="mt-4 pt-4 border-t border-slate-800">
                {{ $properties->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
