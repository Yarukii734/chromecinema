<?php

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
        Schema::table('snack_categories', function (Blueprint $table) {
            // A film_szin mezőt a filmleiras után adjuk hozzá
            $table->text('color')->nullable()->after('kep');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('snack_categories', function (Blueprint $table) {
            //
        });
    }
};
