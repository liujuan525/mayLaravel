<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile')->nullable()->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('website')->default('website')->comment('站点：applet、website');
            $table->string('store_id')->default('1')->comment('店铺 ID');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('appellation')->comment('称谓');
            $table->dateTime('birthday')->comment('生日');
            $table->string('province')->comment('省');
            $table->string('city')->comment('市');
            $table->string('district')->comment('区/县');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
