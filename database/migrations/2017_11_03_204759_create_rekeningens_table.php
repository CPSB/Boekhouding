<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRekeningensTable
 */
class CreateRekeningensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekeningens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->string('rekening_naam');
            $table->string('rekening_nr');
            $table->text('beschrijving');
            $table->softDeletes();
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
        Schema::dropIfExists('rekeningens');
    }
}
