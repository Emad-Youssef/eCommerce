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
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('slug')->unique();
            $table->decimal('price', 18, 4)->unsigned()->comment('original price');
            $table->decimal('special_price', 18, 4)->unsigned()->nullable()->comment('Special Price during periods and events');
            $table->string('special_price_type')->nullable()->comment('Discount type');
            $table->date('special_price_start')->nullable()->comment('Start date of the discount');
            $table->date('special_price_end')->nullable()->comment('Discount end date');
            $table->decimal('selling_price', 18, 4)->unsigned()->nullable()->comment('Selling price');
            $table->string('sku')->nullable()->comment('Product Code');
            $table->boolean('manage_stock');
            $table->integer('qty')->nullable()->comment('quantity is in stock');
            $table->boolean('in_stock');
            $table->integer('viewed')->unsigned()->default(0);
            $table->boolean('is_active');
            $table->softDeletes();	
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
