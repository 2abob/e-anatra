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
            $table->string('id')->primary();
            $table->string('idTarif');
            $table->string('idEtudiant');
            $table->unsignedBigInteger('tranche1')->default(0);
            $table->unsignedBigInteger('tranche2')->default(0);
            $table->unsignedBigInteger('tranche3')->default(0);
            $table->unsignedBigInteger('tranche4')->default(0);
            $table->timestamps();
            $table->unique(['idTarif', 'idEtudiant']);
            $table->foreign('idTarif')->references('id')->on('tarifs');
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
