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
        Schema::create('malls', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->index('m_nm');
            $table->string('address')->nullable();
            $table->string('city', 150)->nullable();
            $table->string('state', 150)->nullable();
            $table->string('country', 150)->nullable();
            $table->string('zipcode', 50)->nullable();
            $table->string('contact_info')->nullable();
            $table->text('operational_info')->nullable();
            $table->string('image')->nullable();
            $table->string('latitude', 50)->nullable();
            $table->string('longitude', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('malls');
    }
};
