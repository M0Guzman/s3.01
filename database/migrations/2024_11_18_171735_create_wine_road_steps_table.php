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
            $gps = $table->foreignIdFor(GPSCoordinate::class);
            $gps->constrained();
            $gps->nullable();
            $address = $table->foreignIdFor(Address::class);
            $address->constrained();
            $address->nullable();
            $table->foreignIdFor(WineRoad::class)->constrained();
            $table->string('name')->index();
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
