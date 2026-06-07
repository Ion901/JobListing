<?php

use App\Models\Address;
use App\Models\City;
use App\Models\Employer;
use App\Models\Sector;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
 * Run the migrations
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employer::class)->constrained();
            $table->string('title');
            $table->decimal('salary',10,2)->default(0);
            $table->string('location');
            $table->string('schedule')->default('Full Time');
            $table->string('url')->nullable();// sa-l fac nullable
            $table->boolean('feature')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
