<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tentour');
            $table->text('chude');
            $table->text('noidung');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->float('giatour');

            $table->integer('idnoiden')->unsigned();
            $table->integer('iddongtour')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour');
    }
}
