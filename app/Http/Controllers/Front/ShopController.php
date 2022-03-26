<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        return view('front.shop.show', compact('product'));
    }
    public function index(Request $request)
    {
        //Get Brand
        $brands = Brand::all();

        $perPage = $request->show ?? 3;

        $sortBy = $request->sort_by ?? 'price-ascending';

        $search = $request->search ?? '';
        $products = Product::where('name', 'like', '%' . $search . '%');

        $products = $this->sortAndPagination($products, $sortBy, $perPage);
        // $products = Product::paginate(6);


        return view('front.shop.index', compact('brands', 'products'));
    }
    public function brand($brandName, Request $request)
    {
        //Get Brand
        $brands = Brand::all();
        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'price-ascending';
        //GetProduct
        $products = Brand::where('name', $brandName)->first()->products->toQuery();

        $products = $this->sortAndPagination($products, $sortBy, $perPage);
        return view('front.shop.index', compact('brands', 'products'));
    }

    public function sortAndPagination($products, $sortBy, $perPage)
    {
        switch ($sortBy) {
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            default:
                $products = $products->orderBy('price');
        }
        $products = $products->paginate($perPage);

        $products->appends(['sort_by' => $sortBy, 'show' => $perPage]);

        return $products;
    }
}
