<?php

use App\Models\ActivityType;
use App\Models\ActivityCategory;
use App\Models\Partner;
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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Partner::class)->constrained();
            $table->foreignIdFor(ActivityCategory::class)->constrained();
            $table->string('name');
            $table->text('description');
            $table->string('timeslot');
            $table->double('adult_price');
            $table->double('children_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
