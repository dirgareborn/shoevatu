<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Customers.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:39:40am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('customers',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('namakustomer');
        
        $table->biginteger('telepon');
        $table->String('email')->unique();
        $table->string('password');
        $table->rememberToken();        
        $table->String('statusakun');
        
        /**
         * Foreignkeys section
         */
        
        
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
        Schema::drop('customers');
    }
}
