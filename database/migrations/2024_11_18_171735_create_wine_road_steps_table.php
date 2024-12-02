<?php

use App\Models\Address;
use App\Models\GPSCoordinate;
use App\Models\WineRoad;
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
        Schema::create('wine_road_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GPSCoordinate::class)->constrained();
            $table->foreignIdFor(Address::class)->constrained();
            $table->foreignIdFor(WineRoad::class)->constrained();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wine_road_steps');
    }
};
