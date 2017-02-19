<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Order_details.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:51:52am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class OrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('order_details',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('jumlah');
        
        $table->double('harga', 10, 2);
        
        $table->boolean('status')->default(1);
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('oder_id')->unsigned()->nullable();
        $table->foreign('oder_id')->references('id')->on('oders')->onDelete('cascade');
        
        $table->integer('product_id')->unsigned()->nullable();
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        
        
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
        Schema::drop('order_details');
    }
}
