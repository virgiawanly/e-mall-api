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
        Schema::create('mall_tenant_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mall_tenant_id')->nullable()->index('mti_mt_id');
            $table->string('image')->nullable();
            $table->boolean('is_primary')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mall_tenant_images');
    }
};
