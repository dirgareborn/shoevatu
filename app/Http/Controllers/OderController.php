<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oder;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Customer;


/**
 * Class OderController.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:46:59am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class OderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $oders = Oder::all();
        return view('oder.index',compact('oders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        $customers = Customer::all()->pluck('namakustomer','id');
        
        return view('oder.create',compact('customers'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oder = new Oder();

        
        
        $oder->customer_id = $request->customer_id;

        
        $oder->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new oder has been created !!']);

        return redirect('oder');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('oder/'.$id);
        }

        $oder = Oder::findOrfail($id);
        return view('oder.show',compact('oder'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('oder/'. $id . '/edit');
        }

        
        $customers = Customer::all()->lists('namakustomer','id');

        
        $oder = Oder::findOrfail($id);
        return view('oder.edit',compact('oder' ,'customers' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $oder = Oder::findOrfail($id);
    	
        
        $oder->customer_id = $request->customer_id;

        
        $oder->save();

        return redirect('oder');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/oder/'. $id . '/delete/');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$oder = Oder::findOrfail($id);
     	$oder->delete();
        return URL::to('oder');
    }
}
