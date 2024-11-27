<?php

use App\Models\Department;
use App\Models\WineRoad;
use App\Models\TravelCategory;
use App\Models\VineyardCategory;
use App\Models\ParticipantCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Concerns\Themes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(WineRoad::class)->constrained();
            $table->foreignIdFor(Department::class)->constrained();
            $table->foreignIdFor(Themes::class)->constrained();
            $table->foreignIdFor(TravelCategory::class)->constrained();
            $table->foreignIdFor(VineyardCategory::class)->constrained();
            $table->foreignIdFor(ParticipantCategory::class)->constrained();

            $table->string('title');
            $table->text('description');
            $table->double('price_per_person');
            $table->double('days');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
