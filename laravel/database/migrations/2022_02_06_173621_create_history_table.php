<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('code',100);
            $table->date('date');
            $table->string('user_email')
                ->foreign('user_email')
                ->references('email')->on('users')
                ->onDelete('cascade');
            $table->integer('heritage_site_id')
                ->foreign('heritage_site')
                ->references('id')->on('heritage_site')
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
        Schema::dropIfExists('history');
    }
}
