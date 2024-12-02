<?php

use App\Models\Department;
use App\Models\Theme;
use App\Models\WineRoad;
use App\Models\TravelCategory;
use App\Models\VineyardCategory;
use App\Models\ParticipantCategory;
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
        Schema::create('travel', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(WineRoad::class)->constrained();
            $table->foreignIdFor(Department::class)->constrained();
            $table->foreignIdFor(Theme::class)->constrained();
            $table->foreignIdFor(TravelCategory::class)->constrained();
            $table->foreignIdFor(VineyardCategory::class)->constrained();
            $table->foreignIdFor(ParticipantCategory::class)->constrained();

            $table->string('department_zip')->index();
            $table->foreign('department_zip')->references('zip')->on('departments')->constrained();

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
        Schema::dropIfExists('travel');
    }
};
