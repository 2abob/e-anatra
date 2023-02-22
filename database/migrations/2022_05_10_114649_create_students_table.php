<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_classe');
            $table->unsignedBigInteger('id_type_cours');
            $table->string('matricule');
            $table->string('image')->nullable();
            $table->string('nom_etudiant');
            $table->string('prenoms_etudiant');
            $table->string('date_de_naissance');
            $table->string('nom_du_pere');
            $table->string('nom_de_la_mere');
            $table->string('contact_parent');
            $table->string('sexe');
            $table->string('adresse');
            $table->timestamps();
            $table->foreign('id_classe')->references('id')->on('classes');
            $table->foreign('id_type_cours')->references('id')->on('type_cours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
