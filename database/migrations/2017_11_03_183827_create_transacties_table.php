<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->string('naam');
            $table->string('type');
            $table->timestamp('transactie_datum');
            $table->text('beschrijving');
            $table->string('factuur_path');
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
        Schema::dropIfExists('transacties');
    }
}
