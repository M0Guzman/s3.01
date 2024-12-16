<?php

use App\Models\Partner;
use App\Models\Resource;
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
        Schema::create('partner_has_resources', function (Blueprint $table) {
            $partner = $table->foreignIdFor(Partner::class);
            $partner->constrained();

            $resource = $table->foreignIdFor(Resource::class);
            $resource->constrained();

            $table->primary([$partner->name, $resource->name]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_has_resources');
    }
};
