<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('classroom_id');
            $table->foreign('classroom_id')
                ->references('id')->on('classrooms')
                ->onDelete('cascade');
            $table->text('name');
            $table->string('random',1)->default(\App\Test::NO_RANDOM);
            $table->time('time');
            $table->integer('tried');
            $table->string('save_tried',1)->default('0');
            $table->string('view_answer',1)->default('0');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->integer('number_question');
            $table->string('type',1)->default(\App\Test::REGULAR);
            $table->string('is_qualified',1)->default(\App\Test::NO_QUALIFIED);
            $table->integer('grade_max')->default(20);
            $table->string('state', 1)->default(\App\Test::ACTIVE);
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
        Schema::dropIfExists('tests');
    }
}
