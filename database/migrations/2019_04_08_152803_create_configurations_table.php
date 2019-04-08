<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Configuration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key',100)->unique();
            $table->string('value',100)->nullable();
        });
        Configuration::create(['key'=>'signup_first_name', 'value'=>'none']);
        Configuration::create(['key'=>'signup_last_name', 'value'=>'none']);
        Configuration::create(['key'=>'signup_email', 'value'=>'none']);
        Configuration::create(['key'=>'signup_mobile', 'value'=>'required']);
        Configuration::create(['key'=>'signup_phone', 'value'=>'none']);
        Configuration::create(['key'=>'signup_avatar', 'value'=>'none']);

        Configuration::create(['key'=>'signup_method', 'value'=>'direct']);  //Or validate_email



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
