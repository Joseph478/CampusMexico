<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->string('name');
            $table->text('description');
            $table->unsignedDecimal('hour', 5, 1);
            $table->unsignedDecimal('grade_min', 3, 1);
            $table->text('temary')->nullable();
            $table->string('is_certificate', 1)->default(\App\Course::IS_CERTIFICATE);
//            $table->string('image');
            $table->integer('validity');
            $table->string('type_validity', 1)->default('1');
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
        Schema::dropIfExists('courses');
    }
}
