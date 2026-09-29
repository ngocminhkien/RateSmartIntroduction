<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_data', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('province')->default('Hà Nội');
            $table->string('district')->nullable();
            $table->string('ward')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('property_type')->default('residential_land'); // residential_land, apartment, commercial, movable
            $table->string('data_source')->default('market_comparable'); // government, hoasen_appraisal, market_comparable, bank_internal
            $table->decimal('area_m2', 10, 2);
            $table->decimal('frontage_m', 8, 2)->nullable();
            $table->decimal('road_width_m', 8, 2)->nullable();
            $table->string('road_position')->default('VT1'); // VT1, VT2, VT3, VT4
            $table->string('shape')->default('rectangle'); // rectangle, square, wide_back, narrow_back, chamfered, polygon
            $table->string('business_advantage')->default('good'); // good, fair, medium, none
            $table->decimal('unit_price', 15, 2); // dong / m2
            $table->decimal('total_value', 18, 2); // dong
            $table->date('valuation_date')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('source_note')->nullable();
            $table->string('status')->default('verified'); // verified, unverified, draft
            $table->timestamps();

            // Indexes for fast geo & spatial search
            $table->index(['latitude', 'longitude']);
            $table->index('province');
            $table->index('data_source');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_data');
    }
};
