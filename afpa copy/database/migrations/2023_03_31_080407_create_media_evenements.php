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
        Schema::create('media_evenements', function (Blueprint $table) {
            $table->id('id_media');
            $table->text('chemin_media_evenement');
            $table->string('titre_media_evenement');
            $table->integer('position_media_evenement');
            $table->unsignedBigInteger('id_type_media');
            $table->unsignedBigInteger('id_evenement');

            $table->foreign('id_type_media')->references('id_type_media')->on('type_medias')->onDelete('cascade');
            $table->foreign('id_evenement')->references('id_evenement')->on('evenements')->onDelete('cascade');

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
        Schema::dropIfExists('media_evenement');
    }
};
