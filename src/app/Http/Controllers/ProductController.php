<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('season')->get();
        $seasons = Season::all();
        return view('index', compact('products', 'seasons'));
    }

    public function register()
    {
        return view('register');
    }
}
