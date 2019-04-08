<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('firstName',50)->nullable();
            $table->string('lastName',50)->nullable();
            $table->string('email',100)->unique()->nullable(); //Email max length is 191 chars and cannot be changed
            $table->string('mobile',10)->unique()->nullable();
            $table->string('phone',10)->unique()->nullable();
            $table->boolean('isEmailValidated')->default(false);
            $table->string('emailValidationKey',50)->default('default');
            $table->string('language',10)->default('fr');          
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
