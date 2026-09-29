<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyData;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = PropertyData::query();

        if ($request->filled('province')) {
            $query->where('province', $request->province);
        }
        if ($request->filled('data_source')) {
            $query->where('data_source', $request->data_source);
        }
        if ($request->filled('search')) {
            $query->where('address', 'like', '%' . $request->search . '%');
        }

        $properties = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:100',
            'district' => 'nullable|string|max:100',
            'ward' => 'nullable|string|max:100',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'property_type' => 'required|string',
            'data_source' => 'required|string',
            'area_m2' => 'required|numeric|min:0.1',
            'frontage_m' => 'nullable|numeric',
            'road_width_m' => 'nullable|numeric',
            'road_position' => 'required|string',
            'shape' => 'required|string',
            'business_advantage' => 'required|string',
            'unit_price' => 'required|numeric|min:0',
            'valuation_date' => 'nullable|date',
            'verified_by' => 'nullable|string',
            'source_note' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $validated['total_value'] = $validated['unit_price'] * $validated['area_m2'];

        PropertyData::create($validated);

        return redirect()->route('admin.properties.index')->with('success', 'Thêm mới bản ghi dữ liệu giá thành công!');
    }

    public function edit(PropertyData $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, PropertyData $property)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:100',
            'district' => 'nullable|string|max:100',
            'ward' => 'nullable|string|max:100',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'property_type' => 'required|string',
            'data_source' => 'required|string',
            'area_m2' => 'required|numeric|min:0.1',
            'frontage_m' => 'nullable|numeric',
            'road_width_m' => 'nullable|numeric',
            'road_position' => 'required|string',
            'shape' => 'required|string',
            'business_advantage' => 'required|string',
            'unit_price' => 'required|numeric|min:0',
            'valuation_date' => 'nullable|date',
            'verified_by' => 'nullable|string',
            'source_note' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $validated['total_value'] = $validated['unit_price'] * $validated['area_m2'];

        $property->update($validated);

        return redirect()->route('admin.properties.index')->with('success', 'Cập nhật bản ghi thành công!');
    }

    public function destroy(PropertyData $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Đã xóa bản ghi dữ liệu thành công!');
    }
}
