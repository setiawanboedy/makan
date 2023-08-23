<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKulinerPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuliner_places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('resto_id');
            $table->string('name');
            $table->bigInteger('hp');
            $table->string('status')->default('Buka');
            $table->text('image');
            $table->string('avgprice');
            $table->string('address');
            $table->string('latlng')->nullable();
            $table->integer('table');
            $table->integer('room');
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
        Schema::dropIfExists('kuliner_places');
    }
}
