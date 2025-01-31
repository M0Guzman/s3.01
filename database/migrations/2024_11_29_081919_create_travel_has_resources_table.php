<?php

use App\Models\Resource;
use App\Models\Travel;
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
        Schema::create('travel_has_resources', function (Blueprint $table) {
            $travel = $table->foreignIdFor(Travel::class);
            $travel->constrained();

            $resource = $table->foreignIdFor(Resource::class);
            $resource->constrained();

            $table->primary([$travel->name, $resource->name]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_has_resources');
    }
};
