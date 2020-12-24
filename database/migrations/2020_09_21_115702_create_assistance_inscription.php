<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanceInscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_inscription', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assistance_id');
            $table->unsignedBigInteger('inscription_id');
            $table->string('state')->default(\App\AssistanceInscription::ACTIVE);
            $table->unsignedBigInteger('user_created')->nullable();
            $table->unsignedBigInteger('user_modified')->nullable();

            $table->foreign('assistance_id')
                ->references('id')->on('assistances')
                ->onDelete('cascade');

            $table->foreign('inscription_id')
                ->references('id')->on('inscriptions')
                ->onDelete('cascade');

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
        Schema::dropIfExists('assistance_inscription');
    }
}
