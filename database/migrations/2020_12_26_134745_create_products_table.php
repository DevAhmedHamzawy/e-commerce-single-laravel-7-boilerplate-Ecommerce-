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
            $table->integer('category_id');
            $table->integer('code');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('slug');
            $table->string('image');
            $table->bigInteger('price');
            $table->text('description_ar');
            $table->text('description_en');
            $table->text('options')->nullable();
            $table->text('other_images');
            $table->boolean('special');
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
