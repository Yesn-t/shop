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
            $table->unsignedBigInteger('departament_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->string('size');
            $table->string('description');
            $table->float('amount')->nullable()->default(99.99);
            $table->timestamps();

            $table->foreign('departament_id')
                  ->references('id')
                  ->on('departaments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            
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
