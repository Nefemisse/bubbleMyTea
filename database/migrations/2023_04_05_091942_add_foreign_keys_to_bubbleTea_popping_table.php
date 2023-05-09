<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bubbleTea_popping', function (Blueprint $table) {
            $table->foreign(['bubbleTea_id'], 'bubbleTea_popping_ibfk_1')->references(['id'])->on('bubbleTea');
            $table->foreign(['popping_id'], 'bubbleTea_popping_ibfk_2')->references(['id'])->on('popping');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bubbleTea_popping', function (Blueprint $table) {
            $table->dropForeign('bubbleTea_popping_ibfk_1');
            $table->dropForeign('bubbleTea_popping_ibfk_2');
        });
    }
};
