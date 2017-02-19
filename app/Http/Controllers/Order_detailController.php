<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order_detail;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Oder;


use App\Product;


/**
 * Class Order_detailController.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:51:52am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Order_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $order_details = Order_detail::all();
        return view('order_detail.index',compact('order_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        $oders = Oder::all()->pluck('customer_id','id');
        
        $products = Product::all()->pluck('namaproduk','id');
        
        return view('order_detail.create',compact('oders' , 'products'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_detail = new Order_detail();

        
        $order_detail->jumlah = $request->jumlah;

        
        $order_detail->harga = $request->harga;

        
        $order_detail->status = $request->status;

        
        
        $order_detail->oder_id = $request->oder_id;

        
        $order_detail->product_id = $request->product_id;

        
        $order_detail->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new order_detail has been created !!']);

        return redirect('order_detail');
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
            return URL::to('order_detail/'.$id);
        }

        $order_detail = Order_detail::findOrfail($id);
        return view('order_detail.show',compact('order_detail'));
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
            return URL::to('order_detail/'. $id . '/edit');
        }

        
        $oders = Oder::all()->lists('customer_id','id');

        
        $products = Product::all()->lists('namaproduk','id');

        
        $order_detail = Order_detail::findOrfail($id);
        return view('order_detail.edit',compact('order_detail' ,'oders', 'products' ) );
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
        $order_detail = Order_detail::findOrfail($id);
    	
        $order_detail->jumlah = $request->jumlah;
        
        $order_detail->harga = $request->harga;
        
        $order_detail->status = $request->status;
        
        
        $order_detail->oder_id = $request->oder_id;

        
        $order_detail->product_id = $request->product_id;

        
        $order_detail->save();

        return redirect('order_detail');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/order_detail/'. $id . '/delete/');

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
     	$order_detail = Order_detail::findOrfail($id);
     	$order_detail->delete();
        return URL::to('order_detail');
    }
}
