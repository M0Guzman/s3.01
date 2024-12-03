<?php

use App\Models\Address;
use App\Models\Coupon;
use App\Models\PaymentType;
use App\Models\Resource;
use App\Models\OrderState;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PaymentType::class)->constrained();
            $resource = $table->foreignIdFor(Resource::class);
            $resource->constrained();
            $resource->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $coupon = $table->foreignIdFor(Coupon::class);
            $coupon->constrained();
            $coupon->nullable();
            $table->foreignIdFor(Address::class)->constrained();
            $table->text('message')->nullable();
            $table->foreignIdFor(OrderState::class)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
