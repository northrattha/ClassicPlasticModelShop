<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multipleaddress', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->integer('customerNumber');
            $table->increments('addressNo');
            $table->string('addressLine1', 50);
            $table->string('addressLine2', 50);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('postalCode', 25);
            $table->string('country', 50);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multiple_address');
    }
}
