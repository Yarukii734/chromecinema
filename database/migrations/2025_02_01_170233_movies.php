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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('category')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('filmnev');
            $table->string('filmleiras');
            $table->string('korhatar');
            $table->integer('jegyar');
            $table->string('vetitesidatum');
            $table->string('vetitesidopont');
            $table->string('idotartam');
            $table->string('filmkep');
            $table->integer('darabszam');
            $table->boolean('foglalhato')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
