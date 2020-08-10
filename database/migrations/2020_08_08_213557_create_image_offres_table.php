<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_offres', function (Blueprint $table) {
            $table->id();
            $table->binary('image');
            $table->timestamps();
        });

        Schema::table('image_offres', function (Blueprint $table) {
            $table->unsignedBigInteger('offre_id');

            $table->foreign('offre_id')->references('id')
                ->on('offres')
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
        Schema::dropIfExists('image_offres');
    }
}
