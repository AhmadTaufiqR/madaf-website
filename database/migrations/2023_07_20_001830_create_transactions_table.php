<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id_transaction')->primary();
            $table->unsignedBigInteger('id_user')->nullable(true);
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_kasir')->nullable(true);
            $table->foreign('id_kasir')->references('id')->on('users');
            $table->unsignedBigInteger('id_store')->nullable(true);
            $table->foreign('id_store')->references('id')->on('stores');
            $table->date('date');
            $table->integer('quantity');
            $table->integer('total');
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
        Schema::dropIfExists('transactions');
    }
};
