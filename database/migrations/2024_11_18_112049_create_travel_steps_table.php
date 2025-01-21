<?php

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
        Schema::create('travel_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Travel::class)->constrained();
            $table->string('title')->index();
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_steps');
    }
};
