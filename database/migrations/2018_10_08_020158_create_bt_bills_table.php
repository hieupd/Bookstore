<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bt_bills', function (Blueprint $table) {
            $table->increments('bill_id');
            $table->integer('member_id');
            $table->integer('bill_tprice');
            $table->string('ship_address')->nullable();
            $table->string('bill_status');
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
        Schema::dropIfExists('bt_bills');
    }
}
