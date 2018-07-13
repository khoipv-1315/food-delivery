<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignkeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discount_foods', function (Blueprint $table) {
            $table->dropForeign('discount_foods_food_id_foreign');
            $table->dropColumn('food_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discount_foods', function (Blueprint $table) {
            $table->unsignedInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
        });
    }
}
