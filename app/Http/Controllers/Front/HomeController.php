<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //
    public function index(){
        $product6 = Product::paginate(6);
        $product3 = Product::paginate(3);
        return view('front.index',compact('product6', 'product3'));
    }
}
