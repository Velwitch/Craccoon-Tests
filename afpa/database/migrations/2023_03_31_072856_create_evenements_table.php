<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id('id_evenement');
            $table->string('titre_evenement');
            $table->string('slug_evenement');
            $table->text('resume_evenement');
            $table->text('contenu_evenement');
            $table->unsignedBigInteger('id_etat');
            $table->unsignedBigInteger('id_template');
            $table->unsignedBigInteger('id_visibilite');
            $table->timestamps();

            $table->foreign('id_etat')->references('id_etat')->on('etats')->onDelete('cascade');
            $table->foreign('id_template')->references('id_template')->on('templates')->onDelete('cascade');
            $table->foreign('id_visibilite')->references('id_visibilite')->on('visibilites')->onDelete('cascade');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
};
