<?php

use App\Models\Activity;
use App\Models\TravelStep;
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
        Schema::create('travel_step_activities', function (Blueprint $table) {
            $ts = $table->foreignIdFor(TravelStep::class);
            $a = $table->foreignIdFor(Activity::class);

            $ts->constrained();
            $a->constrained();

            $table->primary([$ts->name, $a->name]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_step_activities');
    }
};
