<?php

use App\Models\Address;
use App\Models\Coupon;
use App\Models\PaymentType;
use App\Models\Resource;
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
            $table->foreignIdFor(Resource::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Coupon::class)->constrained();
            $table->foreignIdFor(Address::class)->constrained();
            $table->text('message');
            $table->string('state', 10);
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
