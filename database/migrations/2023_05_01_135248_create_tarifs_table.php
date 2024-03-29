<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('idAnnee');
            $table->string('idParcour');
            $table->string('idNiveau');
            $table->unsignedBigInteger('ecolage');
            $table->unsignedBigInteger('tranche1')->default(0);
            $table->unsignedBigInteger('tranche2')->default(0);
            $table->unsignedBigInteger('tranche3')->default(0);
            $table->unsignedBigInteger('tranche4')->default(0);
            $table->timestamps();
            $table->unique(['idAnnee', 'idParcour', 'idNiveau']);
            $table->foreign('idAnnee')->references('id')->on('annee_universitaires');
            $table->foreign('idParcour')->references('id')->on('parcours');
            $table->foreign('idNiveau')->references('id')->on('niveaux');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifs');
    }
}
