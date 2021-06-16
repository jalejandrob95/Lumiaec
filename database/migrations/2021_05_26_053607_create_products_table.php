<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {

            $table->id();

            $table->string('product_id');
            $table->string('product_code')->length(30);
            $table->string('product_name')->length(30);
            $table->string('product_description')->length(60);
            $table->decimal('product_price')->length( $precision = 10, $scale = 0);
            $table->integer('product_stock')->length(11);
            $table->integer('product_idcategory')->length(11);
            $table->integer('product_idsubcategory')->length(11);
            $table->string('product_picture');

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
        Schema::dropIfExists('products');
    }
}
