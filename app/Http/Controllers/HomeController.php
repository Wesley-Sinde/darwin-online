<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if (Auth::user()->PurchaseNo == 0) {
            // User::Create([
            //     'PurchaseNo' => uniqid()
            // ]);
            User::where('id', Auth::User()->id)
                ->update([
                    'PurchaseNo' => mt_rand(10000000, 99999999)
                ]);
        }

        $Product = Product::orderBy('created_at', 'desc')->paginate(5);

        //  dd($Product);
        if ($request->ajax()) {
            return view('home', compact('Product'));
        }
        return view('home', compact('Product'));

        // return view('home');
    }

    public function Cart(Request $request)
    {
        $Product = DB::table('purchase_items')
            ->where('PurchaseNo', Auth::user()->PurchaseNo)
            ->leftJoin('Products', 'purchase_items.ProductNo', '=', 'Products.id')
            ->get();

        //dd($Product);
        return view('cart', compact('Product'));

        // return view('home');
    }
    public function buy(Request $request)
    {

        Purchase::create([
            'email' => Auth::User()->email,
            'PurchaseNo' => Auth::user()->PurchaseNo,
        ]);

        $Product = DB::table('purchase_items')
            ->leftJoin('Products', 'purchase_items.ProductNo', '=', 'Products.id')
            ->get();


        User::where('id', Auth::User()->id)
            ->update([
                'PurchaseNo' => '0'
            ]);
        //dd(Auth::User()->id);
        $details = $Product;


        \Mail::to(Auth::User()->email)->send(new \App\Mail\NewMail($details)); //enter org email

        \Mail::to('sindewesley5@gmail.com')->send(new \App\Mail\NewMail($details)); //enter org email
        // dd("Email is Sent.");
        return redirect('/home')->with('message', 'Your order has been place check your email');
    }

    public function store(Request $request)
    {

        // Quantity PurchaseNo ProductNo
        $request->validate([
            'Quantity' => 'required',
            'ProductNo' => 'required'
        ]);


        // Purchase::create([
        //     'email' => Auth::User()->email,
        //     'PurchaseNo' => $request->input('PurchaseNo'),
        // ]);

        PurchaseItem::create([
            'Quantity' => $request->input('Quantity'),
            'PurchaseNo' => Auth::user()->PurchaseNo,
            'ProductNo' => $request->input('ProductNo'),
        ]);



        return redirect('/home')->with('message', 'Your art has been added to cart When Yoy are done check your cart');
    }
}
