<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Amranidev\Ajaxis\Ajaxis;
use URL;


class PagesController extends Controller
{
  
  

     public function show($id,Request $request)
    {
        $detail = Product::findOrfail($id);
        $categories = \App\Category::All();

        return view('detailproduk',compact('detail','categories'));
    }

    
}
