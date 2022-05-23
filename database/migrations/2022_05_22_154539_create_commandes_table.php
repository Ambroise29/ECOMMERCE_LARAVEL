<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('name');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone');
            $table->string('adresse1');
            $table->string('adresse2')->nullable();
            $table->string('ville');
            $table->string('quartier');
            $table->string('pays');
            $table->string('code_postal');
            $table->tinyInteger('status')->default('0');
            $table->string('message')->nullable();
            $table->string('tracking_no');
            $table->string('total');
            $table->timestamps();
        });
    }
    //'AM'.'L000'.rand(1111,9999);
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
