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
            $table->id();
            $table->string('titre');
            $table->string('slug');
            $table->text('resume');
            $table->text('contenu');
            $table->unsignedBigInteger('etat_id');
            $table->unsignedBigInteger('template_id');
            $table->unsignedBigInteger('visibilite_id');
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('etat_id')->references('id')->on('etats')->onDelete('cascade');
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
            $table->foreign('visibilite_id')->references('id')->on('visibilites')->onDelete('cascade');
   
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
