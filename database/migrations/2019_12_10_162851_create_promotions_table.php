<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->string('productCode', 15)->primary();
            $table->string('promotionsCode', 25)->primary();
            $table->string('productCode', 15);
            $table->date('expiryDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
