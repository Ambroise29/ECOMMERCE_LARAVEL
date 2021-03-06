<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeproduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listeproduits', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('id_cmd');
            $table->tinyInteger('id_prod');
            $table->tinyInteger('id_user');
            $table->integer('qts');
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
        Schema::dropIfExists('listeproduits');
    }
}
