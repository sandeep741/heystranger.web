<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomVenuPromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accom_venu_promos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('accom_type_id')->unsigned()->nullable();
            $table->integer('rating')->unsigned()->nullable();
            $table->string('reserve_email');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('street_address')->nullable();
            $table->string('area')->nullable();
            $table->string('contact_no')->nullable();;
            $table->string('alternate_no')->nullable();
            $table->string('establish_details')->nullable();
            $table->enum('status', ['1', '0']);
            $table->enum('type', ['', 'A', 'V', 'P']);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('accom_venu_promos');
    }
}
