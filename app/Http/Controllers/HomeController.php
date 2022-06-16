<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
    public function index(Request $request)
    {
        $Product = Product::orderBy('created_at', 'desc')->paginate(15);

        ddd($Product);
        if ($request->ajax()) {
            return view('home', compact('Product'));
        }
        return view('home', compact('Product'));

        // return view('home');
    }
}
