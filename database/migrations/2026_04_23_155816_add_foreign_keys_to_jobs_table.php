<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\City;
use App\Models\Sector;
use App\Models\Address;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->foreignIdFor(City::class)->nullable()->constrained();
            $table->foreignIdFor(Sector::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Address::class)->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(City::class);
            $table->dropConstrainedForeignIdFor(Sector::class);
            $table->dropConstrainedForeignIdFor(Address::class);
        });
    }
};
