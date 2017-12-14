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
            $table->integer('accom_type_id');
            $table->integer('rating');
            $table->string('reserve_email');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('street_address');
            $table->string('area');
            $table->string('contact_no');
            $table->string('alternate_no');
            $table->string('establish_details');
            $table->enum('status', ['1', '0']);
            $table->enum('type', ['1', '2', '3']);
            $table->tinyInteger('tab_type');
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
