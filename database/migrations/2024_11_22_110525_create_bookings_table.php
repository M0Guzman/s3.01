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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Travel::class)->constrained();
            $table->integer('adult_count')->default(1);
            $table->integer('children_count')->default(0);
            $table->integer('room_count')->default(1);
            $table->date('start_date')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
