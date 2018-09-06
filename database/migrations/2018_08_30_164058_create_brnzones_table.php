<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrnzonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brnzones', function (Blueprint $table) {
            $table->string('BrnCode');
            $table->string('BrnName');
            $table->string('BrnPrv');
            $table->integer('BrnOpen');
            $table->integer('CtsId');
            $table->integer('AreaId');
            $table->primary('BrnCode');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brnzones');
    }
}
