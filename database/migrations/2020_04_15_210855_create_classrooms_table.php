<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('type')->default(\App\Classroom::TYPE_REGULAR);
            $table->dateTime('start_datetime');
            $table->datetime('end_datetime');
            $table->string('vacancies');
            $table->string('modality');
            $table->string('test_begin_required',1)->default(\App\Classroom::TEST_BEGIN_NO_REQUIRED);
            $table->string('is_free',1)->default(\App\Classroom::NO_FREE);
            $table->string('token')->nullable();

            $table->string('name');
            $table->smallInteger('hour');
            $table->unsignedBigInteger('grade_min');
            $table->integer('validity')->nullable();
            $table->bigInteger('type_validity')->nullable();
            $table->string('state', 1)->default(\App\Classroom::ACTIVE);
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
        Schema::dropIfExists('classrooms');
    }
}
