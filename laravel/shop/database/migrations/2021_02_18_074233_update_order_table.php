<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Schema::table('orders', function (Blueprint $table) {
//            $table->string('name');
//            $table->string('status');
//            $table->string('note');
//        });
//        Schema::table('orders', function (Blueprint $table) {
//            $table->string('orders')->text();
//        });
        Schema::table('orders', function (Blueprint $table) {
            $table->text('orders')->change();
            $table->string('note')->nullable()->change();
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