<?php

use App\Models\Partner;
use App\Models\SamplingType;
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
        Schema::create('wine_cellars', function (Blueprint $table) {
            $partner = $table->foreignIdFor(Partner::class);
            $partner->constrained();
            $partner->primary();
            $table->foreignIdFor(SamplingType::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wine_cellars');
    }
};
