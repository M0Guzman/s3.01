<?php

use App\Models\Partner;
use App\Models\OtherPartnerActivityType;
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
        Schema::create('other_partners', function (Blueprint $table) {
            $partner = $table->foreignIdFor(Partner::class);
            $partner->constrained();
            $partner->primary();
            $table->foreignIdFor(OtherPartnerActivityType::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_partners');
    }
};
