<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeatRowAndColumnToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->integer('seat_row')->nullable();
            $table->integer('seat_column')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->dropColumn('seat_row');
            $table->dropColumn('seat_column');
        });
    }
}

