<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJeuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeux', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->nullable(false);
            $table->integer('sortie')->nullable(false);
            $table->string('categorie')->nullable(false);
            $table->integer('age_min')->default(3)->nullable(false);
            $table->string('description')->nullable(false);
            $table->integer('min_joueur')->nullable(false);
            $table->integer('max_joueur')->nullable(false);
            $table->integer('min_duree')->nullable(false);
            $table->integer('max_duree')->nullable(false);
            $table->string('image')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jeux');
    }
}
