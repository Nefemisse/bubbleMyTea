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
        Schema::create('bubbleTeas_commands', function (Blueprint $table) {
            $table->integer('command_id')->index('command_id');
            $table->integer('bubbleTea_id')->index('bubbleTea_id');
            $table->integer('sugar_quantity');
            $table->integer('id', true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bubbleTeas_commands');
    }
};
