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
            $table->id();
            $table->unsignedBigInteger('idParcour');
            $table->unsignedBigInteger('idNiveau');
            $table->unsignedBigInteger('ecolage');
            $table->unsignedBigInteger('tranche1');
            $table->unsignedBigInteger('tranche2');
            $table->unsignedBigInteger('tranche3');
            $table->unsignedBigInteger('tranche4');
            $table->timestamps();
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
