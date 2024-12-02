<?php

use App\Models\CookingType;
use App\Models\Partner;
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
        Schema::create('restaurants', function (Blueprint $table) {
            $partner = $table->foreignIdFor(Partner::class);
            $partner->constrained();
            $partner->primary();
            $table->foreignIdFor(CookingType::class)->constrained();
            $table->integer('ranking');
            $table->string('speciality');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
