@extends('layouts.app')

@section('title', 'Trải Nghiệm Định Giá AVM - RateSmart')

@section('styles')
<style>
    #map { height: 580px; width: 100%; border-radius: 16px; z-index: 10; }
</style>
@endsection

@section('content')
<div class="bg-slate-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header bar -->
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200 mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-brand-50 text-brand-700 font-bold text-xs">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Mô Hình Định Giá Tự Động (Automated Valuation Model - AVM)
                </span>
                <h1 class="text-2xl font-black text-slate-900 mt-1">Tra Cứu Nhanh Giá Trị Bất Động Sản</h1>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="document.getElementById('modal-criteria').classList.remove('hidden')" class="px-4 py-2 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold flex items-center gap-1.5">
                    <i data-lucide="sliders" class="w-4 h-4 text-brand-700"></i> Chuẩn Mực Thẩm Định
                </button>
                <button onclick="alert('Đang xuất phiếu thẩm định PDF/A...') " class="px-4 py-2 rounded-xl bg-brand-700 hover:bg-brand-800 text-white text-xs font-bold flex items-center gap-1.5 shadow">
                    <i data-lucide="printer" class="w-4 h-4"></i> Xuất Phiếu Tra Cứu
                </button>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-6">
            
            <!-- Left Panel -->
            <div class="lg:col-span-5 space-y-5">
                
                <!-- Search box -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Địa chỉ tài sản thẩm định</label>
                    <div class="flex gap-2">
                        <input id="input-address" type="text" value="{{ $targetProperty->address ?? 'Số 631 QL21B, Bích Hoà, Thanh Oai, Hà Nội' }}" class="w-full text-xs font-semibold px-3.5 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:border-brand-700">
                        <button onclick="runAVMCalculation()" class="px-4 py-2.5 bg-brand-700 hover:bg-brand-800 text-white rounded-xl text-xs font-bold shrink-0 shadow">
                            Tính Giá
                        </button>
                    </div>
                </div>

                <!-- Valuation Card -->
                <div class="bg-gradient-to-br from-brand-700 to-emerald-800 text-white p-5 rounded-2xl shadow-lg space-y-4">
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-bold text-emerald-200 uppercase tracking-wider">Kết Quả Tra Cứu Rút Gọn</span>
                        <span class="bg-white/20 px-2 py-0.5 rounded text-[11px] font-mono">Độ tin cậy: 94.8%</span>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-[11px] text-emerald-100">Đơn giá ước tính:</div>
                            <div class="text-2xl font-black text-white" id="val-unit">101.584.000 <span class="text-xs font-normal">đ/m²</span></div>
                        </div>
                        <div>
                            <div class="text-[11px] text-emerald-100">Tổng giá trị (96m²):</div>
                            <div class="text-2xl font-black text-amber-300" id="val-total">9.752.064.000 <span class="text-xs font-normal text-white">đ</span></div>
                        </div>
                    </div>

                    <div class="text-[11px] text-emerald-100/90 pt-3 border-t border-white/20 flex justify-between">
                        <span>Cán bộ: <strong>Vũ Văn Quân (Admin)</strong></span>
                        <span>Ngày nhận: <strong>{{ date('d/m/Y') }}</strong></span>
                    </div>
                </div>

                <!-- Comparables -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider flex items-center gap-1.5">
                            <i data-lucide="layers" class="w-4 h-4 text-brand-700"></i> 3 Tài Sản So Sánh Tương Đồng
                        </h3>
                        <span class="text-[11px] text-slate-500">Đối chiếu đa nguồn</span>
                    </div>

                    <div class="space-y-3">
                        @foreach($comparables as $idx => $comp)
                            <div class="p-3 rounded-xl border border-slate-200 hover:border-brand-500 bg-slate-50/50 hover:bg-brand-50/30 transition cursor-pointer" onclick="zoomToMarker({{ $comp->latitude }}, {{ $comp->longitude }}, '{{ $comp->address }}')">
                                <div class="flex items-start justify-between">
                                    <span class="font-bold text-slate-900 text-xs">#{{ $idx + 1 }}. {{ $comp->address }}</span>
                                    <span class="text-xs font-black text-brand-700">{{ number_format($comp->unit_price, 0, ',', '.') }} đ/m²</span>
                                </div>
                                <div class="text-[11px] text-slate-500 mt-1">
                                    DT: {{ $comp->area_m2 }}m² • Mặt tiền: {{ $comp->frontage_m }}m • Vị trí: {{ $comp->road_position }}
                                </div>
                                <div class="text-[10px] text-slate-400 mt-1 flex justify-between">
                                    <span>Nguồn: {{ $comp->verified_by ?? 'Thẩm định giá' }}</span>
                                    <span>Thời điểm: {{ $comp->valuation_date ? $comp->valuation_date->format('d/m/Y') : '2025' }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Right Panel: Map -->
            <div class="lg:col-span-7">
                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm relative">
                    <div id="map"></div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Modal Criteria -->
<div id="modal-criteria" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-xl w-full p-6 shadow-2xl space-y-4">
        <div class="flex justify-between items-center pb-3 border-b border-slate-200">
            <h3 class="text-base font-bold text-slate-900">Chuẩn Mực Thẩm Định Giá (Slide 14)</h3>
            <button onclick="document.getElementById('modal-criteria').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
        </div>
        <div class="grid grid-cols-2 gap-4 text-xs">
            <div>
                <label class="block font-bold text-slate-700 mb-1">Diện tích (m²)</label>
                <input id="crit-area" type="number" value="96" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Mặt tiền (m)</label>
                <input id="crit-frontage" type="number" value="6" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Lộ giới đường (m)</label>
                <input id="crit-road" type="number" value="12" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Hình thửa đất</label>
                <select id="crit-shape" class="w-full px-3 py-2 border rounded-lg">
                    <option value="rectangle" selected>Hình chữ nhật</option>
                    <option value="wide_back">Nở hậu (+5%)</option>
                    <option value="narrow_back">Thóp hậu (-8%)</option>
                </select>
            </div>
        </div>
        <div class="pt-4 border-t border-slate-200 flex justify-end gap-2">
            <button onclick="document.getElementById('modal-criteria').classList.add('hidden')" class="px-4 py-2 border rounded-xl text-xs font-bold">Đóng</button>
            <button onclick="applyCriteria()" class="px-4 py-2 bg-brand-700 text-white rounded-xl text-xs font-bold">Áp Dụng</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    let mapInstance = null;

    document.addEventListener('DOMContentLoaded', function () {
        const center = [20.907974, 105.761254];
        mapInstance = L.map('map').setView(center, 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'RateSmart AVM © OpenStreetMap'
        }).addTo(mapInstance);

        // Target Property
        L.marker(center).addTo(mapInstance)
            .bindPopup('<b>631 QL21B, Bích Hòa, Thanh Oai</b><br>Định giá: <b>101.584.000 đ/m²</b>')
            .openPopup();

        // Comparables
        L.marker([20.910608, 105.760542]).addTo(mapInstance).bindPopup('<b>TSSS 1: Kim Bài</b><br>120.000.000 đ/m²');
        L.marker([20.906409, 105.762258]).addTo(mapInstance).bindPopup('<b>TSSS 2: Kỳ Thủy</b><br>105.000.000 đ/m²');
        L.marker([20.910194, 105.760660]).addTo(mapInstance).bindPopup('<b>TSSS 3: Kim Bài Đoạn 2</b><br>100.000.000 đ/m²');
    });

    function zoomToMarker(lat, lng, title) {
        if (mapInstance) mapInstance.flyTo([lat, lng], 16);
    }

    function applyCriteria() {
        document.getElementById('modal-criteria').classList.add('hidden');
        runAVMCalculation();
    }

    function runAVMCalculation() {
        const area = document.getElementById('crit-area').value || 96;
        const shape = document.getElementById('crit-shape').value || 'rectangle';
        const address = document.getElementById('input-address').value;

        fetch('{{ route('api.avm.calculate') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                address: address,
                area_m2: area,
                shape: shape
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById('val-unit').innerHTML = `${data.estimated_unit_price_formatted}`;
                document.getElementById('val-total').innerHTML = `${data.total_estimated_value_formatted}`;
            }
        });
    }
</script>
@endsection
