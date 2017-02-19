<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Customer;


/**
 * Class AddressController.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:56:27am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::all();
        return view('address.index',compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        $customers = Customer::all()->pluck('namakustomer','id');
        
        return view('address.create',compact('customers'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address();

        
        $address->alamat = $request->alamat;

        
        $address->kecamatan = $request->kecamatan;

        
        $address->kabupaten = $request->kabupaten;

        
        $address->provinsi = $request->provinsi;

        
        $address->alamat2 = $request->alamat2;

        
        
        $address->customer_id = $request->customer_id;

        
        $address->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new address has been created !!']);

        return redirect('address');
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
            return URL::to('address/'.$id);
        }

        $address = Address::findOrfail($id);
        return view('address.show',compact('address'));
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
            return URL::to('address/'. $id . '/edit');
        }

        
        $customers = Customer::all()->lists('namakustomer','id');

        
        $address = Address::findOrfail($id);
        return view('address.edit',compact('address' ,'customers' ) );
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
        $address = Address::findOrfail($id);
    	
        $address->alamat = $request->alamat;
        
        $address->kecamatan = $request->kecamatan;
        
        $address->kabupaten = $request->kabupaten;
        
        $address->provinsi = $request->provinsi;
        
        $address->alamat2 = $request->alamat2;
        
        
        $address->customer_id = $request->customer_id;

        
        $address->save();

        return redirect('address');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/address/'. $id . '/delete/');

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
     	$address = Address::findOrfail($id);
     	$address->delete();
        return URL::to('address');
    }
}
