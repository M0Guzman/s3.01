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

            $wineroad = $table->foreignIdFor(WineRoad::class);
            $wineroad->constrained();
            $wineroad->nullable();

            $departement = $table->foreignIdFor(Department::class);
            $departement->constrained();
            $departement->nullable();

            //$table->foreignIdFor(Theme::class)->constrained();
            $category_travel = $table->foreignIdFor(TravelCategory::class);
            $category_travel->constrained();
            $category_travel->nullable();

            $vineyardCategory = $table->foreignIdFor(VineyardCategory::class);
            $vineyardCategory->constrained();
            $vineyardCategory->nullable();

            $participant_category = $table->foreignIdFor(ParticipantCategory::class);
            $participant_category->constrained();
            $participant_category->nullable();


            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->double('price_per_person')->nullable();
            $table->double('days');
            $table->string('state_travel')->constraint();
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
