<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::latest()->paginate(10);
        return view('home', compact('category', 'product'));
    }
    /**
     * Show products by category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductByCategory(Category $category)
    {
        $product = Product::latest()->paginate(20);
        return view('home.products', compact('category', 'product'));
    }

    public function getDetailByProduct(Product $product)
    {
        $category = Category::all();
        return view('home.detail', compact('product', 'category'));
    }
}
