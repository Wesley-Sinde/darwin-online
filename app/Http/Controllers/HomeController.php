<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $Product = Product::orderBy('created_at', 'desc')->paginate(5);

        //  dd($Product);
        if ($request->ajax()) {
            return view('home', compact('Product'));
        }
        return view('home', compact('Product'));

        // return view('home');
    }

    public function store(Request $request)
    {
        // Quantity PurchaseNo ProductNo
        $request->validate([
            'Quantity' => 'required',
            'PurchaseNo' => 'required',
            'ProductNo' => 'required'
        ]);


        Purchase::create([
            'email' => Auth::User()->email,
            'PurchaseNo' => $request->input('PurchaseNo'),
        ]);

        PurchaseItem::create([
            'Quantity' => $request->input('Quantity'),
            'PurchaseNo' => $request->input('PurchaseNo'),
            'ProductNo' => $request->input('ProductNo'),
        ]);


        $details = [

            'title' => 'Mail from darwinonline',

            'body' => 'Your order has been placed successfully Your Purchase number is ' . $request->input('PurchaseNo')

        ];

        \Mail::to(Auth::User()->email)->send(new \App\Mail\NewMail($details)); //enter org email

        \Mail::to('sindewesley5@gmail.com')->send(new \App\Mail\NewMail($details)); //enter org email
        // dd("Email is Sent.");

        return redirect('/home')->with('message', 'Your order has been place check your email');
    }
}
