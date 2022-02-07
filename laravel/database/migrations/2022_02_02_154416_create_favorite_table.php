<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('user_email')
                ->foreign('user_email')
                ->references('email')->on('users')
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
        Schema::dropIfExists('favorite');
    }
}
