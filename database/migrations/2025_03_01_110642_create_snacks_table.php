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
        Schema::create('snacks', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->integer('darabszam')->default(1);
            $table->foreignId('category_id')->constrained('snack_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->decimal('ar', 8);
            $table->string('kep');  // Kép URL vagy fájl
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snacks');
    }
};
