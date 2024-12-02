<?php

use App\Models\Booking;
use App\Models\Order;
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
        Schema::create('booking_orders', function (Blueprint $table) {
            $order = $table->foreignIdFor(Order::class);
            $booking = $table->foreignIdFor(Booking::class);

            $order->constrained();
            $booking->constrained();

            $table->primary([ $order->name, $booking->name ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_orders');
    }
};
