<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('adresse', 100);
            $table->float('superficie', 20, 5);
            $table->float('prix', 10, 2);
            $table->integer('capacite');
            $table->boolean('wifi');
            $table->boolean('lavage_ligne');
            $table->boolean('climatisation');
            $table->float('cordx', 30, 25);
            $table->float('cordy', 30, 25);
        });

        Schema::table('offres', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')
                ->on('users')
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
        Schema::dropIfExists('offres');
    }
}
