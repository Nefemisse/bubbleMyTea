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
        Schema::create('bubbleTea_command_popping', function (Blueprint $table) {
            $table->integer('popping_id')->index('popping_id');
            $table->integer('bubbleTea_command_bubbletea_id')->index('bubbleTea_command_bubbletea_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bubbleTea_command_popping');
    }
};
