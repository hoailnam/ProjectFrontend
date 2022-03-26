<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
// use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function ShowCart()
    {
        $newCart = Cart::content();
        return view('front.shop.cart', compact('newCart'));
    }

    public function AddCart($id)
    {
        $products = Product::find($id);
        $products_id = $products->id;
        $products_name = $products->name;
        $products_quantity = 1;
        $products_price = $products->price;
        $brand= Brand::find($products->brand_id);
        $products_brand=$brand->name;
        $newCart = Cart::add($products_id, $products_name, $products_quantity, $products_price,['brand'=>$products_brand]);
        // dd($newCart->options['brand']);
        return view('front.shop.cart', compact('newCart'));
    }

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);
        $newCart = Cart::content();
        return view('front.shop.cart', compact($newCart));
    }
    public function UpdateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
        $newCart = Cart::content();
        return view('front.shop.cart', compact($newCart));
    }
}
