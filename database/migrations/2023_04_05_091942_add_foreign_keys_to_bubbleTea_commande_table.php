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
        Schema::table('bubbleTea_command', function (Blueprint $table) {
            $table->foreign(['command_id'], 'bubbleTea_command_ibfk_1')->references(['id'])->on('command');
            $table->foreign(['bubbleTea_id'], 'bubbleTea_command_ibfk_2')->references(['id'])->on('bubbleTea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bubbleTea_command', function (Blueprint $table) {
            $table->dropForeign('bubbleTea_command_ibfk_1');
            $table->dropForeign('bubbleTea_command_ibfk_2');
        });
    }
};
