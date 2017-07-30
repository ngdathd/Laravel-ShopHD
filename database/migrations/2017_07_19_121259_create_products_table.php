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
            $table->increments('id');
            $table->string('name', 45)->default('');
            $table->string('thumbnail')->default('');
            $table->float('price', 11, 2)->default(0);
            $table->string('screen_size', 255)->default('');
            $table->float('discount', 3, 0)->default(0);
            $table->string('description', 45)->default('');
            $table->string('content', 45)->default('');
            $table->string('status', 45)->default('');
            $table->integer('order_detail_id')->default(0);
            $table->integer('categories_id')->default(0);
            $table->integer('baskets_id')->default(0);
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
