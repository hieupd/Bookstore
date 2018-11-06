<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtBillInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bt_billsinfo', function (Blueprint $table) {
            $table->increments('billinfo_id');
            $table->integer('bill_id');
            $table->integer('book_id');
            $table->integer('book_price');
            $table->integer('book_quantity');
            $table->integer('book_sale');
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
        //
    }
}
