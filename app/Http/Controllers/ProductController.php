<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Image;
use validator;
use input;
use App\Category;


/**
 * Class ProductController.
 *
 * @author  The scaffold-interface created at 2017-02-18 06:52:32am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all()->pluck('namakategori','id');
        
        return view('product.create',compact('categories'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $images = $request->file('foto');
        $filename= time().'.'.$images->getClientOriginalExtension();
        $destinationPath = public_path('/images/Pic');
        $img = Image::make($images->getRealPath());
        $img->resize(300, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$filename);
        $destinationPath = public_path('/images/Thumbpic');
        $images->move($destinationPath, $filename);


        $product = new Product();      
        $product->namaproduk = $request->namaproduk;       
        $product->foto = $filename;        
        $product->stok = $request->stok;       
        $product->harga = $request->harga;      
        $product->category_id = $request->category_id;   
        $product->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new product has been created !!']);

        return redirect('product');
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
            return URL::to('product/'.$id);
        }

        $product = Product::findOrfail($id);
        return view('product.show',compact('product'));
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
            return URL::to('product/'. $id . '/edit');
        }

        
        $categories = Category::all()->lists('namakategori','id');

        
        $product = Product::findOrfail($id);
        return view('product.edit',compact('product' ,'categories' ) );
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
        $product = Product::findOrfail($id);
    	
        $product->namaproduk = $request->namaproduk;
        
        $product->foto = $request->foto;
        
        $product->stok = $request->stok;
        
        $product->harga = $request->harga;
        
        
        $product->category_id = $request->category_id;

        
        $product->save();

        return redirect('product');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/product/'. $id . '/delete/');

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
     	$product = Product::findOrfail($id);
     	$product->delete();
        return URL::to('product');
    }
}
