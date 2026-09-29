<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role_title'); // CEO, COO, CTO
            $table->string('organization')->nullable();
            $table->text('bio');
            $table->integer('experience_years')->default(20);
            $table->string('avatar_url')->nullable();
            $table->string('badge_color')->default('emerald');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('bank'); // bank, fund, corporate
            $table->string('logo_url')->nullable();
            $table->string('color_class')->default('text-slate-700');
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('team_members');
    }
};
