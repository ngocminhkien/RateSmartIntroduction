<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyData extends Model
{
    use HasFactory;

    protected $table = 'property_data';

    protected $fillable = [
        'address',
        'province',
        'district',
        'ward',
        'latitude',
        'longitude',
        'property_type', // residential_land, apartment, commercial, movable
        'data_source',   // government, hoasen_appraisal, market_comparable, bank_internal
        'area_m2',
        'frontage_m',
        'road_width_m',
        'road_position', // VT1, VT2, VT3, VT4
        'shape',         // rectangle, square, wide_back, narrow_back, chamfered, polygon
        'business_advantage', // good, fair, medium, none
        'unit_price',    // dong/m2
        'total_value',   // dong
        'valuation_date',
        'verified_by',
        'source_note',
        'status',        // verified, unverified, draft
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'area_m2' => 'float',
        'frontage_m' => 'float',
        'road_width_m' => 'float',
        'unit_price' => 'decimal:2',
        'total_value' => 'decimal:2',
        'valuation_date' => 'date',
    ];

    /**
     * Scope to find 3 nearest comparable properties
     */
    public function scopeFindComparables($query, $lat, $lng, $limit = 3)
    {
        // Haversine distance formula in KM
        $haversine = "(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude))))";
        
        return $query->selectRaw("*, {$haversine} AS distance_km", [$lat, $lng, $lat])
            ->where('status', 'verified')
            ->orderBy('distance_km', 'asc')
            ->limit($limit);
    }
}
