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
        Schema::create('mall_tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mall_id')->nullable()->index('mt_m_id');
            $table->foreignId('tenant_id')->nullable()->index('mt_t_id');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('contact_info')->nullable();
            $table->text('operational_info')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mall_tenants');
    }
};
