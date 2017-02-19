<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Addresses.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:56:27am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Addresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('addresses',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('alamat');
        
        $table->String('kecamatan');
        
        $table->String('kabupaten');
        
        $table->String('provinsi');
        
        $table->String('alamat2');
        
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
        Schema::drop('addresses');
    }
}
