<?php

use App\Models\Experience;
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
        Schema::table('Jobs', function (Blueprint $table) {
            $table->foreignIdFor(Experience::class)->constrained()->after('salary')->change();
            $table->string('education')->after('feature');
            $table->longText('description')->after('schedule');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Jobs', function (Blueprint $table) {
            $table->dropConstrainedForeignId('experience_id');
            $table->dropColumn(['education','description']);
        });
    }
};
