<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreationTableChefMenage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menages', function (Blueprint $table) {
            $table->id();
            $table->string('Noms');
            $table->string('Prenoms')->nullable();
            $table->string('Sexe');
            $table->date('DateN');
            $table->string('Origine');
            $table->string('Fonction');
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
        Schema::dropIfExists('CMenages');
    }
}
