<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rate;
use App\Models\Size;
use App\Models\Color;
use App\Models\Catalog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $demoProducts = Product::orderByRaw('RAND()')->take(4)->get();
        return view('/client/index', compact('demoProducts'));
    }

    public function productList()
    {
        $catalogs = Catalog::all();
        $products = Product::all();
        $ratings = Rate::all();

        return view('/client/products', compact('products', 'catalogs', 'ratings'));
    }

    public function show($id)
    {
        //chi tiet san pham
        $products = Product::findOrFail($id);
        $ratings = Rate::where('product_ID', $products->id)->get();
        $rating_sum = Rate::where('product_ID', $products->id)->get()->sum('star');
        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        $related_products = Product::where('catalog_ID', $products->catalog_ID)->limit(3)->get();
        return view('/client/product_detail', compact('products', 'related_products', 'ratings', 'rating_value'));
    }

    public function filter(Request $request)
    {
        $catalogs = Catalog::all();
        $query = Product::query();
        //search name of product
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }
        //filter catalog
        if ($request->filled('catalog')) {
            $query->where('catalog_ID', $request->input('catalog'));
        }
        //filter price
        if ($request->filled('min_price') && $request->filled('min_price')){
            $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }
        //filter rating
        $filterRatingProductID  = Rate::select('product_ID', DB::raw('round(avg(star)) as avgstar'))
                           ->groupBy('product_ID')
                           ->having('avgstar', '=', $request->input('rating'));
        if ($request->filled('rating') &&  $filterRatingProductID->count() != 0) {
            $query->where('id', $filterRatingProductID->pluck('product_ID'));
        }
       
        $products = $query->get();
        return view('/client/products', compact('products', 'catalogs'));
    }
    public function sort(Request $request) {
        $catalogs = Catalog::all();
        if ($request->input('sort') == 'desc') {
            $products = Product::query()->orderByDesc('price')->get();
        } else if ($request->input('sort') == 'asc') {
            $products = Product::query()->orderBy('price')->get();
        } else if ($request->input('sort') == 'latest') {
            $products = Product::query()->orderBy('created_at', 'desc')->get();
        } else {
            $products = Product::all();
        }
        return view('/client/products', compact('products', 'catalogs'));
    }
}
