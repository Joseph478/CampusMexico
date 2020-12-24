<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');
            $table->string('dni')->nullable()->unique();
            $table->string('last_name');
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('area')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->bigInteger('user_created')->nullable();
            $table->bigInteger('user_modified')->nullable();
            $table->bigInteger('user_deleted')->nullable();
            $table->string('state', 1)->default(\App\User::ACTIVE);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
