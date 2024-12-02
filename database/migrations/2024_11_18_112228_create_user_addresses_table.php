<?php

use App\Models\Address;
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
        Schema::create('user_addresses', function (Blueprint $table) {
            $uid = $table->foreignIdFor(User::class);
            $addr = $table->foreignIdFor(Address::class);

            $uid->constrained();
            $addr->constrained();

            $table->primary([$uid->name, $addr->name]);
            // https://stackoverflow.com/questions/26437342/laravel-migration-best-way-to-add-foreign-key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
