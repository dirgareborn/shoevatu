<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Oders.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:46:59am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Oders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('oders',function (Blueprint $table){

        $table->increments('id');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('customer_id')->unsigned()->nullable();
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        
        
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
        Schema::drop('oders');
    }
}
