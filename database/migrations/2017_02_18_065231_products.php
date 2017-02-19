<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Products.
 *
 * @author  The scaffold-interface created at 2017-02-18 06:52:32am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('products',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('namaproduk');
        
        $table->longText('foto');
        
        $table->integer('stok');
        
        $table->double('harga', 10,2);
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('category_id')->unsigned()->nullable();
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        
        
        $table->timestamps();
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
