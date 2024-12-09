<?php

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
            $table->id(); // clé primaire
            $table->foreignId('wine_road_id')->constrained('wine_roads')->onDelete('cascade'); // clé étrangère pour wine_roads
            $table->foreignId('resource_id')->constrained('resources')->onDelete('cascade'); // clé étrangère pour resources
            $table->timestamps(); // pour les colonnes created_at et updated_at
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

