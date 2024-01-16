<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_store')->nullable(true);
            $table->foreign('id_store')->references('id')->on('stores');
            $table->string('code_barcode');
            $table->string('name_product');
            $table->integer('price_product');
            $table->string('desc_product');
            $table->integer('stok');
            $table->string('image')->nullable(true);
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
        Schema::dropIfExists('table_product');
    }
};
