<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artwork',function(Blueprint $table){
            $table->unsignedBigInteger('iotDescrId');
            $table->foreign('iotDescrId')
            ->references('id')->on('iot')
            ->onDelete('cascade');
            $table->unsignedBigInteger('iotPosId');
            $table->foreign('iotPosId')
            ->references('id')->on('iot')
            ->onDelete('cascade');
        });
        Schema::table('iot',function(Blueprint $table){
            $table->foreign('heritage_site_id')
            ->references('id')->on('heritage_site')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
