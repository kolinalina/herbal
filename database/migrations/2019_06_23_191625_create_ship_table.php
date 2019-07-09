<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship', function (Blueprint $table) {
            
            $table->bigIncrements('ship_id');
            $table->string('ship_fullname');
            $table->string('ship_address');
            $table->string('ship_kodepos');
            $table->string('ship_email');
            $table->string('ship_phone');
            $table->string('ship_note');
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
        Schema::dropIfExists('ship');
    }
}
