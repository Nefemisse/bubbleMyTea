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
        Schema::table('bubbleTea_command_popping', function (Blueprint $table) {
            $table->foreign(['popping_id'], 'bubbleTea_command_popping_ibfk_1')->references(['id'])->on('popping');
            $table->foreign(['bubbleTea_command_bubbletea_id'], 'bubbleTea_command_popping_ibfk_2')->references(['id'])->on('bubbleTea_command');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bubbleTea_command_popping', function (Blueprint $table) {
            $table->dropForeign('bubbleTea_command_popping_ibfk_1');
            $table->dropForeign('bubbleTea_command_popping_ibfk_2');
        });
    }
};
