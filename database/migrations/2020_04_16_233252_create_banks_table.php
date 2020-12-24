<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('content_id');
            $table->foreign('content_id')
                ->references('id')->on('contents')
                ->onDelete('cascade');
            $table->string('title',500);
            $table->bigInteger('is_question')->default(1);
            $table->bigInteger('is_correct')->default(0);
            $table->bigInteger('parent_id')->nullable();
            $table->string('state',1)->default('1');
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
        Schema::dropIfExists('banks');
    }
}
