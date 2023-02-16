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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product');
            $table->decimal('sell_price',12,2);
            $table->longText('content')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('brand_id')->constrained('brands');
            $table->integer('stock');
            $table->string('image_product');
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
