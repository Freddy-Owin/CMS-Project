<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware("auth:admin")->except([
        //     "showRegisterForm","showAdminLoginForm", "adminLogin"
        // ]);
    }

    public function index()
    {
        $category = Category::all();
        $product = Product::all();
        return view('admin.index', compact('product', 'category'));
    }

    public function showRegisterForm()
    {
        return view("admin.auth.register");
    }

    public function showAdminLoginForm()
    {
        return view("admin.auth.login");
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        dd(auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]));
    }
}
