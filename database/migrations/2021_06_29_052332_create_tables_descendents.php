<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesDescendents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descendents', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("ChefM_id");
            $table->string("Noms");
            $table->string("Prenoms")->nullable();
            $table->string("Type");
            $table->string("Sexe");
            $table->string("DateN");
            $table->string("statut");
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
        Schema::dropIfExists('descendents');
    }
}
