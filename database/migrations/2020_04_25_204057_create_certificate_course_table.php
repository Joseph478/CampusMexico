<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_course', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('certificate_id')->unsigned();
            $table->string('state', 1)->default('1');
            $table->timestamps();

            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade');
            $table->foreign('certificate_id')
                ->references('id')->on('certificates')
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
        Schema::dropIfExists('certificate_course');
    }
}
