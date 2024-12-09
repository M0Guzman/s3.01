<?php

use App\Models\Booking;
use App\Models\Order;
use App\Models\Travel;
use App\Models\User;
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
        Schema::create('offered_travel', function (Blueprint $table) {
            $booking = $table->foreignIdFor(Booking::class);
            $booking->constrained();
            $booking->primary();
            $table->string('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offered_travel');
    }
};
