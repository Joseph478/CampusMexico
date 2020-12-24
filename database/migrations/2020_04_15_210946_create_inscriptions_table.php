<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('user_id');
            $table->datetime('first_access')->nullable();
            $table->string('assistance', 2)->nullable();
            $table->unsignedSmallInteger('grade_begin')->nullable();
            $table->datetime('grade_begin_date')->nullable();
            $table->unsignedSmallInteger('grade')->nullable();
            $table->json('grade_tried')->nullable();
            $table->json('grade_date')->nullable();
            $table->unsignedSmallInteger('grade_min');
            $table->string('type');
            $table->string('state', 1)->default(\App\Inscription::ACTIVED);
            $table->unsignedBigInteger('user_created')->nullable();
            $table->unsignedBigInteger('user_modified')->nullable();
            $table->unsignedBigInteger('user_deleted')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('classroom_id')
                ->references('id')->on('classrooms')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
