<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdrressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->string('full_name')->index();
            $table->tinyInteger('mobile')->index();
            $table->tinyInteger('phone_number')->nullable()->index();
            $table->tinyInteger('postalcode')->index();
            $table->string('city')->index();
            $table->string('state')->index();
            $table->string('house_number')->index();
            $table->string('area')->nullable()->index();
            $table->string('landmark')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
