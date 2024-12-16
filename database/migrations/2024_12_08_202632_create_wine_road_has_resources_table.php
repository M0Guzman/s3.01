<?php

use App\Models\Resource;
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
        Schema::create('wine_road_has_resources', function (Blueprint $table) {
            $wine_road = $table->foreignIdFor(WineRoad::class);
            $wine_road->constrained();

            $resource = $table->foreignIdFor(Resource::class);
            $resource->constrained();

            $table->primary([$wine_road->name, $resource->name]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wine_road_has_resources');
    }
};

