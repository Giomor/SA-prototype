<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationArtworkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('association_artwork_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('artwork_id')
                ->foreign('artwork_id')
                ->references('id')->on('artwork')
                ->onDelete('cascade');
            $table->integer('tag_id')
                ->foreign('tag_id')
                ->references('id')->on('tag')
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
        Schema::dropIfExists('association_artwork_tag');
    }
}
