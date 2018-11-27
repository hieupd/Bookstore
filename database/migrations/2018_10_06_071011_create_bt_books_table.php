<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bt_books', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('book_name')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('book_author')->nullable();
            $table->string('book_publish')->nullable();
            $table->string('book_yearpublish')->nullable();
            $table->string('book_language')->nullable();
            $table->string('book_translator')->nullable();
            $table->string('book_provider')->nullable();
            $table->string('book_jackettype')->nullable();
            $table->string('book_size')->nullable();
            $table->integer('book_page')->nullable();
            $table->integer('book_quantity')->nullable();
            $table->string('book_dsc',10000)->nullable();
            $table->integer('book_sale')->nullable();
            $table->integer('book_price')->nullable();
            $table->string('book_image')->nullable();
            $table->integer('book_status')->nullable();
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
        Schema::dropIfExists('bt_books');
    }
}
