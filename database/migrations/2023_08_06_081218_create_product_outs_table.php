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
        Schema::create('product_outs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stores')->constrained();
            $table->double('price')->nullable(true);
            $table->enum('method', ['cash', 'bon', 'tempo']);
            $table->integer('amount')->nullable(true);
            $table->enum('status', ['Lunas', 'Belum lunas']);
            $table->date('date')->nullable(true);
            $table->string('date_tempo')->nullable(true);
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
        Schema::dropIfExists('product_outs');
    }
};
