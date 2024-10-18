<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mall_floors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mall_id')->nullable()->index('mf_m_id');
            $table->string('name')->nullable()->index('mf_nm');
            $table->string('image')->nullable();
            $table->string('floor_plan')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mall_floors');
    }
};
