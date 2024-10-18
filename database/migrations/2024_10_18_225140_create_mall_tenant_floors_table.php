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
        Schema::create('mall_tenant_floors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mall_id')->nullable()->index('mtf_m_id');
            $table->foreignId('mall_tenant_id')->nullable()->index('mtf_mt_id');
            $table->foreignId('mall_floor_id')->nullable()->index('mtf_mf_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mall_tenant_floors');
    }
};
