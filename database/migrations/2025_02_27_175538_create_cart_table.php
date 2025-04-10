<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['movie', 'snack']);
            $table->foreignId('movie_id')->nullable()->constrained('movies');
            $table->foreignId('snack_id')->nullable()->constrained('snacks');
            $table->integer('darabszam')->default(1);
            $table->decimal('ar', 10, 2);
            $table->timestamps();
        });

    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
