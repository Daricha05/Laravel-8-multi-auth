<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreationTableCotisation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cotisations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_chef');
            $table->string('mois');
            $table->string('annee');
            $table->string('montant');
            $table->string('date_de_paiement');
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
        Schema::dropIfExists('Cotisation');
    }
}
