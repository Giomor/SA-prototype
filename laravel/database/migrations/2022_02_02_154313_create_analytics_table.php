<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('iot_id')
                ->foreign('iot_id')
                ->references('id')->on('iot')
                ->onDelete('cascade');
            $table->integer('artwork_id')
                ->foreign('artwork_id')
                ->references('id')->on('artworks')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analytics');
    }
}
