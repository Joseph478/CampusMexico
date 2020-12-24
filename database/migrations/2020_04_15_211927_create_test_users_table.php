<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')
                ->references('id')->on('tests')
                ->onDelete('cascade');
            $table->json('questions')->nullable();
            $table->json('answers')->nullable();
            $table->json('correct_answers')->nullable();
            $table->integer('tried')->default(0);
            $table->string('time');
            $table->decimal('grade',4,2);
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
        Schema::dropIfExists('test_users');
    }
}
