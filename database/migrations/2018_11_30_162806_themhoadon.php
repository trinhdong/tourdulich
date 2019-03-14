<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Themhoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            
            $table->string('tenkh');
            $table->string('email');
            $table->string('sodt');
            $table->string('diachi');
            $table->string('tinhtrang')->default;
         

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
