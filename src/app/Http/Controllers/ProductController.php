<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('seasons')->get();
        $seasons = Season::all();
        return view('index', compact('products', 'seasons'));
    }

    public function create()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'image'=> 'dummy.png',
            'description'=> $request->description,
        ]);
        $product->seasons()->sync($request->seasons);
        return redirect('/');
    }
}