<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('snack_categories', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('kep');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('snack_categories');
    }

};