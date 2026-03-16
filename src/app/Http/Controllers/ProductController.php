<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'desc') {
            $query->orderBy('price', 'desc');
        }
        $products = $query->paginate(6)->appends($request->query());
        return view('index', compact('products'));
    }

    public function detail($product)
    {
        $product = Product::with('seasons')->findOrFail($product);
        $seasons = Season::all();
        return view('detail', compact('product', 'seasons'));
    }

    public function create()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function store(ProductRequest $request)
    {
        $imagePath = $request->file('image')->store('products', 'public');
        $product = Product::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'image'=> $imagePath,
            'description'=> $request->description,
        ]);
        $product->seasons()->sync($request->seasons);
        return redirect('/');
    }
}