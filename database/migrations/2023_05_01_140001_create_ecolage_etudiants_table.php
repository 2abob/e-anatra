<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcolageEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecolage_etudiants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idParcourNiveau');
            $table->unsignedBigInteger('idEtudiant');
            $table->unsignedBigInteger('tranche1');
            $table->unsignedBigInteger('tranche2');
            $table->unsignedBigInteger('tranche3');
            $table->unsignedBigInteger('tranche4');
            $table->timestamps();
            $table->foreign('idParcourNiveau')->references('id')->on('parcours_niveaux');
            $table->foreign('idEtudiant')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ecolage_etudiants');
    }
}
