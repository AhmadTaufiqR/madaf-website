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
        Schema::create('detail_product_outs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_outs')->nullable(true)->constrained();
            $table->foreignId('products')->nullable(true)->constrained();
            $table->string('quantity');
            $table->string('subtotal');
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
        Schema::dropIfExists('detail_product_outs');
    }
};
