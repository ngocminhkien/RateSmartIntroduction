<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('code')->unique(); // saas, private_cloud, custom_enterprise
            $table->string('badge')->nullable(); // Gợi ý phổ biến, v.v.
            $table->text('short_description');
            $table->longText('content')->nullable();
            $table->json('features')->nullable();
            $table->string('pricing_note')->nullable();
            $table->string('icon')->default('sparkles');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
